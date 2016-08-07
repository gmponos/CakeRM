<?php

App::uses('AppController', 'Controller');

/**
 * TaskActions Controller
 *
 * @property TaskAction $TaskAction
 */
class TaskActionsController extends AppController {

/**
 * Returns the related tasks. If no query is given to filter the results
 * then it throws an exception.
 *
 * @throws NotFoundException
 */
	public function related($task_id) {
		$this->set('task_id', $task_id);
		$this->set('taskActions', $this->TaskAction->findAllByTaskId($task_id));
	}

/**
 * Returns the related tasks. If no query is given to filter the results
 * then it throws an exception.
 *
 * @throws NotFoundException
 */
	public function admin_related($task_id) {
		$this->set('task_id', $task_id);
		$this->set('taskActions', $this->TaskAction->findAllByTaskId($task_id));
	}

/**
 *
 * @return type
 * @throws NotFoundException
 */
	public function addForRelated($task_id) {
		if ($this->request->is('post')) {
			$this->TaskAction->create();
			$this->request->data['TaskAction']['task_id'] = $task_id;
			if (!$this->TaskAction->save($this->request->data)) {
				$this->Flash->set(__('The task action could not be saved. Please, try again.'));
			}
		}
		$task_actions = $this->TaskAction->findAllByTaskId($task_id);
		$this->set('taskActions', $task_actions);
		$this->set('task_id', $task_id);
		$this->view = 'admin_related';
	}

/**
 *
 * @return type
 * @throws NotFoundException
 */
	public function admin_addForRelated($task_id) {
		if ($this->request->is('post')) {
			$this->TaskAction->create();
			$this->request->data['TaskAction']['task_id'] = $task_id;
			if (!$this->TaskAction->save($this->request->data)) {
				$this->Flash->set(__('The task action could not be saved. Please, try again.'));
			}
		}
		$task_actions = $this->TaskAction->findAllByTaskId($task_id);
		$this->set('taskActions', $task_actions);
		$this->set('task_id', $task_id);
		$this->view = 'admin_related';
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TaskAction->exists($id)) {
			throw new NotFoundException(__('Invalid task action'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->TaskAction->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The task action could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['TaskAction.' . $this->TaskAction->primaryKey => $id]];
			$this->request->data = $this->TaskAction->find('first', $options);
		}
		$tasks = $this->TaskAction->Task->find('list');
		$modifiedUsers = $this->TaskAction->ModifiedUser->find('list');
		$this->set(compact('tasks', 'modifiedUsers'));
	}
/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $task_id = null) {
		$this->request->onlyAllow('post', 'delete');
		if (!$this->TaskAction->exists($id)) {
			throw new NotFoundException(__('Invalid task action'));
		}
		if (!$this->TaskAction->delete($id)) {
			throw new NotFoundException(__('Task Action is not deleted'));
		}
		return $this->redirect(['action' => 'related', $task_id]);
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null, $task_id = null) {
		$this->request->onlyAllow('post', 'delete');
		if (!$this->TaskAction->exists($id)) {
			throw new NotFoundException(__('Invalid task action'));
		}
		if (!$this->TaskAction->delete($id)) {
			throw new NotFoundException(__('Task Action is not deleted'));
		}
		return $this->redirect(['action' => 'related', $task_id]);
	}

}
