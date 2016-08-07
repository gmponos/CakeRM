<?php

App::uses('AppModel', 'Model');

/**
 * ContractType Model
 *
 * @property Contract $Contract
 */
class ContractType extends AppModel {

	/**
	 * Order field
	 *
	 * @var string
	 */
	public $order = 'ContractType.type ASC';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'type';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'type' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The contract type already exists.',
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'Contract' => [
			'className' => 'Contract',
			'foreignKey' => 'contract_type_id',
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
