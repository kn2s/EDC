<?php
App::uses('AppController', 'Controller');
/**
 * PatientDocuments Controller
 *
 * @property PatientDocument $PatientDocument
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PatientDocumentsController extends AppController {

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
		$this->PatientDocument->recursive = 0;
		$this->set('patientDocuments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PatientDocument->exists($id)) {
			throw new NotFoundException(__('Invalid patient document'));
		}
		$options = array('conditions' => array('PatientDocument.' . $this->PatientDocument->primaryKey => $id));
		$this->set('patientDocument', $this->PatientDocument->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PatientDocument->create();
			if ($this->PatientDocument->save($this->request->data)) {
				$this->Session->setFlash(__('The patient document has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient document could not be saved. Please, try again.'));
			}
		}
		$patients = $this->PatientDocument->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PatientDocument->exists($id)) {
			throw new NotFoundException(__('Invalid patient document'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatientDocument->save($this->request->data)) {
				$this->Session->setFlash(__('The patient document has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient document could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatientDocument.' . $this->PatientDocument->primaryKey => $id));
			$this->request->data = $this->PatientDocument->find('first', $options);
		}
		$patients = $this->PatientDocument->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PatientDocument->id = $id;
		if (!$this->PatientDocument->exists()) {
			throw new NotFoundException(__('Invalid patient document'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PatientDocument->delete()) {
			$this->Session->setFlash(__('The patient document has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient document could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PatientDocument->recursive = 0;
		$this->set('patientDocuments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PatientDocument->exists($id)) {
			throw new NotFoundException(__('Invalid patient document'));
		}
		$options = array('conditions' => array('PatientDocument.' . $this->PatientDocument->primaryKey => $id));
		$this->set('patientDocument', $this->PatientDocument->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PatientDocument->create();
			if ($this->PatientDocument->save($this->request->data)) {
				$this->Session->setFlash(__('The patient document has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient document could not be saved. Please, try again.'));
			}
		}
		$patients = $this->PatientDocument->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PatientDocument->exists($id)) {
			throw new NotFoundException(__('Invalid patient document'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatientDocument->save($this->request->data)) {
				$this->Session->setFlash(__('The patient document has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient document could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatientDocument.' . $this->PatientDocument->primaryKey => $id));
			$this->request->data = $this->PatientDocument->find('first', $options);
		}
		$patients = $this->PatientDocument->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PatientDocument->id = $id;
		if (!$this->PatientDocument->exists()) {
			throw new NotFoundException(__('Invalid patient document'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PatientDocument->delete()) {
			$this->Session->setFlash(__('The patient document has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient document could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
