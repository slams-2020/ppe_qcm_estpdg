<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use models\Question;

class UIQuestion {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function questionForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new Question () );
		$frm->setFields ( [ 
				'caption',
				'points',
				'selection',
				'Valider'
		] );
		$frm->setValidationParams ( [ 
				"on" => "blur",
				"inline" => true
		] );
		return $frm;
	}
}