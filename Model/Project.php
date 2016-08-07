<?php

App::uses('AppModel', 'Model');

/**
 * Project Model
 *
 * @property User $Supervisor
 * @property Task $Task
 */
class Project extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'title';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'title' => [
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
		'Supervisor' => [
			'className' => 'User',
			'foreignKey' => 'supervisor_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'ProjectAction' => [
			'className' => 'ProjectAction',
			'foreignKey' => 'project_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'ProjectAction.created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
	];

}
