<?php
App::uses('AppController', 'Controller');
/**
 * DoctorCases Controller
 *
 * @property DoctorCase $DoctorCase
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DoctorCasesController extends AppController {

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
		$this->DoctorCase->recursive = 0;
		$this->set('doctorCases', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DoctorCase->exists($id)) {
			throw new NotFoundException(__('Invalid doctor case'));
		}
		$options = array('conditions' => array('DoctorCase.' . $this->DoctorCase->primaryKey => $id));
		$this->set('doctorCase', $this->DoctorCase->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DoctorCase->create();
			if ($this->DoctorCase->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor case has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor case could not be saved. Please, try again.'));
			}
		}
		$patients = $this->DoctorCase->Patient->find('list');
		$doctors = $this->DoctorCase->Doctor->find('list');
		$this->set(compact('patients', 'doctors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DoctorCase->exists($id)) {
			throw new NotFoundException(__('Invalid doctor case'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DoctorCase->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor case has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor case could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DoctorCase.' . $this->DoctorCase->primaryKey => $id));
			$this->request->data = $this->DoctorCase->find('first', $options);
		}
		$patients = $this->DoctorCase->Patient->find('list');
		$doctors = $this->DoctorCase->Doctor->find('list');
		$this->set(compact('patients', 'doctors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DoctorCase->id = $id;
		if (!$this->DoctorCase->exists()) {
			throw new NotFoundException(__('Invalid doctor case'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DoctorCase->delete()) {
			$this->Session->setFlash(__('The doctor case has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor case could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DoctorCase->recursive = 0;
		$this->set('doctorCases', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DoctorCase->exists($id)) {
			throw new NotFoundException(__('Invalid doctor case'));
		}
		$options = array('conditions' => array('DoctorCase.' . $this->DoctorCase->primaryKey => $id));
		$this->set('doctorCase', $this->DoctorCase->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DoctorCase->create();
			if ($this->DoctorCase->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor case has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor case could not be saved. Please, try again.'));
			}
		}
		$patients = $this->DoctorCase->Patient->find('list');
		$doctors = $this->DoctorCase->Doctor->find('list');
		$this->set(compact('patients', 'doctors'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->DoctorCase->exists($id)) {
			throw new NotFoundException(__('Invalid doctor case'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DoctorCase->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor case has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor case could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DoctorCase.' . $this->DoctorCase->primaryKey => $id));
			$this->request->data = $this->DoctorCase->find('first', $options);
		}
		$patients = $this->DoctorCase->Patient->find('list');
		$doctors = $this->DoctorCase->Doctor->find('list');
		$this->set(compact('patients', 'doctors'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->DoctorCase->id = $id;
		if (!$this->DoctorCase->exists()) {
			throw new NotFoundException(__('Invalid doctor case'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DoctorCase->delete()) {
			$this->Session->setFlash(__('The doctor case has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor case could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
