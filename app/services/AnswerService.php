<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use Ajax\semantic\html\elements\HtmlLabel;
use Ajax\service\JArray;
use controllers\AnswerController;
use Ubiquity\orm\DAO;
use models\Answer;
use models\Question;

class AnswerService
{
    protected $jquery;
    protected $semantic;
    
    public function __construct(JsUtils $jq)
    {
        $this->jquery = $jq;
        $this->semantic = $jq->semantic();
    }
    
    public function reponseForm()
    {
        $r = new Answer ();
        $frm = $this->jquery->semantic()->dataForm('answerForm', $r);
        $frm->getHtmlComponent()->setTagName('div');
        $frm->setFields([
            'title',
            'caption',
            'score',
        ]);
        $frm->setCaptions([
            '',
            'Intitulé de la réponse',
            'Valeur de la réponse (en %)'
        ]);
        $frm->fieldAsInput('caption', [
            'rules' => [
                'empty'
            ]
        ]);
        $frm->setValueFunction('title',function(){
            $lbl=new HtmlLabel('','Ajouter une nouvelles question :');
            $lbl->addIcon('plus');
            return $lbl;
        });
        $frm->addSeparatorAfter(0);
        $frm->addSeparatorAfter(3);
        $frm->addDividerBefore(4,'');
        $frm->setPropertyValues('name', [
            'caption' => 'answerCaption[]','score' => 'score[]'
        ]);

        $questions = DAO::getAll(Question::class);
        $r->setQuestion((\current($questions))->getId());
        $frm->fieldAsDropDown('question',
            JArray::modelArray($questions, 'getId', 'getCaption'), false, [
                'rules' => [
                    'empty'
                ]
            ]);
        $frm->fieldAsInput('score', [
            'inputType' => 'number',
            'max'       => '100',
            'rules'     => [
                'empty'
            ]
        ]);
        $frm->setValidationParams([
            "on"     => "blur",
            "inline" => true
        ]);
        return $frm;
    }
}


