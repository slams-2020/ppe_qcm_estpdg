<?php

namespace services;

use Ajax\semantic\html\base\constants\Color;
use Ajax\php\ubiquity\JsUtils;
use Ajax\service\JArray;
use Ubiquity\orm\DAO;
use models\Qcm;
use models\Question;
use models\Typeq;
use models\User;
use Ajax\semantic\html\elements\HtmlButton;

class UIService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function qcmAjoutQuestionForm($id) {
		$dernierQcm = DAO::getById ( Qcm::class, $id );
		$table = $this->jquery->semantic ()->dataElement ( "form", $dernierQcm );
		$table->setFields ( [ 
				'name',
				'description',
				'cdate',
				'status',
		        'questions'
		] );
		$table->setCaptions ( [ 
				'Nom du QCM',
				'Description du QCM',
				'Date de creation',
				'Statut du QCM',
		        'Liste des Questions du QCM'
		] );
		//fieldAsDataList ( 'questions', JArray::modelArray ( $questions, 'getId', 'getCaption' ) );
		return  $table;
	}
	
	public  function qcmChoixQuestions(){	    
	    $questions = DAO::getAll ( Question::class );	    
	    $table=$this->jquery->semantic ()->dataTable("tableQuestions", Question::class, $questions);
	    $table->setFields([
	        'caption',
	        'points'	        
	    ]);
	    $table->setCaptions([
	        "Intitulé de la Question",
	        "Points de la question"
	        ]
	    );
	    $table->setIdentifierFunction('getId');
	    $table->addDisplayButton(false);
	    $table->addEditButton(False);
// 	    $cpt = 0;
// 	    foreach ( $questions as $elt ) {
// 	        $table->setRowValues ( $cpt, [
// 	            $elt->getCaption (),
// 	            $elt->getPoints (),
// 	            $bt=$this->jquery->semantic()->htmlButton("btAjout","Ajoutez","blue")
// 	        ] );
// 	        $cpt = $cpt + 1;
// 	   }
	   return $table;
	}
	
	
	public function qcmListeProf() {
	    $qcms = DAO::getAll ( Qcm::class );
	    $table = $this->jquery->semantic ()->dataTable( "table", Qcm::class,$qcms );
	    $table->setFields(['name','description','cDate']);
	    $table->setCaptions( [
	        "Nom du QCM",
	        "Description",
	        "Date"
	    ] );
	    $table->setIdentifierFunction('getId');
	    $table->addDeleteButton(false);
	    $table->addEditButton(false);
	    return  $table;
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
				'Actif',
		        'Valider'
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

