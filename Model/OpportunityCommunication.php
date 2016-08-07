<?php
App::uses('AppModel', 'Model');

/**
 * OpportunityCommunication Model
 *
 * @property Opportunity $Opportunity
 * @property User        $User
 */
class OpportunityCommunication extends AppModel {

	public $order = [
		'OpportunityCommunication.modified DESC',
	];

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'description';

	/**
	 * VirtualFields field
	 *
	 * @var array
	 */
	public $virtualFields = [
		'time_created' => "DATE_FORMAT(OpportunityCommunication.modified, '%H:%i')",
		'date_created' => "DATE_FORMAT(OpportunityCommunication.modified, '%Y-%m-%d')",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'opportunity_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'modified_user_id' => [
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
		'Opportunity' => [
			'className' => 'Opportunity',
			'foreignKey' => 'opportunity_id',
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
