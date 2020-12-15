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
        $this->jquery->getOnClick('._delete', 'GroupController/suppGroup','#main-container',['attr'=>'data-ajax']);
        $this->jquery->getOnClick('._edit', 'GroupController/afficherGroup','#main-container',['attr'=>'data-ajax']);
        $this->jquery->renderView ( "GroupController/index.html" );
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

    public function afficherGroup($id){
        $frm = $this->GroupService->GroupAjoutForm ($id);
        // $this->jquery->doJQuery('#form','html',"");
        $this->jquery->renderView("GroupController/index.html");

    }

    public function suppGroup($id){
        DAO::delete(Group::class, $id);
        $frm = $this->GroupService->GroupListe();
        $this->jquery->renderView("GroupController/index.html");
    }
}