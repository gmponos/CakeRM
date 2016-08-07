<?php
App::uses('AppController', 'Controller');
/**
 * ContractTypes Controller
 *
 * @property	ContractType $ContractType
 * @package		app.Controller
 */
class ContractTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = ['Paginator'];

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContractType->recursive = 0;
		$this->set('contractTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ContractType->exists($id)) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		$options = ['conditions' => ['ContractType.' . $this->ContractType->primaryKey => $id]];
		$this->set('contractType', $this->ContractType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContractType->create();
			if ($this->ContractType->save($this->request->data)) {
				$this->Flash->set(__('The contract type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ContractType->exists($id)) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->ContractType->save($this->request->data)) {
				$this->Flash->set(__('The contract type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['ContractType.' . $this->ContractType->primaryKey => $id]];
			$this->request->data = $this->ContractType->find('first', $options);
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ContractType->recursive = 0;
		$this->set('contractTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ContractType->exists($id)) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		$options = ['conditions' => ['ContractType.' . $this->ContractType->primaryKey => $id]];
		$this->set('contractType', $this->ContractType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ContractType->create();
			if ($this->ContractType->save($this->request->data)) {
				$this->Flash->set(__('The contract type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ContractType->exists($id)) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->ContractType->save($this->request->data)) {
				$this->Flash->set(__('The contract type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contract type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['ContractType.' . $this->ContractType->primaryKey => $id]];
			$this->request->data = $this->ContractType->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ContractType->id = $id;
		if (!$this->ContractType->exists()) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ContractType->delete()) {
			$this->Flash->set(__('The contract type has been deleted.'));
		} else {
			$this->Flash->set(__('The contract type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}}
