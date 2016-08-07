<?php
App::uses('AppController', 'Controller');
/**
 * Channels Controller

 *
 * @property	Channel $Channel
 * @package		app.Controller
 */
class ChannelsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Channel->recursive = 0;
		$this->set('channels', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Channel->exists($id)) {
			throw new NotFoundException(__('Invalid channel'));
		}
		$options = ['conditions' => ['Channel.' . $this->Channel->primaryKey => $id]];
		$this->set('channel', $this->Channel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Channel->create();
			if ($this->Channel->save($this->request->data)) {
				$this->Flash->set(__('The channel has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The channel could not be saved. Please, try again.'));
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
		if (!$this->Channel->exists($id)) {
			throw new NotFoundException(__('Invalid channel'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Channel->save($this->request->data)) {
				$this->Flash->set(__('The channel has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The channel could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Channel.' . $this->Channel->primaryKey => $id]];
			$this->request->data = $this->Channel->find('first', $options);
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Channel->recursive = 0;
		$this->set('channels', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Channel->exists($id)) {
			throw new NotFoundException(__('Invalid channel'));
		}
		$options = ['conditions' => ['Channel.' . $this->Channel->primaryKey => $id]];
		$this->set('channel', $this->Channel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Channel->create();
			if ($this->Channel->save($this->request->data)) {
				$this->Flash->set(__('The channel has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The channel could not be saved. Please, try again.'));
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
		if (!$this->Channel->exists($id)) {
			throw new NotFoundException(__('Invalid channel'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Channel->save($this->request->data)) {
				$this->Flash->set(__('The channel has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The channel could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Channel.' . $this->Channel->primaryKey => $id]];
			$this->request->data = $this->Channel->find('first', $options);
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
		$this->Channel->id = $id;
		if (!$this->Channel->exists()) {
			throw new NotFoundException(__('Invalid channel'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Channel->delete()) {
			$this->Flash->set(__('The channel has been deleted.'));
		} else {
			$this->Flash->set(__('The channel could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}}
