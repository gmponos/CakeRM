<?php

App::uses('AppController', 'Controller');

/**
 * ContactTypes Controller
 *
 * @property	ContactType $ContactType
 * @package		app.Controller
 */
class ContactTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContactType->recursive = 0;
		$this->set('contactTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ContactType->exists($id)) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		$this->ContactType->recursive = 2;
		$this->set('contactType', $this->ContactType->findById($id));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ContactType->recursive = 0;
		$this->set('contactTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ContactType->exists($id)) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		$this->set('contactType', $this->ContactType->findById($id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ContactType->create();
			if ($this->ContactType->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contact type could not be saved. Please, try again.'));
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
		if (!$this->ContactType->exists($id)) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContactType->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contact type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContactType->findById($id);
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
		if (!$this->ContactType->exists($id)) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		if (!$this->ContactType->delete($id)) {
			$this->Flash->set(__('Contact type is not deleted'));
		}
		$this->autoRender = false;
	}

}
