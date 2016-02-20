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
			'full_name'=>'ok insert',
			'gender'=>'Male',
			'dob'=>array(
				'month'=>'',
				'day'=>'',
				'year'=>''
			),
			'place'=>'',
			'weight'=>'',
			'height'=>'',
			'drug_allergy'=>array(
				'drug_name'=>'',
				'reaction'=>''
			),
			'performance_status'=>'',
			'performance_status_comment'=>''
		);
		$this->request->data=array(
			'SampleQuestionnaire'=>$SampleQuestionnaire,
			'QPatientDetails'=>$patientdetails
		);
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
