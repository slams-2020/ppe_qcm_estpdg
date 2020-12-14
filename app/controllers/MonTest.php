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
  
 
class MonTest extends ControllerBase {
	private $uiService;
	
	
	public function initialize() {
		parent::initialize ();
		$this->uiService = new UIService ( $this->jquery );
	}
	
	public function index() {	    
	    $frm = $this->uiService->qcmListe ();
	    echo $frm;		
	}
		
	public function detailsQ($id) {
		$type = DAO::getById ( Question::class, 'id=' . $id );
		echo $type->getCaption ();
	}
	
	public function submit() {
	    $qcm = new Qcm();
	    URequest::setValuesToObject ( $qcm );
	    $qcm->setStatus(isset($_POST['status']));
	    DAO::insert ( $qcm );
	    $this->afficherQCM($qcm->getId());
	}
	
	public function ajout(){
	    $frm = $this->uiService->qcmForm ();
        $frm->fieldAsSubmit ( 'submit', 'blue', 'MonTest/submit', '#response', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] ); 
        $this->jquery->renderView ( "MonTest/ajout.html" );
	}
	
	public function afficherQCM($id){    
	    $frm = $this->uiService->qcmAjoutQuestionForm ($id);
	    $frm = $this->uiService->qcmChoixQuestions();
	    $this->jquery->doJQuery('#form','html',"");
	    $this->jquery->renderView("MonTest/qcm.html");
	    
	}
	    
	

	    
		
	}




