<?php
App::uses('AppModel', 'Model');

/**
 * OpportunityStatus Model
 *
 * @property Opportunity $Opportunity
 */
class OpportunityStatus extends AppModel {

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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
			'foreignKey' => 'status_id',
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
