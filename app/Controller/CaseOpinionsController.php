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
		
		$this->CaseOpinion->recursive = 0;
		$this->set('caseOpinions', $this->Paginator->paginate());
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
		$options = array('recursive'=>3,'conditions' => array('CaseOpinion.doctor_case_id'=> $id,'DoctorCase.is_deleted'=>'0','DoctorCase.isclosed'=>'0'),'order'=>array('CaseOpinion.id'=>'DESC'));
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
 * @return void
 */
	public function doctorview($id = null) {
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
		$options = array('recursive'=>3,'conditions' => array('CaseOpinion.doctor_case_id'=> $id),'order'=>array('CaseOpinion.id'=>'DESC'));
		$this->set('caseOpinion', $this->CaseOpinion->find('first', $options));
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
			$this->CaseOpinion->create();
			//pr($this->request->data);
			if(isset($this->request->data['CaseOpinion']['comment']) && $this->request->data['CaseOpinion']['comment']=="Type Something"){
				$this->request->data['CaseOpinion']['comment']='';
			}
			$this->request->data['CaseOpinion']['cteratedatetime']=date("Y-m-d G:i:s");
			//validate if the opinion already given
			$doctcaseid = $this->request->data['CaseOpinion']['doctor_case_id'];
			$isfound=0;
			$isfoundopinion = $this->CaseOpinion->find('first',array('conditions'=>array('CaseOpinion.doctor_case_id'=>$doctcaseid)));
			
			if(is_array($isfoundopinion) && count($isfoundopinion)>0){
				$this->request->data['CaseOpinion']['id']=$isfoundopinion['CaseOpinion']['id'];
				$isfound=1;
			}
			
			if ($this->CaseOpinion->save($this->request->data)) {
				$status=1;
				if($isfound==0){
					$caseclosedate = date("Y-m-d",strtotime("+30 days"));
					$casedeletedate = date("Y-m-d",strtotime("+60 days"));
					//now update the case with opinion post (4)
					$this->CaseOpinion->DoctorCase->updateAll(
					array("DoctorCase.satatus"=>'4','DoctorCase.closedate'=>"'".$caseclosedate."'",'DoctorCase.deactivatedata'=>"'".$casedeletedate."'"),
					array('DoctorCase.id'=>$doctcaseid,'DoctorCase.doctor_id'=>$this->Session->read("loggeddoctid")));
					$message='case updates';
				}
			}
			die(json_encode(array('status'=>$status,'message'=>$message)));
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
		if (!$this->CaseOpinion->exists($id)) {
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
		$this->set(compact('doctorCases'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CaseOpinion->id = $id;
		if (!$this->CaseOpinion->exists()) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseOpinion->delete()) {
			$this->Session->setFlash(__('The case opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case opinion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CaseOpinion->recursive = 0;
		$this->set('caseOpinions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
		$this->set('caseOpinion', $this->CaseOpinion->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CaseOpinion->create();
			if ($this->CaseOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case opinion could not be saved. Please, try again.'));
			}
		}
		$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CaseOpinion->exists($id)) {
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
		$this->set(compact('doctorCases'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CaseOpinion->id = $id;
		if (!$this->CaseOpinion->exists()) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseOpinion->delete()) {
			$this->Session->setFlash(__('The case opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case opinion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
