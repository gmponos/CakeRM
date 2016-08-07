<?php
App::uses('AppModel', 'Model');

/**
 * Contract Model
 *
 * @property Business     $Business
 * @property ContractType $ContractType
 */
class Contract extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';

	/**
	 * VirtualFields field
	 *
	 * @var array
	 */
	public $virtualFields = [
		'date_created' => "DATE_FORMAT(Contract.created, '%Y-%m-%d')",
		'date_updated' => "DATE_FORMAT(Contract.updated, '%Y-%m-%d')",
		'time_created' => "DATE_FORMAT(Contract.created, '%H:%i')",
		'time_updated' => "DATE_FORMAT(Contract.updated, '%H:%i')",
		'duration' => "DATEDIFF(end, start)",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'business_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			],
		],
		'contract_type_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			],
		],
		'start' => [
			'datetime' => [
				'rule' => ['date'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			],
		],
		'end' => [
			'datetime' => [
				'rule' => ['date'],
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'Business' => [
			'className' => 'Business',
			'foreignKey' => 'business_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'ContractType' => [
			'className' => 'ContractType',
			'foreignKey' => 'contract_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
	];
}
