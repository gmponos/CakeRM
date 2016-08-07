<?php

App::uses('AppModel', 'Model');

/**
 * Contact Model
 *
 * @property ContactType $ContactType
 * @property City        $City
 * @property State       $State
 * @property Task        $Task
 * @property Business    $Business
 * @property Department  $Department
 * @property BankAccount $BankAccount
 */
class Contact extends AppModel {

	/**
	 * Order field
	 *
	 * @var string
	 */
	public $order = "Contact.lastname ASC";

	/**
	 * Order field
	 *
	 * @var array contains the virtual fields
	 */
	public $virtualFields = [
		'fullname' => "TRIM(CONCAT(Contact.lastname, ' ', Contact.firstname))",
		'phones' => "TRIM(CONCAT(Contact.phone, ' ', Contact.cellphone))",
	];

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'fullname';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'lastname' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				'message' => 'You have to enter a lastname',
			],
		],
		'phone' => [
			'length' => [
				'rule' => ['minLength', 10],
				'message' => 'There is no phone with less than 10 digits.',
				'allowEmpty' => true,
			],
		],
		'cellphone' => [
			'length' => [
				'rule' => ['minLength', 10],
				'message' => 'There is no phone with less than 10 digits.',
				'allowEmpty' => true,
			],
		],
		'email' => [
			'length' => [
				'rule' => ['email'],
				'message' => 'Enter a valid email.',
				'allowEmpty' => true,
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'ContactType' => [
			'className' => 'ContactType',
			'foreignKey' => 'contact_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'City' => [
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'Department' => [
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'State' => [
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'BankAccount' => [
			'className' => 'BankAccount',
			'foreignKey' => 'bank_account_id',
			'dependent' => false,
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'Task' => [
			'className' => 'Task',
			'foreignKey' => 'contact_id',
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

	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = [
		'Business' => [
			'className' => 'Business',
			'joinTable' => 'businesses_contacts',
			'foreignKey' => 'contact_id',
			'associationForeignKey' => 'business_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => '',
		],
	];

	/**
	 * findByBusinessId method
	 *
	 * @param string  $type
	 * @param integer $business_id
	 * @return array
	 * @throws NotFoundException
	 */
	public function findByBusinessId($type, $business_id) {

		if (empty($business_id)) {
			$query['joins'] = [
				[
					'table' => 'businesses_contacts',
					'alias' => 'BusinessContact',
					'type' => 'inner',
					'foreignKey' => false,
					'conditions' => [
						"BusinessContact.contact_id = Contact.id",
					],
				],
			];
		} else {
			$query['joins'] = [
				[
					'table' => 'businesses_contacts',
					'alias' => 'BusinessContact',
					'type' => 'inner',
					'foreignKey' => false,
					'conditions' => [
						"BusinessContact.contact_id = Contact.id",
						"BusinessContact.business_id = $business_id",
					],
				],
			];
		}
		return parent::find($type, $query);
	}
}
