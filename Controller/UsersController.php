<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{

	/**
	 * beforeFilter method
	 *
	 * @return void
	 */
	public function beforeFilter() {

		parent::beforeFilter();
		//Allow the guest user to register and login
		$this->Auth->allow(
			'register',
			'login',
			'logout',
			'confirm',
			'confirmResend',
			'requestPassword',
			'newPassword',
			'resetPassword'
		);
	}

	/**
	 * Sets the default pagination settings up
	 * Override this method or the index action directly if you want to change
	 * pagination settings.
	 *
	 * @param array $scope
	 * @return array
	 */
	protected function _paginate($scope = []) {

		$whitelist = [
			'User.username',
		];
		$this->Paginator->settings = [
			'conditions' => [
				$this->modelClass . '.active' => 1,
				$this->modelClass . '.verified' => 1,
			],
		];
		$this->User->recursive = 0;
		return $this->Paginator->paginate('User', $scope, $whitelist);
	}

	/**
	 * Sets the default pagination settings up
	 * Override this method or the index() action directly if you want to change
	 * pagination settings. admin_index()
	 *
	 * @param array $scope
	 * @return array
	 */
	protected function _admin_paginate($scope = []) {

		$whitelist = [
			'User.username',
		];
		$this->Paginator->settings = [
			'order' => [
				$this->modelClass . '.created' => 'desc',
			],
		];
		$this->User->recursive = 0;
		return $this->Paginator->paginate('User', $scope, $whitelist);
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->set('users', $this->_paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->findById($id));
	}

	/**
	 * Related method
	 *
	 * @throws NotFoundException
	 */
	public function related() {

		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('users', $this->User->find('all', ['conditions' => $query]));
	}

	/**
	 * personal method
	 *
	 * @throws NotFoundException
	 */
	public function personal() {

		//Check if user exists
		$id = $this->Auth->user('id');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->danger(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->findById($id);
		}
		$bankAccounts = $this->User->BankAccount->find('list');
		$this->set(compact('bankAccounts'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->set('users', $this->_admin_paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->User->create();
			debug($this->request->data);
			if ($this->User->save($this->request->data)) {
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->danger(__('The user could not be saved. Please, try again.'));
			}
		}
		$bankAccounts = $this->User->BankAccount->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups', 'bankAccounts'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 */
	public function admin_edit($id = null) {

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->danger(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->User->recursive = 0;
			$this->request->data = $this->User->findById($id);
		}
		$bankAccounts = $this->User->BankAccount->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups', 'bankAccounts'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 */
	public function admin_delete($id = null) {

		$this->request->allowMethod('post', 'delete');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if (!$this->User->delete()) {
			throw new NotFoundException(__('The user was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * @throws NotFoundException
	 */
	public function admin_related() {

		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('users', $this->User->find('all', ['conditions' => $query]));
	}

	/**
	 * register method
	 */
	public function register() {

		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data = $this->User->beforeRegister($this->request->data);
			if ($this->User->save($this->request->data)) {
				$user = $this->User->findById($this->User->getLastInsertID());
				$this->_sendConfirmEmail($user);
				$this->Flash->success(__('The registration was successful. Check your email to confirm your account'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->danger(__('The user could not be registered. Please, try again.'));
			}
		}
	}

	/**
	 * confirm account
	 *
	 * @param int    $id
	 * @param string $emailToken
	 */
	public function confirm($id, $emailToken) {

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->verifyEmailToken($emailToken)) {
			$this->User->saveField('active', true);
			$this->User->saveField('verified', true);
		}
	}

	/**
	 * Resend the email for the user to verify it account
	 */
	public function confirmResend() {

		if ($this->request->is('post')) {
			$email = $this->request->data['User']['email'];
			$user = $this->User->findByEmail($email);

			if (empty($user)) {
				$this->Flash->danger(sprintf(__('There is no user with %s email'), $email));
				return;
			}

			if ($user['User']['verified'] == true) {
				$this->Flash->danger(sprintf(__('The user with email %s is already verified'), $email));
				return;
			}

			if (!$this->User->verifyEmailToken($user['User']['token_email'])) {
				$this->Flash->danger(__('Confirmation email can not be resend for technical issues. Please contact admin'));
				return;
			}
			$this->_sendConfirmEmail($user);
			$this->Flash->success(__('You have 24 hours to confirm your account'));
		}
	}

	/**
	 * Used for logged in user to change their password.
	 *
	 * @param int    $id
	 * @param string $token
	 * @throws NotFoundException
	 */
	public function changePassword($id, $token = null) {

		$this->User->id = $this->Auth->user('id');
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post')) {
			if (!$this->User->verifyToken($token)) {
				$this->Flash->danger(__('The user token is incorrect. The password is not saved.'));
				return $this->redirect(['action' => 'index']);
			}
			if ($this->User->changePassword($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->danger(__('The user password could not be changed. Please, try again.'));
			}
		}
		$this->set('token', $this->User->field('token'));
		$this->set('id', $id);
	}

	/**
	 * Reset password for users that are not logged in
	 *
	 * @return null
	 */
	public function resetPassword() {

		if ($this->request->is('post')) {
			$email = $this->request->data['User']['email'];
			$user = $this->User->findByEmail($email);
			if (empty($user)) {
				$this->Flash->danger(sprintf(__('There is no user with %s email'), $email));
			} else {
				$user['User']['token_email'] = $token = $this->User->generateToken();
				$user['User']['token_email_expires'] = $time = $this->User->tokenExpirationTime();
				$this->User->set($user);
				$this->User->saveField('token_email', $token);
				$this->User->saveField('token_email_expires', $time);
				$this->_sendResetPasswordEmail($user);
				$this->Flash->success(__('You have 24 hours to reset your password'));
				return $this->redirect(['action' => 'login']);
			}
		}
	}

	/**
	 * New password
	 *
	 * @param int    $id
	 * @param string $emailToken
	 * @throws NotFoundException
	 */
	public function newPassword($id, $emailToken) {

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if (!$this->User->verifyEmailToken($emailToken)) {
			throw new NotFoundException(__('The page you are trying to show is invalid'));
		}
		if ($this->request->is('post')) {
			$this->User->savePassword($this->request->data['User']['password']);
			return $this->redirect(['action' => 'login']);
		}
		$this->set('token', $emailToken);
		$this->set('id', $id);
	}

	/**
	 * Renew the expiration date of token
	 *
	 * @param int $id
	 * @return null
	 * @throws NotFoundException
	 */
	public function admin_renewToken($id = null) {

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->renewToken()) {
			$this->Flash->success(__('The token expires in 24 hours.'));
		} else {
			$this->Flash->danger(__('The token could not be updated'));
		}
		return $this->redirect($this->referer());
	}

	/**
	 * Renew the expiration date of email token
	 *
	 * @param int $id
	 * @throws NotFoundException
	 */
	public function admin_renewTokenEmail($id = null) {

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->renewTokenEmail()) {
			$this->Flash->success(__('The token email expires in 24 hours.'));
		} else {
			$this->Flash->danger(__('The token email could not be updated'));
		}
		$this->redirect($this->referer());
	}

	/**
	 * login method
	 */
	public function login() {

		if (AuthComponent::user()) {
			return $this->redirect('/dashboard');
		}
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$data['Login']['IP'] = $this->request->clientIp();
				$data['Login']['browser'] = env('HTTP_USER_AGENT');
				$data['Login']['user_id'] = $this->Auth->user('id');
				$this->User->afterLogin($data);
				return $this->redirect('/dashboard');
			} else {
				$this->Flash->danger('Your username or password was incorrect.');
			}
		}
	}

	/**
	 * Common logout action
	 *
	 * @return void
	 */
	public function logout() {

		$user = $this->Auth->user();
		$this->Session->destroy();
		$this->Flash->warning(sprintf(__('%s you have successfully logged out'), $user[$this->User->displayField]));
		$this->redirect($this->Auth->logout());
	}

	/**
	 * _sendRegisterEmail method
	 *
	 * @param array $user
	 */
	protected function _sendConfirmEmail($user = []) {

		$Email = new CakeEmail('default');
		$Email->subject(sprintf(__('Welcome %s to CRM'), $user['User']['fullname']));
		$Email->viewVars(['user' => $user]);
		$Email->template('confirm', 'view');
		$Email->to($user['User']['email']);
		$Email->emailFormat('html');
		$Email->send();
	}

	/**
	 * _sendRegisterEmail method
	 *
	 * @param array $user
	 */
	protected function _sendResetPasswordEmail($user = []) {

		$Email = new CakeEmail('default');
		$Email->subject(sprintf(__('Reset password %s'), $user['User']['fullname']));
		$Email->template('reset_password', 'view');
		$Email->to($user['User']['email']);
		$Email->viewVars(['user' => $user]);
		$Email->emailFormat('html');
		$Email->send();
	}
}
