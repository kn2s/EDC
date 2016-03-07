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
	public  $helpers = array('Pdf');
	public $layout = 'questionnaire';

/**
 * index method
 *
 * @return void
 */
	public function index() {
		/*
		$this->PatientDetail->recursive = 0;
		$this->set('patientDetails', $this->Paginator->paginate());
		//$this->usersessionremove();
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
		
		$this->userloginsessionchecked();
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
		$this->userloginsessionchecked();
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
		$this->userloginsessionchecked();
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
	$this->userloginsessionchecked();
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
	$Specializations = $this->AboutIllness->Specialization->find('list',array('conditions'=>array('Specialization.isdeleted'=>'0','Specialization.isactive'=>'1','Specialization.isdeleted'=>'0')));
	$this->set('aboutIllnesses',$aboutIllnesses);
	$this->set('Specializations',$Specializations);
	$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
 }
 
/**
 * pasthistory method
 */
 public function pasthistory(){
	$this->userloginsessionchecked();
	$this->layout="blanks";
	//load the model
	$this->loadModel('PatientPastHistory');
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
	
	$this->Session->write("quesformno","3");
	$this->set(compact('months','years','days'));
	$cond = array('PatientPastHistory.patient_id'=>$this->Session->read('loggedpatientid'));
	$PatientPastHistories = $this->PatientPastHistory->find('first',array('recursive'=>'1','conditions'=>$cond,'order'=>array('PatientPastHistory.id'=>'DESC'),'limit'=>'1'));
	$this->set('PatientPastHistories',$PatientPastHistories);
	$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
 }
 
/**
 * document method
 */
 public function document(){
	$this->userloginsessionchecked();
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
	$this->userloginsessionchecked();
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
			'PatientCase'=>array(
				'className'=>'DoctorCase',
				'foreignKey'=>'patient_id',
				'conditions'=>array('PatientCase.ispaymentdone'=>'1','PatientCase.isclosed'=>'0','PatientCase.doctor_id >'=>'0','PatientCase.is_deleted'=>'0'),
				'fields'=>'',
				'order'=>array('PatientCase.id'=>'DESC')
			)
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
	$this->Patient->PatientCase->unbindModel(array(
		'belongsTo'=>array('Patient','Doctor')
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
	
	$this->userloginsessionchecked();
	//update the completions status
	$upcond = array('Patient.id'=>$this->Session->read("loggedpatientid"));
	if($this->Session->read('lastquestionformno')>5){
		//get the patient details if doct allow edite
		$thhis->PatientDetail->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		//model bind
		$this->PatientDetail->Patient->bindModel(array(
			'belongsTo'=>array(
				'PatientCase'=>array(
					'className'=>'DoctorCase',
					'foreignKey'=>'patient_id',
					'conditions'=>array('PatientCase.isclosed'=>'0','PatientCase.is_deleted'=>'0'),
					'order'=>array('PatientCase.id'=>'DESC')
				)
			)
		));
		$patient = $this->PatientDetail->Patient->find('first',array('recursive'=>'2','conditions'=>$upcond));
		if(is_array($patient) && count($patient)>0){
			if($patient['Patient']['doctallowtoeditquetionair']==1){
				//get the doctor information
				if(isset($patient['PatientCase']['Doctor']['email'])){
					//send the email
					$patientmail = $patient['Patient']['email'];
					$patientname = $patient['Patient']['name'];
					//$from = array($patientmail=>$patientname);
					$from=array();
					$to = $patient['PatientCase']['Doctor']['email'];
					$data = array(
						'name'=>$patient['PatientCase']['Doctor']['name'],
						'case_id'=>$patient['PatientCase']['id'],
						'patient_name'=>$patientname,
						'diagnosis'=>$patient['PatientCase']['diagonisis']
					);
					
					$this->sitemailsend($mailtype=6,$from,$to,$message="Patient update questionnaire",$data);
				}
			}
		}
		$uparray = array('Patient.detailsubmitpercent'=>'100','Patient.doctallowtoeditquetionair'=>'0');
	}
	else{
		$uparray = array('Patient.detailsformsubmit'=>'5','Patient.detailsubmitpercent'=>'100','Patient.doctallowtoeditquetionair'=>'0');
	}
	
	$this->PatientDetail->Patient->updateAll($uparray,$upcond);
	
	die(json_encode(array('status'=>'1','message'=>'')));
 }
 
 /**
 * patientconsultant method
 */
 public function patientconsultant(){
	$this->userloginsessionchecked();
	$this->layout="questionnarydone";
	$this->loadModel('DoctorCase');
	$this->loadModel('Service');
	
	//unbind model
	$this->DoctorCase->unbindModel(array(
		'belongsTo'=>array('Patient','Doctor')
	));
	$consulting_charge=0;
	$conds = array('DoctorCase.patient_id'=>$this->Session->read("loggedpatientid"),'DoctorCase.ispaymentdone'=>'1','DoctorCase.is_deleted'=>'0','DoctorCase.isclosed'=>'0');
	$doctorCase = $this->DoctorCase->find('first',array('recursive'=>'0','conditions'=>$conds,'order'=>array('DoctorCase.id'=>'DESC')));
	$this->Session->write("quesformno","6");
	//get consultant service cost
	$fields = array('Service.consulting_charge');
	$servicecharge = $this->Service->find('first',array('recursive'=>'0','fields'=>$fields));
	if(is_array($servicecharge) && count($servicecharge)>0){
		$consulting_charge=$servicecharge['Service']['consulting_charge'];
	}
	
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
				"consultant_fee"=>$consulting_charge,
				"available_date"=>$availdate,
				"opinion_due_date"=>date("Y-m-d",strtotime($this->opinionduedatewithin,strtotime($availdate))),
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
	$this->set('consulting_charge',$consulting_charge);
	$this->set('lastquestionformno',$this->Session->read('lastquestionformno'));
 }
 
 /**
  * consultantdetailscalculation method
  * @return array
  */
	public function consultantdetailscalculation($diaginishid=0){
		$this->userloginsessionchecked();
		$this->loadModel('Doctor');
		$this->loadModel('ScheduleDoctor');
		$this->loadModel('DoctorSpecializetion');
		$this->ScheduleDoctor->bindModel(array(
			'belongsTo'=>array(
				'Doct'=>array(
					'className' => 'Patient',
					'foreignKey' => 'doct_id',
					'conditions' =>'',
					'fields' =>  array('Doct.id','Doct.name'),
					'order' => ''
				)
			)
		));
		//main conditions
		//5 min from allocations
		$fiveminalloc = time()-(5*60);
		//$conds = array("ScheduleDoctor.isonholiday"=>'0',"ScheduleDoctor.assignment <"=>'3','ScheduleDoctor.lastangajtime <'=>$fiveminalloc);
		$conds = array("ScheduleDoctor.isonholiday"=>'0',"ScheduleDoctor.assingmentfull"=>'0','ScheduleDoctor.lastangajtime <'=>$fiveminalloc);
		// available schedule date
		$strdate = date("Y-m-d",strtotime("+1 day"));
		$enddate = date("Y-m-d",strtotime("+3 month"));
		$conditions = array(
			'WorkSchedule.workday BETWEEN ? AND ?'=>array($strdate,$enddate),
			'WorkSchedule.isdoctorschedulecreated'=>'1',
			'WorkSchedule.isholiday'=>'0'
		);
		//pr($conditions);
		$workschedules = $this->ScheduleDoctor->WorkSchedule->find('list',array('conditions'=>$conditions));
		
		if(is_array($workschedules) && count($workschedules)>0){
			$conds["ScheduleDoctor.work_schedule_id"]=array_values($workschedules);
		}
		else{
			return array();
		}
		//get all doctor belongs to the selected diagonisis
		//get doctor ids from the doctorspecialization
		$this->DoctorSpecializetion->unbindModel(array(
			'belongsTo'=>array('Specialization','Doctor')
		));
		$condss = array('DoctorSpecializetion.is_deleted'=>'0','DoctorSpecializetion.specialization_id'=>$diaginishid);
		$this->DoctorSpecializetion->displayField="doct_id";
		$doctorids = $this->DoctorSpecializetion->find('list',array('conditions'=>$condss));
		
		if(is_array($doctorids) && count($doctorids)>0){
			$doctorids = array_values($doctorids);
		}
		else{
			return array();
		}
		
		//unbind model
		$this->Doctor->unbindModel(array(
			'belongsTo'=>array('Specialization')
		));
		$this->Doctor->displayField="patient_id";
		
		//$docconditions = array('Doctor.specialization_id'=>$diaginishid,'Doctor.patient_id >'=>'0','Patient.ispatient'=>'0','Patient.isdeleted'=>'0','Patient.isactive'=>'1');
		//$docconditions = array('Doctor.specialization_id'=>$diaginishid,'Doctor.patient_id >'=>'0');
		
		$docconditions = array('Doctor.id'=>$doctorids,'Doctor.patient_id >'=>'0');
		
		$doctors = $this->Doctor->find('list',array('conditions'=>$docconditions));
		
		//pr($doctors);
		if(is_array($doctors) && count($doctors)>0){
			$conds["ScheduleDoctor.doct_id"]=array_values($doctors);
			$conds['Doct.ispatient']='0';
			$conds['Doct.isdeleted']='0';
			$conds['Doct.isactive']='1';
		}
		else{
			return array();
		}
		
		$availdoctore = $this->ScheduleDoctor->find("first",array("recursive"=>'1',"conditions"=>$conds,"order"=>array("Doct.name"=>"ASC","ScheduleDoctor.id"=>"ASC")));
		/* pr($docconditions);
		pr($conds);
		pr($workschedules);
		echo "count  : ".count($workschedules);
		pr($condss);
		pr($doctorids);
		pr($availdoctore);
		die(); */
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
		$this->userloginsessionchecked();
		$this->loadModel('DoctorCase');
		$this->loadModel('ScheduleDoctor');
		if($caseid>0){
			// validate assign doct time sections 
			$updcond = array('ScheduleDoctor.id'=>$scheduledcotid);
			//pr($updcond);
			//bind the Doct
			$this->ScheduleDoctor->bindModel(array(
				'belongsTo'=>array(
					'Doct'=>array(
						'className'=>'Patient',
						'foreignKey'=>'doct_id',
						'fields'=>array('Doct.id','Doct.name')
					)
				)
			));
			//now bind DoctotDetails
			$this->ScheduleDoctor->Doct->bindModel(array(
				'hasOne'=>array(
					'DoctorDetail'=>array(
						'className'=>'Doctor',
						'foreignKey'=>'patient_id',
						'fields'=>array('DoctorDetail.id','DoctorDetail.maxappointment')
					)
				)
			));
			//get the details of the schedule doctore
			$scheduledoct = $this->ScheduleDoctor->find('first',array('recursive'=>'2','conditions'=>$updcond));
			if(is_array($scheduledoct) && count($scheduledoct)>0){
				$crttime = $scheduledoct['ScheduleDoctor']['lastangajtime'];
				$fiveminbuffer = time()-(5*60);
				if($crttime>=$fiveminbuffer){
					//valied transaction secions
					//update the doctor case details 
					/*$updata = array('DoctorCase.ispaymentdone'=>'1');
					$upcond = array('DoctorCase.schedule_doctor_id'=>$scheduledcotid,'DoctorCase.id'=>$caseid);
					$this->DoctorCase->updateAll($updata,$upcond);
					
					// now update the count of the doct of assign patient details 
					// update section
					$totalassignment = $scheduledoct['ScheduleDoctor']['assignment'];
					$maxassignment = isset($scheduledoct['Doct']['DoctorDetail']['maxappointment'])?$scheduledoct['Doct']['DoctorDetail']['maxappointment']:'1';
					$appointmentfull=0;
					if(($totalassignment+1)>=$maxassignment){
						//
						$appointmentfull=1;
					}
					$updat = array('ScheduleDoctor.assignment'=>'ScheduleDoctor.assignment+1','ScheduleDoctor.assingmentfull'=>$appointmentfull);
					
					$this->ScheduleDoctor->updateAll($updat,$updcond);
					//now update the form submit count in patient tables
					//new
					$patientupddata = array('Patient.detailsformsubmit'=>'6','Patient.is_questionnair_closed'=>'0');
					$patientcond = array('Patient.id'=>$this->Session->read("loggedpatientid"));
					$this->PatientDetail->Patient->updateAll($patientupddata,$patientcond);
					
					//get the case details for sending email to the patient
					
					$upcond['DoctorCase.ispaymentdone']='1';
					$doctorcase = $this->DoctorCase->find('first',array('recursive'=>'1','conditions'=>$upcond));
					
					if(is_array($doctorcase) && count($doctorcase)>0){
						$doctorname=(isset($doctorcase['Doctor']['name']))?$doctorcase['Doctor']['name']:'';
						$patientname=(isset($doctorcase['Patient']['name']))?$doctorcase['Patient']['name']:'';
						$patientemail = (isset($doctorcase['Patient']['email']))?$doctorcase['Patient']['email']:'';
						//if patient email found
						if($patientemail!=''){
							$data = array(
								'name'=>$patientname,
								'available_date'=>$doctorcase['DoctorCase']['available_date'],
								'opinion_due_date'=>$doctorcase['DoctorCase']['opinion_due_date'],
								'consultant_fee'=>$doctorcase['DoctorCase']['consultant_fee'],
								'diagonisis'=>$doctorcase['DoctorCase']['diagonisis'],
								'doctorname'=>$doctorname,
							);
							
							$this->sitemailsend($mailtype=2,$from=array(),$to=$patientemail,$message="EDC Email",$data);
						}
					}
					//old
					//$this->PatientDetail->Patient->id=$this->Session->read("loggedpatientid");
					//$this->PatientDetail->Patient->saveField('detailsformsubmit','6');
					//$this->Session->setFlash(__('The consultants saved.'));
					$this->redirect(array('controller'=>'patients','action'=>'dashboard'));*/
					
					//now make the payment section
					//get the live data from the admin
					$this->loadModel('Service');
					$fieldname = array('Service.payment_mode','Service.payment_account','Service.id','Service.consulting_charge');
					$paymentdetails = $thhis->Service->find('first',array('fields'=>$fieldname));
					$ispayaccountpresent=0;
					if(is_array($paymentdetails) && count($paymentdetails)>0){
						if(isset($paymentdetails['Service']['payment_account']) && $paymentdetails['Service']['payment_account']!=''){
							$mode = $paymentdetails['Service']['payment_mode'];
							$amount = $paymentdetails['Service']['consulting_charge'];
							$baseurls = FULL_BASE_URL.$this->base."/";
							//$cancel_return = "http://localhost/EDC/patients/paymentcancel";
							$cancel_return =$baseurls."patients/dashboard";
							$return = $baseurls."patients/paymentsucces";
							$configdata=array(
								'item_name'=>'Consultant fee',
								'item_number'=>'1',
								'amount'=>$amount,
								'currency_code'=>'USD',
								'cancel_return'=>$cancel_return,
								'return'=>$return,
								'case_id'=>$caseid
							);
							$paypal_id=($paymentdetails['Service']['payment_account']);
							
							$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
							if($mode==1){
								$paypal_url='https://www.paypal.com/cgi-bin/webscr';
							}
							$this->set('configdata',$configdata);
							$this->set('paypal_url',$paypal_url);
							$this->set('paypal_id',$paypal_id);
						}
					}
					if($ispayaccountpresent==0){
						//paypal account not present
						//send mail to admin
						$this->sitemailsend($mailtype=7,$from=array(),$to="",$message="EDC Email paypal not set",$data=array());
						
						$this->Session->setFlash(__('Some thing gone wrong in payment process please take a look after few minutes.'));
						$this->redirect(array('action'=>'patientconsultant'));
					}
					//$paypal_id='mrintoryal_business@yahoo.in';
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
		$this->userloginsessionchecked();
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
			//pr($this->request->data);
			$this->PatientDetail->create();
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
	
	//print the patient summery
/**
 * pdfsummery method
 */
	public function pdfsummery(){
		$this->layout="blanks";
		
		$this->loadMOdel('Patient');
		//bind the patiend model with other as has one
		$this->Patient->unbindModel(array(
			'hasMany'=>array('PatientDetail')
		));
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
				'PatientCase'=>array(
					'className'=>'DoctorCase',
					'foreignKey'=>'patient_id',
					'conditions'=>array('PatientCase.ispaymentdone'=>'1','PatientCase.isclosed'=>'0','PatientCase.doctor_id >'=>'0'),
					'fields'=>'',
					'order'=>array('PatientCase.id'=>'DESC')
				)
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
		$this->Patient->PatientCase->unbindModel(array(
			'belongsTo'=>array('Patient','Doctor')
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
		$this->set('patientalldeatils',$patientalldeatils);
	}
	
	//download the uploaded doct file 
	public function reportdownload($filename=''){
		if($filename!=''){
			$filepath="patientdocts/".$filename;
			
			$this->downloadfile($filename,$filepath);
		}
		die();
	}
	
	public function admin_reportdownload($filename=''){
		if($filename!=''){
			$filepath="patientdocts/".$filename;
			
			$this->downloadfile($filename,$filepath);
		}
		die();
	}
	
}
