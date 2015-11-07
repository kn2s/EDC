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
		$this->set('doctors',$doctors);
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
					$this->request->data['Patient']['password']=md5($this->request->data['Patient']['password']);
					if($this->Patient->save($this->request->data)){
						//user saved into the db successfully
						/*$this->Session->write(array('loggedpatientid'=>$this->Patient->id,'loggedpatientname'=>$this->request->data['Patient']['name']));
						
						if($this->userislogin()){
							//valid user go their profile dash bord section
							//$this->redirect(array('action'=>'dashboard'));
							$this->Session->setFlash(__('You are successfully registered.'));
						}
						else{
							//session creation error
							$this->Session->setFlash(__('sorry we have problem please try again.'));
						}*/
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
		//get user details
		$poption = array('Patient.id'=>$this->Session->read('loggedpatientid'));
		$patient = $this->Patient->find('first',array('recursive'=>'1','conditions'=>$poption));
		//pr($patient);
		$this->set('patient', $patient);
		//die();
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
		$this->Patient->recursive = 0;
		$this->set('patients', $this->Patient->find('all',array('conditions'=>array('Patient.ispatient'=>'1'))));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
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
}
