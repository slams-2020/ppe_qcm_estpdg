<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
  * Class QcmControllerFiles
  */
class QcmControllerFiles extends CRUDFiles{
	public function getViewIndex(){
		return "QcmController/index.html";
	}

	public function getViewForm(){
		return "QcmController/form.html";
	}

	public function getViewDisplay(){
		return "QcmController/display.html";
	}


}
