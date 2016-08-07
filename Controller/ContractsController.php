<?php

App::uses('AppController', 'Controller');

/**
 * Contracts Controller
 *
 * @package        app.Controller
 * @subpackage     Contracts.Controllers
 * @property    Contract     $Contract
 * @property    CsvComponent $Csv
 */
class ContractsController extends AppController
{

	/**
	 * Components used from the application
	 *
	 * @var array
	 */
	public $components = [
		'CakeCsv.Csv',
	];

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->Contract->recursive = 0;
		$this->set('contracts', $this->paginate());
	}

	/**
	 * expired method
	 *
	 * @return void
	 */
	public function expired() {

		$this->Contract->recursive = 0;
		$conditions = ['end <' => date("Y-m-d")];
		$this->set('contracts', $this->paginate($conditions));
	}

	/**
	 * active method
	 *
	 * @return void
	 */
	public function active() {

		$this->Contract->recursive = 0;
		$conditions = ['end >=' => date("Y-m-d")];
		$this->set('contracts', $this->paginate($conditions));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Contract->exists($id)) {
			throw new NotFoundException(__('Invalid contract'));
		}
		$options = ['conditions' => ['Contract.' . $this->Contract->primaryKey => $id]];
		$this->set('contract', $this->Contract->find('first', $options));
	}

	/**
	 * add method
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Contract->create();
			if ($this->Contract->save($this->request->data)) {
				$this->Flash->set(__('The contract has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract could not be saved. Please, try again.'));
			}
		}
		$businesses = $this->Contract->Business->find('list');
		$contractTypes = $this->Contract->ContractType->find('list');
		$this->set(compact('businesses', 'contractTypes'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 */
	public function edit($id = null) {

		if (!$this->Contract->exists($id)) {
			throw new NotFoundException(__('Invalid contract'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contract->save($this->request->data)) {
				$this->Flash->set(__('The contract has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Contract.' . $this->Contract->primaryKey => $id]];
			$this->request->data = $this->Contract->find('first', $options);
		}
		$businesses = $this->Contract->Business->find('list');
		$contractTypes = $this->Contract->ContractType->find('list');
		$this->set(compact('businesses', 'contractTypes'));
	}

	/**
	 * export method
	 */
	public function export() {

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
		$fields = [
			'Business.firm',
			'ContractType.type',
			'Contract.start',
			'Contract.end',
		];
		$data = $this->Contract->find('all', ['fields' => $fields, 'conditions' => $conditions]);
		$this->Csv->export($data);
	}

	/**
	 * export method
	 */
	public function exportActive() {

		$conditions = ['end >=' => date("Y-m-d")];
		$fields = [
			'Business.firm',
			'ContractType.type',
			'Contract.start',
			'Contract.end',
		];
		$data = $this->Contract->find('all', ['fields' => $fields, 'conditions' => $conditions]);
		$this->Csv->export($data);
	}

	/**
	 * export method
	 */
	public function exportExpired() {

		$conditions = ['end <' => date("Y-m-d")];
		$fields = [
			'Business.firm',
			'ContractType.type',
			'Contract.start',
			'Contract.end',
		];
		$data = $this->Contract->find('all', ['fields' => $fields, 'conditions' => $conditions]);
		$this->Csv->export($data);
	}

	/**
	 * Related method
	 *
	 * @throws NotFoundException
	 */
	public function related() {

		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('contracts', $this->Contract->find('all', ['conditions' => $query]));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Contract->recursive = 0;
		$this->set('contracts', $this->paginate());
	}

	/**
	 * expired method
	 *
	 * @return void
	 */
	public function admin_expired() {

		$this->Contract->recursive = 0;
		$conditions = ['end <' => date("Y-m-d")];
		$this->set('contracts', $this->paginate($conditions));
	}

	/**
	 * active method
	 *
	 * @return void
	 */
	public function admin_active() {

		$this->Contract->recursive = 0;
		$conditions = ['end >=' => date("Y-m-d")];
		$this->set('contracts', $this->paginate($conditions));
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Contract->exists($id)) {
			throw new NotFoundException(__('Invalid contract'));
		}
		$options = ['conditions' => ['Contract.' . $this->Contract->primaryKey => $id]];
		$this->set('contract', $this->Contract->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Contract->create();
			if ($this->Contract->save($this->request->data)) {
				$this->Flash->set(__('The contract has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract could not be saved. Please, try again.'));
			}
		}
		$businesses = $this->Contract->Business->find('list');
		$contractTypes = $this->Contract->ContractType->find('list');
		$this->set(compact('businesses', 'contractTypes'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->Contract->exists($id)) {
			throw new NotFoundException(__('Invalid contract'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contract->save($this->request->data)) {
				$this->Flash->set(__('The contract has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Contract.' . $this->Contract->primaryKey => $id]];
			$this->request->data = $this->Contract->find('first', $options);
		}
		$businesses = $this->Contract->Business->find('list');
		$contractTypes = $this->Contract->ContractType->find('list');
		$this->set(compact('businesses', 'contractTypes'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {

		$this->Contract->id = $id;
		if (!$this->Contract->exists()) {
			throw new NotFoundException(__('Invalid contract'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contract->delete()) {
			$this->Flash->set(__('Contract deleted'));
			return $this->redirect(['action' => 'index']);
		}
		$this->Flash->set(__('Contract was not deleted'));
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * Admin Related method
	 *
	 * @throws NotFoundException
	 */
	public function admin_related() {

		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('contracts', $this->Contract->find('all', ['conditions' => $query]));
	}

}
