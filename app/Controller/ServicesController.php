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
	
//admin section
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout='admin';
		$this->validateadminsession();
		if ($this->request->is('post')) {
			$this->Service->create();
			if ($this->Service->save($this->request->data)) {
				$this->Session->setFlash(__('The service has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The service could not be saved. Please, try again.'));
			}
		}
		$this->request->data = $this->Service->find('first');
	}

}
