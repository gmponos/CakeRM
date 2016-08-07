<?php

App::uses('AppModel', 'Model');

/**
 * Login Model
 *
 * @property User $User
 * @package CakeUsers
 */
class Login extends AppModel {

	/**
	 * Order field
	 *
	 * @var string
	 */
	public $order = 'Login.modified DESC';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'user_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
			],
		],
		'browser' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
			],
		],
		'IP' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
	];
}
