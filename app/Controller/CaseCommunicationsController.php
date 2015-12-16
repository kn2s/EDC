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
			$status=0;
			$message='';
			$commid=0;
			$postdate=date("Y-m-d G:i:s");
			//pr($this->request->data);
			$this->CaseCommunication->create();
			if(isset($this->request->data['CaseCommunication']['isquestionaryedit'])){
				$this->request->data['CaseCommunication']['isquestionaryedit']=1;
			}
			
			$this->request->data['CaseCommunication']['createdate']=$postdate;
			
			if($this->Session->read('loggeddoctid')>0 && $this->request->data['CaseCommunication']['isdoctoresent']==1){
				$this->request->data['CaseCommunication']['doct_id']=$this->Session->read('loggeddoctid');
				$this->request->data['CaseCommunication']['isdoctoresent']=1;
				if ($this->CaseCommunication->save($this->request->data)) {
					$status=1;
					$commid = $this->CaseCommunication->id;
					$postdate = date("G:i - d M Y");
					//now update the case with Awaiting Input (2)
					$this->CaseCommunication->DoctorCase->updateAll(array("DoctorCase.satatus"=>'2'),array('DoctorCase.id'=>$this->request->data['CaseCommunication']['doctor_case_id']));
				}
			}
			elseif($this->Session->read('loggedpatientid')>0){
				//post by patients
				$this->request->data['CaseCommunication']['patient_id']=$this->Session->read('loggedpatientid');
				$this->request->data['CaseCommunication']['isdoctoresent']=0;
				if ($this->CaseCommunication->save($this->request->data)) {
					$status=1;
					$commid = $this->CaseCommunication->id;
					$postdate = date("G:i - d M Y");
					//now update the case with Input Recieved(3)
					$this->CaseCommunication->DoctorCase->updateAll(array("DoctorCase.satatus"=>'3'),array('DoctorCase.id'=>$this->request->data['CaseCommunication']['doctor_case_id']));
				}
			}
			
			/*if ($this->CaseCommunication->save($this->request->data)) {
				$this->Session->setFlash(__('The case communication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case communication could not be saved. Please, try again.'));
			}*/
			die(json_encode(array('status'=>$status,'message'=>$message,'communicationid'=>$commid,"postdate"=>$postdate)));
		}
		/*$doctorCases = $this->CaseCommunication->DoctorCase->find('list');
		$patients = $this->CaseCommunication->Patient->find('list');
		$this->set(compact('doctorCases', 'patients'));*/
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
