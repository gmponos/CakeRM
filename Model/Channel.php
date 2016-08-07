<?php
App::uses('AppModel', 'Model');

/**
 * Channel Model
 *
 * @property Opportunity $Opportunity
 */
class Channel extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'channel';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'channel' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'Opportunity' => [
			'className' => 'Opportunity',
			'foreignKey' => 'channel_id',
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
