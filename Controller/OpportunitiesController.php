<?php

App::uses('AppController', 'Controller');

/**
 * Opportunities Controller
 *
 * @property    Opportunity $Opportunity
 * @package        app.Controller
 */
class OpportunitiesController extends AppController
{

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->Opportunity->recursive = 0;
		$scope = $this->_buildQueryString();
		$whitelist = [
			'Opportunity.completed',
		];
		$this->set('opportunities', $this->Paginator->paginate('Opportunity', $scope, $whitelist));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {

		if (!$this->Opportunity->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		$this->Opportunity->recursive = 0;
		$this->set('opportunity', $this->Opportunity->findById($id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Opportunity->create();
			if ($this->Opportunity->save($this->request->data)) {
				$this->Flash->set(__('The opportunity has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity could not be saved. Please, try again.'));
			}
		}
		$businesses = $this->Opportunity->Business->find('list');
		$businessTypes = $this->Opportunity->Business->BusinessType->find('list');
		$taxoffices = $this->Opportunity->Business->Taxoffice->find('list');
		$contacts = $this->Opportunity->Contact->find('list');
		$departments = $this->Opportunity->Contact->Department->find('list');
		$states = $this->Opportunity->Contact->State->find('list');
		$city = $this->Opportunity->Contact->City->find('list');
		$responsibleUsers = $this->Opportunity->ResponsibleUser->find('list');
		$statuses = $this->Opportunity->OpportunityStatus->find('list');
		$campaigns = $this->Opportunity->Campaign->find('list');
		$channels = $this->Opportunity->Channel->find('list');
		$this->set(compact('businesses', 'businessTypes', 'taxoffices', 'contacts', 'departments', 'states', 'city',
			'responsibleUsers', 'campaigns', 'channels', 'statuses'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		if (!$this->Opportunity->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Opportunity->save($this->request->data)) {
				$this->Flash->set(__('The opportunity has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity could not be saved. Please, try again.'));
			}
		} else {
			$this->Opportunity->recursive = -1;
			$this->request->data = $this->Opportunity->findById($id);
		}
		$businesses = $this->Opportunity->Business->find('list');
		$contacts = $this->Opportunity->Contact->find('list');
		$responsibleUsers = $this->Opportunity->ResponsibleUser->find('list');
		$statuses = $this->Opportunity->OpportunityStatus->find('list');
		$campaigns = $this->Opportunity->Campaign->find('list');
		$channels = $this->Opportunity->Channel->find('list');
		$this->set(compact('businesses', 'contacts', 'responsibleUsers', 'campaigns', 'channels', 'statuses'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->Opportunity->recursive = 0;
		$scope = $this->_buildQueryString();
		$whitelist = [
			'Opportunity.completed',
		];
		$this->set('opportunities', $this->Paginator->paginate('Opportunity', $scope, $whitelist));
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {

		if (!$this->Opportunity->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		$this->Opportunity->recursive = 0;
		$this->set('opportunity', $this->Opportunity->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Opportunity->create();
			if ($this->Opportunity->save($this->request->data)) {
				$this->Flash->set(__('The opportunity has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity could not be saved. Please, try again.'));
			}
		}
		$businesses = $this->Opportunity->Business->find('list');
		$businessTypes = $this->Opportunity->Business->BusinessType->find('list');
		$taxoffices = $this->Opportunity->Business->Taxoffice->find('list');
		$contacts = $this->Opportunity->Contact->find('list');
		$departments = $this->Opportunity->Contact->Department->find('list');
		$states = $this->Opportunity->Contact->State->find('list');
		$city = $this->Opportunity->Contact->City->find('list');
		$responsibleUsers = $this->Opportunity->ResponsibleUser->find('list');
		$statuses = $this->Opportunity->OpportunityStatus->find('list');
		$campaigns = $this->Opportunity->Campaign->find('list');
		$channels = $this->Opportunity->Channel->find('list');
		$this->set(compact('businesses', 'businessTypes', 'taxoffices', 'contacts', 'departments', 'states', 'city',
			'responsibleUsers', 'campaigns', 'channels', 'statuses'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {

		if (!$this->Opportunity->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Opportunity->save($this->request->data)) {
				$this->Flash->set(__('The opportunity has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity could not be saved. Please, try again.'));
			}
		} else {
			$this->Opportunity->recursive = -1;
			$this->request->data = $this->Opportunity->findById($id);
		}
		$businesses = $this->Opportunity->Business->find('list');
		$contacts = $this->Opportunity->Contact->find('list');
		$responsibleUsers = $this->Opportunity->ResponsibleUser->find('list');
		$statuses = $this->Opportunity->OpportunityStatus->find('list');
		$campaigns = $this->Opportunity->Campaign->find('list');
		$channels = $this->Opportunity->Channel->find('list');
		$this->set(compact('businesses', 'contacts', 'responsibleUsers', 'campaigns', 'channels', 'statuses'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {

		$this->request->allowMethod('post', 'delete');
		$this->Opportunity->id = $id;
		if (!$this->Opportunity->exists()) {
			throw new NotFoundException(__('Invalid Opportunity'));
		}
		if (!$this->Opportunity->delete()) {
			throw new NotFoundException(__('Opportunity was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

}
