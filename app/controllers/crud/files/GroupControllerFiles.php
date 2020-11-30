<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
  * Class GroupControllerFiles
  */
class GroupControllerFiles extends CRUDFiles{
	public function getViewIndex(){
		return "GroupController/index.html";
	}

	public function getViewForm(){
		return "GroupController/form.html";
	}

	public function getViewDisplay(){
		return "GroupController/display.html";
	}


}
