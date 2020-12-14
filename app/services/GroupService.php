<?php

namespace services;

use Ajax\php\ubiquity\JsUtils;
use Ubiquity\orm\DAO;
use models\Group;

class GroupService {
	protected $jquery;
	protected $semantic;
	public function __construct(JsUtils $jq) {
		$this->jquery = $jq;
		$this->semantic = $jq->semantic ();
	}
	public function userForm() {
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
		$dernierGroupe = DAO::getById ( Group::class, $group->getId () );
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
		$this->jquery->renderView ( "GroupController/index.html" );
		$table = $this->jquery->semantic ()->htmlTable ( "table11", sizeof ( $groups ), 2 );
		$table->setHeaderValues ( [ 
				"Nom du Groupe",
				"Description"
		] );
		$cpt = 0;
		foreach ( $groups as $elt ) {
			$table->setRowValues ( $cpt, [ 
					$elt->getName (),
					$elt->getDescription ()
			] );
			$cpt = $cpt + 1;
		}
		echo $table->setFixed ();
	}
}