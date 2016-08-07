<?php

App::uses('AppModel', 'Model');

/**
 * State Model
 *
 * @property    City     $City
 * @property    Business $Business
 * @property    Contact  $Contact
 * @package        app.Model
 */
class State extends AppModel {

	/**
	 * @var string
	 */
	public $order = "State.name ASC";

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
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'This state must be unique.',
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'City' => [
			'className' => 'City',
			'foreignKey' => 'state_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'City.name',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
		'Business' => [
			'className' => 'Business',
			'foreignKey' => 'state_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Business.Business',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
		'Contact' => [
			'className' => 'Contact',
			'foreignKey' => 'state_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Contact.fullname',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
	];

	public function beforeSave($options = []) {

		$this->data['State']['name'] = str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], [
			'Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω',
		], mb_strtoupper($this->data['State']['name'], 'UTF-8')
		);

		$this->date['State']['name'] = preg_replace('/[^Α-Ω]/', '', $this->data['State']['name']);
		$this->data['State']['name'] = trim($this->data['State']['name']);
		return parent::beforeSave($options);
	}

}
