<?php

App::uses('AppModel', 'Model');

/**
 * Task Model
 *
 * @property User         $User
 * @property User         $ResponsibleUser
 * @property User         $CreatedUser
 * @property User         $UpdatedUser
 * @property User         $Completed
 * @property Contact      $Contact
 * @property Business     $Business
 * @property TaskType     $TaskType
 * @property TaskPriority $TaskPriority
 * @property TaskStatus   $TaskStatus
 * @property TaskAction   $TaskAction
 * @package  app.Model
 */
class Task extends AppModel {

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
		'ISNULL(Task.completed) DESC',
		'Task.created DESC',
		'Task.updated DESC',
	];

	/**
	 * VirtualFields field
	 *
	 * @var array
	 */
	public $virtualFields = [
		'time_created' => "DATE_FORMAT(Task.created, '%H:%i')",
		'time_updated' => "DATE_FORMAT(Task.updated, '%H:%i')",
		'date_created' => "DATE_FORMAT(Task.created, '%Y-%m-%d')",
		'date_updated' => "DATE_FORMAT(Task.updated, '%Y-%m-%d')",
	];

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'description';

	/**
	 * @var array
	 */
	public $findMethods = [
		'today' => true,
		'report' => true,
		'responsible' => true,
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
		'duration' => [
			'time' => [
				'rule' => ['time', 'HH:MM'],
				'message' => 'Invalid Duration form',
				'allowEmpty' => true,
			],
		],
		'date_target' => [
			'date' => [
				'rule' => ['date'],
				'message' => 'Insert a valid date',
				'allowEmpty' => true,
			],
		],
		'completed' => [
			'date' => [
				'rule' => ['date'],
				'message' => 'Insert a valid date',
				'allowEmpty' => true,
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'TaskAction' => [
			'className' => 'TaskAction',
			'foreignKey' => 'task_id',
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

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'CreatedUser' => [
			'className' => 'User',
			'foreignKey' => 'created_user_id',
			'conditions' => [
				'CreatedUser.active' => true,
				'CreatedUser.verified' => true,
			],
			'fields' => '',
			'order' => 'CreatedUser.fullname',
		],
		'UpdatedUser' => [
			'className' => 'User',
			'foreignKey' => 'updated_user_id',
			'conditions' => [
				'UpdatedUser.active' => true,
				'UpdatedUser.verified' => true,
			],
			'fields' => '',
			'order' => 'UpdatedUser.fullname',
		],
		'ResponsibleUser' => [
			'className' => 'User',
			'foreignKey' => 'responsible_user_id',
			'fields' => '',
			'order' => 'ResponsibleUser.fullname',
		],
		'Contact' => [
			'className' => 'Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Contact.lastname',
		],
		'TaskStatus' => [
			'className' => 'TaskStatus',
			'foreignKey' => 'task_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'TaskPriority' => [
			'className' => 'TaskPriority',
			'foreignKey' => 'task_priority_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'TaskPriority.order',
		],
		'TaskType' => [
			'className' => 'TaskType',
			'foreignKey' => 'task_type_id',
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
	];

	/**
	 * beforeSave method
	 *
	 * @param array $options
	 * @return boolean
	 */
	public function beforeSave($options = []) {

		//Save the value completed as completed or unable to complete
		if (($this->data['Task']['task_status_id'] == 2) || ($this->data['Task']['task_status_id'] == 4)) {
			if (empty($this->data['Task']['completed'])) {
				$this->data['Task']['completed'] = date('Y-m-d');
			}
			if (empty($this->data['Task']['responsible_user_id'])) {
				$this->data['Task']['responsible_user_id'] = CakeSession::read("Auth.User.id");
			}
		} else {
			$this->data['Task']['completed'] = null;
		}

		//Save the value date_target as target
		if (!empty($this->data['Task']['date_created'])) {
			$this->data['Task']['created'] = $this->data['Task']['date_created'];
		}
		return parent::beforeSave($options);
	}

	/**
	 * find method
	 *
	 * @param string $type
	 * @param array  $query
	 * @return array
	 */
	public function find($type = 'first', $query = []) {

		if (!in_array($type, ['today', 'report'])) {
			if (is_array($query) && array_key_exists('conditions', $query)) {
				$query['conditions'] = $this->_createConditionOperators($query['conditions']);
			}
		}
		return parent::find($type, $query);
	}

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
				'OR' =>
					[
						['Task.created' => date("Y-m-d")],
						['Task.completed' => date("Y-m-d")],
					],
			];
			$query = Hash::merge($query, ['conditions' => $conditions]);
			return $query;
		}
		return $results;
	}

	/**
	 * Handles the before/after filter logic for find('today') operations. Only called by Model::find().
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
						'Task.created_user_id' => AuthComponent::user('id'),
						'Task.responsible_user_id' => AuthComponent::user('id'),
					],
					'AND' => [
						'OR' => [
							['Task.completed' => null],
							['Task.completed' => date("Y-m-d")],
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
	 * Handles the before/after filter logic for find('today') operations. Only called by Model::find().
	 *
	 * @param string $state Either "before" or "after"
	 * @param array  $query
	 * @param array  $results
	 * @return array
	 * @see Model::find()
	 */
	protected function _findResponsible($state, $query, $results = []) {

		if ($state === 'before') {
			$conditions = ['Task.responsible_user_id' => AuthComponent::user('id')];
			$query = Hash::merge($query, ['conditions' => $conditions]);
			return $query;
		}
		return $results;
	}

	/**
	 * paginate method
	 * overides Paginator paginate
	 *
	 * @param array   $conditions
	 * @param array   $fields
	 * @param array   $order
	 * @param integer $limit
	 * @param type    $page
	 * @param type    $recursive
	 * @param type    $extra
	 * @return array
	 */
//	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
//		$conditions = $this->_createConditionOperators($conditions);
//		return $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'extra'));
//	}

	/**
	 * paginateCount method
	 * overides Paginator paginateCount
	 *
	 * @param array   $conditions
	 * @param integer $recursive
	 * @param array   $extra
	 * @return int
	 */
//	public function paginateCount($conditions, $recursive = 0, $extra = array()) {
//		$this->recursive = $recursive;
//		$conditions = $this->_createConditionOperators($conditions);
//		$options = array_merge(array('conditions' => $conditions), $extra);
//		return $this->find('count', $options);
//	}

	/**
	 * _createConditionOperators method
	 * Create default conditions for specific fields if no operator is given
	 *
	 * @param array $conditions
	 * @return array
	 */
	private function _createConditionOperators($conditions = []) {

		if (is_array($conditions) && !empty($conditions)) {
			//check if the date_end is given
			if (array_key_exists('Task.date_start', $conditions)) {
				$conditions['Task.date_created >='] = $conditions['Task.date_start'];
				unset($conditions['Task.date_start']);
			}

			//check if the date_end is given
			if (array_key_exists('Task.date_end', $conditions)) {
				$conditions['Task.date_created <='] = $conditions['Task.date_end'];
				unset($conditions['Task.date_end']);
			}
		}

		return $conditions;
	}

}
