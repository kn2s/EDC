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
		$this->gotodashboard();
		/*$this->CaseCommunication->recursive = 0;
		$this->set('caseCommunications', $this->Paginator->paginate());*/
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->gotodashboard();
		/*if (!$this->CaseCommunication->exists($id)) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$options = array('conditions' => array('CaseCommunication.' . $this->CaseCommunication->primaryKey => $id));
		$this->set('caseCommunication', $this->CaseCommunication->find('first', $options));*/
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
			$postdate=date("Y-m-d H:i:s");
			//pr($this->request->data);
			$this->CaseCommunication->create();
			if(isset($this->request->data['CaseCommunication']['isquestionaryedit'])){
				$this->request->data['CaseCommunication']['isquestionaryedit']=1;
			}
			else{
				$this->request->data['CaseCommunication']['isquestionaryedit']=0;
			}
			
			$this->request->data['CaseCommunication']['createdate']=$postdate;
			
			if($this->Session->read('loggeddoctid')>0 && $this->request->data['CaseCommunication']['isdoctoresent']==1){
				$this->request->data['CaseCommunication']['doct_id']=$this->Session->read('loggeddoctid');
				$this->request->data['CaseCommunication']['isdoctoresent']=1;
				if ($this->CaseCommunication->save($this->request->data)) {
					//doctor details
					$doctcond=array('Patient.id'=>$this->Session->read('loggeddoctid'));
					$doctor = $this->CaseCommunication->Patient->find('first',array('recursive'=>'-1','conditions'=>$doctcond));
					$doct_name='';
					if(is_array($doctor) && count($doctor)>0){
						$doct_name=$doctor['Patient']['name'];
					}
					$status=1;
					$commid = $this->CaseCommunication->id;
					$postdate = date("G:i - d M Y");
					//now update the case with Awaiting Input (2)
					$this->CaseCommunication->DoctorCase->updateAll(array("DoctorCase.satatus"=>'2'),array('DoctorCase.id'=>$this->request->data['CaseCommunication']['doctor_case_id']));
					//if doct allow questionnair edit
					if($this->request->data['CaseCommunication']['isquestionaryedit']==1){
						//update the patient as he able o edit the 
						$updatedata = array(
							'Patient.doctallowtoeditquetionair'=>'1',
						);
						$upcond=array(
							'Patient.id'=>$this->request->data['CaseCommunication']['patient_id']
						);
						$this->CaseCommunication->Patient->updateAll($updatedata,$upcond);
						//doct allow to edit the questionnair main send
						//get patient details
						$this->CaseCommunication->Patient->unbindModel(array(
							'hasMany'=>array('PatientDetail')
						));
						$patient = $this->CaseCommunication->Patient->find('first',array('recursive'=>'-1','conditions'=>$upcond));
						if(is_array($patient) && count($patient)>0){
							$patientemail=$patient['Patient']['email'];
							$patientname=$patient['Patient']['name'];
							$data = array(
								'name'=>$patientname,
								'doctmessage'=>$this->request->data['CaseCommunication']['comment'],
								'who_do'=>$doct_name
							);
							if($patientemail!=''){
								$this->sitemailsend($mailtype=4,$from=array(),$to=$patientemail,$message="EDC Email question edit",$data);
							}
						}
					}
					else{
						//mail to the patient about the doct message
						$upcond=array(
							'Patient.id'=>$this->request->data['CaseCommunication']['patient_id']
						);
						$patient = $this->CaseCommunication->Patient->find('first',array('recursive'=>'-1','conditions'=>$upcond));
						if(is_array($patient) && count($patient)>0){
							$patientemail=$patient['Patient']['email'];
							$patientname=$patient['Patient']['name'];
							$data = array(
								'name'=>$patientname,
								'message'=>$this->request->data['CaseCommunication']['comment'],
								'who_do'=>$doct_name
							);
							if($patientemail!=''){
								$this->sitemailsend($mailtype=15,$from=array(),$to=$patientemail,$message="EDC Email doct communication",$data);
							}
						}
					}
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
					// send email to the doctor for patient reply
					$patientcond=array('Patient.id'=>$this->Session->read('loggedpatientid'));
					$patient = $this->CaseCommunication->Patient->find('first',array('recursive'=>'-1','conditions'=>$patientcond));
					$patient_name='';
					if(is_array($patient) && count($patient)>0){
						$patient_name = $patient['Patient']['name'];
					}
					//now get doct id
					$doct_id = $this->request->data['CaseCommunication']['doct_id'];
					if($doct_id>0){
						$doctcond=array('Patient.id'=>$doct_id);
						$doctor = $this->CaseCommunication->Patient->find('first',array('recursive'=>'-1','conditions'=>$doctcond));
	
						if(is_array($doctor) && count($doctor)>0){
							$doct_name = $doctor['Patient']['name'];
							$doct_email = $doctor['Patient']['email'];
							$data = array(
								'name'=>$doct_name,
								'message'=>$this->request->data['CaseCommunication']['comment'],
								'who_do'=>$patient_name
							);
							if($doct_email!=''){
								$this->sitemailsend($mailtype=5,$from=array(),$to=$doct_email,$message="EDC Email patient communication",$data);
							}
						}
					}
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
		
		die(json_encode(array('status'=>'0','message'=>"invalid",'communicationid'=>"0","postdate"=>"0")));
	}
	
/**
 * imageupload method
 */
	public function imageupload(){
		$filename='';
		$status='0';
		if(isset($_FILES['docfile']['name'])){
			$status='1';
			//message
			$filename = time().$this->strreplace($_FILES['docfile']['name']);
			if(!move_uploaded_file($_FILES['docfile']['tmp_name'],WWW_ROOT."/casecommunicaion/".$filename)){
				$filename='';
				$status='0';
			}
		}
		die(json_encode(array('status'=>$status,'message'=>'upload','uploadfile'=>$filename)));
	}
	
/**
 * download method
 */
	public function download($filename=''){
		
		/*
		<p>
					<?php 
						if($uploadeddoct!='' || 1){
						//echo $this->request->file("sdkfsdjkfs.jpg");
						}
					?></p>
		*/
		$filename='1455379645Koala.jpg';
		echo $filepath="casecommunicaion/".$filename;
		$this->response->download(
			$filepath
		);
		//,
			//array('download'=>true,'name'=>'testdownload')
		die();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->gotodashboard();
		/*if (!$this->CaseCommunication->exists($id)) {
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
		$this->set(compact('doctorCases', 'patients'));*/
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->gotodashboard();
		/*$this->CaseCommunication->id = $id;
		if (!$this->CaseCommunication->exists()) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseCommunication->delete()) {
			$this->Session->setFlash(__('The case communication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case communication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->gotodashboard();
		/*$this->CaseCommunication->recursive = 0;
		$this->set('caseCommunications', $this->Paginator->paginate());*/
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->gotodashboard();
		/*if (!$this->CaseCommunication->exists($id)) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$options = array('conditions' => array('CaseCommunication.' . $this->CaseCommunication->primaryKey => $id));
		$this->set('caseCommunication', $this->CaseCommunication->find('first', $options));*/
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->gotodashboard();
		/*if ($this->request->is('post')) {
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
		$this->set(compact('doctorCases', 'patients'));*/
		
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->gotodashboard();
		/*if (!$this->CaseCommunication->exists($id)) {
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
		$this->set(compact('doctorCases', 'patients'));*/
		
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->gotodashboard();
		/*$this->CaseCommunication->id = $id;
		if (!$this->CaseCommunication->exists()) {
			throw new NotFoundException(__('Invalid case communication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseCommunication->delete()) {
			$this->Session->setFlash(__('The case communication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case communication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}
}
