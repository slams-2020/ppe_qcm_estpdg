<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
  * Class QuestionControllerFiles
  */
class QuestionControllerFiles extends CRUDFiles{
	public function getViewIndex(){
		return "QuestionController/index.html";
	}

	public function getViewForm(){
		return "QuestionController/form.html";
	}

	public function getViewDisplay(){
		return "QuestionController/display.html";
	}


}
