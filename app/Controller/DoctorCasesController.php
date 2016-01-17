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
	public function admin_index($doctid=0) {
		$this->layout="admin";
		$this->DoctorCase->recursive = 2;
		$this->DoctorCase->Patient->unbindModel(array("hasMany"=>array("PatientDetail")));
		$this->DoctorCase->Doctor->unbindModel(array("hasMany"=>array("PatientDetail")));
		$this->DoctorCase->Patient->bindModel(array(
			"hasOne"=>array(
				"PatientDetail"=>array(
					'className' => 'PatientDetail',
					'foreignKey' => 'patient_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
				)
			)
		));
		
		$cond = array("DoctorCase.ispaymentdone"=>'1','DoctorCase.is_deleted'=>'0');
		if($doctid>0){
			$cond["DoctorCase.doctor_id"]=$doctid;
		}
		
		$this->set('doctorCases', $this->Paginator->paginate($cond));
		//unbind model
		$this->DoctorCase->unbindModel(array("belongsTo"=>array("Doctor")));
		//bind model
		$this->DoctorCase->Doctor->bindModel(
			array(
				'hasOne'=>array(
					'DoctorDetail'=>array(
						'className'=>'Doctor',
						'foreignKey'=>'patient_id'
					)
				)
			)
		);
		
		$this->DoctorCase->Doctor->DoctorDetail->displayField="patient_id";
		$valieddoct = $this->DoctorCase->Doctor->DoctorDetail->find('list',array('Doctor.patient_id >'=>'0'));
		$doctors=array();
		if(count($valieddoct)>0){
			$cons = array('Patient.ispatient'=>'0','Patient.isactive'=>'1','Patient.isdeleted'=>'0','Patient.id'=>array_values($valieddoct));
			$doctors = $this->DoctorCase->Patient->find('list',array('conditions'=>$cons,'order'=>array('Patient.name'=>'ASC')));
		}
		//$pcond = array("Doctor.ispatient"=>'0','Doctor.isdeleted'=>'0','Doctor.isactive'=>'1');
		$dfltdoct = array("0"=>"Choose Doctor");
		//$doctors = $this->DoctorCase->Doctor->find('list',array('conditions'=>$pcond));
		$doctors = array_merge($dfltdoct,$doctors);
		$this->set('doctors',$doctors);
		$this->set('doctid',$doctid);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout="admin";
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
		/*if ($this->DoctorCase->delete()) {
			$this->Session->setFlash(__('The doctor case has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor case could not be deleted. Please, try again.'));
		}*/
		//update the case as deleted 
		$updata = array('DoctorCase.is_deleted'=>'1');
		$upcond = array('DoctorCase.id'=>$id);
		$this->DoctorCase->updateAll($updata,$upcond);
		$this->Session->setFlash(__('The doctor case has been deleted.'));
		return $this->redirect(array('action' => 'index'));
	}
}
