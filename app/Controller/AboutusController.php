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
		$specializations=array();
		$isajaxcall=false;
		if($this->request->is("post")){
			$isajaxcall=true;
			$curspecialist=(isset($this->request->data["catid"]) && $this->request->data["catid"]>0)?$this->request->data["catid"]:0;
		}
		else{
			$spccond = array("Specialization.isactive"=>'1','Specialization.isdeleted'=>'0');
			$specializations = $this->Doctor->Specialization->find('list',array('conditions'=>$spccond));
			//pr($specializations);
			if(count($specializations)>0 && $curspecialist==0){
				list($curspecialist) = array_keys($specializations);
			}
		}
		
		$doccond = array('Doctor.patient_id >'=>'0','Doctor.specialization_id'=>$curspecialist);
		$doctors = $this->Doctor->find('all',array('recursive'=>'0','conditions'=>$doccond));
		if($isajaxcall){
			header('Content-type:application/json');
			die(json_encode(array('doctors'=>$doctors)));
		}
		else{
			$this->set(compact('specializations'));
			$this->set('curspecialist',$curspecialist);
			$this->set('doctors',$doctors);
		}
	}
}
