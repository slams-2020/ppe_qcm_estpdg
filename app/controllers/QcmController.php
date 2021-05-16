<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Qcm;
use models\Question;
use services\UIService;

/**
 * Controller QcmController
 *
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery

**/
  
 
class QcmController extends ControllerBase {
	private $uiService;
	
	
	public function initialize() {
		parent::initialize ();
		$this->uiService = new UIService ( $this->jquery );
	}
	
	public function index() {	    
	    $frm = $this->uiService->qcmListeProf ();
	    $this->jquery->getOnClick('._delete', 'QcmController/suppQcm','#main-container',['attr'=>'data-ajax']);
	    $this->jquery->getOnClick('._edit', 'QcmController/afficherQCM','#main-container',['attr'=>'data-ajax']);
	    $this->jquery->renderView ( "QcmController/index.html" );
	}
			
	public function submit() {
	    $qcm = new Qcm();
	    URequest::setValuesToObject ( $qcm );
	    $qcm->setStatus(isset($_POST['status']));
	    $qcm->setCdate(date('Y-m-d G:i:s'));
	    DAO::insert ( $qcm );
	    $this->afficherQCM($qcm->getId());
	}
	
	public function ajout(){
	    $frm = $this->uiService->qcmForm ();
        $frm->fieldAsSubmit ( 'submit', 'blue', 'QcmController/submit', '#response', [
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] ); 
        $this->jquery->renderView ( "QcmController/ajout.html" );
	}
	
	public function afficherQCM($id){    
	    $frm = $this->uiService->qcmAjoutQuestionForm ($id);
	    $frm2 = $this->uiService->qcmChoixQuestions();
	    $this->jquery->doJQuery('#form','html',"");
	    $this->jquery->getOnClick('._display', 'QcmController/addQuestToQcm', '#affich container', ['attr'=>'data-ajax']);
	    $this->jquery->renderView("QcmController/qcm.html");
	}
	    
	public function addQuestToQcm($id, $qcm){
	    
	    DAO::update($qcm);
	}
	public function suppQcm($id){
	    DAO::delete(Qcm::class, $id);
	    $this->index();
	}	    
		
}




