<?php

App::uses('AppController', 'Controller');

/**
 * Repairs Controller
 *
 * @property    Repair $Repair
 * @package        app.Controller
 */
class RepairsController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$scope = $this->_buildQueryString();
		$this->Repair->recursive = 0;
		$repairedUsers = $this->Repair->RepairedUser->find('list');
		$businesses = $this->Repair->Business->find('list');
		$contacts = $this->Repair->Contact->find('list');

		$this->set(compact('repairedUsers', 'contacts', 'businesses'));
		$whitelist = [
			'Repair.created',
		];
		$this->set('repairs', $this->Paginator->paginate('Repair', $scope, $whitelist));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		$this->Repair->recursive = -1;
		if (!$this->Repair->exists($id)) {
			throw new NotFoundException(__('Invalid repair'));
		}
		$repair = $this->Repair->find('first', [
			'conditions' => [
				'Repair.id' => $id,
			],
			'contain' => [
				'Contact',
				'Business',
				'RepairedUser',
				'UpdatedUser' => ['id', 'fullname'],
				'CreatedUser' => ['id', 'fullname'],
			],
		]);
		$this->set('repair', $repair);
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Repair->create();
			if ($this->Repair->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The repair could not be saved. Please, try again.'));
			}
		}
		$repairedUsers = $this->Repair->RepairedUser->find('list');
		$businesses = $this->Repair->Business->find('list');
		$contacts = $this->Repair->Contact->find('list');
		$states = $this->Repair->Business->State->find('list');
		$taxoffices = $this->Repair->Business->Taxoffice->find('list');
		$contactTypes = $this->Repair->Contact->ContactType->find('list');
		$businessTypes = $this->Repair->Business->BusinessType->find('list');
		$this->set(compact('repairedUsers', 'contacts', 'businesses', 'states', 'taxoffices', 'businessTypes',
			'contactTypes'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		if (!$this->Repair->exists($id)) {
			throw new NotFoundException(__('Invalid repair'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Repair->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The repair could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Repair->findById($id);
		}
		$repairedUsers = $this->Repair->RepairedUser->find('list');
		$businesses = $this->Repair->Business->find('list');
		$contacts = $this->Repair->Contact->find('list');
		$this->set(compact('repairedUsers', 'businesses', 'contacts'));
	}

	/**
	 * @throws NotFoundException
	 */
	public function related() {

		$query = $this->passedArgs;
		$this->set('repairs', $this->Repair->find('all', ['conditions' => $query]));
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$scope = $this->_buildQueryString();
		$this->Repair->recursive = 0;
		$repairedUsers = $this->Repair->RepairedUser->find('list');
		$businesses = $this->Repair->Business->find('list');
		$contacts = $this->Repair->Contact->find('list');

		$this->set(compact('repairedUsers', 'contacts', 'businesses'));
		$whitelist = [
			'Repair.created',
		];
		$this->set('repairs', $this->Paginator->paginate('Repair', $scope, $whitelist));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Repair->exists($id)) {
			throw new NotFoundException(__('Invalid repair'));
		}
		$this->set('repair', $this->Repair->findById($id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Repair->create();
			if ($this->Repair->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The repair could not be saved. Please, try again.'));
			}
		}
		$repairedUsers = $this->Repair->RepairedUser->find('list');
		$businesses = $this->Repair->Business->find('list');
		$contacts = $this->Repair->Contact->find('list');
		$states = $this->Repair->Business->State->find('list');
		$taxoffices = $this->Repair->Business->Taxoffice->find('list');
		$contactTypes = $this->Repair->Contact->ContactType->find('list');
		$businessTypes = $this->Repair->Business->BusinessType->find('list');
		$this->set(compact('repairedUsers', 'contacts', 'businesses', 'states', 'taxoffices', 'businessTypes',
			'contactTypes'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->Repair->exists($id)) {
			throw new NotFoundException(__('Invalid repair'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Repair->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The repair could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Repair->findById($id);
		}
		$repairedUsers = $this->Repair->RepairedUser->find('list');
		$businesses = $this->Repair->Business->find('list');
		$contacts = $this->Repair->Contact->find('list');
		$this->set(compact('repairedUsers', 'businesses', 'contacts'));
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

		$this->request->allowMethod('post', 'delete');
		if (!$this->Repair->exists($id)) {
			throw new NotFoundException(__('Invalid repair'));
		}
		if (!$this->Repair->delete($id)) {
			$this->Flash->set(__('Repair was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * Admin related method
	 *
	 * @throws NotFoundException
	 */
	public function admin_related() {

		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('repairs', $this->Repair->find('all', ['conditions' => $query]));
	}

	/**
	 * mail method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int $id
	 * @return void
	 */
	public function mail($id) {

		$this->Repair->id = $id;
		if (!$this->Repair->exists()) {
			throw new NotFoundException(__('Invalid repair'));
		}

		$repair = $this->Repair->findById($id);
		$subject = $this->name . ' #' . $id;
		$Email = new CakeEmail('default');
		$Email->subject($subject);
		$Email->viewVars(['repair' => $repair]);
		$Email->template('repairs/view', 'view');
		$Email->emailFormat('html');
		if ($Email->send()) {
			$data = ['emailed' => true, 'updated' => $repair['Repair']['updated']];
			$this->Repair->save($data, ['callbacks' => false]);
		}
		//Do not render a view file.
		$this->autoRender = false;
	}

	/**
	 * mail index report method
	 * This method sends an email about the repairs the current user repaired
	 * and received today.
	 *
	 * @return void
	 */
	public function mailReport() {

		$Email = new CakeEmail('default');
		$Email->subject(sprintf(__('Report: %s From %s'), date('Ymd'), $this->Auth->user('fullname')));
		$Email->viewVars(['repairs' => $this->Repair->find('report')]);
		$Email->template('repairs/index', 'index');
		$Email->emailFormat('html');
		$Email->send();
		//Do not render a view file.
		$this->autoRender = false;
	}

}
