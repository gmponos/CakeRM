<?php

App::uses('AppController', 'Controller');

/**
 * Contacts Controller
 *
 * @package		app.Controller
 * @property	Contact $Contact
 */
class ContactsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//we need the recursive for the businesses
		$this->Contact->recursive = 1;
		$this->set('contacts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->set('contact', $this->Contact->findById($id));
	}

/**
 * Popover view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function popover_view($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->set('contact', $this->Contact->findById($id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contact could not be saved. Please, try again.'));
			}
		}
		$businesses = $this->Contact->Business->find('list');
		$businessTypes = $this->Contact->Business->BusinessType->find('list');
		$contactTypes = $this->Contact->ContactType->find('list');
		$departments = $this->Contact->Department->find('list');
		$taxoffices = $this->Contact->Business->Taxoffice->find('list');
		$bankAccounts = $this->Contact->BankAccount->find('list');
		$states = $this->Contact->State->find('list');
		$this->set(compact('businesses', 'businessTypes', 'bankAccounts', 'contactTypes', 'states', 'taxoffices', 'departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contact->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contact could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contact->findById($id);
		}
		$businesses = $this->Contact->Business->find('list');
		$businessTypes = $this->Contact->Business->BusinessType->find('list');
		$contactTypes = $this->Contact->ContactType->find('list');
		$departments = $this->Contact->Department->find('list');
		$taxoffices = $this->Contact->Business->Taxoffice->find('list');
		$states = $this->Contact->State->find('list');
		$cities = $this->Contact->City->findByStateId('list', $this->request->data['Contact']['state_id']);
		$bankAccounts = $this->Contact->BankAccount->find('list');
		$this->set(compact('businesses', 'cities', 'businessTypes', 'contactTypes', 'states', 'taxoffices', 'departments', 'bankAccounts'));
	}

/**
 *
 * @throws NotFoundException
 */
	public function related() {
		$query = $this->request->params['named'];
		$this->set('contacts', $this->Contact->find('all', ['conditions' => $query]));
	}

/**
 * search method
 *
 */
	public function search() {
		$haystack = $this->request->query('haystack');
		$conditions = ['OR' =>
			[
				['Contact.fullname LIKE' => "%$haystack%"],
				['Contact.phones LIKE' => "%$haystack%"],
			]
		];
		$this->Contact->recursive = 1;
		$this->set('contacts', $this->Paginator->paginate($conditions));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		//we need the recursive for the businesses
		$this->Contact->recursive = 1;
		$this->set('contacts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->set('contact', $this->Contact->findById($id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contact could not be saved. Please, try again.'), 'alert', ['alert-danger']);
			}
		}
		$businesses = $this->Contact->Business->find('list');
		$businessTypes = $this->Contact->Business->BusinessType->find('list');
		$contactTypes = $this->Contact->ContactType->find('list');
		$departments = $this->Contact->Department->find('list');
		$taxoffices = $this->Contact->Business->Taxoffice->find('list');
		$states = $this->Contact->State->find('list');
		$bankAccounts = $this->Contact->BankAccount->find('list');
		$this->set(compact('businesses', 'businessTypes', 'contactTypes', 'states', 'taxoffices', 'departments', 'bankAccounts'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contact->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The contact could not be saved. Please, try again.'), 'alert', ['alert-danger']);
			}
		} else {
			$this->request->data = $this->Contact->findById($id);
		}
		$businesses = $this->Contact->Business->find('list');
		$businessTypes = $this->Contact->Business->BusinessType->find('list');
		$contactTypes = $this->Contact->ContactType->find('list');
		$departments = $this->Contact->Department->find('list');
		$taxoffices = $this->Contact->Business->Taxoffice->find('list');
		$states = $this->Contact->State->find('list');
		$cities = $this->Contact->City->findByStateId('list', $this->request->data['Contact']['state_id']);
		$this->set(compact('businesses', 'cities', 'businessTypes', 'contactTypes', 'states', 'taxoffices', 'departments'));
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
		$this->request->onlyAllow('post', 'delete');
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if (!$this->Contact->delete($id, false)) {
			$this->Flash->set(__('Contact was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * show related
 *
 * @throws NotFoundException
 */
	public function admin_related() {
		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('contacts', $this->Contact->find('all', ['conditions' => $query]));
	}

/**
 * admin search method
 *
 */
	public function admin_search() {
		$haystack = $this->request->query('haystack');
		$conditions = ['OR' =>
			[
				['Contact.fullname LIKE' => "%$haystack%"],
				['Contact.phones LIKE' => "%$haystack%"],
			]
		];
		$this->Contact->recursive = 1;
		$this->set('contacts', $this->Paginator->paginate($conditions));
	}

/**
 * modal edit
 *
 * @throws NotFoundException
 */
	public function modal_edit($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		if ($this->request->is(['post', 'put'])) {
			if (!$this->Contact->save($this->request->data)) {
				throw new Exception(__('The Contact could not be saved. Please, try again.'));
			}
			$this->autoRender = false;
		} else {
			$this->Contact->recursive = -1;
			$this->request->data = $this->Contact->findById($id);
			$this->layout = 'modal';
		}
	}

/**
 * ajax view contacts by business for select method
 *
 * @return void
 */
	public function viewByBusinessIdForSelect($id = null) {
		$contacts = $this->Contact->findByBusinessId('list', $id);
		$this->set(compact('contacts'));
	}

/**
 * add_for_select method
 *
 * @return void
 */
	public function addForSelect() {
		$this->Contact->create();
		if (!$this->Contact->save($this->request->data)) {
			throw new NotFoundException(__('Invalid Contact'));
		}
		$contacts = $this->Contact->find('list');
		$this->set(compact('contacts'));
	}

}
