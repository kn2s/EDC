<?php
App::uses('AppController', 'Controller');
/**
 * CommonHolidays Controller
 *
 * @property CommonHoliday $CommonHoliday
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CommonHolidaysController extends AppController {

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
		$this->CommonHoliday->recursive = 0;
		$this->set('commonHolidays', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CommonHoliday->exists($id)) {
			throw new NotFoundException(__('Invalid common holiday'));
		}
		$options = array('conditions' => array('CommonHoliday.' . $this->CommonHoliday->primaryKey => $id));
		$this->set('commonHoliday', $this->CommonHoliday->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CommonHoliday->create();
			if ($this->CommonHoliday->save($this->request->data)) {
				$this->Session->setFlash(__('The common holiday has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The common holiday could not be saved. Please, try again.'));
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
		if (!$this->CommonHoliday->exists($id)) {
			throw new NotFoundException(__('Invalid common holiday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CommonHoliday->save($this->request->data)) {
				$this->Session->setFlash(__('The common holiday has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The common holiday could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CommonHoliday.' . $this->CommonHoliday->primaryKey => $id));
			$this->request->data = $this->CommonHoliday->find('first', $options);
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
		$this->CommonHoliday->id = $id;
		if (!$this->CommonHoliday->exists()) {
			throw new NotFoundException(__('Invalid common holiday'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CommonHoliday->delete()) {
			$this->Session->setFlash(__('The common holiday has been deleted.'));
		} else {
			$this->Session->setFlash(__('The common holiday could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->validateadminsession();
		$this->layout="admin";
		$this->CommonHoliday->recursive = 0;
		$cond = array('YEAR(CommonHoliday.holidaydate)'=>date("Y"),'CommonHoliday.isdeleted'=>'0');
		$this->set('commonHolidays', $this->Paginator->paginate($cond));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout="admin";
		$this->validateadminsession();
		/*if (!$this->CommonHoliday->Doct->exists($id)) {
			throw new NotFoundException(__('Invalid common holiday'));
		}
		$options = array('conditions' => array('CommonHoliday.doct_id' => $id));
		$this->set('commonHoliday', $this->CommonHoliday->find('first', $options));*/
		return $this->redirect(array('action'=>'index'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->validateadminsession();
		$this->layout="admin";
		if ($this->request->is('post')) {
			
			//validate iff the day allready inserted or not
			$valdate = "";
			if(isset($this->request->data['CommonHoliday']['holidaydate'])){
				$valdate=$this->request->data['CommonHoliday']['holidaydate'];
			}
			
			if($valdate!=''){
				$valar = array('CommonHoliday.holidaydate'=>$valdate,'CommonHoliday.isdeleted'=>'0');
				$holiday = $this->CommonHoliday->find('first',array('conditions'=>$valar));
				if(is_array($holiday) && count($holiday)>0){
					$this->Session->setFlash(__('The common holiday date already set.'));
				}
				else{
					$this->CommonHoliday->create();
					if ($this->CommonHoliday->save($this->request->data)) {
						$this->workscheduleholidayupdate($valdate,1);
						$this->Session->setFlash(__('The common holiday has been saved.'));
						return $this->redirect(array('action' => 'add'));
					} else {
						$this->Session->setFlash(__('The common holiday could not be saved. Please, try again.'));
					}
				}
			}
			else{
				$this->Session->setFlash(__('The common holiday date not set.'));
			}
		}
	}
	
/**
 * workscheduleholidayupdate method
 */
	public function workscheduleholidayupdate($valdate='',$isholiday=0){
		if($valdate!=''){
			$this->loadModel("WorkSchedule");
			$this->loadModel("DoctorHoliday");
			//$this->loadModel("ScheduleDoctor");
			
			$upfld = array('WorkSchedule.isholiday'=>$isholiday);
			$upcond = array('WorkSchedule.workday'=>$valdate);
			$this->WorkSchedule->updateAll($upfld,$upcond);
			//now get the schedule day id
			
			$workschedule = $this->WorkSchedule->find('first',array('recursive'=>'0','conditions'=>$upcond));
			$workscheduleid = isset($workschedule['WorkSchedule']['id'])?$workschedule['WorkSchedule']['id']:0;
			//make doctor schedule holiday list
			$scheduledoctupcon = array('ScheduleDoctor.work_schedule_id'=>$workscheduleid);
			if($isholiday){
				//make all associated date as holiday
				$this->WorkSchedule->ScheduleDoctor->updateAll(array('ScheduleDoctor.isonholiday'=>'1'),$scheduledoctupcon);
			}
			else{
				//remove the associated date from holiday if doct have no holiday
				//find all doct who have holiday on that date 
				$whcond = array("DoctorHoliday.holidaydate"=>$valdate);
				$this->DoctorHoliday->displayField="doct_id";
				$onholidydocts = $this->DoctorHoliday->find('list',array('conditions'=>$whcond));
				if(is_array($onholidydocts) && count($onholidydocts)>0){
					//found doct as holiday
					$alldoctids = array_values($onholidydocts);
					if(count($alldoctids)>1){
						$scheduledoctupcon['ScheduleDoctor.doct_id !']=$alldoctids;
					}
					else{
						$doctid = $alldoctids[0];
						$scheduledoctupcon['ScheduleDoctor.doct_id !=']=$doctid;
					}
					
				}
				
				$this->WorkSchedule->ScheduleDoctor->updateAll(array('ScheduleDoctor.isonholiday'=>'0'),$scheduledoctupcon);
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
		$this->validateadminsession();
		$this->layout="admin";
		if (!$this->CommonHoliday->exists($id)) {
			throw new NotFoundException(__('Invalid common holiday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$valdate = "";
			if(isset($this->request->data['CommonHoliday']['holidaydate'])){
				$valdate=$this->request->data['CommonHoliday']['holidaydate'];
			}
			
			if($valdate!=''){
				$valar = array('CommonHoliday.holidaydate'=>$valdate,'CommonHoliday.isdeleted'=>'0','CommonHoliday.id !='=>$id);
				$holiday = $this->CommonHoliday->find('first',array('conditions'=>$valar));
				if(is_array($holiday) && count($holiday)>0){
					$this->Session->setFlash(__('The common holiday date already set to another holiday.'));
				}
				else{
					//get old holiday date
					$prevholiday = $this->CommonHoliday->find('first',array('conditions'=>array('CommonHoliday.id'=>$id)));
					if(is_array($prevholiday) && count($prevholiday)>0){
						//remove old date holiday section from workschedule
						$olddate = $prevholiday['CommonHoliday']['holidaydate'];
						$this->workscheduleholidayupdate($olddate,0);
					}
					if ($this->CommonHoliday->save($this->request->data)) {
						$this->workscheduleholidayupdate($valdate,1);
						$this->Session->setFlash(__('The common holiday has been saved.'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The common holiday could not be saved. Please, try again.'));
					}
				}
			}
			else{
				$this->Session->setFlash(__('The common holiday date not set.'));
			}
		} else {
			$options = array('conditions' => array('CommonHoliday.' . $this->CommonHoliday->primaryKey => $id));
			$this->request->data = $this->CommonHoliday->find('first', $options);
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
		$this->validateadminsession();
		$this->CommonHoliday->id = $id;
		if (!$this->CommonHoliday->exists()) {
			throw new NotFoundException(__('Invalid common holiday'));
		}
		$this->request->allowMethod('post', 'delete');
		//after delete this update delete 
		//get old holiday date
		$prevholiday = $this->CommonHoliday->find('first',array('conditions'=>array('CommonHoliday.id'=>$id)));
		if(is_array($prevholiday) && count($prevholiday)>0){
			//remove old date holiday section from workschedule
			$olddate = $prevholiday['CommonHoliday']['holidaydate'];
			$this->workscheduleholidayupdate($olddate,0);
		}
		
		if ($this->CommonHoliday->delete()) {
			$this->Session->setFlash(__('The common holiday has been deleted.'));
		} else {
			$this->Session->setFlash(__('The common holiday could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
