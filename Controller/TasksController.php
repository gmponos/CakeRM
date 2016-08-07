<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Tasks Controller
 *
 * @property Task         $Task
 * @property CsvComponent $Csv
 */
class TasksController extends AppController
{

	/**
	 * Components used from the application
	 *
	 * @var array
	 */
	public $components = [
		'CakeCsv.Csv' => [
			'delimiter' => ';',
			'enclosure' => '"',
			'dataEncoding' => 'UTF-8',
			'csvEncoding' => 'WINDOWS-1253',
		],
		'DebugKit.Toolbar',
		'Email',
		'Acl',
		'Auth',
		'Session',
		'Paginator',
		'RequestHandler',
	];

	/**
	 * This variable is used to define which fields are used to query
	 * a search result
	 *
	 * @var array
	 */
	public $searchFields = [
		'Task.description',
		'Business.firm',
		'Business.business',
		'Contact.firstname',
		'Contact.lastname',
	];

	/**
	 * This variable is used to define which fields are used to query
	 * a search result
	 *
	 * @var array
	 */
	public $exportFields = [
		'TaskType.type',
		'Task.created',
		'ResponsibleUser.lastname',
		'Task.description',
		'Business.firm',
		'Contact.firstname',
		'Contact.lastname',
		'TaskStatus.status',
		'Task.duration',
	];

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->Paginator->settings = [
			'paramType' => 'querystring',
			'limit' => 50,
		];
		$scope = $this->_buildQueryString();
		$this->__beforeRenderIndex();
		$this->set('tasks', $this->_paginate($scope));
	}

	/**
	 * today method
	 *
	 * @return void
	 */
	public function today() {

		$this->Paginator->settings = [
			'paramType' => 'querystring',
			'limit' => 50,
			'Task' => [
				'findType' => 'today',
			],
		];

		$scope = $this->_buildQueryString();
		$this->__beforeRenderIndex();
		$this->set('tasks', $this->_paginate($scope));
	}

	/**
	 * Returns the tasks that the user is responsible for
	 *
	 * @return void
	 */
	public function responsible() {

		$this->Paginator->settings = [
			'paramType' => 'querystring',
			'limit' => 50,
			'Task' => [
				'findType' => 'responsible',
			],
		];
		$scope = $this->_buildQueryString();
		$this->__beforeRenderIndex();
		$this->set('tasks', $this->_paginate($scope));
	}

	/**
	 * search method
	 */
	public function search() {

		$haystack = $this->request->query('haystack');
		$scope = $this->_searchQuery($haystack);
		$this->__beforeRenderIndex();
		$this->view = 'index';
		$this->set('tasks', $this->_paginate($scope));
	}

	/**
	 * view method
	 *
	 * @param int|null $id
	 * @throws NotFoundException
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->Task->TaskAction->recursive = 0;
		$this->set('taskActions', $this->Task->TaskAction->findAllByTaskId($id));

		$this->Task->recursive = 0;
		$this->set('task', $this->Task->findById($id));
	}

	/**
	 * add method
	 */
	public function add() {

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->danger(__('The task could not be saved. Please, try again.'));
			}
		}
		$this->__beforeRenderAdd();
	}

	/**
	 * edit method
	 *
	 * @param int|null $id
	 */
	public function edit($id = null) {

		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Task->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->danger(__('The task could not be saved. Please, try again.'));
			}
		} else {
			$this->Task->recursive = -1;
			$this->request->data = $this->Task->findById($id);
		}
		if (!empty($this->request->data['Task']['business_id'])) {
			$contacts = $this->Task->Contact->findByBusinessId('list', $this->request->data('Task.business_id'));
		} else {
			$contacts = $this->Task->Contact->find('list');
		}
		$this->set(compact('contacts'));
		$this->__beforeRenderEdit();
	}

	/**
	 * Returns the related tasks. If no query is given to filter the results
	 * then it throws an exception.
	 *
	 * @throws NotFoundException
	 */
	public function related() {

		$query = array_diff($this->request->params['named'], ['']);
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('tasks', $this->Task->find('all', ['conditions' => $query]));
	}

	/**
	 * export method
	 */
	public function export() {

		$data = $this->Task->find('all', ['fields' => $this->exportFields]);
		$this->Csv->export($data);
	}

	/**
	 * Export Filters
	 */
	public function exportFilters() {

		$conditions = null;
		$query = array_diff($this->request->query, ['']);
		$scope = array_diff_key($query, array_flip(
				['order', 'page', 'recursive', 'sort', 'direction']
			)
		);
		foreach (array_keys($scope) as $key) {
			if (strpos($key, '.') != false) {
				list($model, $field) = explode('.', $key);
			} else {
				$model = $this->modelClass;
				$field = $key;
			}
			$conditions["$model.$field"] = $this->request->query($key);
		}
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Paginator->settings = [
			'Task' => [
				'paramType' => 'querystring',
				'limit' => 50,
				'contain' => [
					'Business' => ['id', 'firm', 'business'],
					'Contact' => ['id', 'fullname'],
					'TaskType',
					'TaskStatus' => ['id', 'status', 'icon'],
					'TaskPriority' => ['id', 'priority', 'icon'],
					'CreatedUser' => ['id', 'fullname', 'lastname'],
					'UpdatedUser' => ['id', 'fullname', 'lastname'],
					'ResponsibleUser' => [
						'lastname',
						'id',
					],
				],
			],
		];
		$scope = $this->_buildQueryString();
		$this->__beforeRenderIndex();
		$this->set('tasks', $this->_paginate($scope));
	}

	/**
	 * admin_search method
	 * this method is used for searching
	 */
	public function admin_search() {

		$haystack = $this->request->query('haystack');
		if (empty($haystack)) {
			throw new NotFoundException(__('No Parameters'));
		}
		$scope = $this->_searchQuery($haystack);
		$this->__beforeRenderIndex();
		$this->view = 'admin_index';
		$this->set('tasks', $this->_paginate($scope));
	}

	/**
	 * admin today
	 */
	public function admin_today() {

		$this->today();
	}

	/**
	 * admin responsible
	 */
	public function admin_responsible() {

		$this->responsible();
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		$this->view($id);
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		$this->add();
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param int $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		$this->edit($id);
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {

		$this->request->allowMethod('post', 'delete');
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if (!$this->Task->delete($id)) {
			throw new NotFoundException(__('Task was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * Show related for admin
	 *
	 * @throws NotFoundException
	 */
	public function admin_related() {

		$query = array_diff($this->request->params['named'], ['']);
		if (empty($query)) {
			throw new NotFoundException(__('No Parameters'));
		}
		$this->set('tasks', $this->_paginate($query));
	}

	/**
	 * admin export the data in a csv file
	 */
	public function admin_export() {

		$this->Task->recursive = 0;
		$options['conditions'] = $this->_buildQueryString();
		$options['fields'] = $this->exportFields;
		$data = $this->Task->find('all', $options);
		$this->Csv->export($data);
	}

	/**
	 * mail method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int $id
	 * @return void
	 */
	public function mail($id = null) {

		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}

		$task = $this->Task->findById($id);
		$subject = $this->name . ' #' . $id . ': ' . $task['Task']['title'];

		$Email = new CakeEmail('default');
		$Email->subject($subject);
		$Email->viewVars(['task' => $task]);
		$Email->template('tasks/view', 'view');
		$Email->emailFormat('html');
		if ($Email->send()) {
			$data = ['emailed' => true, 'updated' => $task['Task']['updated']];
			$this->Task->save($data, ['callbacks' => false]);
		}
		//Do not render a view file.
		$this->autoRender = false;
	}

	/**
	 * @throws Exception
	 */
	public function mailFilters() {

		$query = $this->_buildQueryString();
		$tasks = $this->Task->find('all', ['conditions' => $query]);

		$Email = new CakeEmail('default');
		$Email->subject(sprintf(__('User: %s sent some tasks'), $this->Auth->user('fullname')));
		$Email->viewVars(['tasks' => $tasks]);
		$Email->template('tasks/index', 'index');
		$Email->emailFormat('html');
		$Email->send();
		//Do not render a view file.
		$this->autoRender = false;
	}

	/**
	 * mail index report
	 *
	 * @return void
	 */
	public function mailReport() {

		$Email = new CakeEmail('default');
		$Email->subject(sprintf(__('Report: %s From %s'), date('Ymd'), $this->Auth->user('fullname')));
		$Email->viewVars(['tasks' => $this->Task->find('report')]);
		$Email->template('tasks/index', 'index');
		$Email->emailFormat('html');
		$Email->send();
		//Do not render a view file.
		$this->autoRender = false;
	}

	/**
	 * This function is used to paginate the data we want to view.
	 *
	 * @access private
	 * @param array $scope
	 * @return array
	 */
	private function _paginate($scope = []) {

		$whitelist = [
			'Task.completed',
			'Task.updated',
			'Task.created',
		];
		$this->Task->recursive = 0;
		return $this->Paginator->paginate('Task', $scope, $whitelist);
	}

	/**
	 * @param string $haystack
	 * @return array the search query
	 */
	protected function _searchQuery($haystack) {

		$query = [
			'OR' => [
				['Task.description LIKE' => "%$haystack%"],
				['Business.firm LIKE' => "%$haystack%"],
				['Business.business LIKE' => "%$haystack%"],
				['Contact.firstname LIKE' => "%$haystack%"],
				['Contact.lastname LIKE' => "%$haystack%"],
			],
		];
		return $query;
	}

	/**
	 * before Index
	 */
	private function __beforeRenderIndex() {

		$responsibleUsers = $this->Task->ResponsibleUser->find('list');
		$taskTypes = $this->Task->TaskType->find('list');
		$taskStatuses = $this->Task->TaskStatus->find('list');
		$taskPriorities = $this->Task->TaskPriority->find('list');
		$this->set(compact('responsibleUsers', 'taskTypes', 'taskStatuses', 'taskPriorities'));
	}

	/**
	 * before render the view of an add
	 */
	private function __beforeRenderAdd() {

		$contacts = $this->Task->Contact->find('list');
		$departments = $this->Task->Contact->Department->find('list');
		$taskTypes = $this->Task->TaskType->find('list');
		$taskStatuses = $this->Task->TaskStatus->find('list');
		$taskPriorities = $this->Task->TaskPriority->find('list');
		$businesses = $this->Task->Business->find('list');
		$states = $this->Task->Business->State->find('list');
		$taxoffices = $this->Task->Business->Taxoffice->find('list');
		$responsibleUsers = $this->Task->ResponsibleUser->find('list', [
			'conditions' => ['active' => true, 'verified' => true],
		]);
		$contactTypes = $this->Task->Contact->ContactType->find('list');
		$businessTypes = $this->Task->Business->BusinessType->find('list');
		$this->set(compact(
				'responsibleUsers', 'contacts', 'departments', 'taskTypes', 'taskStatuses', 'taskPriorities',
				'businesses', 'states', 'taxoffices', 'businessTypes', 'contactTypes')
		);
	}

	/**
	 * before render the view of an edit
	 */
	private function __beforeRenderEdit() {

		$businesses = $this->Task->Business->find('list');
		$responsibleUsers = $this->Task->ResponsibleUser->find('list');
		$taskTypes = $this->Task->TaskType->find('list');
		$taskStatuses = $this->Task->TaskStatus->find('list');
		$taskPriorities = $this->Task->TaskPriority->find('list');
		$this->set(
			compact('responsibleUsers', 'contacts', 'taskTypes', 'taskStatuses', 'taskPriorities', 'businesses')
		);
	}

}
