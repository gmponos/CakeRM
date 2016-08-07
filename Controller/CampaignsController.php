<?php

App::uses('AppController', 'Controller');

/**
 * Campaigns Controller
 *
 * @property Campaign $Campaign
 * @package app.Controller
 */
class CampaignsController extends AppController
{

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

		$this->Campaign->recursive = 0;
		$this->set('campaigns', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		$options = ['conditions' => ['Campaign.' . $this->Campaign->primaryKey => $id]];
		$this->set('campaign', $this->Campaign->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Campaign->create();
			if ($this->Campaign->save($this->request->data)) {
				$this->Flash->set(__('The campaign has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The campaign could not be saved. Please, try again.'));
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

		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Campaign->save($this->request->data)) {
				$this->Flash->set(__('The campaign has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The campaign could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Campaign.' . $this->Campaign->primaryKey => $id]];
			$this->request->data = $this->Campaign->find('first', $options);
		}
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Campaign->recursive = 0;
		$this->set('campaigns', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		$options = ['conditions' => ['Campaign.' . $this->Campaign->primaryKey => $id]];
		$this->set('campaign', $this->Campaign->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Campaign->create();
			if ($this->Campaign->save($this->request->data)) {
				$this->Flash->set(__('The campaign has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The campaign could not be saved. Please, try again.'));
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

		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Campaign->save($this->request->data)) {
				$this->Flash->set(__('The campaign has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The campaign could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Campaign.' . $this->Campaign->primaryKey => $id]];
			$this->request->data = $this->Campaign->find('first', $options);
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

		$this->Campaign->id = $id;
		if (!$this->Campaign->exists()) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Campaign->delete()) {
			$this->Flash->set(__('The campaign has been deleted.'));
		} else {
			$this->Flash->set(__('The campaign could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

}
