<?php

App::uses('AppController', 'Controller');

/**
 * OpportunityStatuses Controller
 *
 * @property	OpportunityStatus $OpportunityStatus
 * @package		app.Controller
 */
class OpportunityStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OpportunityStatus->recursive = 0;
		$this->set('opportunityStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OpportunityStatus->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity status'));
		}
		$options = ['conditions' => ['OpportunityStatus.' . $this->OpportunityStatus->primaryKey => $id]];
		$this->set('opportunityStatus', $this->OpportunityStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OpportunityStatus->create();
			if ($this->OpportunityStatus->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity status could not be saved. Please, try again.'));
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
		if (!$this->OpportunityStatus->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity status'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->OpportunityStatus->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity status could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['OpportunityStatus.' . $this->OpportunityStatus->primaryKey => $id]];
			$this->request->data = $this->OpportunityStatus->find('first', $options);
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OpportunityStatus->recursive = 0;
		$this->set('opportunityStatuses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OpportunityStatus->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity status'));
		}
		$options = ['conditions' => ['OpportunityStatus.' . $this->OpportunityStatus->primaryKey => $id]];
		$this->set('opportunityStatus', $this->OpportunityStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OpportunityStatus->create();
			if ($this->OpportunityStatus->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity status could not be saved. Please, try again.'));
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
		if (!$this->OpportunityStatus->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity status'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->OpportunityStatus->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The opportunity status could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['OpportunityStatus.' . $this->OpportunityStatus->primaryKey => $id]];
			$this->request->data = $this->OpportunityStatus->find('first', $options);
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
		$this->OpportunityStatus->id = $id;
		if (!$this->OpportunityStatus->exists()) {
			throw new NotFoundException(__('Invalid opportunity status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OpportunityStatus->delete()) {
			$this->Flash->set(__('The opportunity status has been deleted.'));
		} else {
			$this->Flash->set(__('The opportunity status could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

}
