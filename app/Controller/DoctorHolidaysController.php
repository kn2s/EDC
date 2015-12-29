<?php
App::uses('AppController', 'Controller');
/**
 * DoctorHolidays Controller
 *
 * @property DoctorHoliday $DoctorHoliday
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DoctorHolidaysController extends AppController {

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
		$this->DoctorHoliday->recursive = 0;
		$this->set('doctorHolidays', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DoctorHoliday->exists($id)) {
			throw new NotFoundException(__('Invalid doctor holiday'));
		}
		$options = array('conditions' => array('DoctorHoliday.' . $this->DoctorHoliday->primaryKey => $id));
		$this->set('doctorHoliday', $this->DoctorHoliday->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DoctorHoliday->create();
			if ($this->DoctorHoliday->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor holiday has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor holiday could not be saved. Please, try again.'));
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
		if (!$this->DoctorHoliday->exists($id)) {
			throw new NotFoundException(__('Invalid doctor holiday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DoctorHoliday->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor holiday has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor holiday could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DoctorHoliday.' . $this->DoctorHoliday->primaryKey => $id));
			$this->request->data = $this->DoctorHoliday->find('first', $options);
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
		$this->DoctorHoliday->id = $id;
		if (!$this->DoctorHoliday->exists()) {
			throw new NotFoundException(__('Invalid doctor holiday'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DoctorHoliday->delete()) {
			$this->Session->setFlash(__('The doctor holiday has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor holiday could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 *ADMIN SECION START
 *
 */
	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DoctorHoliday->recursive = 0;
		$this->set('doctorHolidays', $this->Paginator->paginate());
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
		if (!$this->DoctorHoliday->Doct->exists($id)) {
			//throw new NotFoundException(__('Invalid doctor holiday'));
			$this->Session->setFlash(__('Invalid doctor.'));
		}
		$this->DoctorHoliday->unbindModel(array('belongsTo'=>array('Doct')));
		$options = array('conditions' => array('DoctorHoliday.doct_' . $this->DoctorHoliday->primaryKey => $id));
		$this->DoctorHoliday->displayField="holidaydate";
		
		$this->set('doctorHoliday', implode(",",$this->DoctorHoliday->find('list', $options)));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($id = null) {
		$this->layout="admin";
		if ($this->request->is('post')) {
			
			//pr($this->request->data);
			if(isset($this->request->data['DoctorHoliday']['holidaydatetill']) && $this->request->data['DoctorHoliday']['holidaydatetill']!=''){
				$curday = $this->request->data['DoctorHoliday']['holidaydate'];
				$lstday = $this->request->data['DoctorHoliday']['holidaydatetill'];
				$doct_id = $this->request->data['DoctorHoliday']['doct_id'];
				while(strtotime($curday)<=strtotime($lstday)){
					$postdata = array(
						'DoctorHoliday'=>array(
							'doct_id'=>$doct_id,
							'holidaydate'=>$curday
						)
					);
					//pr($postdata);
					$this->DoctorHoliday->create();
					$this->DoctorHoliday->save($postdata);
					$curday = date("Y-m-d",strtotime("+1day",strtotime($curday)));
				}
				$this->Session->setFlash(__('The doctor holiday has been saved.'));
				return $this->redirect(array('action' => 'add'));
			}
			else{
				$this->Session->setFlash(__('The doctor holiday could not be saved. Please, try again.'));
			}
			/*if ($this->DoctorHoliday->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor holiday has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor holiday could not be saved. Please, try again.'));
			}*/
		}
		//list all doctor for assing the holidays
		$docts = $this->DoctorHoliday->Doct->find('list',array('conditions'=>array('Doct.ispatient'=>'0','Doct.isactive'=>'1','Doct.isdeleted'=>'0')));
		$this->set(compact('docts'));
		if($id==null && count($docts)>0){
			$id =0;
		}
		$this->set('coosedoct',$id);
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->DoctorHoliday->exists($id)) {
			throw new NotFoundException(__('Invalid doctor holiday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DoctorHoliday->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor holiday has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor holiday could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DoctorHoliday.' . $this->DoctorHoliday->primaryKey => $id));
			$this->request->data = $this->DoctorHoliday->find('first', $options);
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
		$this->DoctorHoliday->id = $id;
		if (!$this->DoctorHoliday->exists()) {
			throw new NotFoundException(__('Invalid doctor holiday'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DoctorHoliday->delete()) {
			$this->Session->setFlash(__('The doctor holiday has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor holiday could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * admin_commoneholiday method
 *
 */
	public function admin_commoneholiday(){
		$this->layout="admin";
		if ($this->request->is('post')) {
			pr($this->request->data);
			if(isset($this->request->data['DoctorHoliday']['holidaydate']) && $this->request->data['DoctorHoliday']['holidaydate']!=''){
				$allcurday = explode(",",$this->request->data['DoctorHoliday']['holidaydate']);
				sort($allcurday);
				$doct_id = $this->request->data['DoctorHoliday']['doct_id'];
				for($i=0; $i<count($allcurday);$i++){
					$curday = $allcurday[$i];
					$postdata = array(
						'DoctorHoliday'=>array(
							'doct_id'=>$doct_id,
							'holidaydate'=>$curday
						)
					);
					//pr($postdata);
					//$this->DoctorHoliday->create();
					//$this->DoctorHoliday->save($postdata);
				}
				$this->Session->setFlash(__('The doctor holiday has been saved.'));
				return $this->redirect(array('action' => 'add'));
			}
			else{
				$this->Session->setFlash(__('The doctor holiday could not be saved. Please, try again.'));
			}
		}
	}
}
