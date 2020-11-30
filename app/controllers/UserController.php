<?php
namespace controllers;
use controllers\crud\datas\UserControllerDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\UserControllerViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\UserControllerEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\UserControllerFiles;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
  * CRUD Controller UserController
 * @route("/Users","inherited"=>true,"automated"=>true)
  */
class UserController extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\User";
	}

	public function _getBaseRoute() {
		return '/Users';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new UserControllerDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new UserControllerViewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new UserControllerEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new UserControllerFiles();
	}


}
