<?php

App::uses('AppController', 'Controller');

/**
 * Offers Controller
 *
 * @property    Offer $Offer
 * @package        app.Controller
 */
class OffersController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->set('offers', $this->_paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Invalid offer'));
		}
		$options = ['conditions' => ['Offer.' . $this->Offer->primaryKey => $id]];
		$this->set('offer', $this->Offer->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Offer->create();
			if ($this->Offer->save($this->request->data)) {
				$this->Flash->set(__('The offer has been saved.'));
				return $this->redirect($this->Cookie->read('beforeSaveReferer'));
			} else {
				$this->Flash->set(__('The offer could not be saved. Please, try again.'));
			}
		}
		$this->Cookie->write('beforeSaveReferer', $this->referer());
		$states = $this->Offer->Business->State->find('list');
		$taxoffices = $this->Offer->Business->Taxoffice->find('list');
		$contactTypes = $this->Offer->Contact->ContactType->find('list');
		$businessTypes = $this->Offer->Business->BusinessType->find('list');
		$users = $this->Offer->User->find('list');
		$responsibles = $this->Offer->Responsible->find('list');
		$contacts = $this->Offer->Contact->find('list');
		$businesses = $this->Offer->Business->find('list');
		$offerStatuses = $this->Offer->OfferStatus->find('list');
		$offerTypes = $this->Offer->OfferType->find('list');
		$this->set(compact('states', 'taxoffices', 'businessTypes', 'contactTypes', 'users', 'contacts', 'businesses', 'offerStatuses', 'responsibles', 'offerTypes'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Invalid offer'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Offer->save($this->request->data)) {
				$this->Flash->set(__('The offer has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set(__('The offer could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Offer.' . $this->Offer->primaryKey => $id]];
			$this->request->data = $this->Offer->find('first', $options);
		}
		$users = $this->Offer->User->find('list');
		$responsibles = $this->Offer->Responsible->find('list');
		$contacts = $this->Offer->Contact->find('list');
		$businesses = $this->Offer->Business->find('list');
		$offerStatuses = $this->Offer->OfferStatus->find('list');
		$offerTypes = $this->Offer->OfferType->find('list');
		$this->set(compact('users', 'contacts', 'businesses', 'offerStatuses', 'responsibles', 'offerTypes'));
	}

	/**
	 * @param type $id
	 * @throws NotFoundException
	 */
	public function mail($id = null) {
		$this->Offer->id = $id;
		if (!$this->Offer->exists()) {
			throw new NotFoundException(__('Invalid offer'));
		}
		$this->Offer->recursive = 1;
		$offer = $this->Offer->findById($id);
		$subject = 'Προσφορά - ';
		$subject .= $this->Auth->user('fullname');
		$subject .= empty($offer['Business']['firm']) ? '' : ' - ' . $offer['Business']['firm'];
		$subject .= empty($offer['Contact']['fullname']) ? '' : ' - ' . $offer['Contact']['fullname'];
		$subject .= ': ' . $offer['Offer']['description_short'];

		$this->set('offer', $offer);
		$this->Email->subject = $subject;
		$file = $this->Offer->field('file_uid');
		if (!empty($file)) {
			$this->Email->attachments = [WWW_ROOT . 'files' . DS . $file];
		}
		$this->Email->template = 'offers/view';
		$this->Email->send();
		//Do not render a view file.
		$this->autoRender = false;
	}

	/**
	 * search method
	 */
	public function search() {
		$haystack = $this->request->query('haystack');
		$scope = ['OR' =>
			[
				['Offer.description LIKE' => "%$haystack%"],
				['Business.firm LIKE' => "%$haystack%"],
				['Business.business LIKE' => "%$haystack%"],
				['Business.afm LIKE' => "%$haystack%"],
				['Contact.firstname LIKE' => "%$haystack%"],
				['Contact.lastname LIKE' => "%$haystack%"],
			],
		];
		$this->set('offers', $this->_paginate($scope));
	}

	/**
	 * @param type $id
	 * @return type
	 * @throws NotFoundException
	 */
	public function download($id = null) {
		$this->Offer->id = $id;
		if (!$this->Offer->exists()) {
			throw new NotFoundException(__('Invalid offer'));
		}
		$offer = $this->Offer->findById($id);
		$file = $this->Offer->field('file_uid');
		$this->response->file(WWW_ROOT . 'files' . DS . $file, [
			'download' => true,
			'name' => $file,
		]);
		return $this->response;
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->set('offers', $this->_paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Invalid offer'));
		}
		$this->set('offer', $this->Offer->findById($id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Offer->create();
			if ($this->Offer->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The offer could not be saved. Please, try again.'));
			}
		}
		$states = $this->Offer->Business->State->find('list');
		$taxoffices = $this->Offer->Business->Taxoffice->find('list');
		$contactTypes = $this->Offer->Contact->ContactType->find('list');
		$businessTypes = $this->Offer->Business->BusinessType->find('list');
		$users = $this->Offer->User->find('list');
		$responsibles = $this->Offer->Responsible->find('list');
		$contacts = $this->Offer->Contact->find('list');
		$businesses = $this->Offer->Business->find('list');
		$statuses = $this->Offer->OfferStatus->find('list');
		$offerTypes = $this->Offer->OfferType->find('list');
		$this->set(compact('states', 'taxoffices', 'businessTypes', 'contactTypes', 'users', 'contacts', 'businesses', 'statuses', 'responsibles', 'offerTypes'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Invalid offer'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Offer->save($this->request->data)) {
				$this->Flash->set(__('The offer has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->set(__('The offer could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Offer.' . $this->Offer->primaryKey => $id]];
			$this->request->data = $this->Offer->find('first', $options);
		}
		$states = $this->Offer->Business->State->find('list');
		$taxoffices = $this->Offer->Business->Taxoffice->find('list');
		$contactTypes = $this->Offer->Contact->ContactType->find('list');
		$businessTypes = $this->Offer->Business->BusinessType->find('list');
		$users = $this->Offer->User->find('list');
		$responsibles = $this->Offer->Responsible->find('list');
		$contacts = $this->Offer->Contact->find('list');
		$businesses = $this->Offer->Business->find('list');
		$statuses = $this->Offer->OfferStatus->find('list');
		$offerTypes = $this->Offer->OfferType->find('list');
		$this->set(compact('states', 'taxoffices', 'businessTypes', 'contactTypes', 'users', 'contacts', 'businesses', 'statuses', 'responsibles', 'offerTypes'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->request->onlyAllow('post', 'delete');
		$this->Offer->id = $id;
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Invalid offer'));
		}
		if (!$this->Offer->delete($id)) {
			throw new NotFoundException(__('Offer was not deleted'));
		}
		if ($this->request->is('ajax')) {
			return $this->redirect($this->referer());
		}
		return $this->redirect(['action' => 'index']);
	}

	/**
	 * @param type $id
	 * @return type
	 * @throws NotFoundException
	 */
	public function admin_download($id = null) {
		$this->Offer->id = $id;
		if (!$this->Offer->exists()) {
			throw new NotFoundException(__('Invalid offer'));
		}
		$file = $this->Offer->field('file_uid');
		$this->response->file(WWW_ROOT . 'files' . DS . $file, [
			'download' => true,
			'name' => $file,
		]);
		return $this->response;
	}

	/**
	 * @param type $scope
	 * @return type
	 */
	private function _paginate($scope = []) {
		$whitelist = [
			'Offer.created',
			'Offer.updated',
			'Offer.user_id',
			'Offer.status_id',
		];
		$this->Offer->recursive = 1;
		return $this->Paginator->paginate('Offer', $scope, $whitelist);
	}
}
