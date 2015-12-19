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
	public function admin_index($did=0) {
		$this->ScheduleDoctor->recursive = 0;
		$this->ScheduleDoctor->WorkSchedule->displayField="workday";
		$workSchedules = $this->ScheduleDoctor->WorkSchedule->find('list',array('conditions'=>array('WorkSchedule.isdoctorschedulecreated'=>'1')));
		$tday =date("Y-m-d");
		/*if(is_array($workSchedules) && count($workSchedules)>0){
			$tday = $workSchedules[$did];
		}*/
		$scheduleDoctors=array();
		$condss = array('WorkSchedule.workday'=>$tday);
		$allassigndocts = $this->ScheduleDoctor->WorkSchedule->find('first',array("recursive"=>'1','conditions'=>$condss));
		if(isset($allassigndocts['ScheduleDoctor']) && count($allassigndocts['ScheduleDoctor'])>0){
			$scheduleDoctors=$allassigndocts['ScheduleDoctor'];
		}
		//$this->set('scheduleDoctors', $this->Paginator->paginate());
		$this->set('scheduleDoctors',$scheduleDoctors);
		$this->set('allassigndocts',$allassigndocts);
		//get all secdule dates
		
		
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
		/*if ($this->request->is('post')) {
			$this->ScheduleDoctor->create();
			if ($this->ScheduleDoctor->save($this->request->data)) {
				$this->Session->setFlash(__('The schedule doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedule doctor could not be saved. Please, try again.'));
			}
		}
		$workSchedules = $this->ScheduleDoctor->WorkSchedule->find('list');
		$this->set(compact('workSchedules'));*/
		
		//load patient model 
		$this->loadModel('Patient');
		$curdate = date("Y-m-d");
		
		$tilldate = date("Y-m-d",strtotime("+3 month"));
	
		$conditions = array('WorkSchedule.workday BETWEEN ? AND ?'=>array($curdate,$tilldate),'WorkSchedule.isdoctorschedulecreated'=>'0');
		$updatearray = array('WorkSchedule.isdoctorschedulecreated'=>'1','WorkSchedule.doctschedulecreatedate'=>'"'.date("Y-m-d H:i:s").'"');
		$workschedules = $this->ScheduleDoctor->WorkSchedule->find('list',array('conditions'=>$conditions));
		//pr($workschedules);
		
		//get all available doctors
		$this->Patient->unbindModel(array(
			"hasMany"=>array("PatientDetail")
		));
		$cond = array("Patient.ispatient"=>'0',"Patient.isactive"=>'1',"Patient.isdeleted"=>'0');
		$fields = array("id","name","ispatient");
		$doctors = $this->Patient->find('all',array('recursive'=>'0','conditions'=>$cond,'fields'=>$fields));
		//pr($doctors);
		if(is_array($workschedules) && count($workschedules)>0 && is_array($doctors) && count($doctors)>0){
			foreach($workschedules as $key=>$workscheduleid){
				//echo $workscheduleid;
				//echo "\n";
				
				foreach($doctors as $doctor){
					//pr($doctor);
					$this->ScheduleDoctor->create();
					$doctid = (isset($doctor['Patient']['id']))?$doctor['Patient']['id']:0;
					if($doctid>0){
						//now save the doct in the doct schedule table
						$svdata = array("ScheduleDoctor"=>array(
							"work_schedule_id"=>$workscheduleid,
							"doct_id"=>$doctid,
							"isonholiday"=>'0',
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
