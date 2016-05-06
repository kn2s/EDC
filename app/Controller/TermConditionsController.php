<?php
App::uses('AppController', 'Controller');
/**
 * TermConditions Controller
 *
 * @property TermCondition $TermCondition
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TermConditionsController extends AppController {

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
		$this->layout="smallheader";
	}
}
