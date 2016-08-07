<?php

App::uses('AppModel', 'Model');

/**
 * City Model
 *
 * @property State    $State
 * @property Contact  $Contact
 * @property Business $Business
 */
class City extends AppModel {

	/**
	 * Order field
	 *
	 * @var string
	 */
	public $order = "City.name ASC";

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
		'state_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'name' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
			'unique' => [
				'rule' => ['uniqueStateCity'],
				'message' => 'The city already exists in the current state',
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'State' => [
			'className' => 'State',
			'foreignKey' => 'state_id',
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
		'Business' => [
			'className' => 'Business',
			'foreignKey' => 'city_id',
			'dependent' => true,
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

	public function beforeSave($options = []) {

		$this->data['City']['name'] = trim($this->data['City']['name']);
		//No accent is allowed on caps letters
		$this->data['City']['name'] = preg_replace('/[^Α-Ω ]/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], ['Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω'],
			mb_strtoupper($this->data['City']['name'], 'UTF-8')
		));
		if ($this->data['City']['name'] == '') {
			return false;
		}

		return parent::beforeSave($options);
	}

	/**
	 * We need to overide the default findByStateId because need to add the
	 * first parameter in order to add the list option
	 *
	 * @param string $type
	 * @param int    $state_id
	 * @return array
	 */
	public function findByStateId($type = 'first', $state_id = null) {

		return parent::find($type, ['conditions' => ['City.state_id' => $state_id]]);
	}

	/**
	 * @todo We need to return true if nothing is edited but save button is pressed
	 * @param array $check
	 * @return boolean
	 */
	public function uniqueStateCity($check) {

		if (isset($this->data['City']['id'])) {
			return true;
		}

		$records = $this->find('all', ['conditions' => ['City.name' => $check['name']], 'recursive' => 2]);

		if (!is_null($records) && !empty($records)) {
			foreach ($records as $record) {
				if ($record['State']['id'] == $this->data['City']['state_id']) {
					return false;
				}
			}
		} else {
			return true;
		}
		return true;
	}
}
