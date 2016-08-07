<?php

App::uses('AppModel', 'Model');

/**
 * TaskPriority Model
 *
 * @property Task $Task
 */
class TaskPriority extends AppModel {

	/**
	 * Order fields
	 *
	 * @var string
	 */
	public $order = 'TaskPriority.order';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'priority';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'priority' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				'message' => 'The priority field must not be empty.',
			],
			'unique' => [
				'rule' => ['isUnique', 'username'],
				'message' => 'The priority already exists.',
			],
		],
		'order' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
			'numeric' => [
				'rule' => ['numeric'],
			],
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
			'foreignKey' => 'task_priority_id',
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

	public function beforeSave($options = []) {

		parent::beforeSave($options);
		$this->data['TaskPriority']['priority'] = preg_replace('/[^Α-Ω ]/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], [
			'Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω',
		], mb_strtoupper($this->data['TaskPriority']['priority'], 'UTF-8')
		));
		return true;
	}

}
