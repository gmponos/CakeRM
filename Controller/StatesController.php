<?php

App::uses('AppController', 'Controller');

/**
 * States Controller
 *
 * @property	State $State
 * @package		app.Controller
 */
class StatesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('states', $this->State->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		$this->set('state', $this->State->findById($id));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('states', $this->State->find('all'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		$this->set('state', $this->State->findById($id));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->State->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The state could not be saved. Please, try again.'));
			}
		} else {
			$this->State->recursive = -1;
			$this->request->data = $this->State->findById($id);
		}
	}

}
