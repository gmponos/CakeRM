<?php

App::uses('AppController', 'Controller');

/**
 * Projects Controller
 *
 * @property Project            $Project
 */
class ProjectsController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->Project->recursive = 0;
		$this->set('projects', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->Project->recursive = 0;
		$this->set('project', $this->Project->findById($id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project could not be saved. Please, try again.'));
			}
		}
		$supervisors = $this->Project->Supervisor->find('list');
		$this->set(compact('supervisors'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Project->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Project.' . $this->Project->primaryKey => $id]];
			$this->request->data = $this->Project->find('first', $options);
		}
		$supervisors = $this->Project->Supervisor->find('list');
		$this->set(compact('supervisors'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Project->recursive = 0;
		$this->set('projects', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->Project->recursive = 0;
		$this->set('project', $this->Project->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project could not be saved. Please, try again.'));
			}
		}
		$supervisors = $this->Project->Supervisor->find('list');
		$this->set(compact('supervisors'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Project->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Project.' . $this->Project->primaryKey => $id]];
			$this->request->data = $this->Project->find('first', $options);
		}
		$supervisors = $this->Project->Supervisor->find('list');
		$this->set(compact('supervisors'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {

		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Project->delete()) {
			$this->Flash->set(__('The project has been deleted.'));
		} else {
			$this->Flash->set(__('The project could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

}
