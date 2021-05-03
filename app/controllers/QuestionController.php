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

    private $AnswerService;

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
            $reponse = new Answer();
            $reponse->setCaption(URequest::post('answerCaption'));
            $reponse->setScore(URequest::post('score'));
            $reponse->setQuestion($question);
            if (DAO::insert($reponse)) {
                echo $reponse;
            } else {
                echo 'Pas de réponse';
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
        $frm->fieldAsButton('addReponse','green',['value'=>'Ajouter une réponse','tagName'=>'div']);
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
            $this->jquery->getOnClick('#dropdown-form-question-0 .item', 'AnswerController/detailsA', '#response', [
                'attr' => 'data-value',
                'hasLoader' => false,
                'stopPropagation' => false
            ]);
            $this->jquery->renderView("AnswerController/index.html");
        }
    }
}