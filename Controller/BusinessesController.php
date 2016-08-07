<?php

App::uses('AppController', 'Controller');

/**
 * Businesses Controller
 *
 * @package  app.Controller
 * @property Business $Business
 */
class BusinessesController extends AppController {

	/**
	 * Helpers
	 *
	 * @var array
	 */
	public $helpers = [
		'CakeMap.CakeMap',
	];

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$conditions = $this->_buildQueryString();
		$this->Business->recursive = 0;
		$businessTypes = $this->Business->BusinessType->find('list');
		$states = $this->Business->State->find('list');
		$cities = $this->Business->City->find('list');
		$taxoffices = $this->Business->Taxoffice->find('list');
		$this->set(compact('businessTypes', 'states', 'cities', 'taxoffices'));
		$this->set('businesses', $this->paginate('Business', $conditions));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		$this->Business->recursive = 2;
		$this->set('referer', $this->referer());
		$this->set('business', $this->Business->findById($id));
	}

	/**
	 * add method
	 *
	 * @throws Exception
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Business->create();
			if ($this->Business->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->set(__('The business could not be saved. Please, try again.'));
		}
		$taxoffices = $this->Business->Taxoffice->find('list');
		$states = $this->Business->State->find('list');
		$contacts = $this->Business->Contact->find('list');
		$businessTypes = $this->Business->BusinessType->find('list');
		$contactTypes = $this->Business->Contact->ContactType->find('list');
		$contractTypes = $this->Business->Contract->ContractType->find('list');
		$departments = $this->Business->Contact->Department->find('list');
		$bankAccounts = $this->Business->BankAccount->find('list');
		$this->set(compact('businessTypes', 'states', 'bankAccounts', 'taxoffices', 'contacts', 'contactTypes', 'contractTypes', 'departments'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Business->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The business could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Business->findById($id);
		}
		if (!empty($this->request->data['Business']['state_id'])) {
			$cities = $this->Business->City->findByStateId('list', $this->request->data('Business.state_id'));
		}
		$taxoffices = $this->Business->Taxoffice->find('list');
		$states = $this->Business->State->find('list');
		$contacts = $this->Business->Contact->find('list');
		$businessTypes = $this->Business->BusinessType->find('list');
		$contactTypes = $this->Business->Contact->ContactType->find('list');
		$departments = $this->Business->Contact->Department->find('list');
		$this->set(compact('businessTypes', 'states', 'taxoffices', 'contacts', 'contactTypes', 'departments', 'cities'));
	}

	/**
	 * Related method
	 * we use the named parameters to query the related because we need
	 * to pass the model too.
	 *
	 * @throws NotFoundException
	 */
	public function related() {
		$query = $this->request->params['named'];
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('businesses', $this->Business->find('all', ['conditions' => $query]));
	}

	/**
	 * search method
	 *
	 * @return void
	 */
	public function search() {
		$haystack = $this->request->query('haystack');
		$conditions = ['OR' =>
			[
				['Business.firm LIKE' => "%$haystack%"],
				['Business.business LIKE' => "%$haystack%"],
				['Business.phones LIKE' => "%$haystack%"],
				['Business.afm LIKE' => "%$haystack%"],
			],
		];
		$businessTypes = $this->Business->BusinessType->find('list');
		$states = $this->Business->State->find('list');
		$cities = $this->Business->City->find('list');
		$taxoffices = $this->Business->Taxoffice->find('list');
		$this->Business->recursive = 0;
		$this->set(compact('businessTypes', 'states', 'cities', 'taxoffices'));
		$this->set('businesses', $this->Paginator->paginate($conditions));
	}

	/**
	 * exports the businesses in a csv file
	 *
	 * @return void
	 */
	public function export() {
		$options['conditions'] = $this->_buildQueryString();
		$options['fields'] = [
			'Business.id',
			'Business.firm',
			'Business.business',
			'Business.phone_one',
			'Business.phone_two',
			'State.name',
			'City.name',
			'Business.address',
			'Taxoffice.name',
			'Business.afm',
		];
		$this->Business->recursive = 0;
		$data = $this->Business->find('all', $options);
		$this->Csv->export($data);
	}

	/**
	 * Render an element of map for ajax remote use
	 *
	 * @param int $id
	 * @throws NotFoundException
	 */
	public function map($id = null) {
		//Prevent users from accessing it directly.
		if (!$this->request->is('ajax')) {
			return $this->redirect(['action' => 'index']);
		}
		//Throw exception if no id is inserted.
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		$this->Business->recursive = 0;
		$this->set('business', $this->Business->findById($id));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$conditions = $this->_buildQueryString();
		$this->Business->recursive = 0;
		$businessTypes = $this->Business->BusinessType->find('list');
		$states = $this->Business->State->find('list');
		$cities = $this->Business->City->find('list');
		$taxoffices = $this->Business->Taxoffice->find('list');
		$this->set(compact('businessTypes', 'states', 'cities', 'taxoffices'));
		$this->set('businesses', $this->paginate('Business', $conditions));
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		$this->Business->recursive = 2;
		$this->set('business', $this->Business->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Business->create();
			if ($this->Business->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The business could not be saved. Please, try again.'));
			}
		}
		$taxoffices = $this->Business->Taxoffice->find('list');
		$states = $this->Business->State->find('list');
		$contacts = $this->Business->Contact->find('list');
		$businessTypes = $this->Business->BusinessType->find('list');
		$contactTypes = $this->Business->Contact->ContactType->find('list');
		$departments = $this->Business->Contact->Department->find('list');
		$contractTypes = $this->Business->Contract->ContractType->find('list');
		$bankAccounts = $this->Business->BankAccount->find('list');
		$this->set(compact('businessTypes', 'states', 'taxoffices', 'contacts', 'bankAccounts', 'contactTypes', 'contractTypes', 'departments'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Business->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The business could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Business->findById($id);
		}
		if (!empty($this->request->data['Business']['state_id'])) {
			$cities = $this->Business->City->findByStateId('list', $this->request->data('Business.state_id'));
		}
		$taxoffices = $this->Business->Taxoffice->find('list');
		$states = $this->Business->State->find('list');
		$contacts = $this->Business->Contact->find('list');
		$businessTypes = $this->Business->BusinessType->find('list');
		$contactTypes = $this->Business->Contact->ContactType->find('list');
		$departments = $this->Business->Contact->Department->find('list');
		$bankAccounts = $this->Business->BankAccount->find('list');
		$this->set(compact('businessTypes', 'states', 'taxoffices', 'contacts', 'contactTypes', 'departments', 'cities'));
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
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		if (!$this->Business->delete($id)) {
			$this->Flash->set(__('Business is not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * admin related method
	 *
	 * @throws NotFoundException
	 */
	public function admin_related() {
		$query = $this->request->query;
		if (empty($query)) {
			throw new NotFoundException('No Parameters');
		}
		$this->set('businesses', $this->Business->find('all', ['conditions' => $query]));
	}

	/**
	 * method admin search
	 */
	public function admin_search() {
		$haystack = $this->request->query('haystack');
		$conditions = ['OR' =>
			[
				['Business.firm LIKE' => "%$haystack%"],
				['Business.business LIKE' => "%$haystack%"],
				['Business.phones LIKE' => "%$haystack%"],
				['Business.afm LIKE' => "%$haystack%"],
			],
		];
		$this->Business->recursive = 0;
		$businessTypes = $this->Business->BusinessType->find('list');
		$states = $this->Business->State->find('list');
		$cities = $this->Business->City->find('list');
		$taxoffices = $this->Business->Taxoffice->find('list');
		$this->set(compact('businessTypes', 'states', 'cities', 'taxoffices'));
		$this->set('businesses', $this->paginate('Business', $conditions));
	}

	/**
	 * admin export method
	 */
	public function admin_export() {
		$options['conditions'] = $this->_buildQueryString();
		$options['fields'] = [
			'Business.id',
			'Business.firm',
			'Business.business',
			'Business.phone_one',
			'Business.phone_two',
			'State.name',
			'City.name',
			'Business.address',
			'Taxoffice.name',
			'Business.afm',
		];
		$this->Business->recursive = 0;
		$data = $this->Business->find('all', $options);
		$this->Csv->export($data);
	}

	/**
	 * modal edit
	 *
	 * @throws NotFoundException
	 */
	public function modal_edit($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		if ($this->request->is(['post', 'put'])) {
			if (!$this->Business->save($this->request->data)) {
				throw new Exception(__('The Business could not be saved. Please, try again.'));
			}
			$this->autoRender = false;
		} else {
			$this->Business->recursive = -1;
			$this->request->data = $this->Business->findById($id);
			$this->layout = 'modal';
		}
	}

	/**
	 * ajax view contacts by business for select method
	 *
	 * @return void
	 */
	public function viewByContactIdForSelect($id = null) {
		$businesses = $this->Business->findByContactId('list', $id);
		$this->set(compact('businesses'));
	}

	/**
	 * ajax view contacts by business for select method
	 *
	 * @return void
	 */
	public function viewLatestInfo($id = null) {
		$contract = $this->Business->Contract->findByBusinessId($id);
		$tasks = $this->Business->Task->find('all', ['conditions' => ['business_id' => $id], 'limit' => 5]);
		$this->set(compact('tasks', 'contract'));
	}

	/**
	 * add from ajax request for select
	 *
	 * @return void
	 */
	public function addForSelect() {
		$this->Business->create();
		if (!$this->Business->save($this->request->data)) {
			throw new NotFoundException(__('Invalid business'));
		}
		$businesses = $this->Business->find('list');
		$this->set(compact('businesses'));
	}

	/**
	 * Popover view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function popover_view($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		$this->set('business', $this->Business->findById($id));
	}

}
