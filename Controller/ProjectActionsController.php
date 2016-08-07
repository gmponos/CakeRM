<?php
App::uses('AppController', 'Controller');

/**
 * ProjectActions Controller
 *
 * @property ProjectAction      $ProjectAction
 */
class ProjectActionsController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->ProjectAction->recursive = 0;
		$this->set('projectActions', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->ProjectAction->exists($id)) {
			throw new NotFoundException(__('Invalid project action'));
		}
		$options = ['conditions' => ['ProjectAction.' . $this->ProjectAction->primaryKey => $id]];
		$this->set('projectAction', $this->ProjectAction->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->ProjectAction->create();
			if ($this->ProjectAction->save($this->request->data)) {
				$this->Flash->set(__('The project action has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project action could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectAction->Project->find('list');
		$modifiedUsers = $this->ProjectAction->ModifiedUser->find('list');
		$this->set(compact('projects', 'modifiedUsers'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		if (!$this->ProjectAction->exists($id)) {
			throw new NotFoundException(__('Invalid project action'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->ProjectAction->save($this->request->data)) {
				$this->Flash->set(__('The project action has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project action could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['ProjectAction.' . $this->ProjectAction->primaryKey => $id]];
			$this->request->data = $this->ProjectAction->find('first', $options);
		}
		$projects = $this->ProjectAction->Project->find('list');
		$modifiedUsers = $this->ProjectAction->ModifiedUser->find('list');
		$this->set(compact('projects', 'modifiedUsers'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {

		$this->ProjectAction->id = $id;
		if (!$this->ProjectAction->exists()) {
			throw new NotFoundException(__('Invalid project action'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectAction->delete()) {
			$this->Flash->set(__('The project action has been deleted.'));
		} else {
			$this->Flash->set(__('The project action could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->ProjectAction->recursive = 0;
		$this->set('projectActions', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->ProjectAction->exists($id)) {
			throw new NotFoundException(__('Invalid project action'));
		}
		$options = ['conditions' => ['ProjectAction.' . $this->ProjectAction->primaryKey => $id]];
		$this->set('projectAction', $this->ProjectAction->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->ProjectAction->create();
			if ($this->ProjectAction->save($this->request->data)) {
				$this->Flash->set(__('The project action has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project action could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectAction->Project->find('list');
		$modifiedUsers = $this->ProjectAction->ModifiedUser->find('list');
		$this->set(compact('projects', 'modifiedUsers'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->ProjectAction->exists($id)) {
			throw new NotFoundException(__('Invalid project action'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->ProjectAction->save($this->request->data)) {
				$this->Flash->set(__('The project action has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project action could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['ProjectAction.' . $this->ProjectAction->primaryKey => $id]];
			$this->request->data = $this->ProjectAction->find('first', $options);
		}
		$projects = $this->ProjectAction->Project->find('list');
		$modifiedUsers = $this->ProjectAction->ModifiedUser->find('list');
		$this->set(compact('projects', 'modifiedUsers'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {

		$this->ProjectAction->id = $id;
		if (!$this->ProjectAction->exists()) {
			throw new NotFoundException(__('Invalid project action'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectAction->delete()) {
			$this->Flash->set(__('The project action has been deleted.'));
		} else {
			$this->Flash->set(__('The project action could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
