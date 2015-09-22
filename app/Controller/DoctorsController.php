<?php
App::uses('AppController', 'Controller');
/**
 * Doctors Controller
 *
 * @property Doctor $Doctor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DoctorsController extends AppController {

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
		$this->Doctor->recursive = 0;
		$this->set('doctors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
		$this->set('doctor', $this->Doctor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Doctor->create();
			if ($this->Doctor->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
			}
		}
		$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
		$this->set(compact('patients', 'specializations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Doctor->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
			$this->request->data = $this->Doctor->find('first', $options);
		}
		$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
		$this->set(compact('patients', 'specializations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Doctor->id = $id;
		if (!$this->Doctor->exists()) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Doctor->delete()) {
			$this->Session->setFlash(__('The doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		
		$this->layout='admin';
		$this->validateadminsession();
		$findcondition = array('Doctor.patient_id >'=>'0');
		$doctors = $this->Doctor->find('all',array('recursive'=>'0','conditions'=>$findcondition));
		$this->set('doctors',$doctors);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
		$this->set('doctor', $this->Doctor->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout='admin';
		$this->validateadminsession();
		
		if ($this->request->is('post')) {
			//echo WWW_ROOT;
			$this->Doctor->create();
			//pr($this->request->data);
			//die();
			//first add as patient 
			$this->request->data['Patient']['createtime']=time();
			$this->request->data['Patient']['password']=md5($this->request->data['Patient']['password']);
			if($this->Doctor->Patient->save(array('Patient'=>$this->request->data['Patient']))){
				$patient_id = $this->Doctor->Patient->id;
				$this->request->data['Doctor']['patient_id']=$patient_id;
				//image upload section
				if($this->request->data['Doctor']['image']['size']>0){
					$filename = time().trim(str_replace("&,#, ,*","",$this->request->data['Doctor']['image']['name']));
					$uploaddirectory = WWW_ROOT."\doctorimage\\".$filename;
					if(move_uploaded_file($this->request->data['Doctor']['image']['tmp_name'],$uploaddirectory)){
							$this->request->data['Doctor']['image'] = $filename;
					}
					else{
						$this->request->data['Doctor']['image'] = "";
					}
				}
				else{
					$this->request->data['Doctor']['image'] = "";
				}
				
				if ($this->Doctor->save(array('Doctor'=>$this->request->data['Doctor']))) {
					$this->Session->setFlash(__('The doctor has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
				}
			}
		}
		//$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
		$this->set(compact('specializations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Doctor->save($this->request->data)) {
				$this->Session->setFlash(__('The doctor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The doctor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
			$this->request->data = $this->Doctor->find('first', $options);
		}
		$patients = $this->Doctor->Patient->find('list');
		$specializations = $this->Doctor->Specialization->find('list');
		$this->set(compact('patients', 'specializations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Doctor->id = $id;
		if (!$this->Doctor->exists()) {
			throw new NotFoundException(__('Invalid doctor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Doctor->delete()) {
			$this->Session->setFlash(__('The doctor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The doctor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
