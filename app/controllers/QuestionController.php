<?php

namespace controllers;

use models\Answer;
use services\AnswerService;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Question;
use models\Typeq;
use services\UIService;

/**
 * Controller Question
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class QuestionController extends ControllerBase
{

    private UIService $UIService;

    private AnswerService $AnswerService;

    public function initialize()
    {
        parent::initialize();
        $this->UIService = new UIService($this->jquery);
        $this->AnswerService = new AnswerService($this->jquery);
    }

    public function index()
    {
        $this->loadView("QuestionController/index.html");
    }

    public function submit()
    {
        $question = new Question();
        URequest::setValuesToObject($question);
        $typeQ = DAO::getById(Typeq::class, URequest::post('typeq'));
        $question->setTypeq($typeQ);
        DAO::insert($question);
        if (URequest::has('answerCaption')) {
            foreach($_POST['answerCaption'] as $index=>$answer) {
                $reponse = new Answer();
                $reponse->setCaption($_POST['answerCaption'][$index]);
                $reponse->setScore($_POST['score'][$index]??0);
                $reponse->setQuestion($question);
                if(DAO::insert($reponse)){
                    echo $reponse;
                }
                else{
                    echo 'Pas de réponse.';
                }
            }
        }
    }

    public function addReponse()
    {
        $this->loadView('QuestionController/index.html');
}


    public function question()
    {
        $frm = $this->UIService->questionForm();
        $frm->fieldAsSubmit('submit', 'blue', 'QuestionController/submit', '#responseElement', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ]);
        $frm->fieldAsButton('addReponse','blue',['value'=>'Ajouter une réponse','tagName'=>'div']);
        $this->jquery->getOnClick('#dropdown-form-typeq-0 .item', 'QuestionController/detailsQ', '#response', [
            'attr' => 'data-value',
            'hasLoader' => false,
            'stopPropagation' => false
        ]);
        $this->jquery->click('#form-addReponse-0', 'let frm=$("#answerForm").clone();$("#response").append(frm);');
        $this->jquery->renderView("QuestionController/question.html");

    }

    public function detailsQ($id)
    {
        $type = DAO::getById(Typeq::class, 'id=' . $id);
        if ($type->getId() == 1) {
            $frm = $this->AnswerService->reponseForm();
            $this->jquery->renderView("AnswerController/index.html");
        }
        elseif ($type->getId() == 3) {
            $frm = $this->AnswerService->reponseRapprochementForm();
            $this->jquery->renderView("AnswerController/answerRapprochement.html");
        }
    }
}