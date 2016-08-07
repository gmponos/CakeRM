<?php
App::uses('AppModel', 'Model');

/**
 * DayOffType Model
 *
 * @property DayOff $DayOff
 */
class DayOffType extends AppModel {

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
				'required' => true,
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The day off type already exists',
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'DayOff' => [
			'className' => 'DayOff',
			'foreignKey' => 'day_off_type_id',
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
