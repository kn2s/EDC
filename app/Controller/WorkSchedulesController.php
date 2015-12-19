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
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->WorkSchedule->recursive = 0;
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
		//find the lat entry of the schedule
		$conditions = array('YEAR(WorkSchedule.workday)'=>date("Y"));
		$lastrecord = $this->WorkSchedule->find('first',array('recursive'=>'0','conditions'=>$conditions,'order'=>array('WorkSchedule.id'=>'DESC')));
		//pr($lastrecord);
		$year=date("Y");
		$monthdays=array(1=>31,2=>28,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
		if(is_array($lastrecord) && count($lastrecord)>0){
			//die();
		}
		else{
			foreach($monthdays as $month=>$days){
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
			}
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
}
