<?php

/**
 * Application model for Cake.
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 * @method array findById($id)
 */
class AppModel extends Model {

	/**
	 * actAs
	 *
	 * @var array
	 */
	public $actsAs = [
		'Log',
	];

	/**
	 * @param string $check
	 * @return boolean
	 * @todo we have to write to validate lowercase greek letters
	 */
	public function greekAlpha($check) {

		$value = array_values($check);
		$value = $value[0];

		//No accent is allowed on caps letters
		$value = preg_replace('/[^Α-Ω ]/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'],
			['Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω'],
			mb_strtoupper($value, 'UTF-8')
		));
		$value = trim($value);
		if ($value == '') {
			return false;
		}

		return true;
	}

	/**
	 * @param string $check
	 * @return boolean
	 */
	public function greekAlphaPunctuation($check) {

		//No accent is allowed on caps letters
		$check = preg_replace('/[^Α-Ω ]/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'],
			['Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω'],
			mb_strtoupper($check, 'UTF-8')
		));
		$check = trim($check);
		if ($check == '') {
			return false;
		}
	}

	/**
	 * Validation method to compare two fields
	 *
	 * @param mixed  $field1 Array or string, if array the first key is used as fieldname
	 * @param string $field2 Second fieldname
	 * @return boolean True on success
	 */
	public function compareFields($field1, $field2) {

		if (is_array($field1)) {
			$field1 = key($field1);
		}
		if (isset($this->data[$this->alias][$field1]) && isset($this->data[$this->alias][$field2]) &&
			$this->data[$this->alias][$field1] == $this->data[$this->alias][$field2]
		) {
			return true;
		}
		return false;
	}

	/**
	 * Validation method to compare two fields
	 *
	 * @param mixed  $field1 Array or string, if array the first key is used as fieldname
	 * @param string $field2 Second fieldname
	 * @return boolean True on success
	 */
	public function compareFieldsDiff($field1, $field2) {

		return (!$this->compareFields($field1, $field2));
	}

	/**
	 * before Save
	 *
	 * @param array $options
	 * @return boolean
	 */
	public function beforeSave($options = []) {

		$this->trackable();
		return parent::beforeSave($options);
	}

	/**
	 * Trackable function
	 *
	 * @return void
	 */
	public function trackable() {

		// Dont go any further if no data exists or field to update
		if (empty($this->data) && !$this->hasField(['created_user_id', 'updated_user_id', 'modified_user_id'])) {
			return;
		}

		foreach (['created_user_id', 'updated_user_id', 'modified_user_id'] as $field) {
			$keyPresentAndEmpty = (
				isset($this->data[$this->alias]) &&
				array_key_exists($field, $this->data[$this->alias]) &&
				$this->data[$this->alias][$field] === null
			);

			if ($keyPresentAndEmpty) {
				unset($this->data[$this->alias][$field]);
			}
		}

		$exists = $this->exists();
		$userFields = ['modified_user_id', 'updated_user_id'];

		if (!$exists) {
			$userFields[] = 'created_user_id';
		}
		if (isset($this->data[$this->alias])) {
			$fields = array_keys($this->data[$this->alias]);
		}

		foreach ($userFields as $updateCol) {
			if (in_array($updateCol, $fields) || !$this->hasField($updateCol)) {
				continue;
			}

			$user = Configure::read('Auth.User');
			if (!$user && CakeSession::started()) {
				$user = AuthComponent::user();
			}

			if (!empty($this->whitelist)) {
				$this->whitelist[] = $updateCol;
			}
			$this->data[$this->alias][$updateCol] = $user['id'];
		}
	}

}
