<?php

namespace controllers;

use services\AnswerService;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Question;
use models\Typeq;
use services\UIService;

/**
 * Controller Question
 */
class QuestionController extends ControllerBase
{
    private $UIService;
    private $AnswerService;
    
    public function initialize()
    {
        parent::initialize();
        $this->UIService = new UIService ($this->jquery);
        $this->AnswerService = new AnswerService ($this->jquery);
    }
    
    public function index()
    {
        $this->loadView("QuestionController/index.html");
    }
    
    public function submit()
    {
        $question = new Question ();
        URequest::setValuesToObject($question);
        $typeQ = DAO::getById(Typeq::class, URequest::post('typeq'));
        $question->setTypeq($typeQ);
        DAO::insert($question);
    }
    
    public function question()
    {
        $frm = $this->UIService->questionForm();
        $frm->fieldAsSubmit('submit', 'blue', 'QuestionController/submit', '', [
            'ajax' => [
                'hasLoader' => 'internal'
            ]
        ]);
        $this->jquery->getOnClick('#dropdown-form-typeq-0 .item',
            'QuestionController/detailsQ', '#response', [
                'attr'            => 'data-value',
                'hasLoader'       => false,
                'stopPropagation' => false
            ]);
        $this->jquery->renderView("QuestionController/question.html");
    }
    
    public function detailsQ($id)
    {
        $type = DAO::getById(Typeq::class, 'id=' . $id);
        if ($type->getId() == 1) {
            $frm = $this->AnswerService->reponseForm();
            $frm->fieldAsSubmit('submit', 'blue', 'AnswerController/submit', '',
                [
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
        } else {
            if ($type->getId() == 2) {
                echo "Cocu";
            }
        }
    }
}