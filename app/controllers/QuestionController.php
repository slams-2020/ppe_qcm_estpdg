<?php
namespace controllers;
use controllers\crud\datas\QuestionControllerDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\QuestionControllerViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\QuestionControllerEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\QuestionControllerFiles;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
  * CRUD Controller QuestionController
 * @route("/Questions","inherited"=>true,"automated"=>true)
  */
class QuestionController extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\Question";
	}

	public function _getBaseRoute() {
		return '/Questions';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new QuestionControllerDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new QuestionControllerViewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new QuestionControllerEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new QuestionControllerFiles();
	}


}
