<?php
App::uses('AppController', 'Controller');
/**
 * Departments Controller
 *
 * @property	Department $Department
 * @package		app.Controller
 */
class DepartmentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Department->recursive = 0;
		$this->set('departments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Department->exists($id)) {
			throw new NotFoundException(__('Invalid department'));
		}
		$options = ['conditions' => ['Department.' . $this->Department->primaryKey => $id]];
		$this->set('department', $this->Department->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Department->create();
			if ($this->Department->save($this->request->data)) {
				$this->Flash->set(__('The department has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The department could not be saved. Please, try again.'));
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
		if (!$this->Department->exists($id)) {
			throw new NotFoundException(__('Invalid department'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Department->save($this->request->data)) {
				$this->Flash->set(__('The department has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The department could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Department.' . $this->Department->primaryKey => $id]];
			$this->request->data = $this->Department->find('first', $options);
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Department->recursive = 0;
		$this->set('departments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Department->exists($id)) {
			throw new NotFoundException(__('Invalid department'));
		}
		$options = ['conditions' => ['Department.' . $this->Department->primaryKey => $id]];
		$this->set('department', $this->Department->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Department->create();
			if ($this->Department->save($this->request->data)) {
				$this->Flash->set(__('The department has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The department could not be saved. Please, try again.'));
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
		if (!$this->Department->exists($id)) {
			throw new NotFoundException(__('Invalid department'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Department->save($this->request->data)) {
				$this->Flash->set(__('The department has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The department could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Department.' . $this->Department->primaryKey => $id]];
			$this->request->data = $this->Department->find('first', $options);
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
		$this->Department->id = $id;
		if (!$this->Department->exists()) {
			throw new NotFoundException(__('Invalid department'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Department->delete()) {
			$this->Flash->set(__('Department deleted'));
			return $this->redirect(['action' => 'index']);
		}
		$this->Flash->set(__('Department was not deleted'));
		$this->redirect(['action' => 'index']);
	}
}
