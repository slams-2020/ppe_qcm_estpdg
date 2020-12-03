<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use Ubiquity\orm\DAO;
use models\Question;
use models\User;
<<<<<<< HEAD
use models\Qcm;
use Ubiquity\orm\DAO;
use models\Question;
use Ajax\service\JArray;
=======
use Ajax\service\JArray;
use models\Typeq;
>>>>>>> c33041add9fab61c55420dd3de762502a4ef827c

class UIService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
<<<<<<< HEAD
	
	public function qcmForm() {
	    $q =  new Qcm();
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
	        $q->setQuestions( current ( $questions ) );
	        $frm->fieldAsDropDown ( 'Questions', JArray::modelArray ( $questions, 'getId' ) );
	        return $frm;
	        
	   
	    
	    
	}
	
=======
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
>>>>>>> c33041add9fab61c55420dd3de762502a4ef827c
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