<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use models\User;
use Ubiquity\orm\DAO;
use models\Group;

class GroupService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function GroupForm() {
		$frm = $this->jquery->semantic ()->dataForm ( 'form', new Group () );
		$frm->setFields ( [ 
				'name',
				'description',
				'submit'
		] );
		$frm->fieldAsInput ( 'name', [ 
				'rules' => [ 
						'empty'
				]
		] );
		return $frm;
	}
	public function GroupAjoutForm($group) {
		$dernierGroupe = DAO::getById ( Group::class, $group->getId() );
		$frm = $this->jquery->semantic ()->dataElement ( "form", $dernierGroupe );
		$frm->setFields ( [ 
				'name',
				'description'
		] );
		$frm->setCaptions ( [ 
				'Nom du Groupe',
				'Description du Groupe'
		] );
		return $frm;
	}
    public function GroupListe() {
        $groups = DAO::getAll ( Group::class );
        $table = $this->jquery->semantic ()->dataTable( "tableG", Group::class,$groups );
        $table->setFields(['name','description']);
        $table->setCaptions( [
            "Nom du Groupe",
            "Description"
        ] );
        $table->setIdentifierFunction('getId');
        $table->addDeleteButton(false);
        $table->addEditButton(false);
        return  $table;
    }

    public function UserListe($users,$uses,$idGroup) {
        $table = $this->jquery->semantic ()->dataTable( "table" . $uses, User::class, $users );
        $table->setFields(['lastname','firstname','bt'.$uses]);
        $table->setCaptions( [
            "Nom",
            "Prenom"
        ] );
        $table->setIdentifierFunction('getId');
        $table->setEdition(true);
        $table->setEmptyMessage("Aucun Utilisateurs");
        if ($uses=="notIn") {
            $table->fieldAsButton('bt'.$uses,
                "blue _add",['jsCallback' => function($bt,$instance) use($idGroup){
                $bt->asIcon('plus');
                $bt->setProperty('data-ajax',$instance->getID().'::'.$idGroup);
            }]);
        } else {
            $table->fieldAsButton('bt'.$uses,
                "red _remove",['jsCallback' => function($bt,$instance) use($idGroup){
                $bt->asIcon('x');
                $bt->setProperty('data-ajax',$instance->getID().'::'.$idGroup);
            }]);
        }
        return  $table;
    }
}