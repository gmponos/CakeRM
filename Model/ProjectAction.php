<?php
App::uses('AppModel', 'Model');

/**
 * ProjectAction Model
 *
 * @property Project $Project
 * @property User    $ModifiedUser
 */
class ProjectAction extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'project_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'Project' => [
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
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
