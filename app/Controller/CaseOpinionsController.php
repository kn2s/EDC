<?php
App::uses('AppController', 'Controller');
/**
 * CaseOpinions Controller
 *
 * @property CaseOpinion $CaseOpinion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CaseOpinionsController extends AppController {

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
		$this->CaseOpinion->recursive = 0;
		$this->set('caseOpinions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
		$this->set('caseOpinion', $this->CaseOpinion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$status=0;
			$message='';
			$this->CaseOpinion->create();
			//pr($this->request->data);
			if(isset($this->request->data['CaseOpinion']['comment']) && $this->request->data['CaseOpinion']['comment']=="Type Something"){
				$this->request->data['CaseOpinion']['comment']='';
			}
			$this->request->data['CaseOpinion']['cteratedatetime']=date("Y-m-d G:i:s");
			if ($this->CaseOpinion->save($this->request->data)) {
				/*$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));*/
				$status=1;
				//now update the case with opinion post (4)
				$this->CaseOpinion->DoctorCase->updateAll(array("DoctorCase.satatus"=>'4'),array('DoctorCase.id'=>$this->request->data['CaseOpinion']['doctor_case_id']));
			}
			die(json_encode(array('status'=>$status,'message'=>$message)));
		}
		/*$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));*/
	}
	
	/**
	* imageupload method 
	*/
	public function imageupload(){
	  $message="";
	  $status=0;
	  $filename='';
	 // pr($_FILES);
	  if(isset($_FILES['docfile']['size']) && $_FILES['docfile']['size']>0){
		  $filename = trim(time().str_replace("&,#, ,*","_",$_FILES['docfile']['name']));
		  if(move_uploaded_file($_FILES['docfile']['tmp_name'],WWW_ROOT."/caseopinion/".$filename)){
			 $message="file upload done";
			  $status="1"; 
		  }
		  else{
			  $filename='';
			  $message="file upload error";
			  $status="0";
		  }
	  }
	  die(json_encode(array("status"=>$status,"message"=>$message,"attachementname"=>$filename)));
  }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case opinion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
			$this->request->data = $this->CaseOpinion->find('first', $options);
		}
		$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CaseOpinion->id = $id;
		if (!$this->CaseOpinion->exists()) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseOpinion->delete()) {
			$this->Session->setFlash(__('The case opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case opinion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CaseOpinion->recursive = 0;
		$this->set('caseOpinions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
		$this->set('caseOpinion', $this->CaseOpinion->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CaseOpinion->create();
			if ($this->CaseOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case opinion could not be saved. Please, try again.'));
			}
		}
		$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CaseOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The case opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case opinion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseOpinion.' . $this->CaseOpinion->primaryKey => $id));
			$this->request->data = $this->CaseOpinion->find('first', $options);
		}
		$doctorCases = $this->CaseOpinion->DoctorCase->find('list');
		$this->set(compact('doctorCases'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CaseOpinion->id = $id;
		if (!$this->CaseOpinion->exists()) {
			throw new NotFoundException(__('Invalid case opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseOpinion->delete()) {
			$this->Session->setFlash(__('The case opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case opinion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
