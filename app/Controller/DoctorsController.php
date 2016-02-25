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
		$this->Session->write('doctCurrentView','1');
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
		$conds = array(
			'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),
			'DoctorCase.ispaymentdone'=>'1',
			'DoctorCase.isclosed'=>'0',
			'DoctorCase.is_deleted'=>'0',
		);
		$doctorCases = $this->DoctorCase->find('all',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
		
		//get current case post
		$conds['DoctorCase.satatus']='0';
		$conds['DATE(DoctorCase.createdate) BETWEEN ? AND ?']=array(date("Y-m-d",strtotime("-2 day")),date("Y-m-d"));
		$this->DoctorCase->unbindModel(array(
			'belongsTo'=>array('Doctor')
		));
		$nwdoctorCases = $this->DoctorCase->find('count',array('recursive'=>'0','conditions'=>$conds));
		$this->set('doctorCases',$doctorCases);
		$this->set('nwdoctorCases',$nwdoctorCases);
	}
	
/**
 * dashboardsearch method
 */
	public function dashboardsearch(){
		$resstatus=0;
		$doctcases=array();
		if($this->request->is("post")){
			$searchby = isset($this->request->data['serachtxt'])?$this->request->data['serachtxt']:'';
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
			
			$joins = array(
				array(
					'table' => 'ec_patient_details',
					'alias' => 'PatientDetailS',
					'type' => 'LEFT',
					'conditions' => array(
						'PatientDetailS.patient_id = DoctorCase.patient_id',
					)
				)
			);
			
			$conds = array(
				'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),
				'DoctorCase.ispaymentdone'=>'1',
				'DoctorCase.isclosed'=>'0',
				'DoctorCase.is_deleted'=>'0',
				'OR'=>array(
					'DoctorCase.id LIKE'=>'%'.$searchby.'%',
					'PatientDetailS.name LIKE'=>'%'.$searchby.'%'
				)
				);
			//pr($conds);	
			$doctorCases = $this->DoctorCase->find('all',array('recursive'=>'2','joins'=>$joins,'conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC'),"group"=>'DoctorCase.id'));
			//pr($doctorCases);
			if(is_array($doctorCases) && count($doctorCases)>0){
				$resstatus=1;
				foreach($doctorCases as $doctorCase){
					$gender = isset($doctorCase['Patient']['PatientDetail']['gender'])?$doctorCase['Patient']['PatientDetail']['gender']:'';
					$name = isset($doctorCase['Patient']['PatientDetail']['name'])?$doctorCase['Patient']['PatientDetail']['name']:'';
					$caseid = isset($doctorCase['DoctorCase']['id'])?$doctorCase['DoctorCase']['id']:'0';
					$duedate = isset($doctorCase['DoctorCase']['opinion_due_date'])?$doctorCase['DoctorCase']['opinion_due_date']:date("Y-m-d");
					$diagonisis = isset($doctorCase['DoctorCase']['diagonisis'])?$doctorCase['DoctorCase']['diagonisis']:'';
					$status = isset($doctorCase['DoctorCase']['satatus'])?$doctorCase['DoctorCase']['satatus']:'0';
					switch($status){
						case 1:
							$status = "Pending"; //Opened, sitting idle
							break;
						case 2:
							$status = "AWAITING INPUT"; //When Doctor has sent message in communication and waiting for the reply from the Patient
							break;
						case 3:
							$status = "INPUT RECEIVED"; //When received any input
							break;
						case 4:
							$status = "OPINION SENT"; //when sent an opinion
							break;
						case 5:
							$status = "DELETED"; //where everything stays for 3 months [After deleted from admin]
							break;
						case 6:
							$status = "ARCHIVED"; //only opinion stays for 1 year [after 1 year automatically it will go to archive folder ]
							break;
						default:
							$status = "Unread";
							break;
					}
					
					$datas = array(
						'name'=>$name,
						'caseid'=>$caseid,
						'gender'=>$gender,
						'duedate'=>date("d M Y",strtotime($duedate)),
						'diagonisis'=>$diagonisis,
						'status'=>$status
					);
					
					if($name!=''){
						array_push($doctcases,$datas);
					}
					
				}
			}
		}
		die(json_encode(array("status"=>$resstatus,"doctcases"=>$doctcases,'doctorCases'=>$doctorCases)));
	}
 
/**
 * dashboardfilter method
 */
	public function dashboardfilter(){
		$resstatus=0;
		$doctcases=array();
		if($this->request->is("post")){
			
			$filterby = isset($this->request->data['filterfor'])?$this->request->data['filterfor']:'0';
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
			$conds = array(
				'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),
				'DoctorCase.ispaymentdone'=>'1',
				'DoctorCase.isclosed'=>'0',
				'DoctorCase.is_deleted'=>'0'
			);
			//change the filter log	
			if($filterby==4){
				$conds['DoctorCase.satatus <']=4;
			}
			else{
				$conds['DoctorCase.satatus']=$filterby;
			}
			//pr($conds);	
			$doctorCases = $this->DoctorCase->find('all',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
			//pr($doctorCases);
			if(is_array($doctorCases) && count($doctorCases)>0){
				$resstatus=1;
				foreach($doctorCases as $doctorCase){
					$gender = isset($doctorCase['Patient']['PatientDetail']['gender'])?$doctorCase['Patient']['PatientDetail']['gender']:'';
					$name = isset($doctorCase['Patient']['PatientDetail']['name'])?$doctorCase['Patient']['PatientDetail']['name']:'';
					$caseid = isset($doctorCase['DoctorCase']['id'])?$doctorCase['DoctorCase']['id']:'0';
					$duedate = isset($doctorCase['DoctorCase']['opinion_due_date'])?$doctorCase['DoctorCase']['opinion_due_date']:date("Y-m-d");
					$diagonisis = isset($doctorCase['DoctorCase']['diagonisis'])?$doctorCase['DoctorCase']['diagonisis']:'';
					$status = isset($doctorCase['DoctorCase']['satatus'])?$doctorCase['DoctorCase']['satatus']:'0';
					switch($status){
						case 1:
							$status = "Pending"; //Opened, sitting idle
							break;
						case 2:
							$status = "AWAITING INPUT"; //When Doctor has sent message in communication and waiting for the reply from the Patient
							break;
						case 3:
							$status = "INPUT RECEIVED"; //When received any input
							break;
						case 4:
							$status = "OPINION SENT"; //when sent an opinion
							break;
						case 5:
							$status = "DELETED"; //where everything stays for 3 months [After deleted from admin]
							break;
						case 6:
							$status = "ARCHIVED"; //only opinion stays for 1 year [after 1 year automatically it will go to archive folder ]
							break;
						default:
							$status = "Unread";
							break;
					}
					//old db status 0=un read,1=pending,2=awating input,3=opnion due,4=delay
					
					$datas = array(
						'name'=>$name,
						'caseid'=>$caseid,
						'gender'=>$gender,
						'duedate'=>date("d M Y",strtotime($duedate)),
						'diagonisis'=>$diagonisis,
						'status'=>$status
					);
					array_push($doctcases,$datas);
				}
			}
		}
		die(json_encode(array("status"=>$resstatus,"doctcases"=>$doctcases)));
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
		//bind the case opinion
		$this->DoctorCase->bindModel(array(
			'hasMany'=>array(
				'CaseOpinion'=>array(
					'className'=>'CaseOpinion',
					'foreignKey'=>'doctor_case_id'
				)
			)
		));
		//unbind the doctor case
		$this->DoctorCase->CaseOpinion->unbindModel(array(
			'belongsTo'=>array('DoctorCase')
		));
		$conds = array('DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),'DoctorCase.ispaymentdone'=>'1','DoctorCase.id'=>$id,'DoctorCase.isclosed'=>'0');
		$doctorCase = $this->DoctorCase->find('first',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
		//pr($doctorCase);
		if(is_array($doctorCase) && count($doctorCase)>0){
			//set doct current view
			$currentvw = ($this->Session->check('doctCurrentView'))?$this->Session->read('doctCurrentView'):'1';
			$this->set('doctorCases',$doctorCase);
			$this->set("parientviewinfo",$currentvw);
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
			$this->Session->write('doctCurrentView','2');
			
			$caseid = isset($this->request->data['caseid'])?$this->request->data['caseid']:'0';
			/*$this->loadModel('CaseCommunication');
			
			$conds = array('CaseCommunication.doctor_case_id'=>$caseid);
			$caseCommunications = $this->CaseCommunication->find('all',array('recursive'=>'1','conditions'=>$conds));
			//pr($caseCommunications);
			//die();
			$this->set('caseCommunications',$caseCommunications);*/
			
			$this->loadModel('DoctorCase');
			/*$this->DoctorCase->unbindModel(array(
				'belongsTo'=>array('Patient')
			));*/
			
			$this->DoctorCase->Patient->unbindModel(array(
				'hasMany'=>array('PatientDetail')
			));
			$this->DoctorCase->Doctor->unbindModel(array(
				'hasMany'=>array('PatientDetail')
			));
			
			$this->DoctorCase->Patient->bindModel(array(
				'hasOne'=>array(
					'PatientDetail'=>array(
						'className' => 'PatientDetail',
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
			//remove model from caseCommunications
			$this->DoctorCase->CaseCommunication->unbindModel(array(
				'belongsTo'=>array('DoctorCase','Patient','Doct')
			));
			$conds = array('DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),'DoctorCase.ispaymentdone'=>'1','DoctorCase.id'=>$caseid,'DoctorCase.isclosed'=>'0');
			$doctcaseDetail  = $this->DoctorCase->find('first',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
			$this->set('doctcaseDetail',$doctcaseDetail);
			$this->set('doctcaseid',$caseid);
		}
	}
	
/**
 * patientsummery method
 */
	public function patientsummery(){
		//pr($this->request->data);
		$this->layout="blanks";
		if($this->request->is("post")){
			$this->Session->write('doctCurrentView','1');
			
			$caseid = isset($this->request->data['caseid'])?$this->request->data['caseid']:'0';
			$patientid="0";
			$this->loadModel('DoctorCase');
			$conds = array('DoctorCase.id'=>$caseid,'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"),'DoctorCase.ispaymentdone'=>'1','DoctorCase.isclosed'=>'0');
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
			$this->set('patient_id',$patientid);
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
		//bind specialization model
		$this->Doctor->bindModel(array(
			'hasMany'=>array(
				'DoctorSpecializetion'=>array(
					'className'=>'DoctorSpecializetion',
					'foreignKey'=>'doct_id',
					'conditions'=>array('DoctorSpecializetion.is_deleted'=>'0'),
					'fields'=>''
				)
			)
		));
		//unbind model
		$this->Doctor->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		$this->Doctor->unbindModel(array('belongsTo'=>array('Specialization')));
		
		$findcondition = array('Doctor.patient_id >'=>'0','Patient.ispatient'=>'0','Patient.isdeleted'=>'0');
		$doctors = $this->Doctor->find('all',array('recursive'=>'3','conditions'=>$findcondition));
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
		$this->validateadminsession();
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
			$this->loadMOdel('DoctorSpecializetion');
			//echo WWW_ROOT;
			$this->Doctor->create();
			//pr($this->request->data);
			//die();
			$isemailavailable=false;
			$email = $this->request->data['Patient']['email'];
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				$isemailavailable = $this->useremailavailable($email);
				if(!$isemailavailable){
					$this->Session->setFlash(__('The Email You provide is already present.'));
				}
			}
			else{
				$isemailavailable=false;
				$this->Session->setFlash(__('Invalid email format.'));
			}
			if($isemailavailable){
				//first add as patient 
				$this->request->data['Patient']['createtime']=time();
				$this->request->data['Patient']['dpdfldshow']=$this->request->data['Patient']['password'];
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
							$this->request->data['Doctor']['image'] = "noimage.jpg";
						}
					}
					else{
						$this->request->data['Doctor']['image'] = "noimage.jpg";
					}
					//spetialization node is remove from here
					$doctspecializations = $this->request->data['Doctor']['specialization_id'];
					$this->request->data['Doctor']['specialization_id']=0;
					if ($this->Doctor->save(array('Doctor'=>$this->request->data['Doctor']))) {
						$doctor_id=$this->Doctor->id;
						//now create the schedule for this doct 
						$this->admin_createDoctoreSchedule($patient_id);
						//add spetializations
						
						if(is_array($doctspecializations) && count($doctspecializations)>0){
							foreach($doctspecializations as $ky=>$spzid){
								$data = array(
									"DoctorSpecializetion"=>array(
										'doct_id'=>$doctor_id,
										'specialization_id'=>$spzid
									)
								);
								$this->DoctorSpecializetion->create();
								$this->DoctorSpecializetion->save($data);
							}
						}
						$this->Session->setFlash(__('The doctor has been saved.'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
					}
				}
				else{
					$this->Session->setFlash(__('The doctor could not be saved.All fiels mendatory'));
				}
			}
			else{
				//email invalied
			}
		}
		//$patients = $this->Doctor->Patient->find('list');
		$spccond = array('Specialization.isdeleted'=>'0','Specialization.isactive'=>'1');
		$specializations = $this->Doctor->Specialization->find('list',array('conditions'=>$spccond));
		$this->set(compact('specializations'));
	}
	
/**
* useremailvalidation method
*/
	public function useremailavailable($email='',$userid=0){
		if($email!=''){
			$this->loadMOdel('Patient');
			$this->Patient->unbindModel(array("hasMany"=>array("PatientDetail")));
			$connd = array('Patient.email'=>$email,'Patient.isdeleted'=>'0','Patient.ispatient'=>'0');
			$patient = $this->Patient->find("first",array("recursive"=>'0',"conditions"=>$connd));
			if(is_array($patient) && count($patient)>0){
				if($userid>0){
					//for edit section
					if($userid==$patient['Patient']['id']){
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
			}
			else{
				return true;
			}
		}
		return false;
	}
	
/**
 * admin_createDoctoreSchedule method
 */
	public function admin_createDoctoreSchedule($patient_id=0){
		if($patient_id>0){
			$this->loadMOdel("ScheduleDoctor");
			$this->loadModel('DoctorHoliday');
			$curdate = date("Y-m-d");
			$conditions = array('WorkSchedule.workday >='=>$curdate,'WorkSchedule.isdoctorschedulecreated'=>'1');
			
			$this->ScheduleDoctor->WorkSchedule->unbindModel(array(
				'hasMany'=>array('ScheduleDoctor')
			));
			
			$workschedules = $this->ScheduleDoctor->WorkSchedule->find('all',array('recursive'=>'0','conditions'=>$conditions));
			//pr($workschedules);
			//die();
			//get all available doctors
			
			$this->DoctorHoliday->unbindModel(array(
				'belongsTo'=>array('Doct')
			));
			
			if(is_array($workschedules) && count($workschedules)>0){
				foreach($workschedules as $workschedule){
					//echo $workscheduleid;
					//echo "\n";
					$workscheduleid=$workschedule['WorkSchedule']['id'];
					$workday=$workschedule['WorkSchedule']['workday'];
					$isholiday = $workschedule['WorkSchedule']['isholiday'];
					
					//checked if the day was holiday or not
					$docholicon = array('DoctorHoliday.holidaydate'=>$workday,'DoctorHoliday.doct_id'=>$patient_id);
					$doctholiday = $this->DoctorHoliday->find('first',array('conditions'=>$docholicon));
					$isonholiday=0;
					if(is_array($doctholiday) && count($doctholiday)>0){
						$isonholiday=1;
					}
					else{
						$isonholiday=$isholiday;
					}
					//now save the doct in the doct schedule table
					$svdata = array("ScheduleDoctor"=>array(
						"work_schedule_id"=>$workscheduleid,
						"doct_id"=>$patient_id,
						"isonholiday"=>$isonholiday,
						"assignment"=>'0'
					));
					$this->ScheduleDoctor->create();
					$this->ScheduleDoctor->save($svdata);
				}
			}
		}
	}
	
	
/**
 * admin_activeinactive method
 **/
	public function admin_activeinactive($id=0,$custat=0){
		$ispostcall=false;
		$status=0;
		if($this->request->is("post")){
			$id = (isset($this->request->data["ptnid"]) && $this->request->data["ptnid"]>0)?$this->request->data["ptnid"]:0;
			$custat = (isset($this->request->data["custat"]) && $this->request->data["custat"]>0)?1:0;
			$ispostcall=true;
		}
		if($id>0){
			$updata = array("Patient.isactive"=>$custat);
			$upcond = array("Patient.id"=>$id);
			$this->Doctor->Patient->updateAll($updata,$upcond);
			$status=1;
		}
		if($ispostcall){
			die(json_encode(array("status"=>$status)));
		}
		else{
			return $this->redirect(array('action' => 'index'));
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
		$this->layout='admin';
		$this->validateadminsession();
		$this->loadMOdel('DoctorSpecializetion');
		if (!$this->Doctor->Patient->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			
			//imge
			//pr($this->request->data);
			//die();
			//email validtion
			$isemailavailable=false;
			$email = $this->request->data['Patient']['email'];
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				$isemailavailable = $this->useremailavailable($email,$id);
				if(!$isemailavailable){
					$this->Session->setFlash(__('The Email You provide is already present.'));
				}
			}
			else{
				$isemailavailable=false;
				$this->Session->setFlash(__('Invalid email format.'));
			}
			//default image upload
			if($this->request->data['Doctor']['old_image'] ==''){
				$this->request->data['Doctor']['old_image']='noimage.jpg';
			}
			
			if($isemailavailable){
				if($this->request->data['Doctor']['image']['size']>0){
					$filename = time().trim(str_replace("&,#, ,*","",$this->request->data['Doctor']['image']['name']));
					$uploaddirectory = WWW_ROOT."/doctorimage/".$filename;
					if(move_uploaded_file($this->request->data['Doctor']['image']['tmp_name'],$uploaddirectory)){
							$this->request->data['Doctor']['image'] = $filename;
					}
					else{
						$this->request->data['Doctor']['image'] = $this->request->data['Doctor']['old_image'];
					}
				}
				else{
					$this->request->data['Doctor']['image'] = $this->request->data['Doctor']['old_image'];
				}
				
				if($this->Doctor->Patient->save(array('Patient'=>$this->request->data['Patient']))){
					//spetialization node is remove from here
					$doctspecializations = $this->request->data['Doctor']['specialization_id'];
					//pr($doctspecializations);
					//die();
					$this->request->data['Doctor']['specialization_id']=0;
					
					if ($this->Doctor->save(array("Doctor"=>$this->request->data["Doctor"]))) {
						//update section of doct besic details
					}
					
					$patient_id=$id;
					$doctor_id = $this->request->data['Doctor']['id'];
					
					//update all prev specialization as deleted
					$updt = array('DoctorSpecializetion.is_deleted'=>'1');
					$upcond= array('DoctorSpecializetion.doct_id'=>$doctor_id);
					$this->DoctorSpecializetion->updateAll($updt,$upcond);
					
					//delete all prev specializations
					//$this->DoctorSpecializetion->deleteAll($upcond);
					
					//add spetializations
					if(is_array($doctspecializations) && count($doctspecializations)>0){
						foreach($doctspecializations as $ky=>$spzid){
							$data = array(
								"DoctorSpecializetion"=>array(
									'doct_id'=>$doctor_id,
									'specialization_id'=>$spzid
								)
							);
							
							$this->DoctorSpecializetion->create();
							$this->DoctorSpecializetion->save($data);
						}
					}
				}
				return $this->redirect(array('action' => 'index'));
			}
			else{
				//email validations faild
			}
			
		} else {
			//$findcondition = array('Doctor.patient_id >'=>'0','Patient.ispatient'=>'0','Patient.isdeleted'=>'0');
			$options = array('conditions' => array('Patient.' . $this->Doctor->Patient->primaryKey => $id));
			$this->request->data = $this->Doctor->find('first', $options);
		}
		//$patients = $this->Doctor->Patient->find('list');
		$spccond = array('Specialization.isdeleted'=>'0','Specialization.isactive'=>'1');
		$specializations = $this->Doctor->Specialization->find('list',array('conditions'=>$spccond));
		$dspccond = array('DoctorSpecializetion.doct_id'=>$this->request->data['Doctor']['id'],'DoctorSpecializetion.is_deleted'=>'0');
		$this->DoctorSpecializetion->displayField="specialization_id";
		$choosespecializations = $this->DoctorSpecializetion->find('list',array('conditions'=>$dspccond));
		$this->set(compact('specializations'));
		$this->set('choosespecializations',$choosespecializations);
		//$this->set(compact('patients', 'specializations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Doctor->Patient->id = $id;
		if (!$this->Doctor->Patient->exists()) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$this->request->allowMethod('post', 'delete');
		/*if ($this->Doctor->delete()) {
			$this->Session->setFlash(__('The doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor could not be deleted. Please, try again.'));
		}*/
		$updata = array("Patient.isdeleted"=>'1');
		$upcond = array("Patient.id"=>$id);
		$this->Doctor->Patient->updateAll($updata,$upcond);
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * admin_passwordchange method
 */
	public function admin_passwordchange($id = 0){
		$this->layout='admin';
		$this->validateadminsession();
		$this->Doctor->Patient->id = $id;
		if (!$this->Doctor->Patient->exists()) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		if ($this->request->is(array('post','put'))) {
			//pr($this->request->data);
			if($this->request->data['Patient']['dpdfldshow']!=''){
				$this->request->data['Patient']['password']=md5($this->request->data['Patient']['dpdfldshow']);
				$this->Doctor->Patient->save($this->request->data['Patient']);
				/* $updata = array(
					'Patient.password'=>md5($this->request->data['Patient']['dpdftshow']),
					'Patient.dpdftshow'=>$this->request->data['Patient']['dpdftshow']
				);
				$condi = array(
					'Patient.id'=>$this->request->data['Patient']['id']
				); 
				$this->Doctor->Patient->updateAll($updata,$condi);*/
				$this->redirect(array('action'=>'index'));
			}
			else{
				//password blank
			}
		}
		else{
			$patient = $this->Doctor->find('first',array('recursive'=>'0','conditions'=>array('Doctor.patient_id'=>$id)));
			$this->request->data = $patient;
			//$this->set('patient',$patient);
		}
	}
	
	/**
 * pdfsummery method
 */
	public function pdfsummery($patient_id=0){
		$this->doctuserloginsessionchecked();
		if($patient_id==0){
			//redirect to doct dashboard
			return $this->redirect(array('controller'=>'Doctor','action'=>'dashboard'));
		}
		$this->layout="blanks";
		$this->helpers = array('Pdf');
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
				'PatientCase'=>array(
					'className'=>'DoctorCase',
					'foreignKey'=>'patient_id',
					'conditions'=>array('PatientCase.ispaymentdone'=>'1','PatientCase.isclosed'=>'0','PatientCase.doctor_id >'=>'0'),
					'fields'=>'',
					'order'=>array('PatientCase.id'=>'DESC')
				)
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
		$this->Patient->PatientCase->unbindModel(array(
			'belongsTo'=>array('Patient','Doctor')
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
		
		$cond = array('Patient.id'=>$patient_id);
		$patientalldeatils = $this->Patient->find('first',array('recursive'=>'2','conditions'=>$cond));
		//pr($patientalldeatils);
		$this->set('patientalldeatils',$patientalldeatils);
		$this->set('patient_id',$patient_id);
	}
	
	
}
