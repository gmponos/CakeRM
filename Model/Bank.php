<?php

App::uses('AppModel', 'Model');

/**
 * Bank Model
 *
 * @property BankAccount $BankAccount
 */
class Bank extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'name' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'BankAccount' => [
			'className' => 'BankAccount',
			'foreignKey' => 'bank_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
	];

}
