<?php
namespace controllers;
use controllers\crud\datas\QcmControllerDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\QcmControllerViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\QcmControllerEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\QcmControllerFiles;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
  * CRUD Controller QcmController
 * @route("/Qcms","inherited"=>true,"automated"=>true)
  */
class QcmController extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\Qcm";
	}

	public function _getBaseRoute() {
		return '/Qcms';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new QcmControllerDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new QcmControllerViewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new QcmControllerEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new QcmControllerFiles();
	}


}
