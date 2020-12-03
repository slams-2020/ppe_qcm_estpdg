<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use models\Group;

class GroupService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function userForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new Group () );
		$frm->setFields ( [ 
				'name',
				'description',
				'idUser',
				'submit'
		] );
		$frm->fieldAsInput ( 'name', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'idUser', [ 
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