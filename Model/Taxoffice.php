<?php

App::uses('AppModel', 'Model');

/**
 * Taxoffice Model
 *
 * @property Business $Business
 */
class Taxoffice extends AppModel {

	/**
	 * Order
	 *
	 * @var type
	 */
	public $order = "Taxoffice.name ASC";

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
				'message' => 'The name must not be empty',
				'required' => true,
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The Tax Office already exists',
			],
		],
		'modified' => [
			'datetime' => [
				'rule' => ['datetime'],
			],
		],
		'active' => [
			'datetime' => [
				'rule' => ['boolean'],
				'message' => 'Incorrect value for myCheckbox',
			],
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
			'foreignKey' => 'taxoffice_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Business.firm',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
	];

	/**
	 * Function before save
	 *
	 * @options array
	 */
	public function beforeValidate($options = []) {

		//No accent is allowed on caps letters
		$this->data['Taxoffice']['name'] = preg_replace('/[^Α-Ω ]/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], [
			'Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω',
		], mb_strtoupper($this->data['Taxoffice']['name'], 'UTF-8')
		));

		$this->data['Taxoffice']['name'] = trim($this->data['Taxoffice']['name']);
		return parent::beforeValidate($options);
	}

}
