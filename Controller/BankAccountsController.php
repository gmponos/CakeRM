<?php

App::uses('AppController', 'Controller');

/**
 * BankAccounts Controller
 *
 * @property BankAccount $BankAccount
 */
class BankAccountsController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->BankAccount->recursive = 0;
		$this->set('bankAccounts', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->BankAccount->exists($id)) {
			throw new NotFoundException(__('Invalid bank account'));
		}

		$this->set('bankAccount', $this->BankAccount->find('first', [
			'conditions' => [
				'BankAccount.' . $this->BankAccount->primaryKey => $id,
			],
		]));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->BankAccount->create();
			if ($this->BankAccount->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The bank account could not be saved. Please, try again.'));
			}
		}
		$banks = $this->BankAccount->Bank->find('list');
		$this->set(compact('banks'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		if (!$this->BankAccount->exists($id)) {
			throw new NotFoundException(__('Invalid bank account'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->BankAccount->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The bank account could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['BankAccount.' . $this->BankAccount->primaryKey => $id]];
			$this->request->data = $this->BankAccount->find('first', $options);
		}
		$banks = $this->BankAccount->Bank->find('list');
		$this->set(compact('banks'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->BankAccount->recursive = 0;
		$this->set('bankAccounts', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->BankAccount->exists($id)) {
			throw new NotFoundException(__('Invalid bank account'));
		}
		$bankAccount = $this->BankAccount->find('first', [
			'conditions' => [
				'BankAccount.' . $this->BankAccount->primaryKey => $id,
			],
		]);
		$this->set('bankAccount', $bankAccount);
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->BankAccount->create();
			if ($this->BankAccount->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The bank account could not be saved. Please, try again.'));
			}
		}
		$banks = $this->BankAccount->Bank->find('list');
		$this->set(compact('banks'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->BankAccount->exists($id)) {
			throw new NotFoundException(__('Invalid bank account'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->BankAccount->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The bank account could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['BankAccount.' . $this->BankAccount->primaryKey => $id]];
			$this->request->data = $this->BankAccount->find('first', $options);
		}
		$banks = $this->BankAccount->Bank->find('list');
		$this->set(compact('banks'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {

		$this->BankAccount->id = $id;
		if (!$this->BankAccount->exists()) {
			throw new NotFoundException(__('Invalid bank account'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BankAccount->delete()) {
			$this->Flash->set(__('The bank account has been deleted.'));
		} else {
			$this->Flash->set(__('The bank account could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

}
