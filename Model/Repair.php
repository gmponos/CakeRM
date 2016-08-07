<?php

App::uses('AppModel', 'Model');

/**
 * Repair Model
 *
 * @property User     $User
 * @property User     $RepairedUser
 * @property Business $Business
 * @property Contact  $Contact
 */
class Repair extends AppModel {

	/**
	 * actAs
	 *
	 * @var array
	 */
	public $actsAs = [
		'Containable',
	];

	/**
	 * Order field
	 * First we order the tasks that do not have a completed value
	 *
	 * @var array
	 */
	public $order = [
		"Repair.created DESC",
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
		'date_created' => "DATE_FORMAT(Repair.created, '%Y-%m-%d')",
		'date_updated' => "DATE_FORMAT(Repair.updated, '%Y-%m-%d')",
		'date_repaired' => "DATE_FORMAT(Repair.repaired, '%Y-%m-%d')",
		'date_received' => "DATE_FORMAT(Repair.received, '%Y-%m-%d')",
		'date_sent' => "DATE_FORMAT(Repair.sent, '%Y-%m-%d')",
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
	 * @var array
	 */
	public $findMethods = [
		'today' => true,
		'report' => true,
		'responsible' => true,
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'RepairedUser' => [
			'className' => 'User',
			'foreignKey' => 'repaired_user_id',
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
	];

	/**
	 * Handles the before/after filter logic for find('today') operations. Only called by Model::find().
	 *
	 * @param string $state Either "before" or "after"
	 * @param array  $query
	 * @param array  $results
	 * @return array
	 * @see Model::find()
	 */
	protected function _findToday($state, $query, $results = []) {

		if ($state === 'before') {
			$conditions = [
				'Repair.user_id' => $this->Auth->user('id'),
				'OR' => [
					[
						'Repair.created <=' => date("Y-m-d"),
						'Repair.repaired' => null,
					],
					['Repair.repaired' => date("Y-m-d")],
				],
			];
			$query = Hash::merge($query, ['conditions' => $conditions]);
			return $query;
		}
		return $results;
	}

	/**
	 * Handles the before/after filter logic for find('report') operations. Only called by Model::find().
	 *
	 * @param string $state Either "before" or "after"
	 * @param array  $query
	 * @param array  $results
	 * @return array
	 * @see Model::find()
	 */
	protected function _findReport($state, $query, $results = []) {

		if ($state === 'before') {
			$conditions = [
				'AND' => [
					'OR' => [
						'Repair.repaired_user_id' => AuthComponent::user('id'),
					],
					'AND' => [
						'OR' => [
							['Repair.repaired' => null],
							['Repair.repaired' => date("Y-m-d")],
						],
					],
				],
			];
			$query = Hash::merge($query, ['conditions' => $conditions]);
			return $query;
		}
		return $results;
	}

	/**
	 * Called before each save operation, after validation. Return a non-true result
	 * to halt the save.
	 *
	 * @param array $options Options passed from Model::save().
	 * @return bool True if the operation should continue, false if it should abort
	 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#beforesave
	 * @see  Model::save()
	 */
	public function beforeSave($options = []) {

		//Save the value date_repaired as repaired
		if (!empty($this->data['Repair']['date_repaired'])) {
			$this->data['Repair']['repaired'] = $this->data['Repair']['date_repaired'];
		}

		//Save the value date_received as received
		if (!empty($this->data['Repair']['date_received'])) {
			$this->data['Repair']['received'] = $this->data['Repair']['date_received'];
		} else {
			$this->data['Repair']['received'] = date('Y-m-d');
		}

		//Save the value date_sent as sent
		if (!empty($this->data['Repair']['date_sent'])) {
			$this->data['Repair']['sent'] = $this->data['Repair']['date_sent'];
		}

		return parent::beforeSave($options);
	}

}
