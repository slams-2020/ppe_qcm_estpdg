<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use Ajax\service\JArray;
use Ubiquity\orm\DAO;
use models\Qcm;
use models\Question;
use models\Typeq;
use models\User;

class UIService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function qcmAjoutQuestionForm($qcm) {
		$dernierQcm = DAO::getById ( Qcm::class, $qcm->getId () );
		$frm = $this->jquery->semantic ()->dataElement ( "form", $dernierQcm );
		$questions = DAO::getAll ( Question::class );
		$frm->setFields ( [ 
				'name',
				'description',
				'cdate',
				'status',
				'questions'
		] );
		$frm->setCaptions ( [ 
				'Nom du QCM',
				'Description du QCM',
				'Date de creation',
				'Statut du QCM',
				'Question'
		] );
		$frm->fieldAsDataList ( 'questions', JArray::modelArray ( $questions, 'getId', 'getCaption' ) );
	}
	public function qcmListe() {
		$qcms = DAO::getAll ( Qcm::class );
		$this->jquery->renderView ( "MonTest/index.html" );
		$table = $this->jquery->semantic ()->htmlTable ( "table11", sizeof ( $qcms ), 3 );
		$table->setHeaderValues ( [ 
				"Nom du QCM",
				"Description",
				"Date"
		] );
		$cpt = 0;
		foreach ( $qcms as $elt ) {
			$table->setRowValues ( $cpt, [ 
					$elt->getName (),
					$elt->getDescription (),
					$elt->getCdate ()
			] );
			$cpt = $cpt + 1;
		}
		echo $table->setFixed ();
	}
	public function qcmForm() {
		$qcm = new Qcm ();
		$qcm->setStatus ( true );
		$frm = $this->jquery->semantic ()->dataForm ( 'form', $qcm );
		$frm->setFields ( [ 
				'name',
				'description',
				'status',
				'submit'
		] );
		$frm->setCaptions ( [ 
				'Nom du QCM',
				'Description du QCM',
				'Actif'
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
		$frm->fieldAsCheckbox ( 'status', [ ] );
		// $questions = DAO::getAll ( Question::class );
		// /$q->setQuestions( current ( $questions ) );
		// $frm->fieldAsDropDown ( 'Questions', JArray::modelArray ( $questions, 'getId','getCaption' ),true );
		return $frm;
	}
	public function questionForm() {
		$q = new Question ();
		$frm = $this->jquery->semantic ()->dataForm ( 'form', $q );
		$frm->setFields ( [ 
				'caption',
				'typeq',
				'points',
				'submit'
		] );
		$frm->setCaptions ( [ 
				'Intitulé de la question',
				'Type de question',
				'Points de la question',
				'Valider'
		] );
		$frm->fieldAsInput ( 'caption', [ 
				'rules' => [ 
						'empty'
				]
		] );
		$types = DAO::getAll ( Typeq::class );
		$q->setTypeq ( (\current ( $types ))->getId () );
		$frm->fieldAsDropDown ( 'typeq', JArray::modelArray ( $types, 'getId' ), false, [ 
				'rules' => [ 
						'empty'
				]
		] );
		$frm->fieldAsInput ( 'points', [ 
				'inputType' => 'number',
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

