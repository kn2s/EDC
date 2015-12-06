<?php
App::uses('AppController', 'Controller');
/**
 * Doctors Controller
 *
 * @property Doctor $Doctor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DoctorsController extends AppController {

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
		$this->Doctor->recursive = 0;
		$this->set('doctors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
		$this->set('doctor', $this->Doctor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Doctor->create();
			if ($this->Doctor->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
			}
		}
		$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
		$this->set(compact('patients', 'specializations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Doctor->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
			$this->request->data = $this->Doctor->find('first', $options);
		}
		$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
		$this->set(compact('patients', 'specializations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Doctor->id = $id;
		if (!$this->Doctor->exists()) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Doctor->delete()) {
			$this->Session->setFlash(__('The doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * dashboard method
 */
	public function dashboard(){
		$this->doctuserloginsessionchecked();
		$this->layout="doctorlayout";
		$this->loadModel('DoctorCase');
		$this->DoctorCase->unbindModel(array(
			'belongsTo'=>array('Doctor')
		));
		$this->DoctorCase->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		$this->DoctorCase->Patient->bindModel(array(
				'hasOne'=>array(
					'PatientDetail' => array(
						'className' => 'PatientDetail',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => array('PatientDetail.id'=>'DESC'),
						'limit' => '1',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					)
				)
			)
		);
		$conds = array('DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),'DoctorCase.ispaymentdone'=>'1');
		$doctorCases = $this->DoctorCase->find('all',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
		/* pr($conds);
		pr($doctorCases);
		die() */;
		$this->set('doctorCases',$doctorCases);
	}
	
/**
 * casedetail method
 */
	public function casedetail($id=0){
		$this->doctuserloginsessionchecked();
		$this->layout="doctorcase";
		$this->loadModel('DoctorCase');
		$this->DoctorCase->unbindModel(array(
			'belongsTo'=>array('Doctor')
		));
		$this->DoctorCase->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		$this->DoctorCase->Patient->bindModel(array(
				'hasOne'=>array(
					'PatientDetail' => array(
						'className' => 'PatientDetail',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => array('PatientDetail.id'=>'DESC'),
						'limit' => '1',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					)
				)
			)
		);
		$conds = array('DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),'DoctorCase.ispaymentdone'=>'1','DoctorCase.id'=>$id);
		$doctorCase = $this->DoctorCase->find('first',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
		if(is_array($doctorCase) && count($doctorCase)>0){
			$this->set('doctorCases',$doctorCase);
			$this->set("parientviewinfo",'1');
			$this->set("doctcaseid",$id);
		}
		else{
			$this->redirect(array('action'=>'dashboard'));
		}
	}
	
/**
 * communication method
 */
	public function communication(){
		$this->layout="blanks";
		if($this->request->is("post")){
			$caseid = isset($this->request->data['caseid'])?$this->request->data['caseid']:'0';
			/*$this->loadModel('CaseCommunication');
			
			$conds = array('CaseCommunication.doctor_case_id'=>$caseid);
			$caseCommunications = $this->CaseCommunication->find('all',array('recursive'=>'1','conditions'=>$conds));
			//pr($caseCommunications);
			//die();
			$this->set('caseCommunications',$caseCommunications);*/
			
			$this->loadModel('DoctorCase');
			$this->DoctorCase->unbindModel(array(
				'belongsTo'=>array('Patient')
			));
			$this->DoctorCase->Doctor->unbindModel(array(
				'hasMany'=>array('PatientDetail')
			));
			$this->DoctorCase->Doctor->bindModel(array(
				'hasOne'=>array(
					'DoctorDetail'=>array(
						'className' => 'Doctor',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					)
				)
			));
			//now bind the communication sections
			$this->DoctorCase->bindModel(array(
				'hasMany'=>array(
					'CaseCommunication' => array(
						'className' => 'CaseCommunication',
						'foreignKey' => 'doctor_case_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					)
				)
			));
			
			$conds = array('DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),'DoctorCase.ispaymentdone'=>'1','DoctorCase.id'=>$caseid);
			$doctcaseDetail  = $this->DoctorCase->find('first',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
			$this->set('doctcaseDetail',$doctcaseDetail);
		}
	}
	
/**
 * patientsummery method
 */
	public function patientsummery(){
		//pr($this->request->data);
		$this->layout="blanks";
		if($this->request->is("post")){
			$caseid = isset($this->request->data['caseid'])?$this->request->data['caseid']:'0';
			$patientid="0";
			$this->loadModel('DoctorCase');
			$conds = array('DoctorCase.id'=>$caseid,'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),'DoctorCase.ispaymentdone'=>'1');
			$casedetail  = $this->DoctorCase->find('first',array('recursive'=>'0','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
			if(isset($casedetail['DoctorCase']['patient_id'])){
				$patientid = $casedetail['DoctorCase']['patient_id'];
			}
			
			$this->loadMOdel('Patient');
			//bind the patiend model with other as has one
			$this->Patient->unbindModel(array(
				'hasMany'=>array('PatientDetail')
			));
			$this->Patient->bindModel(array(
				'hasOne'=>array(
					'PatientDetail' => array(
						'className' => 'PatientDetail',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => array('PatientDetail.id'=>'DESC'),
						'limit' => '1',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					),
					'PatientDocument' => array(
						'className' => 'PatientDocument',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => array('PatientDocument.id'=>'DESC'),
						'limit' => '1',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					),
					'PatientPastHistory' => array(
						'className' => 'PatientPastHistory',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => array('PatientPastHistory.id'=>'DESC'),
						'limit' => '1',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					),
					'Socialactivity' => array(
						'className' => 'Socialactivity',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => array('Socialactivity.id'=>'DESC'),
						'limit' => '1',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					),
					'AboutIllness' => array(
						'className' => 'AboutIllness',
						'foreignKey' => 'patient_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => array('AboutIllness.id'=>'DESC'),
						'limit' => '1',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					),
				)
			));
			//unbind
			$this->Patient->PatientDetail->unbindModel(array(
				'belongsTo'=>array('Patient')
			));
			$this->Patient->PatientDocument->unbindModel(array(
				'belongsTo'=>array('Patient')
			));
			$this->Patient->PatientPastHistory->unbindModel(array(
				'belongsTo'=>array('Patient')
			));
			$this->Patient->Socialactivity->unbindModel(array(
				'belongsTo'=>array('Patient')
			));
			$this->Patient->AboutIllness->unbindModel(array(
				'belongsTo'=>array('Patient')
			));
			//now bind the model drug allergy
			$this->Patient->PatientDetail->bindModel(array(
				'hasMany'=>array(
					'DrugAlergy' => array(
						'className' => 'DrugAlergy',
						'foreignKey' => 'patient_detail_id',
						'dependent' => false,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
					)
				)
			));
			
			$cond = array('Patient.id'=>$patientid);
			$patientalldeatils = $this->Patient->find('first',array('recursive'=>'2','conditions'=>$cond));
			//pr($patientalldeatils);
			//die();
			$this->set('patientalldeatils',$patientalldeatils);
		}
	}
 
/**
 * basicdetails method
 * @return array
 */
	public function basicdetails(){
		$this->doctuserloginsessionchecked();
		$this->Doctor->unbindModel(array(
			'belongsTo'=>array('Patient','Specialization')
		));
		$cond = array('Doctor.patient_id'=>$this->Session->read("loggeddoctid"));
		$doctordetails = $this->Doctor->find('first',array('recursive'=>'0','conditions'=>$cond));
		
		return $doctordetails;
	}
	
/**
 * logout method
 */
	public function logout(){
		$this->doctusersessionremove();
		$this->doctuserloginsessionchecked();
	}
 
/**
ADMIN SECTION START FROM HERE
**/
	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		
		$this->layout='admin';
		$this->validateadminsession();
		$findcondition = array('Doctor.patient_id >'=>'0');
		$doctors = $this->Doctor->find('all',array('recursive'=>'0','conditions'=>$findcondition));
		$this->set('doctors',$doctors);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
		$this->set('doctor', $this->Doctor->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout='admin';
		$this->validateadminsession();
		
		if ($this->request->is('post')) {
			//echo WWW_ROOT;
			$this->Doctor->create();
			//pr($this->request->data);
			//die();
			//first add as patient 
			$this->request->data['Patient']['createtime']=time();
			$this->request->data['Patient']['password']=md5($this->request->data['Patient']['password']);
			if($this->Doctor->Patient->save(array('Patient'=>$this->request->data['Patient']))){
				$patient_id = $this->Doctor->Patient->id;
				$this->request->data['Doctor']['patient_id']=$patient_id;
				//image upload section
				if($this->request->data['Doctor']['image']['size']>0){
					$filename = time().trim(str_replace("&,#, ,*","",$this->request->data['Doctor']['image']['name']));
					$uploaddirectory = WWW_ROOT."\doctorimage\\".$filename;
					if(move_uploaded_file($this->request->data['Doctor']['image']['tmp_name'],$uploaddirectory)){
							$this->request->data['Doctor']['image'] = $filename;
					}
					else{
						$this->request->data['Doctor']['image'] = "";
					}
				}
				else{
					$this->request->data['Doctor']['image'] = "";
				}
				
				if ($this->Doctor->save(array('Doctor'=>$this->request->data['Doctor']))) {
					$this->Session->setFlash(__('The doctor has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
				}
			}
		}
		//$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
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
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Doctor->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
			$this->request->data = $this->Doctor->find('first', $options);
		}
		$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
		$this->set(compact('patients', 'specializations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Doctor->id = $id;
		if (!$this->Doctor->exists()) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Doctor->delete()) {
			$this->Session->setFlash(__('The doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
