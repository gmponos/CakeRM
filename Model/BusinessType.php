<?php

App::uses('AppModel', 'Model');

/**
 * BusinessType Model
 *
 * @property Business $Business
 */
class BusinessType extends AppModel {

	/**
	 * Order field
	 *
	 * @var type
	 */
	public $order = "BusinessType.type ASC";

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
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The business type already exists.',
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
			'foreignKey' => 'business_type_id',
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
	 * @param type $options
	 * @return boolean
	 */
	public function beforeSave($options = []) {
		parent::beforeSave($options);
		$this->data['BusinessType']['type'] = preg_replace('/([^Α-ΩA-Z .,&\/!-])/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], ['Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω'], mb_strtoupper($this->data['BusinessType']['type'], 'UTF-8')
		));
		return true;
	}

}