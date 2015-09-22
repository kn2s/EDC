<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdminsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $layout='adminlogin';
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		/*$this->Admin->recursive = 0;
		$this->set('admins', $this->Paginator->paginate());*/
		$this->isadminalreadylogged();
		
		if($this->request->is('post')){
			//pr($this->request->data);
			//validate email 
			$email = isset($this->request->data['Admin']['email'])?$this->request->data['Admin']['email']:'';
			$pass = isset($this->request->data['Admin']['password'])?$this->request->data['Admin']['password']:'';
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				$adcond = array('Admin.email'=>$email,'Admin.password'=>md5($pass),'Admin.isactive'=>'1','Admin.isdeleted'=>'0');
				$admin = $this->Admin->find('first',array('recursive'=>'0','conditions'=>$adcond));
				if(isset($admin) && is_array($admin) && count($admin)>0){
					$this->setadminsession($admin);
					if($this->Session->check('loggedadminid')){
						//after sesion set go to dash board sections
						$this->redirect(array('controller'=>'doctors','action'=>'index','admin'=>true));
					}
					else{
						//session set error
						$this->Session->setFlash('we have some problem please try again later');
					}
				}
				else{
					// email or password dose not match
					$this->Session->setFlash('E-mail or Password does not match');
				}
			}
			else{
				//invalid email format
				$this->Session->setFlash('Invalid E-mail address');
			}
		}
	}
	
/**
 * admin_doctor method
 * @return void
 */
	public function admin_doctor(){
		$this->layout='admin';
		$this->validateadminsession();
		//get all registerd doctore from this methods
		$this->loadModel('Patient');
		$this->Patient->unbindModel(array('hasMany'=>array('PatientDetail')));
		$findcondition = array('Patient.ispatient'=>'0','Patient.isdeleted'=>'0');
		$doctors = $this->Patient->find('all',array('recursive'=>'1','conditions'=>$findcondition));
		$this->set('doctors',$doctors);
	}
/**
 * admin_logout method
 * @return void
 */
	public function admin_logout(){
		$this->destroyadminsession();
	}
	
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
		$this->set('admin', $this->Admin->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('The admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
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
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('The admin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
			$this->request->data = $this->Admin->find('first', $options);
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
		$this->Admin->id = $id;
		if (!$this->Admin->exists()) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Admin->delete()) {
			$this->Session->setFlash(__('The admin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The admin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
