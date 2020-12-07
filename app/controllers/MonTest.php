<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Qcm;
use models\Question;
use services\UIService;

/**
 * Controller MonTest
 *
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery

**/
  
class MonTest extends ControllerBase{

    private $uiService;
    public function initialize() {
        parent::initialize ();
        $this->uiService = new UIService( $this->jquery );
    }
    
	public function index(){
	    $frm = $this->uiService->qcmForm (new Qcm());
	   
	    $frm->fieldAsSubmit ( 'submit', 'blue', 'MonTest/submit', '#response', [
	        'ajax' => [
	            'hasLoader' => 'internal'
	        ]
	    ] ); 
	    $this->jquery->renderView("MonTest/index.html");

 
class MonTest extends ControllerBase {
	private $uiService;
	public function initialize() {
		parent::initialize ();
		$this->uiService = new UIService ( $this->jquery );
	}
	public function index() {
		$frm = $this->uiService->qcmForm ();

		$frm->fieldAsSubmit ( 'submit', 'blue', 'MonTest/submit', '#response', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );
		$this->jquery->renderView ( "MonTest/index.html" );

	}
	public function affichageQuestions() {
		$frm = $this->uiService->qcmForm ();
		$this->jquery->getOnClick ( '#dropdown-form-typeq-0 .item', 'MonTest/detailsQ', '#response', [ 
				'attr' => 'data-value',
				'hasLoader' => false
		] );
		$this->jquery->renderView ( "MonTest/qcm.html" );
	}
	public function detailsQ($id) {
		$type = DAO::getById ( Question::class, 'id=' . $id );
		echo $type->getCaption ();
	}
	public function submit() {

	    $qcm = new Qcm();
	    URequest::setValuesToObject ( $qcm );
	    DAO::insert ( $qcm );
	    $this->jquery->renderView("MonTest/qcm.html");
	    }
	    
	    public  function ajoutQuestionQcm(){
	       // $frm = $this->uiService->
	    }

	    
		
	}

}

}
