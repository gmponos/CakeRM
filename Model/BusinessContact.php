<?php

App::uses('AppModel', 'Model');

/**
 * BusinessesContact Model
 *
 * @property Business $Business
 * @property Contact  $Contact
 */
class BusinessContact extends AppModel {

	public $actsAs = [
		'Containable',
	];

	public $useTable = 'businesses_contacts';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'id';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'business_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'contact_id' => [
			'numeric' => [
				'rule' => ['numeric'],
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
		'Contact' => [
			'className' => 'Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
	];

}
