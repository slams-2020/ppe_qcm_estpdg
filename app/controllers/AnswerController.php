<?php

namespace controllers;

use models\Typeq;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Answer;
use models\Question;
use services\AnswerService;

/**
 * Controller AnswerController
 */
class AnswerController extends ControllerBase
{
    private $AnswerService;
    
    public function initialize()
    {
        parent::initialize();
        $this->AnswerService = new AnswerService ($this->jquery);
    }
    
    public function index()
    {
        $frm = $this->AnswerService->reponseForm();
        $frm->fieldAsSubmit('submit', 'blue', 'AnswerController/submit', '', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ]);
        $this->jquery->getOnClick('#dropdown-form-question-0 .item',
            'AnswerController/detailsA', '#response', [
                'attr'            => 'data-value',
                'hasLoader'       => false,
                'stopPropagation' => false
            ]);
        $this->jquery->renderView("AnswerController/index.html");
    }

    public function submit()
    {
        $question = new Question ();
        URequest::setValuesToObject($question);
        $typeQ = DAO::getById(Typeq::class, URequest::post('typeq'));
        $question->setTypeq($typeQ);
        DAO::insert($question);
        $reponse = new Answer ();
        URequest::setValuesToObject($reponse);
        $typeA = DAO::getById(Question::class, URequest::post('question'));
        $reponse->setQuestion($question);
        DAO::insert($reponse);
    }
}
