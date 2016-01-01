<?php
App::uses('AppController', 'Controller');
/**
 * AboutIllnesses Controller
 *
 * @property AboutIllness $AboutIllness
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AboutIllnessesController extends AppController {

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
		$this->userloginsessionchecked();
		$this->AboutIllness->recursive = 0;
		$this->set('aboutIllnesses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->userloginsessionchecked();
		if (!$this->AboutIllness->exists($id)) {
			throw new NotFoundException(__('Invalid about illness'));
		}
		$options = array('conditions' => array('AboutIllness.' . $this->AboutIllness->primaryKey => $id));
		$this->set('aboutIllness', $this->AboutIllness->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$id = $this->request->data['AboutIllness']['id'];
			$status=0;
			//pr($this->request->data);
			
			$AboutIllness = $this->request->data['AboutIllness'];
			$AboutIllness['patient_id']=$this->Session->read('loggedpatientid');
			//pr($AboutIllness);
			$this->AboutIllness->create();
			if ($this->AboutIllness->save(array('AboutIllness'=>$AboutIllness))) {
				$id = $this->AboutIllness->id;
				if($id>0){
					$tumardata = $this->request->data['TumarMarker'];
					//pr($tumardata);
					if(isset($tumardata['name']) && count($tumardata['name'])>0){
						
						$this->AboutIllness->TumarMarker->deleteAll(array('TumarMarker.about_illness_id'=>$id));
						for($i=0;$i<count($tumardata['name']);$i++){
							$this->AboutIllness->TumarMarker->create();
							$name = isset($tumardata['name'][$i])?$tumardata['name'][$i]:'';
							$tumormonth = isset($tumardata['tumormonth'][$i])?$tumardata['tumormonth'][$i]:'';
							$tumoryear = isset($tumardata['tumoryear'][$i])?$tumardata['tumoryear'][$i]:'';
							$tumorresult = isset($tumardata['tumorresult'][$i])?$tumardata['tumorresult'][$i]:'';
							$svdata = array('TumarMarker'=>array(
								'name'=>$name,
								'tumormonth'=>$tumormonth,
								'tumoryear'=>$tumoryear,
								'tumorresult'=>$tumorresult,
								'about_illness_id'=>$id
							));
							//pr($svdata);
							
							if($this->AboutIllness->TumarMarker->save($svdata)){
								//echo $this->AboutIllness->TumarMarker->id;
							}
						}
					}
					$status=1;
					//now update the form submit count in patient tables
					/*$this->AboutIllness->Patient->id=$this->Session->read("loggedpatientid");
					$this->AboutIllness->Patient->saveField('detailsformsubmit','2');*/
					
					//update the completions status
					if($this->Session->read('lastquestionformno')>2){
						$uparray = array('Patient.detailsubmitpercent'=>$this->request->data['AboutIllness']['completed_per']);
					}
					else{
						$uparray = array('Patient.detailsformsubmit'=>'2','Patient.detailsubmitpercent'=>$this->request->data['AboutIllness']['completed_per']);
					}
					$uparray = array('Patient.detailsformsubmit'=>'2','Patient.detailsubmitpercent'=>$this->request->data['AboutIllness']['completed_per']);
					$upcond = array('Patient.id'=>$this->Session->read("loggedpatientid"));
					$this->AboutIllness->Patient->updateAll($uparray,$upcond);
				}
				
				
				/*$this->Session->setFlash(__('The about illness has been saved.'));
				return $this->redirect(array('action' => 'index'));*/
			} else {
				//$this->Session->setFlash(__('The about illness could not be saved. Please, try again.'));
			}
			die(json_encode(array('status'=>$status,'message'=>"",'id'=>$id)));
		}
		/*$patients = $this->AboutIllness->Patient->find('list');
		$principleDiagonisises = $this->AboutIllness->PrincipleDiagonisise->find('list');
		$this->set(compact('patients', 'principleDiagonisises'));*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AboutIllness->exists($id)) {
			throw new NotFoundException(__('Invalid about illness'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AboutIllness->save($this->request->data)) {
				$this->Session->setFlash(__('The about illness has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about illness could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AboutIllness.' . $this->AboutIllness->primaryKey => $id));
			$this->request->data = $this->AboutIllness->find('first', $options);
		}
		$patients = $this->AboutIllness->Patient->find('list');
		$principleDiagonisises = $this->AboutIllness->PrincipleDiagonisise->find('list');
		$this->set(compact('patients', 'principleDiagonisises'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AboutIllness->id = $id;
		if (!$this->AboutIllness->exists()) {
			throw new NotFoundException(__('Invalid about illness'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AboutIllness->delete()) {
			$this->Session->setFlash(__('The about illness has been deleted.'));
		} else {
			$this->Session->setFlash(__('The about illness could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AboutIllness->recursive = 0;
		$this->set('aboutIllnesses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AboutIllness->exists($id)) {
			throw new NotFoundException(__('Invalid about illness'));
		}
		$options = array('conditions' => array('AboutIllness.' . $this->AboutIllness->primaryKey => $id));
		$this->set('aboutIllness', $this->AboutIllness->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AboutIllness->create();
			if ($this->AboutIllness->save($this->request->data)) {
				$this->Session->setFlash(__('The about illness has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about illness could not be saved. Please, try again.'));
			}
		}
		$patients = $this->AboutIllness->Patient->find('list');
		$principleDiagonisises = $this->AboutIllness->PrincipleDiagonisise->find('list');
		$this->set(compact('patients', 'principleDiagonisises'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AboutIllness->exists($id)) {
			throw new NotFoundException(__('Invalid about illness'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AboutIllness->save($this->request->data)) {
				$this->Session->setFlash(__('The about illness has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about illness could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AboutIllness.' . $this->AboutIllness->primaryKey => $id));
			$this->request->data = $this->AboutIllness->find('first', $options);
		}
		$patients = $this->AboutIllness->Patient->find('list');
		$principleDiagonisises = $this->AboutIllness->PrincipleDiagonisise->find('list');
		$this->set(compact('patients', 'principleDiagonisises'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AboutIllness->id = $id;
		if (!$this->AboutIllness->exists()) {
			throw new NotFoundException(__('Invalid about illness'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AboutIllness->delete()) {
			$this->Session->setFlash(__('The about illness has been deleted.'));
		} else {
			$this->Session->setFlash(__('The about illness could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
