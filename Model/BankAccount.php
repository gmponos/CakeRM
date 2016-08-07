<?php
App::uses('AppModel', 'Model');

/**
 * BankAccount Model
 *
 * @property Bank $Bank
 * @property User $User
 */
class BankAccount extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'full_account_descr';

	/**
	 * Virtual fields
	 *
	 * @var array
	 */
	public $virtualFields = [
		'full_account_descr' => "TRIM(CONCAT(BankAccount.holdersaccount, ' - ', BankAccount.bank_account))",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'bank_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'bank_account' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
		],
		'IBAN' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'Bank' => [
			'className' => 'Bank',
			'foreignKey' => 'bank_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'bank_account_id',
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
		'Business' => [
			'className' => 'Business',
			'foreignKey' => 'bank_account_id',
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
		'Contact' => [
			'className' => 'Contact',
			'foreignKey' => 'bank_account_id',
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
