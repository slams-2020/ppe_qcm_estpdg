<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Answer;
use models\Question;
use services\AnswerService;

/**
 * Controller AnswerController
 */
class AnswerController extends ControllerBase {
	private $AnswerService;
	public function initialize() {
		parent::initialize ();
		$this->AnswerService = new AnswerService ( $this->jquery );
	}
	public function index() {
		$frm = $this->AnswerService->reponseForm ();
		$frm->fieldAsSubmit ( 'submit', 'blue', 'AnswerController/submit', '', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );
		$this->jquery->getOnClick ( '#dropdown-form-typeq-0 .item', 'AnswerController/detailsA', '#response', [ 
				'attr' => 'data-value',
				'hasLoader' => false,
				'stopPropagation' => false
		] );
		$this->jquery->renderView ( "AnswerController/index.html" );
	}
	public function detailsA($id) {
		$type = DAO::getById ( Question::class, 'id=' . $id );
		echo $type->getCaption ();
	}
	public function submit() {
		$reponse = new Answer ();
		URequest::setValuesToObject ( $reponse );
		$typeA = DAO::getById ( Question::class, URequest::post ( 'question' ) );
		$reponse->setQuestion ( $typeA );
		DAO::insert ( $reponse );
	}
}