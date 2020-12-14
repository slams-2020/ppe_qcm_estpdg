<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use Ajax\service\JArray;
use Ubiquity\orm\DAO;
use models\Answer;
use models\Question;

class AnswerService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function reponseForm() {
		$r = new Answer ();
		$frm = $this->jquery->semantic ()->dataForm ( 'form', $r );
		$frm->setFields ( [ 
				'caption',
				'score',
				'question',
				'submit'
		] );
		$frm->setCaptions ( [ 
				'Intitulé de la réponse',
				'Valeur de la réponse (en %)',
				'Question associée',
				'Valider'
		] );
		$frm->fieldAsInput ( 'caption', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$questions = DAO::getAll ( Question::class );
		$r->setQuestion ( (\current ( $questions ))->getId () );
		$frm->fieldAsDropDown ( 'question', JArray::modelArray ( $questions, 'getId', 'getCaption' ), false, [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'score', [ 
				'inputType' => 'number',
				'max' => '100',
				'rules' => [ 
						'empty'
				]
		] );
		$frm->setValidationParams ( [ 
				"on" => "blur",
				"inline" => true
		] );
		return $frm;
	}
}


