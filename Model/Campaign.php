<?php
App::uses('AppModel', 'Model');

/**
 * Campaign Model
 *
 * @property Opportunity $Opportunity
 */
class Campaign extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'campaign';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'campaign' => [
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
			'foreignKey' => 'campaign_id',
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
