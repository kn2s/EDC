<?php
App::uses('AppController', 'Controller');
/**
 * Aboutus Controller
 *
 * @property Aboutus $Aboutus
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AboutusController extends AppController {

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
	public function index() {
		$this->loadModel('Doctor');
		
	}
}
