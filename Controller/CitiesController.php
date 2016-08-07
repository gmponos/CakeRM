<?php

App::uses('AppController', 'Controller');

/**
 * Cities Controller
 *
 * @property    City $City
 * @package        app.Controller
 */
class CitiesController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->City->recursive = 0;
		$this->set('cities', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		$this->City->recursive = 0;
		$this->set('city', $this->City->findById($id));
		$this->set('businesses', $this->City->Business->findAllByCityId($id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				$this->Flash->set(__('The city has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The city could not be saved. Please, try again.'));
			}
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->City->save($this->request->data)) {
				$this->Flash->set(__('The city has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The city could not be saved. Please, try again.'));
			}
		} else {
			$this->City->recursive = -1;
			$this->request->data = $this->City->findById($id);
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
	}

	/**
	 * @throws NotFoundException
	 */
	public function related() {

		$query = $this->request->params['named'];
		$query = array_diff($query, ['']);
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('cities', $this->City->find('all', ['conditions' => $query]));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->City->recursive = 0;
		$this->set('cities', $this->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		$this->City->recursive = 0;
		$this->set('city', $this->City->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The city could not be saved. Please, try again.'));
			}
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->City->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The city could not be saved. Please, try again.'));
			}
		} else {
			$this->City->recursive = -1;
			$this->request->data = $this->City->findById($id);
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
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
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		if (!$this->City->delete($id)) {
			$this->Flash->set(__('City is not deleted'));
		}
		$this->autoRender = false;
	}

	/**
	 * admin_related method
	 *
	 * @throws NotFoundException
	 */
	public function admin_related() {

		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('cities', $this->City->find('all', ['conditions' => $query]));
	}

	/**
	 * add method for select
	 *
	 * @throws Exception
	 * @return void
	 */
	public function addForSelect() {

		//Prevent users from accessing it directly.
		if (!$this->request->is('ajax')) {
			return $this->redirect(['action' => 'index']);
		}
		$this->City->create();
		if (!$this->City->save($this->request->data)) {
			throw new Exception('The city could not be saved');
		}
		$cities = $this->City->findByStateId('list', $this->request->data('City.state_id'));
		$this->set(compact('cities'));
	}

	/**
	 * View cities by state. This function is most used when the user
	 * selects a state through a select box.
	 *
	 * @param type $state_id
	 */
	public function viewByStateIdForSelect($state_id = null) {

		$cities = $this->City->findByStateId('list', $state_id);
		$this->set(compact('cities'));
	}

}
