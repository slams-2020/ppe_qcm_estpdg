<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;
use models\Group;
use services\GroupService;

/**
 * Controller GroupController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("/Groups","inherited"=>true,"automated"=>true)
 */
class GroupController extends ControllerBase {
	private $GroupService;
	public function initialize() {
		parent::initialize ();
		$this->GroupService = new GroupService ( $this->jquery );
	}
	public function index() {
		$frm = $this->GroupService->GroupListe ();
	}
	public function menu() {
		$frm = $this->GroupService->userForm ();
		$frm->fieldAsSubmit ( 'submit', 'blue', 'GroupController/submit', '#response', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );
		$this->jquery->renderView ( "GroupController/menu.html" );
	}
	public function submit() {
		$group = new Group ();
		URequest::setValuesToObject ( $group );
		$group->setUser ( USession::get ( "activeUser" ) );
		DAO::insert ( $group );
		$frm = $this->GroupService->GroupAjoutForm ( $group );
		$this->jquery->doJQuery ( '#form', 'html', "" );
		$this->jquery->renderView ( "GroupController/menu.html" );
	}
}