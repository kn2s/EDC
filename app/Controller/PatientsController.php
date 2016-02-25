<?php
App::uses('AppController', 'Controller');
/**
 * Patients Controller
 *
 * @property Patient $Patient
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PatientsController extends AppController {

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
		
		$this->loadModel('Doctor');
		$this->loadModel('Homepagecontent');
		$doctors = $this->Doctor->find('all',array('recursive'=>'0','limit'=>'54','order'=>array('Doctor.id'=>'asc')));
		$doctorss = $this->Doctor->find('all',array('recursive'=>'0','limit'=>'54','order'=>array('Doctor.id'=>'asc')));
		
		$this->set('doctors',array_merge($doctors,$doctorss));
		$this->set('homepagecontent', $this->Homepagecontent->find('first'));
		
	}

/**
 * account method
 *
 * @return void
 */
	public function account(){
		$this->layout="smallheader";

		if(!$this->userislogin()){
			if($this->request->is('post')){
				//pr($this->request->data);
				$validatealldata=true;
			
				if($this->request->data['Patient']['signuporlogin']==1){
					//new user registrations
					if(trim($this->request->data['Patient']['name'])==''){
						$validatealldata=false;
					}
					if(!filter_var($this->request->data['Patient']['email'],FILTER_VALIDATE_EMAIL)){
						$validatealldata=false;
					}
					if(trim($this->request->data['Patient']['password'])==''){
						$validatealldata=false;
					}
					if(trim($this->request->data['Patient']['cpassword'])){
						$validatealldata=false;
					}
					
					//validation over
					if($validatealldata){
						//saved the user in database
						$option = array(
							'Patient.email'=>$this->request->data['Patient']['email'],
							'Patient.isdeleted'=>'0'
						);
						$patientcount = $this->Patient->find('count',array('recursive'=>'0','conditions'=>$option));
						if($patientcount>0){
							//email already present
							$this->Session->setFlash(__('This email already present.'));
						}
						else{
							$this->request->data['Patient']['browserdetails']=$_SERVER['HTTP_USER_AGENT'];
							$this->request->data['Patient']['isactive']='1';
							$this->request->data['Patient']['password']=md5($this->request->data['Patient']['password']);
							if($this->Patient->save($this->request->data)){
								//user saved into the db successfully
								//$this->Session->write(array('loggedpatientid'=>$this->Patient->id,'loggedpatientname'=>$this->request->data['Patient']['name']));
								
								if($this->userislogin()){
									//valid user go their profile dash bord section
									//$this->redirect(array('action'=>'dashboard'));
									$this->Session->setFlash(__('You are successfully registered.'));
								}
								else{
									//session creation error
									$this->Session->setFlash(__('sorry we have problem please try again.'));
								}
							}
							else{
								//saving error section
								$this->Session->setFlash(__('sorry we have problem to saveing you information please try again.'));
							}
						}
					}
					else{
						//show error message
						$this->Session->setFlash(__('All fields are mendatory.'));
						if(!isset($this->request->data['Patient']['terms'])){
							$this->Session->setFlash(__('Accept the term and condition'));
						}
					}
				}
				else{
					//exsisting user login
					if(!filter_var($this->request->data['Patient']['email'],FILTER_VALIDATE_EMAIL)){
						$validatealldata=false;
					}
					if(trim($this->request->data['Patient']['password'])==''){
						$validatealldata=false;
					}
					
					if($validatealldata){
						//validation of email and password
						$option = array(
							'Patient.email'=>$this->request->data['Patient']['email'],
							'Patient.password'=>md5($this->request->data['Patient']['password']),
							'Patient.isdeleted'=>'0'
						);
						$patient = $this->Patient->find('first',array('recursive'=>'0','conditions'=>$option));
						if(isset($patient) && is_array($patient) && count($patient)>0){
							//if patient 
							if($patient['Patient']['ispatient']==1){
								//valid patient user
								$this->Session->write(array('loggedpatientid'=>$patient['Patient']['id'],'loggedpatientname'=>$patient['Patient']['name']));
								if($this->userislogin()){
									//valid user go their profile dash bord section
									$this->redirect(array('action'=>'dashboard'));
								}
								else{
									//session creation error
									$this->Session->setFlash(__('sorry we have problem please try again.'));
								}
							}
							else{
								/*//valied doctor user
								$this->Session->write(array('loggedpatientid'=>$patient['Patient']['id'],'loggedpatientname'=>$patient['Patient']['name']));
								if($this->userislogin()){
									//valid user go their profile dash bord section
									$this->redirect(array('action'=>'dashboard'));
								}
								else{
									//session creation error
									$this->Session->setFlash(__('sorry we have problem please try again.'));
								}*/
								$this->Session->setFlash(__('Email or password does not match.'));
							}
						}
						else{
							//invald user section
							$this->Session->setFlash(__('Email or password does not match.'));
						}
					}
					else{
						//show error message
						$this->Session->setFlash(__('All fields are mendatory.'));
						//pr("<script>alert('All fields are mendatory')</script>");
					}
				}
				//die();
			}
		}
		else{
			//logged user go to theire profile sections
			$this->redirect(array('action'=>'dashboard'));
		}
	}
/**
 * ajaxlogin method
 * @return array
 */
	public function ajaxlogin(){
		header('Content-type:application/json');
		$status=0;
		$message='Invalid Request made';
		//pr($this->request->data);
		if($this->request->is('post')){
			if(!filter_var($this->request->data['Patient']['email'],FILTER_VALIDATE_EMAIL)){
				//$validatealldata=false;
				$message="Invalid email address";
				die(json_encode(array('status'=>$status,'message'=>$message)));
			}
			if(trim($this->request->data['Patient']['password'])==''){
				//$validatealldata=false;
				$message="Password cannot blank";
				die(json_encode(array('status'=>$status,'message'=>$message)));
			}
			$validatealldata=true;
			
			if($validatealldata){
				//validation of email and password
				$option = array(
					'Patient.email'=>$this->request->data['Patient']['email'],
					'Patient.password'=>md5($this->request->data['Patient']['password']),
					'Patient.isdeleted'=>'0'
				);
				$patient = $this->Patient->find('first',array('recursive'=>'0','conditions'=>$option));
				if(isset($patient) && is_array($patient) && count($patient)>0){
					//if patient 
					if($patient['Patient']['ispatient']==1){
						//valid patient user
						$this->Session->write(array('loggedpatientid'=>$patient['Patient']['id'],'loggedpatientname'=>$patient['Patient']['name']));
						if($this->userislogin()){
							//remove doct session if any present
							$this->doctusersessionremove();
							//valid user go their profile dash bord section
							//$this->redirect(array('action'=>'dashboard'));
							die(json_encode(array('status'=>1,'message'=>'')));
						}
						else{
							//session creation error
							//$this->Session->setFlash(__('sorry we have problem please try again.'));
							$message="sorry we have problem please try again.";
							die(json_encode(array('status'=>$status,'message'=>$message)));
						}
					}
					else{
						//valied doctor user
						$this->Session->write(array('loggeddoctid'=>$patient['Patient']['id'],'loggeddocttname'=>$patient['Patient']['name']));
						if($this->doctuserislogin()){
							//remove patient session if present
							$this->usersessionremove();
							//valid user go their profile dash bord section
							//$this->redirect(array('controller'=>'doctors','action'=>'dashboard'));
							die(json_encode(array('status'=>'2','message'=>$message)));
						}
						else{
							//session creation error
							//$this->Session->setFlash(__('sorry we have problem please try again.'));
							$message="sorry we have problem please try again.";
							die(json_encode(array('status'=>$status,'message'=>$message)));
						}
						//$this->Session->setFlash(__('Email or password does not match.'));
						$message="Email or password does not match.";
						die(json_encode(array('status'=>$status,'message'=>$message)));
					}
				}
				else{
					//invald user section
					//$this->Session->setFlash(__('Email or password does not match.'));
					$message="Email or password does not match.";
					die(json_encode(array('status'=>$status,'message'=>$message)));
				}
			}
		}
		die(json_encode(array('status'=>$status,'message'=>$message)));
	}
	
/**
 * ajaxsignup method
 * @return array
 */
	public function ajaxsignup(){
		header('Content-type:application/json');
		$status=0;
		$message='Invalid request made';
		if($this->request->is('post')){
			//new user registrations
			if(trim($this->request->data['Patient']['name'])==''){
				//$validatealldata=false;
				$message="Name can not blank";
				die(json_encode(array('status'=>$status,'message'=>$message)));
			}
			if(!filter_var($this->request->data['Patient']['email'],FILTER_VALIDATE_EMAIL)){
				//$validatealldata=false;
				$message="Invalid email address";
				die(json_encode(array('status'=>$status,'message'=>$message)));
			}
			if(trim($this->request->data['Patient']['password'])==''){
				//$validatealldata=false;
				$message="Password can not blank";
				die(json_encode(array('status'=>$status,'message'=>$message)));
			}
			if(trim($this->request->data['Patient']['cpassword'])!=trim($this->request->data['Patient']['password'])){
				//$validatealldata=false;
				$message="Confirm password can not match";
				die(json_encode(array('status'=>$status,'message'=>$message)));
			}
			if(!isset($this->request->data['Patient']['terms'])){
				//$this->Session->setFlash(__('Accept the term and condition'));
				$message="Accept the term and condition";
				die(json_encode(array('status'=>$status,'message'=>$message)));
			}
			
			$validatealldata=true;
			//validation over
			if($validatealldata){
				//saved the user in database
				$option = array(
					'Patient.email'=>$this->request->data['Patient']['email'],
					'Patient.isdeleted'=>'0'
				);
				$patientcount = $this->Patient->find('count',array('recursive'=>'0','conditions'=>$option));
				if($patientcount>0){
					//email already present
					//$this->Session->setFlash(__('This email already present.'));
					$message="This email already registered";
					die(json_encode(array('status'=>"exist",'message'=>$message)));
				}
				else{
					$this->request->data['Patient']['browserdetails']=$_SERVER['HTTP_USER_AGENT'];
					$this->request->data['Patient']['isactive']='1';
					$this->request->data['Patient']['dpdfldshow']=$this->request->data['Patient']['password'];
					$this->request->data['Patient']['createtime']=time();
					$this->request->data['Patient']['password']=md5($this->request->data['Patient']['password']);
					if($this->Patient->save($this->request->data)){
						//user saved into the db successfully
						$this->Session->write(array('loggedpatientid'=>$this->Patient->id,'loggedpatientname'=>$this->request->data['Patient']['name']));
						
						if($this->userislogin()){
							//valid user go their profile dash bord section
							//$this->redirect(array('action'=>'dashboard'));
							//$this->Session->setFlash(__('You are successfully registered.'));
							
							//remove doct session if any present
							$this->doctusersessionremove();
						}
						else{
							//session creation error
							//$this->Session->setFlash(__('sorry we have problem please try again.'));
						}
						$message="You are successfully registered";
						die(json_encode(array('status'=>"succ",'message'=>$message)));
					}
					else{
						//saving error section
						//$this->Session->setFlash(__('sorry we have problem to saveing you information please try again.'));
						$message="Sorry we have problem to saveing you information please try again.";
						die(json_encode(array('status'=>$status,'message'=>$message)));
					}
				}
			}
		}
		die(json_encode(array('status'=>$status,'message'=>$message)));
	}
 
/**
 * dashboard method
 *
 * @return void
 */
	public function dashboard(){
		$this->layout="smallheader";
		if(!$this->userislogin()){
			$this->redirect(array('action'=>'account'));
		}
		if($this->Session->check("quesformno")){
			$this->Session->delete("quesformno");
		}
		$this->Patient->unbindModel(array("hasMany"=>array("PatientDetail")));
		//bind model section
		$this->Patient->bindModel(array(
			'hasOne'=>array(
				'PatientCase'=>array(
					'className'=>'DoctorCase',
					'foreignKey'=>'patient_id',
					'conditions'=>array('PatientCase.doctor_id >'=>'0','PatientCase.isclosed'=>'0','PatientCase.is_deleted'=>'0'),
					'order'=>array('PatientCase.id'=>'DESC')
				)
			)
		));
		//unbind model lavel 2
		$this->Patient->PatientCase->unbindModel(array(
			'belongsTo'=>array('Patient')
		));
		//lavel 3 undind and bind
		$this->Patient->PatientCase->Doctor->unbindModel(array('hasMany'=>array('PatientDetail')));
		$this->Patient->PatientCase->Doctor->bindModel(array(
			"hasOne"=>array(
				'DoctorDetail'=>array(
					'className'=>'Doctor',
					'foreignKey'=>'patient_id',
					'fields'=>array('DoctorDetail.image','DoctorDetail.id')
				)
			)
		));
		//get user details
		$fields = array('Patient.id','Patient.name','Patient.email','Patient.detailsformsubmit','Patient.detailsubmitpercent');
		$poption = array('Patient.id'=>$this->Session->read('loggedpatientid'));
		$patient = $this->Patient->find('first',array('recursive'=>'3','conditions'=>$poption,"fields"=>$fields));
		//pr($patient);
		$this->set('patient', $patient);
		//die();
	}
	
/**
 * questionary method
 */
	public function questionary(){
		if(!$this->userislogin()){
			$this->redirect(array('action'=>'account'));
		}
		$this->Session->write("quesformno",'5');
		return $this->redirect(array('controller'=>'PatientDetails','action'=>'index'));
	}
	
/**
 * dashboardpreview method
 */
	public function dashboardpreview($sec=0){
		if(!$this->userislogin()){
			$this->redirect(array('action'=>'account'));
		}
		if($sec>=0){
			$this->Session->write("quesformno",$sec);
			return $this->redirect(array('controller'=>'PatientDetails','action'=>'index'));
		}
		else{
			return $this->redirect(array('action'=>'dashboard'));
		}
	}
 
/**
 * communication method
 */
	public function communication(){
		$this->userloginsessionchecked();
		$this->layout="patientdoctcommunication";
		$caseid = isset($this->request->data['caseid'])?$this->request->data['caseid']:'0';
		
		$this->loadModel('DoctorCase');
		
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
		$conds = array('DoctorCase.patient_id'=>$this->Session->read("loggedpatientid"),'DoctorCase.ispaymentdone'=>'1','DoctorCase.isclosed'=>'0','DoctorCase.is_deleted'=>'0');
		$doctcaseDetail  = $this->DoctorCase->find('first',array('recursive'=>'2','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC'),'limit'=>'1'));
		pr($doctcaseDetail);
		if(count($doctcaseDetail)==0){
			return $this->redirect(array('action'=>'dashboard'));
		}
		$this->set('doctcaseDetail',$doctcaseDetail);
		$this->set('doctcaseid',$caseid);
		
	}
/**
 * logout method
 * @return void
 */
	public function logout(){
		$this->usersessionremove();
		$this->userloginsessionchecked();
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Patient->exists($id)) {
			throw new NotFoundException(__('Invalid patient'));
		}
		$options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
		$this->set('patient', $this->Patient->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Patient->create();
			if ($this->Patient->save($this->request->data)) {
				$this->Session->setFlash(__('The patient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient could not be saved. Please, try again.'));
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
		if (!$this->Patient->exists($id)) {
			throw new NotFoundException(__('Invalid patient'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Patient->save($this->request->data)) {
				$this->Session->setFlash(__('The patient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
			$this->request->data = $this->Patient->find('first', $options);
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
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Invalid patient'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Patient->delete()) {
			$this->Session->setFlash(__('The patient has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout="admin";
		$this->validateadminsession();
		$this->Patient->recursive = 0;
		$this->set('patients', $this->Patient->find('all',array('conditions'=>array('Patient.ispatient'=>'1','Patient.isdeleted'=>'0'))));
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
		$this->validateadminsession();
		if (!$this->Patient->exists($id)) {
			throw new NotFoundException(__('Invalid patient'));
		}
		$options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
		$this->set('patient', $this->Patient->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->validateadminsession();
		if ($this->request->is('post')) {
			$this->Patient->create();
			if ($this->Patient->save($this->request->data)) {
				$this->Session->setFlash(__('The patient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient could not be saved. Please, try again.'));
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
		$this->validateadminsession();
		if (!$this->Patient->exists($id)) {
			throw new NotFoundException(__('Invalid patient'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Patient->save($this->request->data)) {
				$this->Session->setFlash(__('The patient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
			$this->request->data = $this->Patient->find('first', $options);
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
		$this->validateadminsession();
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Invalid patient'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Patient->delete()) {
			$this->Session->setFlash(__('The patient has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * admin_quetionary method
 */
	public function admin_quetionary($id=null){
		$this->layout="admin";
		$this->validateadminsession();
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Invalid patient'));
		}
		$this->Patient->unbindModel(array(
			'hasMany'=>array('PatientDetail')
		));
		
		$this->Session->write("quesformno","5");
		
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
		
		$cond = array('Patient.id'=>$this->Patient->id);
		$patientalldeatils = $this->Patient->find('first',array('recursive'=>'2','conditions'=>$cond));
		//pr($patientalldeatils);
		//die();
		$this->set('patientalldeatils',$patientalldeatils);
	}
	
/**
 * samplequestioner method
 */
	public function samplequestioner(){
		$this->layout="sampledefault";
		$patientalldeatils=array();
		//now for testing section
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
				'conditions'=>array('PatientCase.ispaymentdone'=>'1','PatientCase.isclosed'=>'0','PatientCase.doctor_id >'=>'0','PatientCase.is_deleted'=>'0'),
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
	
	$cond =array('Patient.ispatient'=>'1','Patient.isdeleted'=>'1','Patient.detailsformsubmit'=>'5',
	'Patient.email'=>'rishiagarwal@test.ac','Patient.is_questionnair_closed'=>'1','Patient.isactive'=>'0');
	$patientalldeatils = $this->Patient->find('first',array('recursive'=>'2','conditions'=>$cond));
	//pr($patientalldeatils);
	//die();
		$this->set('patientalldeatils',$patientalldeatils);
	}
	
/**
 * sampleopinion method
 */
	public function sampleopinion(){
		$this->layout="sampledefault";
		//load model
		$this->loadModel('SampleOpinion');
		$options = array('conditions' => array('SampleOpinion.is_deleted'=>'0'));
		$patientsampleopinion = $this->SampleOpinion->find('first', $options);
		$this->set('patientsampleopinion',$patientsampleopinion);
	}
	//download the communication docts
	public function communicationdocdownload($filename=''){
		if($filename!=''){
			$filepath="casecommunicaion/".$filename;
			
			$this->downloadfile($filename,$filepath);
		}
		die();
	}
}
