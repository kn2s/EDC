<?php
App::uses('AppController', 'Controller');
/**
 * CaseCommunications Controller
 *
 * @property CaseCommunication $CaseCommunication
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CaseCommunicationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CaseCommunication->recursive = 0;
		$this->set('caseCommunications', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CaseCommunication->exists($id)) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$options = array('conditions' => array('CaseCommunication.' . $this->CaseCommunication->primaryKey => $id));
		$this->set('caseCommunication', $this->CaseCommunication->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CaseCommunication->create();
			if ($this->CaseCommunication->save($this->request->data)) {
				$this->Session->setFlash(__('The case communication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case communication could not be saved. Please, try again.'));
			}
		}
		$doctorCases = $this->CaseCommunication->DoctorCase->find('list');
		$patients = $this->CaseCommunication->Patient->find('list');
		$this->set(compact('doctorCases', 'patients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CaseCommunication->exists($id)) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseCommunication->save($this->request->data)) {
				$this->Session->setFlash(__('The case communication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case communication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseCommunication.' . $this->CaseCommunication->primaryKey => $id));
			$this->request->data = $this->CaseCommunication->find('first', $options);
		}
		$doctorCases = $this->CaseCommunication->DoctorCase->find('list');
		$patients = $this->CaseCommunication->Patient->find('list');
		$this->set(compact('doctorCases', 'patients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CaseCommunication->id = $id;
		if (!$this->CaseCommunication->exists()) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseCommunication->delete()) {
			$this->Session->setFlash(__('The case communication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case communication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CaseCommunication->recursive = 0;
		$this->set('caseCommunications', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CaseCommunication->exists($id)) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$options = array('conditions' => array('CaseCommunication.' . $this->CaseCommunication->primaryKey => $id));
		$this->set('caseCommunication', $this->CaseCommunication->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CaseCommunication->create();
			if ($this->CaseCommunication->save($this->request->data)) {
				$this->Session->setFlash(__('The case communication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case communication could not be saved. Please, try again.'));
			}
		}
		$doctorCases = $this->CaseCommunication->DoctorCase->find('list');
		$patients = $this->CaseCommunication->Patient->find('list');
		$this->set(compact('doctorCases', 'patients'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CaseCommunication->exists($id)) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseCommunication->save($this->request->data)) {
				$this->Session->setFlash(__('The case communication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case communication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseCommunication.' . $this->CaseCommunication->primaryKey => $id));
			$this->request->data = $this->CaseCommunication->find('first', $options);
		}
		$doctorCases = $this->CaseCommunication->DoctorCase->find('list');
		$patients = $this->CaseCommunication->Patient->find('list');
		$this->set(compact('doctorCases', 'patients'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CaseCommunication->id = $id;
		if (!$this->CaseCommunication->exists()) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseCommunication->delete()) {
			$this->Session->setFlash(__('The case communication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case communication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
