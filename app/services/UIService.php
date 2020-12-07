<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use Ubiquity\orm\DAO;
use models\Question;
use models\User;
use models\Qcm;
use Ajax\service\JArray;
use models\Typeq;


class UIService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}

	
	public function qcmForm($q) {
	    $frm =$this->jquery->semantic ()->dataForm ( 'form',$q );
	    $frm->setFields ( [
	        'QCM Name',
	        'Description',
	        'cDate',
	        'Status',
	        'Questions',
	        'submit'
	    ] );
	    $frm->fieldAsInput ( 'name', [
	        'rules' => [
	            'empty'
	        ]
	    ] );
	    $frm->fieldAsInput ( 'description', [
	        'rules' => [
	            'empty'
	        ]
	    ] );
	    $frm->fieldAsInput ( 'cdate', [
	        'rules' => [
	            'empty'
	        ]
	    ] );
	    $frm->fieldAsInput ( 'status', [
	        'inputType' => 'status',
	        'rules' => [
	            'length[1]',
	            'Donnez un status !'
	        ]
	    ] );
	  
	        $questions = DAO::getAll ( Question::class );
	        ///$q->setQuestions( current ( $questions ) );
	        $frm->fieldAsDropDown ( 'Questions', JArray::modelArray ( $questions, 'getId','getCaption' ),true );
	        
	        return $frm;
	        
	   
	    
	    
	}
	

	public function questionForm() {
		$q = new Question ();
		$frm = $this->jquery->semantic ()->dataForm ( 'form', $q );
		$frm->setFields ( [ 
				'caption',
				'typeq'
		] );
		$types = DAO::getAll ( Typeq::class );
		$q->setTypeq ( current ( $types ) );
		$frm->fieldAsDropDown ( 'typeq', JArray::modelArray ( $types, 'getId' ) );
		$frm->setValidationParams ( [ 
				"on" => "blur",
				"inline" => true
		] );
		return $frm;
	}

	public function userForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new User () );
		$frm->setFields ( [ 
				'lastname',
				'firstname',
				'email',
				'login',
				'password',
				'submit'
		] );
		$frm->fieldAsInput ( 'lastname', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'login', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'firstname', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'password', [ 
				'inputType' => 'password',
				'rules' => [ 
						'length[10]',
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'email', [ 
				'inputType' => 'email',
				'rules' => [ 
						[ 
								'email',
								'Mail {value} invalide !'
						]
				]
		] );
		$frm->setValidationParams ( [ 
				"on" => "blur",
				"inline" => true
		] );
		return $frm;
	}
}