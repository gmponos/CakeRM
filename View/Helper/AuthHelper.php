<?php

/**
 * Copyright 2014, George Mponos
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2014, George Mponos
 * @author    George Mponos, <gmponos@gmail.com>
 * @link      http://github.com/gmponos/CakeTwitterBootstrap
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @property SessionHelper $Session
 */
class AuthHelper extends AppHelper
{

	public $helpers = [
		'Session',
	];

	public $settings = [
		'GroupClass' => 'Group',
	];

	/**
	 * Constructor
	 *
	 * @param View  $View
	 * @param array $settings
	 * @return AuthHelper
	 */
	public function __construct(View $View, $settings = []) {

		$this->settings = Hash::merge($this->settings, $settings);
		parent::__construct($View, $settings);
	}

	/**
	 * Returns true if user is logged in
	 *
	 * @return bool
	 */
	public function isLoggedIn() {

		if ($this->Session->check('Auth.User.id')) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get group ID
	 *
	 * @param string $field
	 * @return int
	 */
	public function group($field = '') {

		if (!$this->isLoggedIn()) {
			return false;
		}

		if (empty($field)) {
			return $this->Session->read("Auth.User");
		} else {
			$field = $this->Session->read("Auth.User.Group.$field");
		}
		return $field;
	}

	/**
	 * Get user field
	 *
	 * @param string $field
	 * @return mixed if a field is passed as an argument the function returns the
	 * user field if it exists. If no field is pass the user is returned as an array.
	 */
	public function user($field = '') {

		if (!$this->isLoggedIn()) {
			return false;
		}

		if (empty($field)) {
			return $this->Session->read("Auth.User");
		} else {
			$value = $this->Session->read("Auth.User.$field");
		}
		return $value;
	}

}
