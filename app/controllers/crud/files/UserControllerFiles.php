<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
  * Class UserControllerFiles
  */
class UserControllerFiles extends CRUDFiles{
	public function getViewIndex(){
		return "UserController/index.html";
	}

	public function getViewForm(){
		return "UserController/form.html";
	}

	public function getViewDisplay(){
		return "UserController/display.html";
	}


}
