<?php
App::uses('AppController', 'Controller');
/**
 * DrugAlergies Controller
 *
 * @property DrugAlergy $DrugAlergy
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DrugAlergiesController extends AppController {

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
		$this->DrugAlergy->recursive = 0;
		$this->set('drugAlergies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DrugAlergy->exists($id)) {
			throw new NotFoundException(__('Invalid drug alergy'));
		}
		$options = array('conditions' => array('DrugAlergy.' . $this->DrugAlergy->primaryKey => $id));
		$this->set('drugAlergy', $this->DrugAlergy->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DrugAlergy->create();
			if ($this->DrugAlergy->save($this->request->data)) {
				$this->Session->setFlash(__('The drug alergy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The drug alergy could not be saved. Please, try again.'));
			}
		}
		$patientDetails = $this->DrugAlergy->PatientDetail->find('list');
		$this->set(compact('patientDetails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DrugAlergy->exists($id)) {
			throw new NotFoundException(__('Invalid drug alergy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DrugAlergy->save($this->request->data)) {
				$this->Session->setFlash(__('The drug alergy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The drug alergy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DrugAlergy.' . $this->DrugAlergy->primaryKey => $id));
			$this->request->data = $this->DrugAlergy->find('first', $options);
		}
		$patientDetails = $this->DrugAlergy->PatientDetail->find('list');
		$this->set(compact('patientDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DrugAlergy->id = $id;
		if (!$this->DrugAlergy->exists()) {
			throw new NotFoundException(__('Invalid drug alergy'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DrugAlergy->delete()) {
			$this->Session->setFlash(__('The drug alergy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The drug alergy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
