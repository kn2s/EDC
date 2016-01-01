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
		if (!$this->CommonHoliday->Doct->exists($id)) {
			throw new NotFoundException(__('Invalid common holiday'));
		}
		$options = array('conditions' => array('CommonHoliday.doct_id' => $id));
		$this->set('commonHoliday', $this->CommonHoliday->find('first', $options));
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
				$valar = array('CommonHoliday.holidaydate'=>$valdate,'CommonHoliday.isdeleted'=>'0','CommonHoliday.id!='=>$id);
				$holiday = $this->CommonHoliday->find('first',array('conditions'=>$valar));
				if(is_array($holiday) && count($holiday)>0){
					$this->Session->setFlash(__('The common holiday date already set to another holiday.'));
				}
				else{
					if ($this->CommonHoliday->save($this->request->data)) {
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
		if ($this->CommonHoliday->delete()) {
			$this->Session->setFlash(__('The common holiday has been deleted.'));
		} else {
			$this->Session->setFlash(__('The common holiday could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
