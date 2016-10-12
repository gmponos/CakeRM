<?php

App::uses('AppModel', 'Model');

/**
 * Business Model
 *
 * @property BusinessType $BusinessType
 * @property City         $City
 * @property State        $State
 * @property Taxoffice    $Taxoffice
 * @property Contract     $Contract
 * @property Task         $Task
 * @property Contact      $Contact
 * @property BankAccount  $BankAccount
 * @package app.Model
 */
class Business extends AppModel {

	/**
	 * Order
	 *
	 * @var string
	 */
	public $order = "Business.firm ASC";

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'fullname';

	/**
	 * Virtual fields
	 *
	 * @var array
	 */
	public $virtualFields = [
		'fullname' => "TRIM(CONCAT(Business.firm, ' - ', Business.business))",
		//'fullname' => "TRIM(CONCAT(Business.firm, ' - ', Business.business, CASE WHEN Business.store IS NOT NULL THEN CONCAT(' Υπ: ', Business.store) else '' END  ))",
		'phones' => "TRIM(CONCAT(Business.phone_one, ' ', Business.phone_two))",
		'time_created' => "DATE_FORMAT(Business.created, '%H:%i')",
		'time_updated' => "DATE_FORMAT(Business.updated, '%H:%i')",
		'date_created' => "DATE_FORMAT(Business.created, '%Y-%m-%d')",
		'date_updated' => "DATE_FORMAT(Business.updated, '%Y-%m-%d')",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'business' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				'message' => 'Business field must not be empty',
				'required' => false,
			],
		],
		'firm' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				'required' => false,
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'This firm must be unique.',
			],
		],
		'phone_one' => [
			'length' => [
				'rule' => ['minLength', 10],
				'message' => 'There is no phone with less than 10 digits.',
				'allowEmpty' => true,
			],
		],
		'phone_two' => [
			'length' => [
				'rule' => ['minLength', 10],
				'message' => 'There is no phone with less than 10 digits.',
				'allowEmpty' => true,
			],
		],
		'fax' => [
			'length' => [
				'rule' => ['minLength', 10],
				'message' => 'There is no phone with less than 10 digits.',
				'allowEmpty' => true,
			],
		],
		'afm' => [
			'length' => [
				'rule' => ['minLength', 9],
				'message' => 'There is no afm with less than 9 digits.',
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
		'BusinessType' => [
			'className' => 'BusinessType',
			'foreignKey' => 'business_type_id',
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
		'State' => [
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'Taxoffice' => [
			'className' => 'Taxoffice',
			'foreignKey' => 'taxoffice_id',
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
		'Contract' => [
			'className' => 'Contract',
			'foreignKey' => 'business_id',
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
		'Task' => [
			'className' => 'Task',
			'foreignKey' => 'business_id',
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
		'Contact' => [
			'className' => 'Contact',
			'joinTable' => 'businesses_contacts',
			'foreignKey' => 'business_id',
			'associationForeignKey' => 'contact_id',
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

	public function beforeSave($options = []) {

		if (isset($this->data['Business']['address'])) {
			$this->data['Business']['address'] = preg_replace('/[.,-]/', ' ', $this->data['Business']['address']);
			$this->data['Business']['address'] = preg_replace('/[^0-9Α-Ω ]/', '', str_replace(
				['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], ['Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω'],
				mb_strtoupper($this->data['Business']['address'], 'UTF-8')
			));
		}

		//if the firm is empty put the value of the business
		if (isset($this->data['Business']['firm']) && empty($this->data['Business']['firm'])) {
			$this->data['Business']['firm'] = $this->data['Business']['business'];
		}
		return parent::beforeSave($options);
	}

	/**
	 * Queries the data source and returns a result set array of businesses with
	 * contact id given as send param.
	 *
	 * @param string  $type (all / first / count / neighbors / list / threaded)
	 * @param integer $contact_id
	 * @return array
	 * @throws NotFoundException
	 */
	public function findByContactId($type = 'first', $contact_id = null) {

		if (empty($contact_id)) {
			$query['joins'] = [
				[
					'table' => 'businesses_contacts',
					'alias' => 'BusinessContact',
					'type' => 'inner',
					'foreignKey' => false,
					'conditions' => [
						"BusinessContact.business_id = Business.id",
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
						"BusinessContact.business_id = Business.id",
						"BusinessContact.contact_id = $contact_id",
					],
				],
			];
		}
		return parent::find($type, $query);
	}

}
