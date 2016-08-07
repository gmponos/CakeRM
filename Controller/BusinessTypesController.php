<?php

App::uses('AppController', 'Controller');

/**
 * BusinessTypes Controller
 *
 * @property	BusinessType $BusinessType
 * @package		app.Controller
 */
class BusinessTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BusinessType->recursive = 0;
		$this->set('businessTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BusinessType->exists($id)) {
			throw new NotFoundException(__('Invalid business type'));
		}
		$this->set('businessType', $this->BusinessType->findById($id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BusinessType->create();
			if ($this->BusinessType->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The business type could not be saved. Please, try again.'));
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
		if (!$this->BusinessType->exists($id)) {
			throw new NotFoundException(__('Invalid business type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusinessType->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The business type could not be saved. Please, try again.'));
			}
		} else {
			$this->BusinessType->recursive = -1;
			$this->request->data = $this->BusinessType->findById($id);
		}
	}

/**
 * search method
 *
 */
	public function search() {
		$haystack = $this->request->query('haystack');
		$query = [
			'OR' => [
				['BusinessType.type LIKE' => "%$haystack%"]]];
		$this->BusinessType->recursive = 0;
		$this->set('businessTypes', $this->paginate($query));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BusinessType->recursive = 0;
		$this->set('businessTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BusinessType->exists($id)) {
			throw new NotFoundException(__('Invalid business type'));
		}
		$this->set('businessType', $this->BusinessType->findById($id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BusinessType->create();
			if ($this->BusinessType->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The business type could not be saved. Please, try again.'));
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
		if (!$this->BusinessType->exists($id)) {
			throw new NotFoundException(__('Invalid business type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusinessType->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The business type could not be saved. Please, try again.'));
			}
		} else {
			$this->BusinessType->recursive = -1;
			$this->request->data = $this->BusinessType->findById($id);
		}
	}

/**
 * admin search method
 *
 */
	public function admin_search() {
		$haystack = $this->request->query('haystack');
		$query = [
			'OR' => [
				['BusinessType.type LIKE' => "%$haystack%"]]];
		$this->BusinessType->recursive = 0;
		$this->set('businessTypes', $this->paginate($query));
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
		if (!$this->BusinessType->exists($id)) {
			throw new NotFoundException(__('Invalid business type'));
		}
		if (!$this->BusinessType->delete($id)) {
			$this->Flash->set(__('Business type is not deleted'));
		}
		return $this->redirect($this->referer());
	}

/**
 * add method from request for displaying a select
 *
 * @return void
 */
	public function addForSelect() {
		$this->BusinessType->create();
		if (!$this->BusinessType->save($this->request->data)) {
			throw new Exception('The business could not be saved');
		}
		$this->BusinessType->recursive = -1;
		$businessTypes = $this->BusinessType->find('list');
		$this->set(compact('businessTypes'));
	}

}
