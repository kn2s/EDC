<?php
App::uses('AppController', 'Controller');
/**
 * Services Controller
 *
 * @property Service $Service
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ServicesController extends AppController {

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
		$this->layout='smallheader';
		$this->loadModel('Homepagecontent');
		$this->Service->recursive = 0;
		$this->set('services', $this->Service->find('first'));
		$this->set('homepagecontent', $this->Homepagecontent->find('first'));
	}
	
/**
 * howitwork method
 */
	public function howitwork(){
		$this->layout="smallheader";
	}
	
//admin section
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout='admin';
		$this->validateadminsession();
		if ($this->request->is(array('post', 'put'))) {
			$this->Service->create();
			//pr($this->request->data);
			//die();
			if ($this->Service->save($this->request->data)) {
				//$this->Session->setFlash(__('The service has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The service could not be saved. Please, try again.'));
			}
		}
		$this->request->data = $this->Service->find('first');
	}
/**
 * admin_emailsetting method
 */
	public function admin_emailsetting(){
		$this->layout='admin';
		$this->validateadminsession();
		if ($this->request->is(array('post', 'put'))) {
			$this->Service->create();
			$this->Service->save($this->request->data);
		}
		$this->request->data = $this->Service->find('first',array('fields'=>array('Service.sending_email','Service.receiving_email','Service.id')));
	}
	
/**
 * admin_paypalsetting method
 */
	public function admin_paypalsetting(){
		$this->layout='admin';
		$this->validateadminsession();
		if ($this->request->is(array('post', 'put'))) {
			$this->Service->create();
			$this->Service->save($this->request->data);
		}
		$this->request->data = $this->Service->find('first',array(
		'fields'=>array('Service.payment_mode','Service.payment_account','Service.id','Service.payment_on_off')));
	}
	
}
