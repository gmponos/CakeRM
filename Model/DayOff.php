<?php

App::uses('AppModel', 'Model');

/**
 * DayOff Model
 *
 * @property User       $User
 * @property DayOffType $DayOffType
 */
class DayOff extends AppModel {

	/**
	 * This field sets the order of the model
	 *
	 * @var string|array $order
	 */
	public $order = 'DayOff.start';

	/**
	 * VirtualFields field
	 *
	 * @var array
	 */
	public $virtualFields = [
		'time_modified' => "DATE_FORMAT(DayOff.modified, '%H:%i')",
		'date_modified' => "DATE_FORMAT(DayOff.modified, '%Y-%m-%d')",
		'date_start' => "DATE_FORMAT(DayOff.start, '%Y-%m-%d')",
		'date_end' => "DATE_FORMAT(DayOff.end, '%Y-%m-%d')",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'user_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				'message' => 'You have to select a user',
				'allowEmpty' => false,
			],
		],
		'day_off_type_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'date_start' => [
			'date' => [
				'rule' => ['date'],
				'message' => 'Insert a valid date',
				'allowEmpty' => false,
			],
		],
		'date_end' => [
			'date' => [
				'rule' => ['date'],
				'message' => 'Insert a valid date',
				'allowEmpty' => false,
			],
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'order' => 'User.lastname',
		],
		'DayOffType' => [
			'className' => 'DayOffType',
			'foreignKey' => 'day_off_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'DayOffType.type',
		],
	];

	/**
	 * before save function
	 *
	 * @param array $options
	 * @return array
	 */
	public function beforeSave($options = []) {

		//Save the value date_target as target
		if (!empty($this->data['DayOff']['date_start'])) {
			$this->data['DayOff']['start'] = $this->data['DayOff']['date_start'];
		}
		if (!empty($this->data['DayOff']['date_end'])) {
			$this->data['DayOff']['end'] = $this->data['DayOff']['date_end'];
		}
		return parent::beforeSave($options);
	}

}
