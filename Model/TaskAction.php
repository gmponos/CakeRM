<?php

App::uses('AppModel', 'Model');

/**
 * TaskAction Model
 *
 * @property Task $Task
 * @property User $User
 * @method findAllByTaskId($id)
 */
class TaskAction extends AppModel {

	public $order = [
		'TaskAction.modified DESC',
	];

	public $virtualFields = [
		'date_modified' => "DATE_FORMAT(TaskAction.modified, '%Y-%m-%d %H:%i')",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'description' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'Task' => [
			'className' => 'Task',
			'foreignKey' => 'task_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		],
		'ModifiedUser' => [
			'className' => 'User',
			'foreignKey' => 'modified_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
	];

}
