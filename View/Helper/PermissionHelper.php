<?php

/**
 * Copyright 2014, George Mponos
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2014, George Mponos
 * @author George Mponos, <gmponos@gmail.com>
 * @link http://github.com/gmponos/CakePermissionHelper
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppHelper', 'View/Helper');
App::import('Component', 'Acl');

class PermissionHelper extends AppHelper {

	public $helpers = [
		'Session',
	];

	private $Acl = null;

	public function __construct(View $View, $settings = []) {
		$collection = new ComponentCollection();
		$this->Acl = new AclComponent($collection);
		parent::__construct($View, $settings);
	}

	public function check($aro, $aco, $action) {
		return $this->Acl->check($aro, $aco, $action);
	}

	public function checkUser($action) {
		$user['User'] = $this->Session->read('Auth.User');

		if (empty($id)) {
			return false;
		}
		return $this->Acl->check($user, $action);
	}

/**
 * Check Group by Actions
 *
 * @param string $action
 * @return boolean
 */
	public function checkGroup($action) {
		$id = $this->Session->read('Auth.User.Group.id');

		if (empty($id)) {
			return false;
		}
		return $this->Acl->check(['Group' => ['id' => $id]], $action);
	}

}
