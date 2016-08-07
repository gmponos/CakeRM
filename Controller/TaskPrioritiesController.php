<?php

App::uses('AppController', 'Controller');

/**
 * TaskPriorities Controller
 *
 * @property	TaskPriority $TaskPriority
 * @package		app.Controller
 */
class TaskPrioritiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TaskPriority->recursive = 0;
		$this->set('taskPriorities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TaskPriority->exists($id)) {
			throw new NotFoundException(__('Invalid task priority'));
		}
		$this->set('taskPriority', $this->TaskPriority->findById($id));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TaskPriority->recursive = 0;
		$this->set('taskPriorities', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TaskPriority->exists($id)) {
			throw new NotFoundException(__('Invalid task priority'));
		}
		$options = ['conditions' => ['TaskPriority.' . $this->TaskPriority->primaryKey => $id]];
		$this->set('taskPriority', $this->TaskPriority->find('first', $options));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TaskPriority->exists($id)) {
			throw new NotFoundException(__('Invalid task priority'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TaskPriority->save($this->request->data)) {
				$this->Flash->set(__('The task priority has been saved'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The task priority could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TaskPriority->findById($id);
		}
	}

}
