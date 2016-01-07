<?php
App::uses('AppController', 'Controller');
/**
 * DoctorSpecializetions Controller
 *
 * @property DoctorSpecializetion $DoctorSpecializetion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DoctorSpecializetionsController extends AppController {

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
		$this->DoctorSpecializetion->recursive = 0;
		$this->set('doctorSpecializetions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DoctorSpecializetion->exists($id)) {
			throw new NotFoundException(__('Invalid doctor specializetion'));
		}
		$options = array('conditions' => array('DoctorSpecializetion.' . $this->DoctorSpecializetion->primaryKey => $id));
		$this->set('doctorSpecializetion', $this->DoctorSpecializetion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DoctorSpecializetion->create();
			if ($this->DoctorSpecializetion->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor specializetion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor specializetion could not be saved. Please, try again.'));
			}
		}
		$specializations = $this->DoctorSpecializetion->Specialization->find('list');
		$this->set(compact('specializations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DoctorSpecializetion->exists($id)) {
			throw new NotFoundException(__('Invalid doctor specializetion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DoctorSpecializetion->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor specializetion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor specializetion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DoctorSpecializetion.' . $this->DoctorSpecializetion->primaryKey => $id));
			$this->request->data = $this->DoctorSpecializetion->find('first', $options);
		}
		$specializations = $this->DoctorSpecializetion->Specialization->find('list');
		$this->set(compact('specializations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DoctorSpecializetion->id = $id;
		if (!$this->DoctorSpecializetion->exists()) {
			throw new NotFoundException(__('Invalid doctor specializetion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DoctorSpecializetion->delete()) {
			$this->Session->setFlash(__('The doctor specializetion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor specializetion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DoctorSpecializetion->recursive = 0;
		$this->set('doctorSpecializetions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DoctorSpecializetion->exists($id)) {
			throw new NotFoundException(__('Invalid doctor specializetion'));
		}
		$options = array('conditions' => array('DoctorSpecializetion.' . $this->DoctorSpecializetion->primaryKey => $id));
		$this->set('doctorSpecializetion', $this->DoctorSpecializetion->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DoctorSpecializetion->create();
			if ($this->DoctorSpecializetion->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor specializetion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor specializetion could not be saved. Please, try again.'));
			}
		}
		$specializations = $this->DoctorSpecializetion->Specialization->find('list');
		$this->set(compact('specializations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->DoctorSpecializetion->exists($id)) {
			throw new NotFoundException(__('Invalid doctor specializetion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DoctorSpecializetion->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor specializetion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor specializetion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DoctorSpecializetion.' . $this->DoctorSpecializetion->primaryKey => $id));
			$this->request->data = $this->DoctorSpecializetion->find('first', $options);
		}
		$specializations = $this->DoctorSpecializetion->Specialization->find('list');
		$this->set(compact('specializations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->DoctorSpecializetion->id = $id;
		if (!$this->DoctorSpecializetion->exists()) {
			throw new NotFoundException(__('Invalid doctor specializetion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DoctorSpecializetion->delete()) {
			$this->Session->setFlash(__('The doctor specializetion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor specializetion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
