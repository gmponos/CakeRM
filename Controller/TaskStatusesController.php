<?php
App::uses('AppController', 'Controller');
/**
 * TaskStatus Controller
 *
 * @property	TaskStatus $TaskStatus
 * @package		app.Controller
 */
class TaskStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TaskStatus->recursive = 0;
		$this->set('taskStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TaskStatus->exists($id)) {
			throw new NotFoundException(__('Invalid task status'));
		}
				$this->TaskStatus->recursive = 2;
		$options = ['conditions' => ['TaskStatus.' . $this->TaskStatus->primaryKey => $id]];
		$this->set('taskStatus', $this->TaskStatus->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TaskStatus->recursive = 0;
		$this->set('taskStatuses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TaskStatus->exists($id)) {
			throw new NotFoundException(__('Invalid task status'));
		}
		$options = ['conditions' => ['TaskStatus.' . $this->TaskStatus->primaryKey => $id]];
		$this->set('taskStatus', $this->TaskStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TaskStatus->create();
			if ($this->TaskStatus->save($this->request->data)) {
				$this->Flash->set(__('The task status has been saved'));
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The task status could not be saved. Please, try again.'));
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
		if (!$this->TaskStatus->exists($id)) {
			throw new NotFoundException(__('Invalid task status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TaskStatus->save($this->request->data)) {
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The task status could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['TaskStatus.' . $this->TaskStatus->primaryKey => $id]];
			$this->request->data = $this->TaskStatus->find('first', $options);
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
		$this->TaskStatus->id = $id;
		if (!$this->TaskStatus->exists()) {
			throw new NotFoundException(__('Invalid task status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TaskStatus->delete()) {
			$this->redirect(['action' => 'index']);
		}
		$this->Flash->set(__('Task status was not deleted'));
		$this->redirect(['action' => 'index']);
	}

}
