<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
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
					//mail sending
					$patientname=$this->request->data['Patient']['name'];
					$useremail=$this->request->data['Patient']['email'];
					$dpdfldshow=$this->request->data['Patient']['dpdfldshow'];
					
					if($this->Patient->save($this->request->data)){
						//user saved into the db successfully
						$this->Session->write(array('loggedpatientid'=>$this->Patient->id,'loggedpatientname'=>$this->request->data['Patient']['name']));
						
						if($this->userislogin()){
							//valid user go their profile dash bord section
							//remove doct session if any present
							$this->doctusersessionremove();
						}
						//send mail to the user with their login deytails and say thanks
						$data = array(
							'name'=>$patientname,
							'email'=>$useremail,
							'dpdfldshow'=>$dpdfldshow
						);
						
						$this->sitemailsend($mailtype=1,$from=array(),$to=$useremail,$messages="New patient registration",$data);
						
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
					'conditions'=>array(
						'PatientCase.doctor_id >'=>'0',
						'PatientCase.isclosed'=>'0',
						'PatientCase.is_deleted'=>'0',
						'PatientCase.ispaymentdone'=>'1'
					),
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
		//has one opinion
		$this->Patient->PatientCase->bindModel(
			array(
				'hasOne'=>array(
					'CaseOpinion'=>array(
						'className'=>'CaseOpinion',
						'foreingKey'=>'doctor_case_id',
						'conditions'=>array('CaseOpinion.is_deleted'=>'0','CaseOpinion.is_confirm'=>'1')
					)
				)
			)
		);
		$this->Patient->PatientCase->CaseOpinion->unbindModel(array(
			'belongsTo'=>array('DoctorCase')
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
		//pr($doctcaseDetail);
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
				'PatientCase'=> array(
					'className'=> 'DoctorCase',
					'foreignKey'=> 'patient_id',
					'conditions'=> array('PatientCase.ispaymentdone'=>'1','PatientCase.isclosed'=>'0','PatientCase.doctor_id >'=>'0'),
					'fields'=> '',
					'order'=> array('PatientCase.id'=>'DESC')
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
		/*$patientalldeatils=array();
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
	//die();*/
		$this->loadModel('SampleQuestionnaire');
		$this->loadModel('Specialization');
		$options = array('conditions' => array('SampleQuestionnaire.is_deleted'=>'0'),'order'=>array('SampleQuestionnaire.id'=>'DESC'));
		$SampleQuestionnaire = $this->SampleQuestionnaire->find('first', $options);
		$patientdetails=array();
		$social_history=array();
		$about_the_illness=array();
		$past_history=array();
		$test_report=array();
		
		if(is_array($SampleQuestionnaire) && count($SampleQuestionnaire)>0){
			$patientdetails = unserialize($SampleQuestionnaire['SampleQuestionnaire']['patient_detail']);
			$social_history = unserialize($SampleQuestionnaire['SampleQuestionnaire']['social_history']);
			$about_the_illness = unserialize($SampleQuestionnaire['SampleQuestionnaire']['about_the_illness']);
			$past_history = unserialize($SampleQuestionnaire['SampleQuestionnaire']['past_history']);
			$test_report = unserialize($SampleQuestionnaire['SampleQuestionnaire']['test_report']);
		}
		$patientalldeatils=array(
			'SampleQuestionnaire'=>$SampleQuestionnaire,
			'QPatientDetails'=>$patientdetails,
			'QSocialHistory'=>$social_history,
			'QAboutTheIll'=>$about_the_illness,
			'QPastHistory'=>$past_history,
			'QTestReport'=>$test_report
		);
		//$months=array('01','02','03','04','05','06','07','08','09','10','11','12');
		$performance_status=array(
			'0'=>'Patient is fully active, able to carry on all pre-disease performance without restriction',
			'1'=>'Patient is restricted in physically strenuous activity but ambulatory and able to carry out work of a light or sedentary nature, e.g., light house work, office work',
			'3'=>'Patient is ambulatory and capable of all self-care but unable to carry out any work activities. Up and about more than 50% of waking hours (excluding the normal sleeping time).',
			'4'=>'Patient is capable of only limited self-care, confined to bed or chair more than 50% of waking hours (excluding the normal sleeping time)',
			'5'=>'Patient is completely disabled. Cannot carry on any self-care. Totally confined to bed or chair.'
		);
		//$units=array();
		$alldiagonisises=array();
		$this->Specialization->displayField="name";
		$specializations = $this->Specialization->find('list',array('conditions'=>array('Specialization.isdeleted'=>'0')));
		if(is_array($specializations) && count($specializations)>0){
			$alldiagonisises=$specializations;
		}
		
		//$this->set('months',$months);
		$this->set('performance_status',$performance_status);
		//$this->set('units',$units);
		$this->set('alldiagonisises',$alldiagonisises);
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
	
	function emailsend(){
		
		//mail sending section 
		/*$message="Email testing";
		$Email = new CakeEmail($this->mailTransportType);
		$Email->from(array('test@gmail.com'=>'edctestuser from loc'));
		$Email->to('mrintoryal@yahoo.in');
		$Email->subject('successfully registered from local '.$this->mailTransportType);
		$Email->template('registration','emain');
		$Email->emailFormat('html');
		$Email->viewVars(array('name' => "Guddu"));
		//$Email->delivery = 'smtp';
		$response = $Email->send();
		//pr($Email);
		pr($response);*/
		
		$this->sitemailsend($mailtype=1,$from=array("mytext@hh.com"=>'ha ha'),$to="mrintoryal@yahoo.in",$message="registration",$data=array('name'=>'aksath'));
		die(json_encode(array('status'=>"error",'message'=>$message)));
	}
	
	function paypalpayment(){
		$cancel_return = "http://localhost/EDC/patients/paymentcancel";
		$return = "http://localhost/EDC/patients/paymentsuccess";
		$configdata=array(
			'item_name'=>'test item',
			'item_number'=>'1',
			'amount'=>'200',
			'currency_code'=>'USD',
			'cancel_return'=>$cancel_return,
			'return'=>$return,
		);
		$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
		//$paypal_url='https://www.paypal.com/cgi-bin/webscr';
		$paypal_id='mrintoryal_business@yahoo.in';
		
		$this->set('configdata',$configdata);
		$this->set('paypal_url',$paypal_url);
		$this->set('paypal_id',$paypal_id);
	}
	public function paymentsucces(){
		
		/*if(isset($_GET)){
			echo "get data ";
			pr($_GET);
		}*/
		
		$item_number = isset($_REQUEST['item_number'])?$_REQUEST['item_number']:''; 
		$txn_id = isset($_REQUEST['tx'])?$_REQUEST['tx']:'';
		$payment_gross = isset($_REQUEST['amt'])?$_REQUEST['amt']:'';
		$currency_code = isset($_REQUEST['cc'])?$_REQUEST['cc']:'';
		$payment_status = isset($_REQUEST['st'])?$_REQUEST['st']:'';
		$custom = isset($_REQUEST['cm'])?$_REQUEST['cm']:'0';
		if(!empty($txn_id) && $custom>0){
			$this->loadModel('DoctorCase');
			$caseid=$custom;
			$tsn_datails = serialize($_REQUEST);
			$updata = array('DoctorCase.ispaymentdone'=>'1','DoctorCase.transaction_id'=>"'".$txn_id."'",'DoctorCase.tsn_datails'=>"'".$tsn_datails."'");
			$upcond = array('DoctorCase.id'=>$caseid);//'DoctorCase.schedule_doctor_id'=>$scheduledcotid,
			$this->DoctorCase->updateAll($updata,$upcond);
			//after update the case 
			$upcond['DoctorCase.ispaymentdone']='1';
			$doctorcase = $this->DoctorCase->find('first',array('recursive'=>'1','conditions'=>$upcond));
			if(is_array($doctorcase) && count($doctorcase)>0){
				$doctorname=(isset($doctorcase['Doctor']['name']))?$doctorcase['Doctor']['name']:'';
				$patientname=(isset($doctorcase['Patient']['name']))?$doctorcase['Patient']['name']:'';
				$patientid=(isset($doctorcase['Patient']['id']))?$doctorcase['Patient']['id']:'0';
				$patientemail = (isset($doctorcase['Patient']['email']))?$doctorcase['Patient']['email']:'';
				//if patient email found
				if($patientemail!=''){
					$data = array(
						'name'=>$patientname,
						'available_date'=>$doctorcase['DoctorCase']['available_date'],
						'opinion_due_date'=>$doctorcase['DoctorCase']['opinion_due_date'],
						'consultant_fee'=>$doctorcase['DoctorCase']['consultant_fee'],
						'diagonisis'=>$doctorcase['DoctorCase']['diagonisis'],
						'doctorname'=>$doctorname,
					);
					
					$this->sitemailsend($mailtype=2,$from=array(),$to=$patientemail,$message="EDC Email",$data);
				}
				//update the doctor schedule 
				$scheduledcotid=$doctorcase['DoctorCase']['schedule_doctor_id'];
				if($scheduledcotid>0){
					$this->loadModel('ScheduleDoctor');
					
					$this->ScheduleDoctor->bindModel(array(
						'belongsTo'=>array(
							'Doct'=>array(
								'className'=>'Patient',
								'foreignKey'=>'doct_id',
								'fields'=>array('Doct.id','Doct.name')
							)
						)
					));
					//now bind DoctotDetails
					$this->ScheduleDoctor->Doct->bindModel(array(
						'hasOne'=>array(
							'DoctorDetail'=>array(
								'className'=>'Doctor',
								'foreignKey'=>'patient_id',
								'fields'=>array('DoctorDetail.id','DoctorDetail.maxappointment')
							)
						)
					));
					//get the details of the schedule doctore
					$updcond = array('ScheduleDoctor.id'=>$scheduledcotid);
					$scheduledoct = $this->ScheduleDoctor->find('first',array('recursive'=>'2','conditions'=>$updcond));
					if(is_array($scheduledoct) && count($scheduledoct)>0){
						// now update the count of the doct of assign patient details 
						// update section
						$totalassignment = $scheduledoct['ScheduleDoctor']['assignment'];
						$maxassignment = isset($scheduledoct['Doct']['DoctorDetail']['maxappointment'])?$scheduledoct['Doct']['DoctorDetail']['maxappointment']:'1';
						$appointmentfull=0;
						if(($totalassignment+1)>=$maxassignment){
							//
							$appointmentfull=1;
						}
						$updat = array('ScheduleDoctor.assignment'=>'ScheduleDoctor.assignment+1','ScheduleDoctor.assingmentfull'=>$appointmentfull);
						
						$this->ScheduleDoctor->updateAll($updat,$updcond);
					}
				}
				//
				//now update the form submit count in patient tables
				//new
				$patientupddata = array('Patient.detailsformsubmit'=>'6','Patient.is_questionnair_closed'=>'0');
				$patientcond = array('Patient.id'=>$patientid);
				$this->Patient->updateAll($patientupddata,$patientcond);
				$this->Session->setFlash(__('Your payment successfully done. Transaction id : '.$txn_id));
			}
			else{
				//invalid data response
				$this->Session->setFlash(__('Your payment done'));
			}
			//$this->redirect(array('controller'=>'patients','action'=>'dashboard'));
			
			$this->redirect(array('controller'=>'patientDetails','action'=>'patientconsultant'));
		}
		else{
			//die("payment error");
			$this->Session->setFlash(__('Sorry something wrong.'));
			$this->redirect(array('controller'=>'patientDetails','action'=>'patientconsultant'));
		}
	}
	public function paymentcancel(){
		$this->Session->setFlash(__('Payment cancelled.'));
		$this->redirect(array('controller'=>'patientDetails','action'=>'patientconsultant'));
	}
	
	public function paymentsucces_notify(){
		
	}
	
/**
 * forgotpassword method
 */
	public function forgotpassword(){
		$this->layout="smallheader";
		if($this->request->is('post')){
			$email = isset($this->request->data['email'])?$this->request->data['email']:'';
			//validation
			$validate=true;
			if($email==''){
				$this->Session->setFlash(__('Enter your registered email id.'),'default',array('class'=>'error'));
				$validate=false;
			}
			else{
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$validate=false;
					$this->Session->setFlash(__('Enter valid email format.'),'default',array('class'=>'error'));
				}
			}
			
			if($validate){
				//find the email is registered or not
				$cond = array('Patient.email'=>$email,'Patient.isdeleted'=>'0','Patient.isactive'=>'1');
				$patient = $this->Patient->find('first',array('conditions'=>$cond));
				if(is_array($patient) && count($patient)>0){
					$name = isset($patient['Patient']['name'])?$patient['Patient']['name']:'';
					$oldpassv = isset($patient['Patient']['dpdfldshow'])?$patient['Patient']['dpdfldshow']:'';
					$oldpass = isset($patient['Patient']['password'])?$patient['Patient']['password']:'';
					$nax = base64_encode($email."_*".$oldpass);
					$resetpass = FULL_BASE_URL.$this->base."/Patients/resetpassword/".$nax;
					//die();
					$data = array(
						'name'=>$name,
						'link'=>$resetpass,
						'oldpass'=>$oldpassv
					);
					
					$this->Session->setFlash(__('We have sent you a password reset link to your email.'),'default',array('class'=>'success'));
					//send mail for reset the password
					$this->sitemailsend($mailtype=9,$from=array(),$to=$email,"pasword reset link",$data);
				}
				else{
					$this->Session->setFlash(__('Your email id does not registered.'),'default',array('class'=>'error'));
				}
			}
		}
	}
	
/**
 * resetpassword method
 * @param string $nax
 */
	public function resetpassword($nax=null){
		$this->layout="smallheader";
		if($this->request->is('post')){
			$newpass = isset($this->request->data['nwpass'])?$this->request->data['nwpass']:'';
			$newcmpass = isset($this->request->data['nwcmpass'])?$this->request->data['nwcmpass']:'';
			$emailpass = explode("_*",base64_decode($nax));
			if(is_array($emailpass) && count($emailpass)==2){
				$email=$emailpass[0];
				$oldpass=$emailpass[1];
				$cond = array('Patient.email'=>$email,'Patient.password'=>$oldpass,'Patient.isdeleted'=>'0','Patient.isactive'=>'1');
				$patient = $this->Patient->find('first',array('conditions'=>$cond));
				if(is_array($patient) && count($patient)>0){
					$patient_id = $patient['Patient']['id'];
					if($newpass!=''){
						if($newpass==$newcmpass){
							//now update the password
							$updata = array(
								'Patient.password'=>"'".md5($newpass)."'",
								'Patient.dpdfldshow'=>"'".$newpass."'"
							);
							$cond['Patient.id']=$patient_id;
							$this->Patient->updateAll($updata,$cond);
							//update password
							$this->Session->setFlash(__('Your password reset successfully.'),'default',array('class'=>'success'));
						}
						else{
							$this->Session->setFlash(__('Confirm password does not matched.'),'default',array('class'=>'error'));
						}
					}
					else{
						$this->Session->setFlash(__('Please enter your new password.'),'default',array('class'=>'error'));
					}
				}
				else{
					$this->Session->setFlash(__(' Link expired.'),'default',array('class'=>'error'));
				}
			}
			else{
				$this->Session->setFlash(__('Invalid Link.'),'default',array('class'=>'error'));
			}
		}
		$this->set('nax',$nax);
	}
	
}
