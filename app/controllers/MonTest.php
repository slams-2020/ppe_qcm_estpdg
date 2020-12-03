<?php
namespace controllers;
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
		$this->loadView("MonTest/index.html");
	}
}



