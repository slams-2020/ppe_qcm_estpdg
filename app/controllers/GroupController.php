<?php
namespace controllers;
use controllers\crud\datas\GroupControllerDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\GroupControllerViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\GroupControllerEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\GroupControllerFiles;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
  * CRUD Controller GroupController
 * @route("/Groups","inherited"=>true,"automated"=>true)
  */
class GroupController extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\Group";
	}

	public function _getBaseRoute() {
		return '/Groups';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new GroupControllerDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new GroupControllerViewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new GroupControllerEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new GroupControllerFiles();
	}


}
