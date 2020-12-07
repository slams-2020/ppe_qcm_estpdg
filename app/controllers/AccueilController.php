<?php

namespace controllers;

/**
 * Controller AccueilController
 */
class AccueilController extends ControllerBase {
	/**
	 *
	 * @route('_default')
	 */
	public function index() {
		$this->loadView ( "AccueilController/index.html" );
	}
}
