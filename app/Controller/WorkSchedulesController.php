<?php
App::uses('AppController', 'Controller');
/**
 * WorkSchedules Controller
 *
 * @property WorkSchedule $WorkSchedule
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class WorkSchedulesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $layout="admin";

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->WorkSchedule->recursive = 0;
		$this->set('workSchedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid work schedule'));
		}
		$options = array('conditions' => array('WorkSchedule.' . $this->WorkSchedule->primaryKey => $id));
		$this->set('workSchedule', $this->WorkSchedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkSchedule->create();
			if ($this->WorkSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The work schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work schedule could not be saved. Please, try again.'));
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
		if (!$this->WorkSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid work schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The work schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkSchedule.' . $this->WorkSchedule->primaryKey => $id));
			$this->request->data = $this->WorkSchedule->find('first', $options);
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
		$this->WorkSchedule->id = $id;
		if (!$this->WorkSchedule->exists()) {
			throw new NotFoundException(__('Invalid work schedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WorkSchedule->delete()) {
			$this->Session->setFlash(__('The work schedule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The work schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	*
	* ADMIN SECTION WORK HERE
	*
	**/
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->WorkSchedule->recursive = 0;
		$this->validateadminsession();
		$conditions = array('YEAR(WorkSchedule.workday)'=>date("Y"));
		$this->Paginator->settings=array(
			'limit'=>10,
			'conditions'=>$conditions
		);
		$this->set('workSchedules', $this->Paginator->paginate());
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
		if (!$this->WorkSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid work schedule'));
		}
		$options = array('conditions' => array('WorkSchedule.' . $this->WorkSchedule->primaryKey => $id));
		$this->set('workSchedule', $this->WorkSchedule->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		/*if ($this->request->is('post')) {
			$this->WorkSchedule->create();
			if ($this->WorkSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The work schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work schedule could not be saved. Please, try again.'));
			}
		}*/
		$this->validateadminsession();
		//unbind models
		$this->WorkSchedule->unbindModel(array(
			'hasMany'=>array('ScheduleDoctor')
		));
		//find the lat entry of the schedule
		$year=date("Y");
		$conditions = array('YEAR(WorkSchedule.workday)'=>$year);
		$lastrecord = $this->WorkSchedule->find('first',array('recursive'=>'0','conditions'=>$conditions,'order'=>array('WorkSchedule.id'=>'DESC')));
		//pr($lastrecord);
		$workday=date("Y-m-d");
		//$workenddate=date("Y-m-d",strtotime("+1 day"));
		$workenddate = ($year+1)."-01-01";
		
		/*$datediff =  date_diff(date_create($workenddate),date_create($workday));
		pr($datediff);*/
		
		//get all commone holiday day
		$this->loadModel('CommonHoliday');
		$consholiday = array("YEAR(CommonHoliday.holidaydate)"=>$year,'CommonHoliday.isdeleted'=>'0');
		$commoneHolidays = $this->CommonHoliday->find('all',array('recursive'=>'1','conditions'=>$consholiday));
		pr($commoneHolidays);
		$allholidays = array();
		foreach($commoneHolidays as $holiday){
				array_push($allholidays,$holiday['CommonHoliday']['holidaydate']);
		}
		//pr($allholidays);
		$monthdays=array(1=>31,2=>28,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
		if(is_array($lastrecord) && count($lastrecord)>0){
			//die();
			$workday = ($lastrecord['WorkSchedule']['workday']!='')?date("Y-m-d",strtotime("+1 day",strtotime($lastrecord['WorkSchedule']['workday']))):$workday;
		}
		else{
			/*foreach($monthdays as $month=>$days){
				if($month==2){
					//validate the year is leep year or not
					$isleepyear = ($year%1000==0)?(($year%400==0)?true:false):(($year%4==0)?true:false);
					if($isleepyear){
						$days=$days+1;
					}
				}
				
				$todate=$year."-".str_pad($month,2,'0',STR_PAD_LEFT)."-";
				for($i=1;$i<=$days;$i++){
					$curday = $todate.str_pad($i,2,0,STR_PAD_LEFT);
					$instdata = array('WorkSchedule'=>array(
						'workday'=>$curday,
						'isholiday'=>'0'
					));
					//pr($instdata);
					$this->WorkSchedule->create();
					if($this->WorkSchedule->save($instdata)){
					
					}
				}
			}*/
		}
		// new section 
		while(strtotime($workday)<strtotime($workenddate)){
			$isholiday=0;
			if(in_array($workday,$allholidays)){
				$isholiday=1;
			}
			$instdata = array('WorkSchedule'=>array(
				'workday'=>$workday,
				'isholiday'=>$isholiday
			));
			//pr($instdata);
			$this->WorkSchedule->create();
			$this->WorkSchedule->save($instdata);
			
			$workday=date("Y-m-d",strtotime("+1 day",strtotime($workday)));
		}
		//$this->redirect(array("controllers"=>"WorkSchedules","action"=>"index"));
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
		$this->validateadminsession();
		if (!$this->WorkSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid work schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The work schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkSchedule.' . $this->WorkSchedule->primaryKey => $id));
			$this->request->data = $this->WorkSchedule->find('first', $options);
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
		$this->WorkSchedule->id = $id;
		if (!$this->WorkSchedule->exists()) {
			throw new NotFoundException(__('Invalid work schedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WorkSchedule->delete()) {
			$this->Session->setFlash(__('The work schedule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The work schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	//extra section
	
/**
 * admin_makeholidayornot method
 */
	public function admin_makeholidayornot(){
		$status=0;
		$message="";
		$this->loadModel('CommonHoliday');
		
		if($this->request->is("post")){
			$curpos = (isset($this->request->data['curstatus']) && $this->request->data['curstatus']==0)?1:0;
			$dayid = (isset($this->request->data['dayid']) && $this->request->data['dayid']>0)?$this->request->data['dayid']:0;
			$uparay = array('WorkSchedule.isholiday'=>$curpos);
			$upcond = array('WorkSchedule.id'=>$dayid);
			if($dayid>0){
				$this->WorkSchedule->updateAll($uparay,$upcond);
				$status=1;
				// add remove from commone holiday list
				$isalreadypresent=false;
				$chdate = $this->request->data['dt'];
				$commonholidays = $this->CommonHoliday->find('first',array('conditions'=>array('CommonHoliday.holidaydate'=>$chdate,'CommonHoliday.isdeleted'=>'0')));
				if(is_array($commonholidays) && count($commonholidays)>0){
					$isalreadypresent=true;
				}
				
				if($curpos==1){
					//add
					if(!$isalreadypresent){
						$datas = array(
							'CommonHoliday'=>array(
								'holidaydate'=>$chdate
							)
						);
						$this->CommonHoliday->save($datas);
					}
				}
				else{
					//remove
					if($isalreadypresent){
						$delcond = array('CommonHoliday.holidaydate'=>$chdate);
						$this->CommonHoliday->deleteAll($delcond);
					}
				}
			}
		}
		die(json_encode(array("status"=>$status,"message"=>$message)));
	}
}
