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
	public $layout='default';
/**
 * admin_index method
 *
 * @return void
 */
	public function index($curspecialist=0) {
		if($this->userislogin()){
			//$this->layout="smallheader";
		}
		$this->loadModel('Doctor');
		$specializations = $this->Doctor->Specialization->find('list');
		//pr($specializations);
		if(count($specializations)>0 && $curspecialist==0){
			list($curspecialist) = array_keys($specializations);
		}
		$doccond = array('Doctor.patient_id >'=>'0','Doctor.specialization_id'=>$curspecialist);
		$doctors = $this->Doctor->find('all',array('recursive'=>'0','conditions'=>$doccond));
		$this->set(compact('specializations'));
		$this->set('curspecialist',$curspecialist);
		$this->set('doctors',$doctors);
	}
}
