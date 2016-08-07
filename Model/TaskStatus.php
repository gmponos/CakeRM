<?php
App::uses('AppModel', 'Model');

/**
 * TaskState Model
 *
 * @property Task $Task
 */
class TaskStatus extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'status';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'status' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				'message' => 'The status field must not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false,
				//'on' => 'create',
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The task status already exists.',
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
			'foreignKey' => 'task_status_id',
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

	public function beforeSave($options = []) {

		parent::beforeSave($options);
		$this->data['TaskStatus']['status'] = preg_replace('/[^Α-Ω ]/', '', str_replace(
			['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'],
			['Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Y', 'Ω'],
			mb_strtoupper($this->data['TaskStatus']['status'], 'UTF-8')
		));
		return true;
	}
}
