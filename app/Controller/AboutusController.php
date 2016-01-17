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
		$this->loadModel('DoctorSpecializetion');
		$specializations=array();
		$isajaxcall=false;
		
		/*$this->Doctor->bindModel(array(
			'hasMany'=>array(
				'DoctorSpecializetion'=>array(
					'className'=>'DoctorSpecializetion',
					'foreignKey'=>'doct_id',
					'fields'=>''
				)
			)
		));*/
		
		if($this->request->is("post")){
			$isajaxcall=true;
			$curspecialist=(isset($this->request->data["catid"]) && $this->request->data["catid"]>0)?$this->request->data["catid"]:0;
		}
		else{
			$spccond = array("Specialization.isactive"=>'1','Specialization.isdeleted'=>'0');
			$specializations = $this->DoctorSpecializetion->Specialization->find('list',array('conditions'=>$spccond));
			//pr($specializations);
			if(count($specializations)>0 && $curspecialist==0){
				list($curspecialist) = array_keys($specializations);
			}
		}
		
		/*$doccond = array('Doctor.patient_id >'=>'0','Doctor.specialization_id'=>$curspecialist);
		$doctors = $this->DoctorSpecializetion->Doctor->find('all',array('recursive'=>'0','conditions'=>$doccond));
		pr($doctors);*/
		//new logic
		//unbind the model
		$this->DoctorSpecializetion->Doctor->unbindModel(array('belongsTo'=>array('Specialization')));
		
		$doccond = array('DoctorSpecializetion.specialization_id'=>$curspecialist,'Doctor.patient_id >'=>'0','DoctorSpecializetion.is_deleted'=>'0');
		$doctors = $this->DoctorSpecializetion->find('all',array('recursive'=>'2','conditions'=>$doccond));
		
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
