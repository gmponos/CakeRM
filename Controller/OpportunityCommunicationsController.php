<?php

App::uses('AppController', 'Controller');

/**
 * OpportunityCommunications Controller
 *
 * @property	OpportunityCommunication $OpportunityCommunication
 * @package		app.Controller
 */
class OpportunityCommunicationsController extends AppController {

/**
 * modal edit business
 *
 * @throws NotFoundException
 */
	public function addForRelated($opportunity_id) {
		if (!$this->OpportunityCommunication->Opportunity->exists($opportunity_id)) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['OpportunityCommunication']['opportunity_id'] = $opportunity_id;
			if (!$this->OpportunityCommunication->save($this->request->data)) {
				throw new Exception(__('The Opportunity could not be saved. Please, try again.'));
			}
			return $this->redirect(['admin'=> true, 'action' => 'related', $opportunity_id]);
		}
		$this->set('opportunity_id', $opportunity_id);
		$this->set(compact('users'));
	}

/**
 *
 * @throws NotFoundException
 */
	public function related($opportunity_id) {
		$this->set('opportunity_id', $opportunity_id);
		$this->set('communications', $this->OpportunityCommunication->findAllByOpportunityId($opportunity_id));
	}

/**
 * modal edit business
 *
 * @throws NotFoundException
 */
	public function admin_addForRelated($opportunity_id) {
		if (!$this->OpportunityCommunication->Opportunity->exists($opportunity_id)) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['OpportunityCommunication']['opportunity_id'] = $opportunity_id;
			if (!$this->OpportunityCommunication->save($this->request->data)) {
				throw new Exception(__('The Opportunity could not be saved. Please, try again.'));
			}
			return $this->redirect(['admin'=> true, 'action' => 'related', $opportunity_id]);
		}
		$this->set('opportunity_id', $opportunity_id);
		$this->set(compact('users'));
	}
/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->OpportunityCommunication->id = $id;
		if (!$this->OpportunityCommunication->exists()) {
			throw new NotFoundException(__('Invalid opportunity communication'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OpportunityCommunication->delete()) {
			$this->Flash->set(__('The opportunity communication has been deleted.'));
		} else {
			$this->Flash->set(__('The opportunity communication could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 *
 * @throws NotFoundException
 */
	public function admin_related($opportunity_id) {
		$this->set('opportunity_id', $opportunity_id);
		$this->set('communications', $this->OpportunityCommunication->findAllByOpportunityId($opportunity_id));
	}

}
