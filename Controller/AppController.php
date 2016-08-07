<?php

/**
 * Application level Controller
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 * PHP 5
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright      Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link           http://cakephp.org CakePHP(tm) Project
 * @package        app.Controller
 * @since          CakePHP(tm) v 0.2.9
 * @license        MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link           http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 * @property PaginatorComponent      $Paginator
 * @property SessionComponent        $Session
 * @property BootstrapFlashComponent $Flash
 */
class AppController extends Controller {

	/**
	 * Helpers
	 *
	 * @var array
	 */
	public $helpers = [
		'Html' => [
			'className' => 'CakeBootstrap.BootstrapHtml',
		],
		'Form' => [
			'className' => 'CakeBootstrap.BootstrapForm',
		],
		'Flash' => [
			'className' => 'CakeBootstrap.BootstrapFlash',
		],
		'Paginator' => [
			'className' => 'CakeBootstrap.BootstrapPaginator',
		],
		'Auth',
		'Buttons',
		'Element',
		'Permission',
		'Session',
		'Text',
	];

	/**
	 * Components used from the application
	 *
	 * @var array
	 */
	public $components = [
		'DebugKit.Toolbar',
		'Email',
		'Acl',
		'Auth',
		'Session',
		'Paginator',
		'Flash' => [
			'className' => 'CakeBootstrap.BootstrapFlash',
		],
		'RequestHandler',
	];

	/**
	 * convert get conditions to a model conditions array,
	 * suitable for use in a Model::find() call.
	 *
	 * @return array
	 */
	protected function _buildQueryString() {

		$conditions = [];
		if (!empty($this->request->query)) {
			$data = array_diff($this->request->query, ['']);
		}
		if (empty($data)) {
			return $conditions;
		}
		foreach (array_keys($data) as $key) {
			$model = $this->modelClass;
			$field = $key;
			if ($this->$model->hasField($key, true)) {
				$conditions["$model.$field"] = $data[$key];
			} elseif (($field == 'date_start') || ($field == 'date_end')) {
				$conditions["$model.$field"] = $data[$key];
			}
		}
		return $conditions;
	}

	/**
	 * returns the conditions that are not in the blacklist
	 *
	 * @param array $conditions the conditions that are set in an array
	 * @param array $blacklist  the conditions that are not alloud to be queried
	 * @return string|array
	 */
	protected function _blacklistQuery($conditions, $blacklist) {

		if (!is_array($blacklist) || !is_array($conditions)) {
			return $conditions;
		}
		foreach ($blacklist as $key) {
			if (array_key_exists($key, $conditions)) {
				unset($conditions[$key]);
			}
		}
		return $conditions;
	}

	/**
	 * returns the conditions that in the blacklist
	 *
	 * @param array $conditions
	 * @param array $whitelist
	 * @return string|array
	 */
	protected function _whitelistQuery($conditions, $whitelist) {

		$cond = [];
		if (!is_array($whitelist) || !is_array($conditions)) {
			return $conditions;
		}
		foreach ($whitelist as $key) {
			if (array_key_exists($key, $conditions)) {
				$cond[$key] = $conditions[$key];
			}
		}
		return $cond;
	}

	/**
	 * Create a search method which is global for all controllers
	 *
	 * @todo This function is incomplete
	 */
	private function beforeSearch() {

		$query = [];
		$model = $this->modelClass;
		$haystack = $this->request->query['haystack'];

		if (empty($this->searchArgs)) {
			$this->searchArgs = [$this->{$model}->displayField];
		} else {
			$fields = $this->searchArgs;
			foreach ($fields as $field) {
				$query['OR'][0]["$field LIKE"] = "%$haystack%";
			}
		}

		return $query;
	}

	/**
	 * beforeFilter method
	 *
	 * @return void
	 */
	public function beforeFilter() {

		$this->Auth->loginAction = [
			'controller' => 'users',
			'action' => 'login',
			'admin' => false,
		];

		$this->Auth->logoutRedirect = [
			'controller' => 'users',
			'action' => 'login',
			'admin' => false,
		];

		$this->Auth->loginRedirect = '/dashboard';

		$this->Auth->unauthorizedRedirect = '/dashboard';

		$this->Auth->authenticate = [
			'MultiColumn' => [
				'fields' => [
					'username' => 'username',
					'password' => 'password',
				],
				'userModel' => 'User',
				'columns' => ['username', 'email'],
				'scope' => [
					'User.active' => 1,
					'User.verified' => 1,
				],
			],
		];

		$this->Auth->authorize = [
			'Actions' => [
				'actionPath' => 'controllers',
				'userModel' => 'User',
			],
		];

		parent::beforeFilter();
	}

	public function beforeRender() {

		if ($this->request->is(['post']) || in_array($this->request->params['action'], ['edit', 'add', 'delete'])) {
			$this->set('referrer', $this->Session->read('referrer'));
			return parent::beforeFilter();
		}

		$this->Session->write('referrer', $this->request->referer());
		$this->set('referrer', $this->request->referer());
		return parent::beforeFilter();
	}
}
