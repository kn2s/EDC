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
		$this->loadModel('Patient');
		$this->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		$cond = array('Patient.id'=>$this->Session->read('loggedpatientid'));
		$patientalldeatils = $this->Patient->find('first',array('recursive'=>'0','conditions'=>$cond));
		$formnumber = isset($patientalldeatils['Patient']['detailsformsubmit'])?$patientalldeatils['Patient']['detailsformsubmit']:0;
		//$formnumber=2;
		$this->Session->write("lastquestionformno",$formnumber);
		
		if($this->Session->check("quesformno")){
			$formnumber = $this->Session->read("quesformno");
		}
		$this->set('patientinfo',$formnumber);
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
		// set into the session 
		$this->Session->write("quesformno","0");
		
		$conditions = array('PatientDetail.patient_id'=>$this->Session->read('loggedpatientid'));
		$patientDetail = $this->PatientDetail->find('first',array('recursive'=>'1','conditions'=>$conditions,'order'=>array('PatientDetail.id'=>'DESC')));
		
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('countries'));
		$this->set('patientDetails',$patientDetail);
		$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
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
		// set into the session 
		$this->Session->write("quesformno","1");
		//remove the model
		$this->Socialactivity->unbindModel(array('belongsTo'=>array('Patient')));
		$saconditions=array('Socialactivity.patient_id'=>$this->Session->read('loggedpatientid'));
		$socialactivity = $this->Socialactivity->find('first',array('recursive'=>'1','conditions'=>$saconditions,'order'=>array('Socialactivity.id'=>'DESC')));
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('countries','months','days','years'));
		$this->set('socialactivity',$socialactivity);
		$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
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
	$this->Session->write("quesformno","2");
	// get if the data available in the table
	$this->loadModel('AboutIllness');
	$conditions = array('AboutIllness.patient_id'=>$this->Session->read('loggedpatientid'));
	$aboutIllnesses = $this->AboutIllness->find('first',array('recursive'=>'1','conditions'=>$conditions,'order'=>array('AboutIllness.id'=>'DESC'),'limit'=>'1'));
	$Specializations = $this->AboutIllness->Specialization->find('list');
	$this->set('aboutIllnesses',$aboutIllnesses);
	$this->set('Specializations',$Specializations);
	$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
 }
 
/**
 * pasthistory method
 */
 public function pasthistory(){
	$this->layout="blanks";
	//load the model
	$this->loadModel('PatientPastHistory');
	$months=array('Month');
	
	$years=array('Year');
	for($i=1;$i<13;$i++){
		//array_push($months,$i);
		$months[$i]=$i;
	}
	
	for($k=(date('Y')-90);$k<date('Y');$k++){
		//array_push($years,$k);
		$years[$k]=$k;
	}
	$this->Session->write("quesformno","3");
	$this->set(compact('months','years'));
	$cond = array('PatientPastHistory.patient_id'=>$this->Session->read('loggedpatientid'));
	$PatientPastHistories = $this->PatientPastHistory->find('first',array('recursive'=>'1','conditions'=>$cond,'order'=>array('PatientPastHistory.id'=>'DESC'),'limit'=>'1'));
	$this->set('PatientPastHistories',$PatientPastHistories);
	$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
 }
 
/**
 * document method
 */
 public function document(){
	$this->layout="blanks";
	//load the model
	$this->loadModel('PatientDocument');
	$months=array('Month');
	$years=array('Year');
	
	for($i=1;$i<13;$i++){
		//array_push($months,$i);
		$months[$i]=$i;
	}
	
	for($k=(date('Y')-90);$k<date('Y');$k++){
		//array_push($years,$k);
		$years[$k]=$k;
	}
	$this->set(compact('months','years'));
	$this->Session->write("quesformno","4");
	$cond = array('PatientDocument.patient_id'=>$this->Session->read('loggedpatientid'));
	$PatientDocuments = $this->PatientDocument->find('first',array('recursive'=>'1','conditions'=>$cond,'order'=>array('PatientDocument.id'=>'DESC'),'limit'=>'1'));
	$this->set('PatientDocuments',$PatientDocuments);
	$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
 }
 
 /**
 * patientsummery method
 */
 public function patientsummery(){
	$this->layout="blanks";
	$this->loadMOdel('Patient');
	//bind the patiend model with other as has one
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
	
	$cond = array('Patient.id'=>$this->Session->read('loggedpatientid'));
	$patientalldeatils = $this->Patient->find('first',array('recursive'=>'2','conditions'=>$cond));
	//pr($patientalldeatils);
	//die();
	$this->set('patientalldeatils',$patientalldeatils);
	$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
 }
 
 /**
 * detailsdone method
 */
 public function detailsdone(){
	//now update the form submit count in patient tables
	/*$this->PatientDetail->Patient->id=$this->Session->read("loggedpatientid");
	$this->PatientDetail->Patient->saveField('detailsformsubmit','5');*/
	
	//update the completions status
	if($this->Session->read('lastquestionformno')>5){
		$uparray = array('Patient.detailsubmitpercent'=>'100');
	}
	else{
		$uparray = array('Patient.detailsformsubmit'=>'5','Patient.detailsubmitpercent'=>'100');
	}
	$uparray = array('Patient.detailsformsubmit'=>'5','Patient.detailsubmitpercent'=>'100');
	$upcond = array('Patient.id'=>$this->Session->read("loggedpatientid"));
	$this->PatientDetail->Patient->updateAll($uparray,$upcond);
	
	die(json_encode(array('status'=>'1','message'=>'')));
 }
 
 /**
 * patientconsultant method
 */
 public function patientconsultant(){
	$this->layout="questionnarydone";
	$this->loadModel('DoctorCase');
	//unbind model
	$this->DoctorCase->unbindModel(array(
		'belongsTo'=>array('Patient','Doctor')
	));
	
	$conds = array('DoctorCase.patient_id'=>$this->Session->read("loggedpatientid"),'DoctorCase.ispaymentdone'=>'1');
	$doctorCase = $this->DoctorCase->find('first',array('recursive'=>'0','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
	$this->Session->write("quesformno","6");
	if(isset($doctorCase['DoctorCase']) && count($doctorCase['DoctorCase'])>0){
		//all ready case puted and payment done
	}
	else{
		$this->loadModel('AboutIllness');
		$this->AboutIllness->unbindModel(array(
			"belongsTo"=>array("Patient"),
			"hasMany"=>array("TumarMarker")
		));
		$conditions = array('AboutIllness.patient_id'=>$this->Session->read('loggedpatientid'));
		$aboutIllnesses = $this->AboutIllness->find('first',array('recursive'=>'1','conditions'=>$conditions,'order'=>array('AboutIllness.id'=>'DESC'),'limit'=>'1'));
		//pr($aboutIllnesses);
		$diagonisis='';
		$diaginishid=0;
		if(isset($aboutIllnesses['Specialization']['name'])){
			$diagonisis = $aboutIllnesses['Specialization']['name'];
			$diaginishid = $aboutIllnesses['Specialization']['id'];
		}
		//calculate the doctor availability and send to the view
		$availavledoct = $this->consultantdetailscalculation($diaginishid);
		//pr($availavledoct);
		if(is_array($availavledoct) && count($availavledoct)>0){
			
			//now add that search 
			$doctid = isset($availavledoct['ScheduleDoctor']['doct_id'])?$availavledoct['ScheduleDoctor']['doct_id']:0;
			$availdate = isset($availavledoct['WorkSchedule']['workday'])?$availavledoct['WorkSchedule']['workday']:0;
			$doctsechuleid = isset($availavledoct['ScheduleDoctor']['id'])?$availavledoct['ScheduleDoctor']['id']:0;
			
			$casdtl = array("DoctorCase"=>array(
				"patient_id"=>$this->Session->read("loggedpatientid"),
				"doctor_id"=>$doctid,
				'schedule_doctor_id'=>$doctsechuleid,
				"consultant_fee"=>"80",
				"available_date"=>$availdate,
				"opinion_due_date"=>date("Y-m-d",strtotime("+15 day",strtotime($availdate))),
				"satatus"=>'0',
				"ispaymentdone"=>'0',
				"createdate"=>date("Y-m-d H:i:s"),
				"diagonisis"=>$diagonisis
			));
			//pr($casdtl);
			//die();
			if($doctid>0){
				
				if($this->DoctorCase->save($casdtl)){
					$conds = array('DoctorCase.patient_id'=>$this->Session->read("loggedpatientid"),'DoctorCase.ispaymentdone'=>'0','DoctorCase.id'=>$this->DoctorCase->id);
					$doctorCase = $this->DoctorCase->find('first',array('recursive'=>'0','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
				}
			}
			else{
				$doctorCase=array();
			}
		}
		else{
			$doctorCase=array();
		}
	}
	$this->set('doctorCase',$doctorCase);
 }
 
 /**
  * consultantdetailscalculation method
  * @return array
  */
	public function consultantdetailscalculation($diaginishid=0){
		$this->loadModel('Doctor');
		$this->loadModel('ScheduleDoctor');
		//main conditions
		//5 min from allocations
		$fiveminalloc = time()-(5*60);
		$conds = array("ScheduleDoctor.isonholiday"=>'0',"ScheduleDoctor.assignment < "=>'3','ScheduleDoctor.lastangajtime <'=>$fiveminalloc);
		// available schedule date
		$strdate = date("Y-m-d",strtotime("+1 day"));
		$enddate = date("Y-m-d",strtotime("+3 month"));
		$conditions = array(
			'WorkSchedule.workday BETWEEN ? AND ?'=>array($strdate,$enddate),
			'WorkSchedule.isdoctorschedulecreated'=>'1',
			'WorkSchedule.isholiday'=>'0'
		);
		$workschedules = $this->ScheduleDoctor->WorkSchedule->find('list',array('conditions'=>$conditions));
		if(is_array($workschedules) && count($workschedules)>0){
			$conds["ScheduleDoctor.work_schedule_id"]=array_values($workschedules);
		}
		else{
			return array();
		}
		//get all doctor belongs to the selected diagonisis
		//unbind model
		$this->Doctor->unbindModel(array(
			'belongsTo'=>array('Specialization','Patient')
		));
		$this->Doctor->displayField="patient_id";
		
		$docconditions = array('Doctor.specialization_id'=>$diaginishid,'Doctor.patient_id >'=>'0');
		
		$doctors = $this->Doctor->find('list',array('conditions'=>$docconditions));
		//pr($doctors);
		if(is_array($doctors) && count($doctors)>0){
			$conds["ScheduleDoctor.doct_id"]=array_values($doctors);
		}
		else{
			return array();
		}		
		
		$availdoctore = $this->ScheduleDoctor->find("first",array("recursive"=>'1',"conditions"=>$conds));
		if(is_array($availdoctore) && count($availdoctore)>0){
			$doctsechuleid = isset($availdoctore['ScheduleDoctor']['id'])?$availdoctore['ScheduleDoctor']['id']:0;
			//update the doctor with the angaj time
			$condss = array('ScheduleDoctor.id'=>$doctsechuleid);
			$updcond = array('ScheduleDoctor.lastangajtime'=>time());
			$this->ScheduleDoctor->updateAll($updcond,$condss);
		}
		
		return $availdoctore;
	}
 
 /**
  * payments method
  */
	public function payments($caseid=0,$scheduledcotid=0){
		$this->loadModel('DoctorCase');
		$this->loadModel('ScheduleDoctor');
		if($caseid>0){
			// validate assign doct time sections 
			$updcond = array('ScheduleDoctor.id'=>$scheduledcotid);
			//get the details of the schedule doctore
			$scheduledoct = $this->ScheduleDoctor->find('first',array('recursive'=>'0','conditions'=>$updcond));
			if(is_array($scheduledoct) && count($scheduledoct)>0){
				$crttime = $scheduledoct['ScheduleDoctor']['lastangajtime'];
				$fiveminbuffer = time()-(5*60);
				if($crttime>=$fiveminbuffer){
					//valied transaction secions
					//update the doctor case details 
					$updata = array('DoctorCase.ispaymentdone'=>'1');
					$upcond = array('DoctorCase.schedule_doctor_id'=>$scheduledcotid,'DoctorCase.id'=>$caseid);
					$thhis->DoctorCase->updateAll($updata,$upcond);
					// now update the count of the doct of assign patient details 
					// update section
					$updat = array('ScheduleDoctor.assignment'=>'ScheduleDoctor.assignment'+1);
					$this->ScheduleDoctor->updateAll($updat,$updcond);
					//now update the form submit count in patient tables
					$this->PatientDetail->Patient->id=$this->Session->read("loggedpatientid");
					$this->PatientDetail->Patient->saveField('detailsformsubmit','6');
					//$this->Session->setFlash(__('The consultants saved.'));
					$this->redirect(array('controller'=>'patients','action'=>'dashboard'));
				}
				else{
					//transaction time out
					$this->Session->setFlash(__('The payment section time out.'));
					$this->redirect(array('action'=>'patientconsultant'));
				}
			}
			else{
				//invalied data pass 
				$this->Session->setFlash(__('The details of case could not found .'));
				$this->redirect(array('action'=>'patientconsultant'));
			}
		}
		else{
			$this->Session->setFlash(__('The details could not found.'));
			$this->redirect(array('action'=>'patientconsultant'));
		}
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
				
				//update the completions status
				$uparray = array('Patient.detailsformsubmit'=>'0','Patient.detailsubmitpercent'=>$this->request->data['PatientDetail']['completed_per']);
				if($this->Session->read('lastquestionformno')>0){
					$uparray = array('Patient.detailsubmitpercent'=>$this->request->data['PatientDetail']['completed_per']);
				}
				
				$upcond = array('Patient.id'=>$this->Session->read("loggedpatientid"));
				$this->PatientDetail->Patient->updateAll($uparray,$upcond);
				
				die(json_encode(array("status"=>'1',"message"=>"saved successfully","id"=>$this->PatientDetail->id)));
			} else {
				//$this->Session->setFlash(__('The patient detail could not be saved. Please, try again.'));
				die(json_encode(array("status"=>'0',"message"=>"not saved")));
			}
		}
		/*$patients = $this->PatientDetail->Patient->find('list');
		$countries = $this->PatientDetail->Country->find('list');
		$this->set(compact('patients', 'countries'));*/
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
