<?php

App::uses('AppController', 'Controller');

/**
 * OfferTypes Controller
 *
 * @property	OfferType $OfferType
 * @package		app.Controller
 */
class OfferTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OfferType->recursive = 0;
		$this->set('offerTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OfferType->exists($id)) {
			throw new NotFoundException(__('Invalid offer type'));
		}
		$options = ['conditions' => ['OfferType.' . $this->OfferType->primaryKey => $id]];
		$this->set('offerType', $this->OfferType->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OfferType->recursive = 0;
		$this->set('offerTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OfferType->exists($id)) {
			throw new NotFoundException(__('Invalid offer type'));
		}
		$options = ['conditions' => ['OfferType.' . $this->OfferType->primaryKey => $id]];
		$this->set('offerType', $this->OfferType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OfferType->create();
			if ($this->OfferType->save($this->request->data)) {
				$this->Flash->set(__('The offer type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The offer type could not be saved. Please, try again.'));
			}
		}
		$offers = $this->OfferType->Offer->find('list');
		$this->set(compact('offers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OfferType->exists($id)) {
			throw new NotFoundException(__('Invalid offer type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->OfferType->save($this->request->data)) {
				$this->Flash->set(__('The offer type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The offer type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['OfferType.' . $this->OfferType->primaryKey => $id]];
			$this->request->data = $this->OfferType->find('first', $options);
		}
		$offers = $this->OfferType->Offer->find('list');
		$this->set(compact('offers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->OfferType->id = $id;
		if (!$this->OfferType->exists()) {
			throw new NotFoundException(__('Invalid offer type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OfferType->delete()) {
			$this->Flash->set(__('The offer type has been deleted.'));
		} else {
			$this->Flash->set(__('The offer type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

}
