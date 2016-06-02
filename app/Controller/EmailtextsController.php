<?php
App::uses('AppController', 'Controller');
/**
 * EmailTexts Controller
 *
 * @property EmailText $EmailText
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EmailTextsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		/*$this->EmailText->recursive = 0;
		$this->set('emailTexts', $this->Paginator->paginate());*/
		$this->layout="admin";
		if ($this->request->is(array('post','put'))) {
			if(!isset($this->request->data['EmailText']['id'])){
				$this->EmailText->create();
			}
			
			if ($this->EmailText->save($this->request->data)) {
				$this->Session->setFlash(__('The email text has been saved.'));
				//return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The email text could not be saved. Please, try again.'));
			}
		}else {
			$this->request->data = $this->EmailText->find('first');
		}
	}

/**
 * admin_sendemail method
 */
	public function admin_sendemail(){
		$this->layout="admin";
		$this->loadModel('Patient');
		$status='0';
		$message="";
		if($this->request->is('post')){
			$posteddata = isset($this->request->data['EmailText'])?$this->request->data['EmailText']:array();
			//pr($posteddata);
			//die();
			$email_sub=(isset($posteddata['email_sub']))?$posteddata['email_sub']:'';
			$email_body = (isset($posteddata['email_body']))?$posteddata['email_body']:'';
			$emails = (isset($posteddata['emails']))?$posteddata['emails']:array();
			if(is_array($emails) && count($emails)>0){
				foreach($emails as $key=>$email){
					$data=array(
						'name'=>'User',
						'email_sub'=>$email_sub,
						'email_body'=>$email_body
					);
					$to=$email;
					$this->sitemailsend($mailtype=14,$from=array(),$to,$message="admin bulk mail",$data);
				}
				$this->Session->setFlash(__('Email send to the users'),'default',array('class'=>'success'));
			}
		}
		$cond = array(
			'Patient.ispatient'=>'1',
			'Patient.isactive'=>'1',
			'Patient.isdeleted'=>'0'
		);
		$this->Patient->displayField="email";
		$order=array('Patient.id'=>'ASC');
		$patients = $this->Patient->find('list',array('conditions'=>$cond,'limit'=>3));
		$this->set('patients',$patients);
	}

/**
 * morepatients method
 */	
	public function morepatients(){
		$patients=array();
		header('Content-Type:application/json');
		if($this->request->is('post')){
			$this->loadModel('Patient');
			$posteddata = $this->request->data;
			$last_patient_id=(isset($posteddata['patient_id']))?$posteddata['patient_id']:'0';
			if($last_patient_id>0){
				$cond = array(
					'Patient.ispatient'=>'1',
					'Patient.isactive'=>'1',
					'Patient.isdeleted'=>'0',
					'Patient.id >'=>$last_patient_id
				);
				$this->Patient->displayField="email";
				$order=array('Patient.id'=>'ASC');
				$patientsall = $this->Patient->find('list',array('conditions'=>$cond,'limit'=>30));
				foreach($patientsall as $key=>$email){
					$data = array(
						'id'=>$key,
						'email'=>$email
					);
					array_push($patients,$data);
				}
			}
		}
		die(json_encode(array('patients'=>$patients)));
	}

}
