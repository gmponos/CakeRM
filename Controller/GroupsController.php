<?php

App::uses('AppController', 'Controller');

/**
 * Groups Controller
 *
 * @property Group $Group
 * @package Users
 */
class GroupsController extends AppController
{

	/**
	 * beforeFilter method
	 *
	 * @return void
	 */
	public function beforeFilter() {

		parent::beforeFilter();
		// remove comments to allow full access to this controller
		//$this->Auth->allow();
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->set('group', $this->Group->findById($id));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->set('group', $this->Group->findById($id));
	}

	/**
	 * admin_add method
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The group could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 */
	public function admin_edit($id = null) {

		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Group->findById($id);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 */
	public function admin_delete($id = null) {

		$this->request->allowMethod('post', 'delete');
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if (!$this->Group->delete($id, false)) {
			$this->Flash->error(__('Group is not deleted'));
		}
		$this->autoRender = false;
	}
}
