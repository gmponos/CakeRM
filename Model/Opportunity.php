<?php

App::uses('AppModel', 'Model');

/**
 * Opportunity Model
 *
 * @property Business                 $Business
 * @property Contact                  $Contact
 * @property Offer                    $Offer
 * @property User                     $Users
 * @property Campaign                 $Campaign
 * @property Channel                  $Channel
 * @property Appointment              $Appointment
 * @property OpportunityCommunication $OpportunityCommunication
 */
class Opportunity extends AppModel {

	/**
	 * Order field
	 * First we order the tasks that do not have a completed value
	 *
	 * @var array
	 */
	public $order = [
		"Opportunity.created DESC",
	];

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'description_full';

	/**
	 * VirtualFields field
	 *
	 * @var array
	 */
	public $virtualFields = [
		'description_full' => "CONCAT(Opportunity.description, ' - ', Opportunity.id)",
		'time_created' => "DATE_FORMAT(Opportunity.created, '%H:%i')",
		'time_updated' => "DATE_FORMAT(Opportunity.updated, '%H:%i')",
		'date_created' => "DATE_FORMAT(Opportunity.created, '%Y-%m-%d')",
		'date_updated' => "DATE_FORMAT(Opportunity.updated, '%Y-%m-%d')",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'responsible_users_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'description' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
		],
		'status_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'campaign_id' => [
			'numeric' => [
				'rule' => ['numeric'],
				'allowEmpty' => true,
			],
		],
		'channel_id' => [
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
		'Business' => [
			'className' => 'Business',
			'foreignKey' => 'business_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'Contact' => [
			'className' => 'Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'ResponsibleUser' => [
			'className' => 'User',
			'foreignKey' => 'responsible_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'CreatedUser' => [
			'className' => 'User',
			'foreignKey' => 'created_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'UpdatedUser' => [
			'className' => 'User',
			'foreignKey' => 'updated_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'Campaign' => [
			'className' => 'Campaign',
			'foreignKey' => 'campaign_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'OpportunityStatus' => [
			'className' => 'OpportunityStatus',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'Channel' => [
			'className' => 'Channel',
			'foreignKey' => 'channel_id',
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
		'OpportunityCommunication' => [
			'className' => 'OpportunityCommunication',
			'foreignKey' => 'opportunity_id',
			'dependent' => true,
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
