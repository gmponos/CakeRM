<?php

App::uses('AppController', 'Controller');

/**
 * Banks Controller
 *
 * @property Bank               $Bank
 * @property PaginatorComponent $Paginator
 */
class BanksController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->Bank->recursive = 0;
		$this->set('banks', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Bank->exists($id)) {
			throw new NotFoundException(__('Invalid bank'));
		}
		$options = ['conditions' => ['Bank.' . $this->Bank->primaryKey => $id]];
		$this->set('bank', $this->Bank->find('first', $options));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Bank->recursive = 0;
		$this->set('banks', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Bank->exists($id)) {
			throw new NotFoundException(__('Invalid bank'));
		}
		$options = ['conditions' => ['Bank.' . $this->Bank->primaryKey => $id]];
		$this->set('bank', $this->Bank->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Bank->create();
			if ($this->Bank->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The bank could not be saved. Please, try again.'));
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

		if (!$this->Bank->exists($id)) {
			throw new NotFoundException(__('Invalid bank'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Bank->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The bank could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Bank.' . $this->Bank->primaryKey => $id]];
			$this->request->data = $this->Bank->find('first', $options);
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

		$this->Bank->id = $id;
		if (!$this->Bank->exists()) {
			throw new NotFoundException(__('Invalid bank'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bank->delete()) {
			$this->Flash->set(__('The bank has been deleted.'));
		} else {
			$this->Flash->set(__('The bank could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

}
