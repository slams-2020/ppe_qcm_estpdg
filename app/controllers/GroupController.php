<?php

namespace controllers;

use models\User;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;
use models\Group;
use services\GroupService;
use Ubiquity\utils\models\UArrayModels;

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
		if(!URequest::isAjax()){
            $this->jquery->getOnClick('._remove',
                '/GroupController/removeUserFromGroup',
                '.usersUpdate', [
                    'hasLoader'=>false,
                    'attr'=>'data-ajax',
                    'listenerOn'=>'body']);
            $this->jquery->getOnClick('._add',
                '/GroupController/addUserInGroup',
                '.usersUpdate',[
                    'hasLoader'=>false,
                    'attr'=>'data-ajax',
                    'listenerOn'=>'body']);
        }
		$this->GroupService = new GroupService ( $this->jquery );
	}
	public function index() {
        $frm = $this->GroupService->GroupListe ();
        $this->jquery->getOnClick('._delete', 'GroupController/suppGroup','#main-container',['attr'=>'data-ajax']);
        $this->jquery->getOnClick('._edit', 'GroupController/afficherUtilisateur','#main-container',['attr'=>'data-ajax']);
        $this->jquery->renderView ( "GroupController/index.html" );
	}
    public function edit() {
        $this->jquery->renderView ( "GroupController/edit.html" );
    }
	public function menu() {
		$frm = $this->GroupService->GroupForm ();
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
        $dernierGroupe = DAO::getById ( Group::class, $id );
        $frm = $this->GroupService->GroupAjoutForm ($dernierGroupe);
        // $this->jquery->doJQuery('#form','html',"");
        $this->edit();
    }
    public function afficherUtilisateur($id){
	    $usersNotIn=DAO::getAll(User::class, "id NOT IN (SELECT idUser FROM UserGroup WHERE idGroup = ?)",false,[$id]);
        $frm = $this->GroupService->UserListe ($usersNotIn,"notIn",$id);
        $groupe=DAO::getById( Group::class, $id ,['users']);
        $usersIn = $groupe->getUsers();
        $frm = $this->GroupService->UserListe ($usersIn, "inGroup",$id);
        $this->edit();
    }

    public function suppGroup($id){
        DAO::delete(Group::class, $id);
        $frm = $this->GroupService->GroupListe();
        $this->index();
    }

    public function removeUserFromGroup($idUserGroup){
	    $ids=explode("::",$idUserGroup);
	    $group = DAO::getById(Group::class,$ids[1]);
	    $users=$group->getUsers();
	    if($users) {
            $group->setUsers(UArrayModels::remove($users, function ($u) use ($ids) {
                return $u->getId() === $ids[0];
            }));
            DAO::save($group, true);
        }
        $this->afficherUtilisateur($ids[1]);
    }

    public function addUserInGroup($idUserGroup){
        $ids=explode("::",$idUserGroup);
        $group = DAO::getById(Group::class,$ids[1]);
        $user = DAO::getById(User::class,$ids[0]);
        $group->addUser($user);
        DAO::save($group,true);
        $this->afficherUtilisateur($ids[1]);
    }
}