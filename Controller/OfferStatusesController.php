<?php
App::uses('AppController', 'Controller');
/**
 * OfferStatuses Controller
 *
 * @property	OfferStatus $OfferStatus
 * @package		app.Controller
 */
class OfferStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OfferStatus->recursive = 0;
		$this->set('offerStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OfferStatus->exists($id)) {
			throw new NotFoundException(__('Invalid offer status'));
		}
		$options = ['conditions' => ['OfferStatus.' . $this->OfferStatus->primaryKey => $id]];
		$this->set('offerStatus', $this->OfferStatus->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OfferStatus->recursive = 0;
		$this->set('offerStatuses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OfferStatus->exists($id)) {
			throw new NotFoundException(__('Invalid offer status'));
		}
		$options = ['conditions' => ['OfferStatus.' . $this->OfferStatus->primaryKey => $id]];
		$this->set('offerStatus', $this->OfferStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OfferStatus->create();
			if ($this->OfferStatus->save($this->request->data)) {
				$this->Flash->set(__('The offer status has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The offer status could not be saved. Please, try again.'));
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
		if (!$this->OfferStatus->exists($id)) {
			throw new NotFoundException(__('Invalid offer status'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->OfferStatus->save($this->request->data)) {
				$this->Flash->set(__('The offer status has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The offer status could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['OfferStatus.' . $this->OfferStatus->primaryKey => $id]];
			$this->request->data = $this->OfferStatus->find('first', $options);
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
		$this->OfferStatus->id = $id;
		if (!$this->OfferStatus->exists()) {
			throw new NotFoundException(__('Invalid offer status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OfferStatus->delete()) {
			$this->Flash->set(__('The offer status has been deleted.'));
		} else {
			$this->Flash->set(__('The offer status could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}}
