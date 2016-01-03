<?php
App::uses('AppController', 'Controller');
/**
 * ScheduleDoctors Controller
 *
 * @property ScheduleDoctor $ScheduleDoctor
 * @property PaginatorComponent $Paginator
 */
class ScheduleDoctorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $layout="admin";

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ScheduleDoctor->recursive = 0;
		$this->set('scheduleDoctors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ScheduleDoctor->exists($id)) {
			throw new NotFoundException(__('Invalid schedule doctor'));
		}
		$options = array('conditions' => array('ScheduleDoctor.' . $this->ScheduleDoctor->primaryKey => $id));
		$this->set('scheduleDoctor', $this->ScheduleDoctor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ScheduleDoctor->create();
			if ($this->ScheduleDoctor->save($this->request->data)) {
				$this->Session->setFlash(__('The schedule doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedule doctor could not be saved. Please, try again.'));
			}
		}
		$workSchedules = $this->ScheduleDoctor->WorkSchedule->find('list');
		$this->set(compact('workSchedules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ScheduleDoctor->exists($id)) {
			throw new NotFoundException(__('Invalid schedule doctor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ScheduleDoctor->save($this->request->data)) {
				$this->Session->setFlash(__('The schedule doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedule doctor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ScheduleDoctor.' . $this->ScheduleDoctor->primaryKey => $id));
			$this->request->data = $this->ScheduleDoctor->find('first', $options);
		}
		$workSchedules = $this->ScheduleDoctor->WorkSchedule->find('list');
		$this->set(compact('workSchedules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ScheduleDoctor->id = $id;
		if (!$this->ScheduleDoctor->exists()) {
			throw new NotFoundException(__('Invalid schedule doctor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ScheduleDoctor->delete()) {
			$this->Session->setFlash(__('The schedule doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The schedule doctor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($workdayid=0) {
		$this->validateadminsession();
		
		$this->ScheduleDoctor->recursive = 0;
		$tday=date("Y-m-d");
		
		//$tday = date("Y-m-d");
		$strday =date("Y-m-d",strtotime("-1 month"));
		$tillday =date("Y-m-d",strtotime("+1 month"));
		$this->ScheduleDoctor->WorkSchedule->displayField="workday";
		//$this->ScheduleDoctor->WorkSchedule->primaryField="workday";
		$condi = array('WorkSchedule.isdoctorschedulecreated'=>'1',
		'WorkSchedule.workday BETWEEN ? and ?'=>array($strday,$tillday));
		$workSchedules = $this->ScheduleDoctor->WorkSchedule->find('list',array('conditions'=>$condi));
		
		/*if(is_array($workSchedules) && count($workSchedules)>0){
			$tday = $workSchedules[$did];
		}*/
		if($workdayid>0){
			$tday = $workSchedules[$workdayid];
		}
		else{
			$workdayid=array_search($tday,$workSchedules);
		}
		$scheduleDoctors=array();
		//dind model
		$this->ScheduleDoctor->bindModel(array(
			"belongsTo"=>array(
				'Doct' => array(
					'className' => 'Patient',
					'foreignKey' => 'doct_id',
					'conditions' => '',
					'fields' => array('Doct.id','Doct.name'),
					'order' => ''
				)
			)
		));
		$this->ScheduleDoctor->unbindModel(array("belongsTo"=>array('WorkSchedule')));
		$condss = array('WorkSchedule.workday'=>$tday,'WorkSchedule.isdoctorschedulecreated'=>'1','WorkSchedule.isholiday'=>'0');
		$allassigndocts = $this->ScheduleDoctor->WorkSchedule->find('first',array("recursive"=>'2','conditions'=>$condss));
		//pr($allassigndocts);
		if(isset($allassigndocts['ScheduleDoctor']) && count($allassigndocts['ScheduleDoctor'])>0){
			$scheduleDoctors=$allassigndocts['ScheduleDoctor'];
		}
		//$this->set('scheduleDoctors', $this->Paginator->paginate());
		
		$this->set('scheduleDoctors',$scheduleDoctors);
		$this->set('allassigndocts',$allassigndocts);
		//get all secdule dates
		$this->set("workSchedules",$workSchedules);
		$this->set("workday",$workdayid);
	}
	
	public function admin_schedule(){
		$this->validateadminsession();
		$this->loadModel('Patient');
		$this->ScheduleDoctor->recursive = 0;
		$tday=date("Y-m-d");
		
		//$tday = date("Y-m-d");
		$strday =date("Y-m-d");
		$tillday =date("Y-m-d",strtotime("+1 month"));
		$this->ScheduleDoctor->WorkSchedule->displayField="workday";
		$condi = array('WorkSchedule.isdoctorschedulecreated'=>'1',
		'WorkSchedule.workday BETWEEN ? and ?'=>array($strday,$tillday));
		$workSchedules = $this->ScheduleDoctor->WorkSchedule->find('list',array('conditions'=>$condi));
		
		//pr($workSchedules);
		/*$sdcon = array('ScheduleDoctor.work_schedule_id'=>array_keys($workSchedules));
		$scheduledoctors = $this->ScheduleDoctor->find("all",array("recursive"=>'1',"conditions"=>$sdcon));
		pr($scheduledoctors);*/
		
		$this->Patient->unbindModel(array("hasMany"=>array('PatientDetail')));
		$this->Patient->bindModel(array(
			'hasMany'=>array(
				'ScheduleDoctor'=>array(
					'className' => 'ScheduleDoctor',
					'foreignKey' => 'doct_id',
					'conditions' =>array('ScheduleDoctor.work_schedule_id'=>array_keys($workSchedules)) ,
					'fields' => '',
					'order' => ''
				)
			),
			"hasOne"=>array(
				"DoctDetail"=>array(
					'className' => 'Doctor',
					'foreignKey' => 'patient_id',
					'conditions' =>array('DoctDetail.patient_id >'=>'0'),
					'fields' => '',
					'order' => ''
				)
			)
			
		));
		$doccond = array('Patient.ispatient'=>'0','Patient.isdeleted'=>'0','Patient.isactive'=>'1','DoctDetail.patient_id >'=>'0');
		$doctoreSceduls = $this->Patient->find("all",array("recursive"=>'1',"conditions"=>$doccond,"fields"=>array("Patient.id","Patient.name"),"order"=>array("Patient.name"=>"ASC")));
		
		$this->set("doctoreSceduls",$doctoreSceduls);
		$this->set("workSchedules",$workSchedules);
		
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->validateadminsession();
		if (!$this->ScheduleDoctor->exists($id)) {
			throw new NotFoundException(__('Invalid schedule doctor'));
		}
		$options = array('conditions' => array('ScheduleDoctor.' . $this->ScheduleDoctor->primaryKey => $id));
		$this->set('scheduleDoctor', $this->ScheduleDoctor->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		
		$this->validateadminsession();
		//load patient model 
		$this->loadModel('Patient');
		$this->loadModel('DoctorHoliday');
		$curdate = date("Y-m-d");
		
		$tilldate = date("Y-m-d",strtotime("+3 month"));
	
		$conditions = array('WorkSchedule.workday BETWEEN ? AND ?'=>array($curdate,$tilldate),'WorkSchedule.isdoctorschedulecreated'=>'0');
		$updatearray = array('WorkSchedule.isdoctorschedulecreated'=>'1','WorkSchedule.doctschedulecreatedate'=>'"'.date("Y-m-d H:i:s").'"');
		//$this->ScheduleDoctor->WorkSchedule->displayField="workday";
		$this->ScheduleDoctor->WorkSchedule->unbindModel(array(
			'hasMany'=>array('ScheduleDoctor')
		));
		$workschedules = $this->ScheduleDoctor->WorkSchedule->find('all',array('recursive'=>'0','conditions'=>$conditions));
		//pr($workschedules);
		//die();
		//get all available doctors
		$this->Patient->unbindModel(array(
			"hasMany"=>array("PatientDetail")
		));
		$this->DoctorHoliday->unbindModel(array(
			'belongsTo'=>array('Doct')
		));
		$cond = array("Patient.ispatient"=>'0',"Patient.isactive"=>'1',"Patient.isdeleted"=>'0');
		$fields = array("id","name","ispatient");
		$doctors = $this->Patient->find('all',array('recursive'=>'0','conditions'=>$cond,'fields'=>$fields));
		//pr($doctors);
		if(is_array($workschedules) && count($workschedules)>0 && is_array($doctors) && count($doctors)>0){
			foreach($workschedules as $workschedule){
				//echo $workscheduleid;
				//echo "\n";
				$workscheduleid=$workschedule['WorkSchedule']['id'];
				$workday=$workschedule['WorkSchedule']['workday'];
				$isholiday = $workschedule['WorkSchedule']['isholiday'];
				
				foreach($doctors as $doctor){
					//pr($doctor);
					$this->ScheduleDoctor->create();
					$doctid = (isset($doctor['Patient']['id']))?$doctor['Patient']['id']:0;
					if($doctid>0){
						//checked if the day was holiday or not
						$docholicon = array('DoctorHoliday.holidaydate'=>$workday,'DoctorHoliday.doct_id'=>$doctid);
						$doctholiday = $this->DoctorHoliday->find('first',array('conditions'=>$docholicon));
						$isonholiday=0;
						if(is_array($doctholiday) && count($doctholiday)>0){
							$isonholiday=1;
						}
						//now save the doct in the doct schedule table
						$svdata = array("ScheduleDoctor"=>array(
							"work_schedule_id"=>$workscheduleid,
							"doct_id"=>$doctid,
							"isonholiday"=>$isonholiday,
							"assignment"=>'0'
						));
						
						$this->ScheduleDoctor->save($svdata);
					}
				}
				//after adding all the doct update the
				$this->ScheduleDoctor->WorkSchedule->updateAll($updatearray,array('WorkSchedule.id'=>$workscheduleid));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ScheduleDoctor->exists($id)) {
			throw new NotFoundException(__('Invalid schedule doctor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ScheduleDoctor->save($this->request->data)) {
				$this->Session->setFlash(__('The schedule doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedule doctor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ScheduleDoctor.' . $this->ScheduleDoctor->primaryKey => $id));
			$this->request->data = $this->ScheduleDoctor->find('first', $options);
		}
		$workSchedules = $this->ScheduleDoctor->WorkSchedule->find('list');
		$this->set(compact('workSchedules'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ScheduleDoctor->id = $id;
		if (!$this->ScheduleDoctor->exists()) {
			throw new NotFoundException(__('Invalid schedule doctor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ScheduleDoctor->delete()) {
			$this->Session->setFlash(__('The schedule doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The schedule doctor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
