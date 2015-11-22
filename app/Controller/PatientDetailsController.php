<?php
App::uses('AppController', 'Controller');
/**
 * PatientDetails Controller
 *
 * @property PatientDetail $PatientDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PatientDetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $layout = 'questionnaire';

/**
 * index method
 *
 * @return void
 */
	public function index() {
		/*$this->PatientDetail->recursive = 0;
		$this->set('patientDetails', $this->Paginator->paginate());*/
		//$this->usersessionremove();
		
		$this->userloginsessionchecked();
		/*
		//load required model
		$this->loadModel('Socialactivity');
		//unbind the models
		$this->PatientDetail->unbindModel(array(
			'belongsTo'=>array('Patient','Country')
		));
		//now bind the model drug allergy
		$this->PatientDetail->bindModel(array(
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
		
		$conditions = array('PatientDetail.patient_id'=>$this->Session->read('loggedpatientid'));
		$patientDetail = $this->PatientDetail->find('first',array('recursive'=>'1','conditions'=>$conditions,'order'=>array('PatientDetail.id'=>'DESC')));
		//patients social activity
		//remove the model
		$this->Socialactivity->unbindModel(array('belongsTo'=>array('Patient')));
		$saconditions=array('Socialactivity.patient_id'=>$this->Session->read('loggedpatientid'));
		$socialactivity = $this->Socialactivity->find('first',array('recursive'=>'1','conditions'=>$saconditions,'order'=>array('Socialactivity.id'=>'DESC')));
		
		
		$countries = $this->PatientDetail->Country->find('list');
		//$patients = $this->PatientDetail->Patient->find('list');
		//$this->set(compact('patients', 'countries'));
		$this->set(compact('countries'));
		$this->set('patientDetails',$patientDetail);
		$this->set('socialactivity',$socialactivity);
		*/
		
		$this->set('patientinfo','0');
	}

/**
 * basicdetails method
 */
	public function basicdetails(){
		$this->layout="blanks";
		$this->PatientDetail->unbindModel(array(
			'belongsTo'=>array('Patient','Country')
		));
		//now bind the model drug allergy
		$this->PatientDetail->bindModel(array(
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
		
		$conditions = array('PatientDetail.patient_id'=>$this->Session->read('loggedpatientid'));
		$patientDetail = $this->PatientDetail->find('first',array('recursive'=>'1','conditions'=>$conditions,'order'=>array('PatientDetail.id'=>'DESC')));
		
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('countries'));
		$this->set('patientDetails',$patientDetail);
		$this->datesection();
	}
	
	function datesection(){
		$months=array('Month');
		$days=array('Day');
		$years=array('Year');
		for($i=1;$i<13;$i++){
			//array_push($months,$i);
			$months[$i]=$i;
		}
		for($j=1;$j<32;$j++){
			//array_push($days,$j);
			$days[$j]=$j;
		}
		for($k=(date('Y')-90);$k<date('Y');$k++){
			//array_push($years,$k);
			$years[$k]=$k;
		}
		$this->set(compact('countries','months','days','years'));
	}
	
/**
 * socialdetails method
 */
	public function socialdetails(){
		$this->layout="blanks";
		//load required model
		$this->loadModel('Socialactivity');
		$months=array('Month');
		$days=array('Day');
		$years=array('Year');
		for($i=1;$i<13;$i++){
			//array_push($months,$i);
			$months[$i]=$i;
		}
		for($j=1;$j<32;$j++){
			//array_push($days,$j);
			$days[$j]=$j;
		}
		for($k=(date('Y')-90);$k<date('Y');$k++){
			//array_push($years,$k);
			$years[$k]=$k;
		}
		//patients social activity
		//remove the model
		$this->Socialactivity->unbindModel(array('belongsTo'=>array('Patient')));
		$saconditions=array('Socialactivity.patient_id'=>$this->Session->read('loggedpatientid'));
		$socialactivity = $this->Socialactivity->find('first',array('recursive'=>'1','conditions'=>$saconditions,'order'=>array('Socialactivity.id'=>'DESC')));
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('countries','months','days','years'));
		$this->set('socialactivity',$socialactivity);
	}
	
/**
 * illness method
 */
 public function illness(){
	$this->layout="blanks";
	$months=array('Month');
	$days=array('Day');
	$years=array('Year');
	for($i=1;$i<13;$i++){
		//array_push($months,$i);
		$months[$i]=$i;
	}
	for($j=1;$j<32;$j++){
		//array_push($days,$j);
		$days[$j]=$j;
	}
	for($k=(date('Y')-90);$k<date('Y');$k++){
		//array_push($years,$k);
		$years[$k]=$k;
	}
	$this->set(compact('months','days','years'));
	
	// get if the data available in the table
	$this->loadModel('AboutIllness');
	$conditions = array('AboutIllness.patient_id'=>$this->Session->read('loggedpatientid'));
	$aboutIllnesses = $this->AboutIllness->find('first',array('recursive'=>'1','conditions'=>$conditions,'order'=>array('AboutIllness.id'=>'DESC'),'limit'=>'1'));
	
	$this->set('aboutIllnesses',$aboutIllnesses);
 }
 
/**
 * pasthistory method
 */
 public function pasthistory(){
	 $this->layout="blanks";
 }
 
/**
 * document method
 */
 public function document(){
	 $this->layout="blanks";
 }
 
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PatientDetail->exists($id)) {
			throw new NotFoundException(__('Invalid patient detail'));
		}
		$options = array('conditions' => array('PatientDetail.' . $this->PatientDetail->primaryKey => $id));
		$this->set('patientDetail', $this->PatientDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			header("Content-type:application/json");
			//sleep(100000);
			
			//pr($this->request->data);
			//die();
			$performances = array("Patient is fully active, able to carry on all pre-disease performance without restriction_0",
"Patient is restricted in physically strenuous activity but ambulatory and able to carry out work of a light or sedentary nature,
 e.g., light house work, office work_1",
"Patient is ambulatory and capable of all self-care but unable to carry out any work activities. Up and about more than 50% of waking hours (excluding the normal sleeping time)_2",
"Patient is capable of only limited self-care, confined to bed or chair more than 50% of waking hours (excluding the normal sleeping time)_3",
"Patient is completely disabled. Cannot carry on any self-care. Totally confined to bed or chair_4");
			if(isset($this->request->data['RadioGroup1'])){
				$this->request->data['PatientDetail']['performance']=$performances[$this->request->data['RadioGroup1']];
			}
			$this->request->data['PatientDetail']['patient_id']=$this->Session->read("loggedpatientid");
			
			//$this->PatientDetail->create();
			if ($this->PatientDetail->save($this->request->data)) {
				//$this->Session->setFlash(__('The patient detail has been saved.'));
				//return $this->redirect(array('action' => 'index'));
				// if present in alcohal 
				$this->loadModel("DrugAlergy");
				//remove all prev data
				$this->DrugAlergy->deleteAll(array("DrugAlergy.patient_detail_id"=>$this->PatientDetail->id));
				if(isset($this->request->data['pddralergyname']) && count($this->request->data['pddralergyname'])>0){
					
					for($i=0;$i<count($this->request->data['pddralergyname']);$i++){
						$this->DrugAlergy->create();
						$name = (isset($this->request->data['pddralergyname'][$i]) && $this->request->data['pddralergyname'][$i]!='')?$this->request->data['pddralergyname'][$i]:'';
						$typereaction = (isset($this->request->data['pddralergyrection'][$i]) && $this->request->data['pddralergyrection'][$i]!='')?$this->request->data['pddralergyrection'][$i]:'';
						if($name!='' && $typereaction!=''){
							$data = array("DrugAlergy"=>array(
								"patient_detail_id"=>$this->PatientDetail->id,
								"name"=>$name,
								"reaction"=>$typereaction
							));
							//pr($data);
							$this->DrugAlergy->save($data);
						}
					}
				}
				die(json_encode(array("status"=>'1',"message"=>"saved successfully","id"=>$this->PatientDetail->id)));
			} else {
				//$this->Session->setFlash(__('The patient detail could not be saved. Please, try again.'));
				die(json_encode(array("status"=>'0',"message"=>"not saved")));
			}
		}
		$patients = $this->PatientDetail->Patient->find('list');
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('patients', 'countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PatientDetail->exists($id)) {
			throw new NotFoundException(__('Invalid patient detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatientDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The patient detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatientDetail.' . $this->PatientDetail->primaryKey => $id));
			$this->request->data = $this->PatientDetail->find('first', $options);
		}
		$patients = $this->PatientDetail->Patient->find('list');
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('patients', 'countries'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PatientDetail->id = $id;
		if (!$this->PatientDetail->exists()) {
			throw new NotFoundException(__('Invalid patient detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PatientDetail->delete()) {
			$this->Session->setFlash(__('The patient detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PatientDetail->recursive = 0;
		$this->set('patientDetails', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PatientDetail->exists($id)) {
			throw new NotFoundException(__('Invalid patient detail'));
		}
		$options = array('conditions' => array('PatientDetail.' . $this->PatientDetail->primaryKey => $id));
		$this->set('patientDetail', $this->PatientDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PatientDetail->create();
			if ($this->PatientDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The patient detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient detail could not be saved. Please, try again.'));
			}
		}
		$patients = $this->PatientDetail->Patient->find('list');
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('patients', 'countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PatientDetail->exists($id)) {
			throw new NotFoundException(__('Invalid patient detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatientDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The patient detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patient detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatientDetail.' . $this->PatientDetail->primaryKey => $id));
			$this->request->data = $this->PatientDetail->find('first', $options);
		}
		$patients = $this->PatientDetail->Patient->find('list');
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('patients', 'countries'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PatientDetail->id = $id;
		if (!$this->PatientDetail->exists()) {
			throw new NotFoundException(__('Invalid patient detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PatientDetail->delete()) {
			$this->Session->setFlash(__('The patient detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patient detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
