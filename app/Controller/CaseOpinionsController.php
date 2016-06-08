<?php
App::uses('AppController', 'Controller');
/**
 * CaseOpinions Controller
 *
 * @property CaseOpinion $CaseOpinion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CaseOpinionsController extends AppController {

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
		/*$this->CaseOpinion->recursive = 0;
		$this->set('caseOpinions', $this->Paginator->paginate());*/
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout="opinionlayout";
		$this->userloginsessionchecked();
		
		if (!$this->CaseOpinion->DoctorCase->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		//bind the model for 2 lavel
		$this->CaseOpinion->DoctorCase->Patient->bindModel(array(
			'hasOne'=>array(
				'PatientDetail'=>array(
					'className'=>'PatientDetail',
					'foreignKey'=>'patient_id'
				)
			)
		));
		$this->CaseOpinion->DoctorCase->Doctor->bindModel(array(
			'hasOne'=>array(
				'DoctorDetail'=>array(
					'className'=>'Doctor',
					'foreignKey'=>'patient_id'
				)
			)
		));
		$this->CaseOpinion->DoctorCase->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		$this->CaseOpinion->DoctorCase->Doctor->unbindModel(array('hasMany'=>array('PatientDetail')));
		$options = array(
			'recursive'=>3,
			'conditions' => array(
				'CaseOpinion.doctor_case_id'=> $id,
				'CaseOpinion.is_deleted'=>'0',
				'CaseOpinion.is_confirm'=>'1',
				'DoctorCase.is_deleted'=>'0',
				'DoctorCase.isclosed'=>'0'
			),
			'order'=>array('CaseOpinion.id'=>'DESC')
		);
		$caseopinion = $this->CaseOpinion->find('first', $options);
		//pr($caseopinion);
		if(is_array($caseopinion) && count($caseopinion)>0){
			$this->set('caseOpinion',$caseopinion );
		}
		else{
			return $this->redirect(array('controller'=>'Patients','action'=>'dashboard'));
		}
	}

	
/**
 * doctorview method
 *
 * @throws NotFoundException
 * @param string $id
 * @param string $is_new
 * @return void
 */
	public function doctorview($id = null,$is_new=0) {
		$this->layout="doctopinionlayout";
		$this->doctuserloginsessionchecked();
		
		if (!$this->CaseOpinion->DoctorCase->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		//bind the model for 2 lavel
		$this->CaseOpinion->DoctorCase->Patient->bindModel(array(
			'hasOne'=>array(
				'PatientDetail'=>array(
					'className'=>'PatientDetail',
					'foreignKey'=>'patient_id'
				)
			)
		));
		$this->CaseOpinion->DoctorCase->Doctor->bindModel(array(
			'hasOne'=>array(
				'DoctorDetail'=>array(
					'className'=>'Doctor',
					'foreignKey'=>'patient_id'
				)
			)
		));
		$this->CaseOpinion->DoctorCase->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		$this->CaseOpinion->DoctorCase->Doctor->unbindModel(array('hasMany'=>array('PatientDetail')));
		
		$options = array(
			'recursive'=>3,
			'conditions' => array(
				'CaseOpinion.doctor_case_id'=> $id,
				'CaseOpinion.is_deleted'=>'0'
			),
			'order'=>array('CaseOpinion.id'=>'DESC')
		);
		$caseOpiniion = $this->CaseOpinion->find('first', $options);
		if(!isset($caseOpiniion['CaseOpinion']['id'])){
			$this->Session->setFlash(__("Invalid Case Informatin"));
			return $this->redirect(array('controller'=>'doctors','action'=>'dashboard'));
		}
		else{
			$doct_id = isset($caseOpiniion['DoctorCase']['doctor_id'])?$caseOpiniion['DoctorCase']['doctor_id']:0;
			if($doct_id==0 ||($doct_id!=$this->Session->read('loggeddoctid'))){
				$this->Session->setFlash(__("Invalid Case Informatin"));
				return $this->redirect(array('controller'=>'doctors','action'=>'dashboard'));
			}
		}
		$this->set('caseOpinion',$caseOpiniion );
		$this->set('is_new',$is_new);
		//get other opinion of that users and the doctor 
		$patient_id = isset($caseOpiniion['DoctorCase']['patient_id'])?$caseOpiniion['DoctorCase']['patient_id']:0;
		$otheropinions=array();
		if($patient_id>0){
			$othcasescond =array(
				'DoctorCase.patient_id'=>$patient_id,
				'DoctorCase.doctor_id'=>$this->Session->read('loggeddoctid'),
				'DoctorCase.ispaymentdone'=>'1',
				'DoctorCase.is_deleted'=>'0'
			);
			$allcases = $this->CaseOpinion->DoctorCase->find('list',array('conditions'=>$othcasescond));
			if(is_array($allcases) && count($allcases)>0){
				$case_ids = array_keys($allcases);
				//now find the opinions 
				$findopi = array(
					'CaseOpinion.doctor_case_id'=>$case_ids,
					'CaseOpinion.is_deleted'=>'0'
				);
				$otheropinions = $this->CaseOpinion->find('all',array(
					'recursive'=>'0',
					'conditions'=>$findopi
				));
			}
		}
		$this->set('otheropinions',$otheropinions);
	}

/**
 * approvedcancel method
 */
	public function approvedcancel(){
		$this->doctuserloginsessionchecked();
		header('Content-type:application/json');
		$status=0;
		$message="Invalid request";
		if($this->request->is('post')){
			$opinion_id = isset($this->request->data['opinion_id'])?$this->request->data['opinion_id']:0;
			$isconfirm = isset($this->request->data['isconfirm'])?$this->request->data['isconfirm']:0;
			//validate the opinion
			$findcond = array(
				'CaseOpinion.id'=>$opinion_id,
				'CaseOpinion.is_deleted'=>'0',
				'CaseOpinion.is_confirm'=>'0'
			);
			$caseOpinion  = $this->CaseOpinion->find('first',array('recursive'=>'2','conditions'=>$findcond));
			
			if(is_array($caseOpinion) && count($caseOpinion)>0){
				$doctcaseid = $caseOpinion['CaseOpinion']['doctor_case_id'];
				$opinion_comment = $caseOpinion['CaseOpinion']['comment'];
				if($isconfirm==1){
					$message="Your opinion saved successfully and delivered to the patient";
					$status='1';
					$updata = array('CaseOpinion.is_confirm'=>'1');
					$this->CaseOpinion->updateAll($updata,$findcond);
					$isfound=0;
					//mail sending section
					if($isfound==0){
						$today = date("Y-m-d");
						$caseclosedate = date("Y-m-d",strtotime("+30 days"));
						$casedeletedate = date("Y-m-d",strtotime("+60 days"));
						//now update the case with opinion post (4)
						$caseupcond=array('DoctorCase.id'=>$doctcaseid,'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"));
						$this->CaseOpinion->DoctorCase->updateAll(
						array(
							"DoctorCase.satatus"=>'4',
							'DoctorCase.is_opnion_given'=>'1',
							'DoctorCase.closedate'=>"'".$caseclosedate."'",
							'DoctorCase.deactivatedata'=>"'".$casedeletedate."'"
						),
						$caseupcond);
						$casedoctor = $caseOpinion['DoctorCase'];
						
						if(is_array($casedoctor) && count($casedoctor)>0){
							//send email section
							$patientemail=(isset($casedoctor['Patient']['email']))?$casedoctor['Patient']['email']:'';
							$patientname=(isset($casedoctor['Patient']['name']))?$casedoctor['Patient']['name']:'';
							
							//is patient is open the questionary edit permission them it remove
							$patientcanedit = (isset($casedoctor['Patient']['doctallowtoeditquetionair']))?$casedoctor['Patient']['doctallowtoeditquetionair']:'1';
							if($patientcanedit==1){
								$patineupcon = array('Patient.id'=>$casedoctor['Patient']['id']);
								$updata = array('Patient.doctallowtoeditquetionair'=>'0');
								$this->CaseOpinion->DoctorCase->Patient->updateAll($updata,$patineupcon);
							}
							if($patientemail!=''){
								$data=array(
									'name'=>$patientname,
									'case_close_date'=>$caseclosedate,
									'opinion_issue_date'=>$today,
									'case_delete_date'=>$casedeletedate,
									'opinion_comment'=>$opinion_comment
								);
								//pr($data);
								$this->sitemailsend($mailtype=3,$from=array(),$to=$patientemail,$messages="EDC Email Opinion",$data);
							}
							//now send the email to doctor
							$doct_email = (isset($casedoctor['Doctor']['email']))?$casedoctor['Doctor']['email']:'';
							$doct_name=(isset($casedoctor['Doctor']['name']))?$casedoctor['Doctor']['name']:'';
							if($doct_email!=''){
								$ddata=array(
									'name'=>$doct_name,
									'patientname'=>$patientname,
									'case_id'=>$doctcaseid,
									'case_close_date'=>$caseclosedate,
									'opinion_issue_date'=>$today,
									'case_delete_date'=>$casedeletedate,
									'opinion_comment'=>$opinion_comment
								);
								//pr($data);
								$this->sitemailsend($mailtype=12,$from=array(),$to=$doct_email,$messages="EDC Email Opinion",$ddata);
							}
						}
					}
				}
				else{
					$message="Opinion has been cancelled successfully.";
					$status='1';
					$updata = array('CaseOpinion.is_deleted'=>'1');
					$this->CaseOpinion->updateAll($updata,$findcond);
				}
				//$status=0;
			}
			else{
				$message="Invalid Information";
			}
		}
		die(json_encode(array('status'=>$status,'message'=>$message)));
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->doctuserloginsessionchecked();
		header('Content-type:application/json');
		if ($this->request->is('post')) {
			$status=0;
			$message='';
			$this->CaseOpinion->create();
			//pr($this->request->data);
			if(isset($this->request->data['CaseOpinion']['comment']) && $this->request->data['CaseOpinion']['comment']=="Type Something"){
				$this->request->data['CaseOpinion']['comment']='';
			}
			$this->request->data['CaseOpinion']['cteratedatetime']=date("Y-m-d H:i:s");
			//validate if the opinion already given
			$doctcaseid = $this->request->data['CaseOpinion']['doctor_case_id'];
			$isfound=0;
			$opinion_id=0;
			$findcond = array(
				'CaseOpinion.doctor_case_id'=>$doctcaseid,
				'CaseOpinion.is_deleted'=>'0'
			);
			$isfoundopinion = $this->CaseOpinion->find('first',array('conditions'=>$findcond));
			
			if(is_array($isfoundopinion) && count($isfoundopinion)>0){
				$this->request->data['CaseOpinion']['id']=$isfoundopinion['CaseOpinion']['id'];
				$opinion_id=$isfoundopinion['CaseOpinion']['id'];
				$isfound=1;
			}
			
			if ($this->CaseOpinion->save($this->request->data)) {
				$opinion_id=$this->CaseOpinion->id;
				$status=1;
				$isfound=1;
				/*if($isfound==0){
					$today = date("Y-m-d");
					$caseclosedate = date("Y-m-d",strtotime("+30 days"));
					$casedeletedate = date("Y-m-d",strtotime("+60 days"));
					//now update the case with opinion post (4)
					$caseupcond=array('DoctorCase.id'=>$doctcaseid,'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid"));
					$this->CaseOpinion->DoctorCase->updateAll(
					array("DoctorCase.satatus"=>'4','DoctorCase.closedate'=>"'".$caseclosedate."'",'DoctorCase.deactivatedata'=>"'".$casedeletedate."'"),
					$caseupcond);
					$message='case updates';
					//get case deatils
					$casedoctor = $this->CaseOpinion->DoctorCase->find('first',array('conditions'=>$caseupcond));
					if(is_array($casedoctor) && count($casedoctor)>0){
						//send email section
						$patientemail=(isset($casedoctor['Patient']['email']))?$casedoctor['Patient']['email']:'';
						$patientname=(isset($casedoctor['Patient']['name']))?$casedoctor['Patient']['name']:'';
						$opinion_comment = $this->request->data['CaseOpinion']['comment'];
						//is patient is open the questionary edit permission them it remove
						$patientcanedit = (isset($casedoctor['Patient']['doctallowtoeditquetionair']))?$casedoctor['Patient']['doctallowtoeditquetionair']:'1';
						if($patientcanedit==1){
							$patineupcon = array('Patient.id'=>$casedoctor['Patient']['id']);
							$updata = array('Patient.doctallowtoeditquetionair'=>'0');
							$this->CaseOpinion->DoctorCase->Patient->updateAll($updata,$patineupcon);
						}
						if($patientemail!=''){
							$data=array(
								'name'=>$patientname,
								'case_close_date'=>$caseclosedate,
								'opinion_issue_date'=>$today,
								'case_delete_date'=>$casedeletedate,
								'opinion_comment'=>$opinion_comment
							);
							$this->sitemailsend($mailtype=3,$from=array(),$to=$patientemail,$messages="EDC Email Opinion",$data);
						}
					}
				}*/
			}
			die(json_encode(array('status'=>$status,'message'=>$message,'id'=>$doctcaseid)));
		}
	}
	
	/**
	* imageupload method 
	*/
	public function imageupload(){
	  $message="";
	  $status=0;
	  $filename='';
	 // pr($_FILES);
	  if(isset($_FILES['docfile']['size']) && $_FILES['docfile']['size']>0){
		  $filename = trim(time().str_replace("&,#, ,*","_",$_FILES['docfile']['name']));
		  if(move_uploaded_file($_FILES['docfile']['tmp_name'],WWW_ROOT."/caseopinion/".$filename)){
			 $message="file upload done";
			  $status="1"; 
		  }
		  else{
			  $filename='';
			  $message="file upload error";
			  $status="0";
		  }
	  }
	  die(json_encode(array("status"=>$status,"message"=>$message,"attachementname"=>$filename)));
  }
  /*download the opinion doct*/
	public function attachementdownload($filename=''){
		if($filename!=''){
			$filepath="caseopinion/".$filename;
			$this->downloadfile($filename,$filepath);
		}
		else{
			//nothing do
		}
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
		/*if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case opinion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
			$this->request->data = $this->CaseOpinion->find('first', $options);
		}
		$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));*/
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
		/*$this->CaseOpinion->id = $id;
		if (!$this->CaseOpinion->exists()) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseOpinion->delete()) {
			$this->Session->setFlash(__('The case opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case opinion could not be deleted. Please, try again.'));
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
		/*$this->CaseOpinion->recursive = 0;
		$this->set('caseOpinions', $this->Paginator->paginate());*/
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
		/*if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
		$this->set('caseOpinion', $this->CaseOpinion->find('first', $options));*/
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->gotodashboard();
		/*if ($this->request->is('post')) {
			$this->CaseOpinion->create();
			if ($this->CaseOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case opinion could not be saved. Please, try again.'));
			}
		}
		$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));*/
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
		/*if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case opinion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
			$this->request->data = $this->CaseOpinion->find('first', $options);
		}
		$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));*/
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
		/*$this->CaseOpinion->id = $id;
		if (!$this->CaseOpinion->exists()) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseOpinion->delete()) {
			$this->Session->setFlash(__('The case opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case opinion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}
}
