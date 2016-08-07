<?php

App::uses('AppController', 'Controller');

/**
 * TaskTypes Controller
 *
 * @property	TaskType $TaskType
 * @package		app.Controller
 */
class TaskTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TaskType->recursive = 0;
		$this->set('taskTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TaskType->exists($id)) {
			throw new NotFoundException(__('Invalid task type'));
		}
		$this->set('taskType', $this->TaskType->findById($id));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TaskType->recursive = 0;
		$this->set('taskTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TaskType->exists($id)) {
			throw new NotFoundException(__('Invalid task type'));
		}
		$this->set('taskType', $this->TaskType->findById($id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TaskType->create();
			if ($this->TaskType->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The task type could not be saved. Please, try again.'));
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
		if (!$this->TaskType->exists($id)) {
			throw new NotFoundException(__('Invalid task type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TaskType->save($this->request->data)) {
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The task type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['TaskType.' . $this->TaskType->primaryKey => $id]];
			$this->request->data = $this->TaskType->find('first', $options);
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
		$this->TaskType->id = $id;
		if (!$this->TaskType->exists()) {
			throw new NotFoundException(__('Invalid task type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TaskType->delete()) {
			$this->Flash->set(__('Task type deleted'));
			$this->redirect(['action' => 'index']);
		}
		$this->Flash->set(__('Task type was not deleted'));
		$this->redirect(['action' => 'index']);
	}

}
