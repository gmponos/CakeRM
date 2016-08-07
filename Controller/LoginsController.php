<?php

App::uses('AppController', 'Controller');

/**
 * Logins Controller
 *
 * @property Login $Login
 */
class LoginsController extends AppController
{

	/**
	 * Show the related data
	 */
	public function related() {

		$query = $this->request->params['named'];
		$this->set('logins', $this->Login->find('all', ['conditions' => $query]));
	}

	/**
	 * admin_index method
	 */
	public function admin_index() {

		$this->Login->recursive = 0;
		$this->set('logins', $this->Paginator->paginate());
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 */
	public function admin_delete($id = null) {

		$this->request->allowMethod('post', 'delete');
		$this->Login->id = $id;
		if (!$this->Login->exists()) {
			throw new NotFoundException(__('Invalid login'));
		}
		if (!$this->Login->delete($id)) {
			throw new NotFoundException(__('Login was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect([
			'controller' => 'logins',
			'action' => 'index',
		]);
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @param string $user_id
	 */
	public function admin_delete_related($id, $user_id) {

		$this->request->allowMethod('post', 'delete');
		$this->Login->id = $id;
		if (!$this->Login->exists()) {
			throw new NotFoundException(__('Invalid login'));
		}
		if (!$this->Login->delete($id)) {
			throw new NotFoundException(__('Login was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect([
				'plugin' => false,
				'controller' => 'logins',
				'action' => 'related',
				'user_id' => $user_id,
			]);
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * admin delete all the logins method
	 *
	 * @throws NotFoundException
	 */
	public function admin_deleteAll() {

		$this->request->allowMethod('post', 'delete');
		$user_id = AuthComponent::user('id');
		if (!$this->Login->deleteAll(['user_id' => $user_id])) {
			throw new NotFoundException(__('Login was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * admin related method
	 */
	public function admin_related() {

		$query = $this->request->params['named'];
		$this->set('logins', $this->Login->find('all', ['conditions' => $query]));
	}
}
