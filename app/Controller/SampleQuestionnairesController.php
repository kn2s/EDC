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
		$this->SampleQuestionnaire->recursive = 0;
		$this->set('sampleQuestionnaires', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SampleQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$options = array('conditions' => array('SampleQuestionnaire.' . $this->SampleQuestionnaire->primaryKey => $id));
		$this->set('sampleQuestionnaire', $this->SampleQuestionnaire->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SampleQuestionnaire->create();
			if ($this->SampleQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The sample questionnaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample questionnaire could not be saved. Please, try again.'));
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
		if (!$this->SampleQuestionnaire->exists($id)) {
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
		$this->SampleQuestionnaire->id = $id;
		if (!$this->SampleQuestionnaire->exists()) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SampleQuestionnaire->delete()) {
			$this->Session->setFlash(__('The sample questionnaire has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sample questionnaire could not be deleted. Please, try again.'));
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
		/*$this->SampleQuestionnaire->recursive = 0;
		$this->set('sampleQuestionnaires', $this->Paginator->paginate());*/
		
		$options = array('conditions' => array('SampleQuestionnaire.is_deleted'=>'0'),'order'=>array('SampleQuestionnaire.id'=>'DESC'));
		$SampleQuestionnaire = $this->SampleQuestionnaire->find('first', $options);
		$patientdetails = array(
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
				'quantity'=>'',
				'period'=>'',
				'preriod_from'=>'',
				'preriod_to'=>'',
				'unit'=>''
			),
			'alcohol'=>array(
				'alcohol_type'=>'',
				'quantity'=>'',
				'unit'=>''
			),
			'alcohol_period'=>'',
			'alcohol_period_from'=>'',
			'alcohol_period_to'=>'',
			'comments'=>''
		);
		$this->request->data=array(
			'SampleQuestionnaire'=>$SampleQuestionnaire,
			'QPatientDetails'=>$patientdetails,
			'QSocialHistory'=>$social_history,
		);
		$months=array('01','02','03','04','05','06','07','08','09','10','11','12');
		$performance_status=array();
		$units=array();
		$this->set('months',$months);
		$this->set('performance_status',$performance_status);
		$this->set('units',$units);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SampleQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$options = array('conditions' => array('SampleQuestionnaire.' . $this->SampleQuestionnaire->primaryKey => $id));
		$this->set('sampleQuestionnaire', $this->SampleQuestionnaire->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SampleQuestionnaire->create();
			if ($this->SampleQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The sample questionnaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample questionnaire could not be saved. Please, try again.'));
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
		if (!$this->SampleQuestionnaire->exists($id)) {
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
		$this->SampleQuestionnaire->id = $id;
		if (!$this->SampleQuestionnaire->exists()) {
			throw new NotFoundException(__('Invalid sample questionnaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SampleQuestionnaire->delete()) {
			$this->Session->setFlash(__('The sample questionnaire has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sample questionnaire could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
