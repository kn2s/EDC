<?php
App::uses('AppController', 'Controller');
/**
 * SampleQuestionnaires Controller
 *
 * @property SampleQuestionnaire $SampleQuestionnaire
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SampleQuestionnairesController extends AppController {

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
		/*$this->SampleQuestionnaire->recursive = 0;
		$this->set('sampleQuestionnaires', $this->Paginator->paginate());*/
		$this->gotodashboard();
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		/*if (!$this->SampleQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$options = array('conditions' => array('SampleQuestionnaire.' . $this->SampleQuestionnaire->primaryKey => $id));
		$this->set('sampleQuestionnaire', $this->SampleQuestionnaire->find('first', $options));*/
		$this->gotodashboard();
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		/*if ($this->request->is('post')) {
			$this->SampleQuestionnaire->create();
			if ($this->SampleQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The sample questionnaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample questionnaire could not be saved. Please, try again.'));
			}
		}*/
		$this->gotodashboard();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		/*if (!$this->SampleQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SampleQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The sample questionnaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample questionnaire could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SampleQuestionnaire.' . $this->SampleQuestionnaire->primaryKey => $id));
			$this->request->data = $this->SampleQuestionnaire->find('first', $options);
		}*/
		$this->gotodashboard();
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
		/*$this->SampleQuestionnaire->id = $id;
		if (!$this->SampleQuestionnaire->exists()) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SampleQuestionnaire->delete()) {
			$this->Session->setFlash(__('The sample questionnaire has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sample questionnaire could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout="admin";
		$this->loadModel('Specialization');
		/*$this->SampleQuestionnaire->recursive = 0;
		$this->set('sampleQuestionnaires', $this->Paginator->paginate());*/
		
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
		
		/*$patientdetails = array(
			'name'=>'ok insert',
			'gender'=>'Male',
			'dob_txt'=>'',
			'dob'=>array(
				'month'=>'10',
				'day'=>'',
				'year'=>''
			),
			'place'=>'aub diuas id, ashd asd, daus dhaisd ',
			'weight'=>'77',
			'height'=>'888',
			'drug_name'=>'a dahd ',
			'reaction'=>'asd jaosida',
			'drug_allergy'=>array(
				'drug_name'=>'',
				'reaction'=>''
			),
			'performance_status'=>'',
			'performance_status_comment'=>'ahd a adas '
		);
		$social_history = array(
			'smocking'=>array(
				'quantity'=>'1',
				'period'=>'',
				'preriod_from'=>'2010-11-14',
				'preriod_to'=>'2011-10-20',
				'unit'=>'in a month'
			),
			'alcohol'=>array(
				'alcohol_type'=>'bear',
				'quantity'=>'500',
				'unit'=>'in a year'
			),
			'alcohol_period'=>'',
			'alcohol_period_from'=>'2009-01-11',
			'alcohol_period_to'=>'20015-01-11',
			'comments'=>'are alcohar and social life'
		);
		$about_the_illness = array(
			'principle_diagnosis_id'=>'1',
			'principle_diagnosis_name'=>'',
			'date_of_diagnosis'=>'2012-11-11',
			'diagnosis_history'=>'uhsd hdsui huidsh isdhishduh dg yuegfew wewe7f ',
			'oncologist_recommendation'=>'w 78ef w78fw7eyngs vsiuheyyew8',
			'last_examanation_date'=>'2014-10-30',
			'have_tumor_marker'=>'no',
			'tumor_marker'=>array(
				'tumor_type'=>'shfj',
				'tumor_date'=>'sdbfjkds',
				'result'=>'skdfjksdfjk s kjds '
			)
		);
		$past_history=array(
			'cancer_history'=>array(
				'diagnosis_type'=>'',
				'date_of_diagnosis'=>'',
			),
			'surgical_history'=>array(
				'surgical_type'=>'',
				'date_of_surgical'=>'',
			),
			'hospitalizations'=>array(
				'reason'=>'',
				'date_of_hospltalize'=>'',
				'period_of_hospltalize'=>'',
			),
			'family_cancer'=>array(
				'relation'=>'',
				'cancer_type'=>'',
				'diagoniazed_age'=>'',
			),
			'comment'=>''
		);
		$test_report = array(
			'blood_laboritory'=>array(
				'test_name'=>'',
				'test_date'=>'',
				'test_report'=>''
			),
			'imaging_test'=>array(
				'test_name'=>'',
				'test_date'=>'',
				'test_report'=>''
			),
			'pathology_test'=>array(
				'test_name'=>'',
				'test_date'=>'',
				'test_report'=>''
			),
			'comment'=>''
		);*/
		
		$this->request->data=array(
			'SampleQuestionnaire'=>$SampleQuestionnaire,
			'QPatientDetails'=>$patientdetails,
			'QSocialHistory'=>$social_history,
			'QAboutTheIll'=>$about_the_illness,
			'QPastHistory'=>$past_history,
			'QTestReport'=>$test_report
		);
		$months=array('01','02','03','04','05','06','07','08','09','10','11','12');
		$performance_status=array(
			'0'=>'Patient is fully active, able to carry on all pre-disease performance without restriction',
			'1'=>'Patient is restricted in physically strenuous activity but ambulatory and able to carry out work of a light or sedentary nature, e.g., light house work, office work',
			'3'=>'Patient is ambulatory and capable of all self-care but unable to carry out any work activities. Up and about more than 50% of waking hours (excluding the normal sleeping time).',
			'4'=>'Patient is capable of only limited self-care, confined to bed or chair more than 50% of waking hours (excluding the normal sleeping time)',
			'5'=>'Patient is completely disabled. Cannot carry on any self-care. Totally confined to bed or chair.'
		);
		$units=array();
		$alldiagonisises=array();
		$this->Specialization->displayField="name";
		$specializations = $this->Specialization->find('list',array('conditions'=>array('Specialization.isdeleted'=>'0')));
		if(is_array($specializations) && count($specializations)>0){
			$alldiagonisises=$specializations;
		}
		
		$this->set('months',$months);
		$this->set('performance_status',$performance_status);
		$this->set('units',$units);
		$this->set('alldiagonisises',$alldiagonisises);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		/*if (!$this->SampleQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$options = array('conditions' => array('SampleQuestionnaire.' . $this->SampleQuestionnaire->primaryKey => $id));
		$this->set('sampleQuestionnaire', $this->SampleQuestionnaire->find('first', $options));*/
		$this->gotodashboard();
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		/*if ($this->request->is('post')) {
			$this->SampleQuestionnaire->create();
			if ($this->SampleQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The sample questionnaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample questionnaire could not be saved. Please, try again.'));
			}
		}*/
		$this->gotodashboard();
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if ($this->request->is(array('post', 'put'))) {
			//make all the data 
			$this->request->data['SampleQuestionnaire']['patient_detail']=serialize($this->request->data['QPatientDetails']);
			$this->request->data['SampleQuestionnaire']['social_history']=serialize($this->request->data['QSocialHistory']);
			$this->request->data['SampleQuestionnaire']['about_the_illness']=serialize($this->request->data['QAboutTheIll']);
			$this->request->data['SampleQuestionnaire']['past_history']=serialize($this->request->data['QPastHistory']);
			$this->request->data['SampleQuestionnaire']['test_report']=serialize($this->request->data['QTestReport']);
			$this->request->data['SampleQuestionnaire']['createtime']=time();
			
			//pr($this->request->data);
			//die();
			if ($this->SampleQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The sample questionnaire has been saved.'));
				
			} else {
				$this->Session->setFlash(__('The sample questionnaire could not be saved. Please, try again.'));
			}
		}
		return $this->redirect(array('action' => 'index'));
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
		
		/*$this->SampleQuestionnaire->id = $id;
		if (!$this->SampleQuestionnaire->exists()) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SampleQuestionnaire->delete()) {
			$this->Session->setFlash(__('The sample questionnaire has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sample questionnaire could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}
}
