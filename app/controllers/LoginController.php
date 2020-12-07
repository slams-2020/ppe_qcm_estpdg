<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\utils\http\USession;
use models\User;

/**
 * Controller LoginController
 */
class LoginController extends ControllerBase {

	/**
	 *
	 * @route("/connect")
	 */
	public function connect() {
		$user = DAO::getOne ( User::class, '1=1' );
		USession::set ( "activeUser", $user );
	}
	public function index() {
	}
}

