<?php
App::uses('AppController', 'Controller');
/**
 * Specializations Controller
 *
 * @property Specialization $Specialization
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SpecializationsController extends AppController {

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
		$this->Specialization->recursive = 0;
		$this->set('specializations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Specialization->exists($id)) {
			throw new NotFoundException(__('Invalid specialization'));
		}
		$options = array('conditions' => array('Specialization.' . $this->Specialization->primaryKey => $id));
		$this->set('specialization', $this->Specialization->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Specialization->create();
			if ($this->Specialization->save($this->request->data)) {
				$this->Session->setFlash(__('The specialization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specialization could not be saved. Please, try again.'));
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
		if (!$this->Specialization->exists($id)) {
			throw new NotFoundException(__('Invalid specialization'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Specialization->save($this->request->data)) {
				$this->Session->setFlash(__('The specialization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specialization could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Specialization.' . $this->Specialization->primaryKey => $id));
			$this->request->data = $this->Specialization->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Specialization->id = $id;
		if (!$this->Specialization->exists()) {
			throw new NotFoundException(__('Invalid specialization'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Specialization->delete()) {
			$this->Session->setFlash(__('The specialization has been deleted.'));
		} else {
			$this->Session->setFlash(__('The specialization could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'admin';
		$this->Specialization->recursive = 0;
		$this->set('specializations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Specialization->exists($id)) {
			throw new NotFoundException(__('Invalid specialization'));
		}
		$options = array('conditions' => array('Specialization.' . $this->Specialization->primaryKey => $id));
		$this->set('specialization', $this->Specialization->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->Specialization->create();
			$this->request->data['Specialization']['createdon']=time();
			if ($this->Specialization->save($this->request->data)) {
				$this->Session->setFlash(__('The specialization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specialization could not be saved. Please, try again.'));
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
		if (!$this->Specialization->exists($id)) {
			throw new NotFoundException(__('Invalid specialization'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Specialization->save($this->request->data)) {
				$this->Session->setFlash(__('The specialization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specialization could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Specialization.' . $this->Specialization->primaryKey => $id));
			$this->request->data = $this->Specialization->find('first', $options);
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
		$this->Specialization->id = $id;
		if (!$this->Specialization->exists()) {
			throw new NotFoundException(__('Invalid specialization'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Specialization->delete()) {
			$this->Session->setFlash(__('The specialization has been deleted.'));
		} else {
			$this->Session->setFlash(__('The specialization could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
