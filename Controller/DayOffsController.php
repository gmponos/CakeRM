<?php

App::uses('AppController', 'Controller');

/**
 * DayOffs Controller
 *
 * @property    DayOff $DayOff
 * @package        app.Controller
 */
class DayOffsController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->DayOff->recursive = 0;
		$this->set('dayOffs', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->DayOff->exists($id)) {
			throw new NotFoundException(__('Invalid day off'));
		}
		$this->set('dayOff', $this->DayOff->findById($id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->DayOff->create();
			$this->request->data['DayOff']['user_id'] = $this->Auth->user('id');
			if ($this->DayOff->save($this->request->data)) {
				$this->Flash->set(__('The day off has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The day off could not be saved. Please, try again.'));
			}
		}
		$dayOffTypes = $this->DayOff->DayOffType->find('list');
		$users = $this->DayOff->User->find('list');
		$this->set(compact('users', 'dayOffTypes'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		if (!$this->DayOff->exists($id)) {
			throw new NotFoundException(__('Invalid day off'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->DayOff->save($this->request->data)) {
				$this->Flash->set(__('The day off has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The day off could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['DayOff.' . $this->DayOff->primaryKey => $id]];
			$this->request->data = $this->DayOff->find('first', $options);
		}
		$dayOffTypes = $this->DayOff->DayOffType->find('list');
		$users = $this->DayOff->User->find('list');
		$this->set(compact('users', 'dayOffTypes'));
	}

	/**
	 * related method
	 *
	 * @return void
	 */
	public function related() {

		$query = $this->request->params['named'];
		$dayOffs = $this->DayOff->find('all', ['conditions' => $query]);
		$this->set('day_offs', $dayOffs);
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {

		$this->DayOff->id = $id;
		if (!$this->DayOff->exists()) {
			throw new NotFoundException(__('Invalid day off'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DayOff->delete()) {
			$this->Flash->set(__('The day off has been deleted.'));
		} else {
			$this->Flash->set(__('The day off could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

	public function calendar() {

		$this->viewClass = 'Json';
		$serializeDayOffs = [];
		if ($this->request->is('post')) {
			$fields = [
				'DayOff.id AS id',
				'User.lastname as title',
				"DayOff.start AS start",
				"DayOff.end AS end",
				"User.calendar_background_color AS color",
			];

			$start = date('Y-m-d', $this->request->data['start']);
			$end = date('Y-m-d', $this->request->data['end']);

			$conditions = [
				"DayOff.start >= " => $start,
				"DayOff.start <= " => $end,
			];
			$this->DayOff->recursive = 1;
			$dayOffs = $this->DayOff->find('all', ['fields' => $fields, 'conditions' => $conditions]);
			if (!empty($dayOffs)) {
				foreach ($dayOffs as $dayOff) {
					$serializeDayOffs[] = array_merge($dayOff['DayOff'], $dayOff['User']);
				}
			}
			$this->set('appointments', $serializeDayOffs);
			$this->set('_serialize', 'appointments');
		}
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->DayOff->recursive = 0;
		$this->set('dayOffs', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->DayOff->exists($id)) {
			throw new NotFoundException(__('Invalid day off'));
		}
		$this->set('dayOff', $this->DayOff->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->DayOff->create();
			if ($this->DayOff->save($this->request->data)) {
				$this->Flash->set(__('The day off has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The day off could not be saved. Please, try again.'));
			}
		}
		$dayOffTypes = $this->DayOff->DayOffType->find('list');
		$users = $this->DayOff->User->find('list');
		$this->set(compact('users', 'dayOffTypes'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->DayOff->exists($id)) {
			throw new NotFoundException(__('Invalid day off'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->DayOff->save($this->request->data)) {
				$this->Flash->set(__('The day off has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The day off could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['DayOff.' . $this->DayOff->primaryKey => $id]];
			$this->request->data = $this->DayOff->find('first', $options);
		}
		$dayOffTypes = $this->DayOff->DayOffType->find('list');
		$users = $this->DayOff->User->find('list');
		$this->set(compact('users', 'dayOffTypes'));
	}

	/**
	 * related method
	 *
	 * @return void
	 */
	public function admin_related() {

		$query = $this->request->params['named'];
		$dayOffs = $this->DayOff->find('all', ['conditions' => $query]);
		$this->set('day_offs', $dayOffs);
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {

		$this->DayOff->id = $id;
		if (!$this->DayOff->exists()) {
			throw new NotFoundException(__('Invalid day off'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DayOff->delete()) {
			$this->Flash->set(__('The day off has been deleted.'));
		} else {
			$this->Flash->set(__('The day off could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

}
