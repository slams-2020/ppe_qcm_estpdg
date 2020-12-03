<?php

namespace controllers;

use services\UIService;
use Ubiquity\utils\http\URequest;
use models\Qcm;
use Ubiquity\orm\DAO;
use models\Question;

/**
 * Controller MonTest
 *
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
<<<<<<< HEAD
**/
  
class MonTest extends ControllerBase{

    private $uiService;
    public function initialize() {
        parent::initialize ();
        $this->uiService = new UIService( $this->jquery );
    }
    
	public function index(){
	    $frm = $this->uiService->qcmForm ();
	   
	    $frm->fieldAsSubmit ( 'submit', 'blue', 'MonTest/submit', '#response', [
	        'ajax' => [
	            'hasLoader' => 'internal'
	        ]
	    ] ); 
	    $this->jquery->renderView("MonTest/index.html");
	}
	
	public function affichageQuestions(){
	    
	    $frm = $this->uiService->qcmForm();
	    $this->jquery->getOnClick ( '#dropdown-form-typeq-0 .item', 'MonTest/detailsQ', '#response', [
	        'attr' => 'data-value',
	        'hasLoader' => false
	    ] );
	    $this->jquery->renderView ( "MonTest/qcm.html" );
	    
	}
	public function detailsQ($id) {
	    $type = DAO::getById ( Question::class, 'id=' . $id );
	    echo $type->getCaption();
	}
	
	public function submit() {
	    $qcm = new Qcm();
	    URequest::setValuesToObject ( $qcm );
	    DAO::insert ( $qcm );
=======
 */
class MonTest extends ControllerBase {
	private $uiService;
	public function initialize() {
		parent::initialize ();
		$this->uiService = new UIService ( $this->jquery );
	}
	public function index() {
		echo "";
		$this->loadView ( "MonTest/index.html" );
>>>>>>> c33041add9fab61c55420dd3de762502a4ef827c
	}
}



