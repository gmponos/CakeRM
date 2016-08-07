<?php
App::uses('AppController', 'Controller');
/**
 * DayOffTypes Controller
 *
 * @property	DayOffType $DayOffType
 * @package		app.Controller
 */
class DayOffTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DayOffType->recursive = 0;
		$this->set('dayOffTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DayOffType->exists($id)) {
			throw new NotFoundException(__('Invalid day off type'));
		}
		$options = ['conditions' => ['DayOffType.' . $this->DayOffType->primaryKey => $id]];
		$this->set('dayOffType', $this->DayOffType->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DayOffType->recursive = 0;
		$this->set('dayOffTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DayOffType->exists($id)) {
			throw new NotFoundException(__('Invalid day off type'));
		}
		$options = ['conditions' => ['DayOffType.' . $this->DayOffType->primaryKey => $id]];
		$this->set('dayOffType', $this->DayOffType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DayOffType->create();
			if ($this->DayOffType->save($this->request->data)) {
				$this->Flash->set(__('The day off type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The day off type could not be saved. Please, try again.'));
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
		if (!$this->DayOffType->exists($id)) {
			throw new NotFoundException(__('Invalid day off type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->DayOffType->save($this->request->data)) {
				$this->Flash->set(__('The day off type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The day off type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['DayOffType.' . $this->DayOffType->primaryKey => $id]];
			$this->request->data = $this->DayOffType->find('first', $options);
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
		$this->DayOffType->id = $id;
		if (!$this->DayOffType->exists()) {
			throw new NotFoundException(__('Invalid day off type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DayOffType->delete()) {
			$this->Flash->set(__('The day off type has been deleted.'));
		} else {
			$this->Flash->set(__('The day off type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}}
