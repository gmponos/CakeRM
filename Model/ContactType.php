<?php

App::uses('AppModel', 'Model');

/**
 * ContactType Model
 *
 * @property Contact $Contact
 */
class ContactType extends AppModel {

	/**
	 * Order field
	 *
	 * @var string
	 */
	public $order = "ContactType.type ASC";

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
				'message' => 'The contact type already exists.',
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'Contact' => [
			'className' => 'Contact',
			'foreignKey' => 'contact_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'lastname',
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
		$this->data['ContactType']['type'] = str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ό', 'Ύ', 'Ώ'], ['Α', 'Ε', 'Η', 'Ι', 'Ο', 'Υ', 'Ω'], mb_strtoupper($this->data['ContactType']['type'], 'UTF-8')
		);
		return true;
	}

}
