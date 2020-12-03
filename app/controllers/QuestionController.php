<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Question;
use models\Typeq;
use services\UIService;

/**
 * Controller Question
 */
class QuestionController extends ControllerBase {
	private $UIService;
	public function initialize() {
		parent::initialize ();
		$this->UIService = new UIService ( $this->jquery );
	}
	public function index() {
		$frm = $this->UIService->questionForm ();
		$frm->fieldAsSubmit ( 'Valider', 'green', 'QuestionController/submit', '', [ 
				'ajax' => [ 
						'hasLoader' => 'internal'
				]
		] );

		$this->jquery->renderView ( "QuestionController/index.html" );
	}
	public function submit() {
		$question = new Question ();
		URequest::setValuesToObject ( $question );
		DAO::insert ( $question );
	}
	public function question() {
		$frm = $this->UIService->questionForm ();
		$this->jquery->getOnClick ( '#dropdown-form-typeq-0 .item', 'QuestionController/detailsQ', '#response', [ 
				'attr' => 'data-value',
				'hasLoader' => false
		] );
		$this->jquery->renderView ( "QuestionController/question.html" );
	}
	public function detailsQ($id) {
		$type = DAO::getById ( Typeq::class, 'id=' . $id );
		echo $type->getCaption ();
	}
}