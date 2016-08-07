<?php

App::uses('AppModel', 'Model');

/**
 * TaskType Model
 *
 * @property Task $Task
 * @package  app.Model
 */
class TaskType extends AppModel {

	/**
	 * Order fields
	 *
	 * @var string
	 */
	public $order = 'TaskType.order';

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
				'message' => 'The type field must not be empty.',
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The task type already exists.',
			],
		],
		'modified' => [
			'datetime' => [
				'rule' => ['datetime'],
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
			'foreignKey' => 'task_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => [
				"ISNULL(Task.completed) DESC",
				"Task.completed DESC",
				"Task.created DESC",
			],
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
	];

	/**
	 * Callback methods

	 */

	/**
	 * beforeSave method
	 *
	 * @param type $options
	 * @return boolean
	 */
	public function beforeSave($options = []) {

		$this->data['TaskType']['type'] = preg_replace('/[^Α-Ω ]/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], [
			'Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Y', 'Ω',
		], mb_strtoupper($this->data['TaskType']['type'], 'UTF-8')
		));
		return parent::beforeSave($options);
	}

}
