<?php

App::uses('AppController', 'Controller');

/**
 * Taxoffices Controller
 *
 * @property Taxoffice $Taxoffice
 * @package app.Controller
 */
class TaxofficesController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->Taxoffice->recursive = 0;
		$this->set('taxoffices', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Taxoffice->exists($id)) {
			throw new NotFoundException(__('Invalid taxoffice'));
		}
		$this->set('taxoffice', $this->Taxoffice->findById($id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Taxoffice->create();
			if ($this->Taxoffice->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The taxoffice could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Taxoffice->recursive = 0;
		$this->set('taxoffices', $this->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Taxoffice->exists($id)) {
			throw new NotFoundException(__('Invalid taxoffice'));
		}
		$this->set('taxoffice', $this->Taxoffice->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Taxoffice->create();
			if ($this->Taxoffice->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The taxoffice could not be saved. Please, try again.'));
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

		if (!$this->Taxoffice->exists($id)) {
			throw new NotFoundException(__('Invalid taxoffice'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taxoffice->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The taxoffice could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Taxoffice->findById($id);
		}
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

		$this->request->onlyAllow('post', 'delete');
		if (!$this->Taxoffice->exists($id)) {
			throw new NotFoundException(__('Invalid Taxoffice'));
		}
		if (!$this->Taxoffice->delete($id, false)) {
			throw new Exception(__('Taxoffice was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * This method adds a taxoffice and renders a select
	 *
	 * @return void
	 */
	public function addForSelect() {

		$this->Taxoffice->create();
		if (!$this->Taxoffice->save($this->request->data)) {
			throw new Exception(__('Could not save Taxoffice'));
		}
		$taxoffices = $this->Taxoffice->find('list');
		$this->set(compact('taxoffices'));
	}

}