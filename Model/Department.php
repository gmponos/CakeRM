<?php

App::uses('AppModel', 'Model');

/**
 * Department Model
 *
 * @property Contact $Contact
 */
class Department extends AppModel {

	/**
	 * Order field
	 *
	 * @var string
	 */
	public $order = 'Department.department ASC';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'department';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'department' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				'message' => 'Your department field must not be empty',
				'required' => true,
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The department already exists',
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
			'foreignKey' => 'department_id',
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
