<?php
App::uses('AppController', 'Controller');
/**
 * PatientPastHistories Controller
 *
 * @property PatientPastHistory $PatientPastHistory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PatientPastHistoriesController extends AppController {

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
		$this->PatientPastHistory->recursive = 0;
		$this->set('patientPastHistories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PatientPastHistory->exists($id)) {
			throw new NotFoundException(__('Invalid patient past history'));
		}
		$options = array('conditions' => array('PatientPastHistory.' . $this->PatientPastHistory->primaryKey => $id));
		$this->set('patientPastHistory', $this->PatientPastHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//pr("hhhh");
			$status=0;
			//pr($this->request->data);
			
			$this->PatientPastHistory->create();
			$ids = $this->request->data['PatientPastHistory']['id'];
			$this->request->data['PatientPastHistory']['patient_id']=$this->Session->read('loggedpatientid');
			$this->request->data['PatientPastHistory']['cancer_history'] = serialize($this->request->data['CancerDetails']);
			$this->request->data['PatientPastHistory']['surgical_history'] =serialize( $this->request->data['SurgeryDetail']);
			$this->request->data['PatientPastHistory']['hospitalization'] =serialize( $this->request->data['HostpitalDetails']);
			$this->request->data['PatientPastHistory']['family_cancer_history'] =serialize( $this->request->data['FamilyCancer']);
			if ($this->PatientPastHistory->save($this->request->data)) {
				$ids = $this->PatientPastHistory->id;
				$status='1';
				//now update the form submit count in patient tables
				$this->PatientPastHistory->Patient->id=$this->Session->read("loggedpatientid");
				$this->PatientPastHistory->Patient->saveField('detailsformsubmit','3');
			} else {
				
			}
			die(json_encode(array('status'=>$status,'message'=>'','id'=>$ids)));
		}
		/*$patients = $this->PatientPastHistory->Patient->find('list');
		$this->set(compact('patients'));*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PatientPastHistory->exists($id)) {
			throw new NotFoundException(__('Invalid patient past history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatientPastHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The patient past history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient past history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatientPastHistory.' . $this->PatientPastHistory->primaryKey => $id));
			$this->request->data = $this->PatientPastHistory->find('first', $options);
		}
		$patients = $this->PatientPastHistory->Patient->find('list');
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
		$this->PatientPastHistory->id = $id;
		if (!$this->PatientPastHistory->exists()) {
			throw new NotFoundException(__('Invalid patient past history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PatientPastHistory->delete()) {
			$this->Session->setFlash(__('The patient past history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient past history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PatientPastHistory->recursive = 0;
		$this->set('patientPastHistories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PatientPastHistory->exists($id)) {
			throw new NotFoundException(__('Invalid patient past history'));
		}
		$options = array('conditions' => array('PatientPastHistory.' . $this->PatientPastHistory->primaryKey => $id));
		$this->set('patientPastHistory', $this->PatientPastHistory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PatientPastHistory->create();
			if ($this->PatientPastHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The patient past history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient past history could not be saved. Please, try again.'));
			}
		}
		$patients = $this->PatientPastHistory->Patient->find('list');
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
		if (!$this->PatientPastHistory->exists($id)) {
			throw new NotFoundException(__('Invalid patient past history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatientPastHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The patient past history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient past history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatientPastHistory.' . $this->PatientPastHistory->primaryKey => $id));
			$this->request->data = $this->PatientPastHistory->find('first', $options);
		}
		$patients = $this->PatientPastHistory->Patient->find('list');
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
		$this->PatientPastHistory->id = $id;
		if (!$this->PatientPastHistory->exists()) {
			throw new NotFoundException(__('Invalid patient past history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PatientPastHistory->delete()) {
			$this->Session->setFlash(__('The patient past history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient past history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
