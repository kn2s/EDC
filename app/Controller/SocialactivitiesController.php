<?php
App::uses('AppController', 'Controller');
/**
 * Socialactivities Controller
 *
 * @property Socialactivity $Socialactivity
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SocialactivitiesController extends AppController {

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
		$this->Socialactivity->recursive = 0;
		$this->set('socialactivities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Socialactivity->exists($id)) {
			throw new NotFoundException(__('Invalid socialactivity'));
		}
		$options = array('conditions' => array('Socialactivity.' . $this->Socialactivity->primaryKey => $id));
		$this->set('socialactivity', $this->Socialactivity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			header('Content-type:application/json');
			$status=0;
			$message='new entry error';
			$activityid=0;
			//pr($this->request->data);
			
			$activityid = $this->request->data['Socialactivity']['id'];
			$this->request->data['Socialactivity']['patient_id']=$this->Session->read("loggedpatientid");
			$this->Socialactivity->create();
			$ssdata = $this->request->data['Socialactivity'];
			//pr($ssdata);
			if ($this->Socialactivity->save($ssdata)) {
				$activityid=$this->Socialactivity->id;
				//remove all prev data from smoking details
				$this->Socialactivity->Smoking->deleteAll(array("Smoking.socialactivity_id"=>$activityid));
				$this->Socialactivity->Alcohol->deleteAll(array("Alcohol.socialactivity_id"=>$activityid));
				$this->Socialactivity->Drug->deleteAll(array("Drug.socialactivity_id"=>$activityid));
				
				//now entry all new data to the tables
				$smoking=array('Smoking'=>$this->request->data['Smoking']);
				$smoking['Smoking']['socialactivity_id']=$activityid;
				//pr($smoking);
				$this->Socialactivity->Smoking->save($smoking);
				//alcohal section
				if(isset($this->request->data['saalcohalquantity']) && isset($this->request->data['saalcohaltype'])){
					$altypes = $this->request->data['saalcohaltype'];
					$alquanty=$this->request->data['saalcohalquantity'];
					$unit = $this->request->data['saalcoholunit'];
					
					for($i=0;$i<count($altypes);$i++){
						$type = (isset($altypes[$i]))?$altypes[$i]:'';
						$quan = (isset($alquanty[$i]))?$alquanty[$i]:'0';
						$this->Socialactivity->Alcohol->create();
						$aldatas = array('Alcohol'=>array(
							'alcoholname'=>$type,
							'quantity'=>$quan,
							'socialactivity_id'=>$activityid
						));
						//pr($aldatas);
						$this->Socialactivity->Alcohol->save($aldatas);
					}
				}
				//drug section
				if(isset($this->request->data['samoredrugtype']) && isset($this->request->data['samoredrugquantity'])){
					$altypes = $this->request->data['samoredrugtype'];
					$alquanty=$this->request->data['samoredrugquantity'];
					$unit = $this->request->data['samoredrugunit'];
					for($i=0;$i<count($altypes);$i++){
						$type = (isset($altypes[$i]))?$altypes[$i]:'';
						$quan = (isset($alquanty[$i]))?$alquanty[$i]:'0';
						$this->Socialactivity->Drug->create();
						$aldatas = array('Drug'=>array(
							'drugname'=>$type,
							'quantity'=>$quan,
							'socialactivity_id'=>$activityid
						));
						//pr($aldatas);
						$this->Socialactivity->Drug->save($aldatas);
					}
				}
				$message="save your information";
				$status=1;
				//$this->Session->setFlash(__('The socialactivity has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The socialactivity could not be saved. Please, try again.'));
				$status=0;
				$message="please try again we have some problem to saving your details";
			}
			die(json_encode(array('status'=>$status,'message'=>$message,'id'=>$activityid)));
		}
		//$patients = $this->Socialactivity->Patient->find('list');
		//$this->set(compact('patients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Socialactivity->exists($id)) {
			throw new NotFoundException(__('Invalid socialactivity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Socialactivity->save($this->request->data)) {
				$this->Session->setFlash(__('The socialactivity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The socialactivity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Socialactivity.' . $this->Socialactivity->primaryKey => $id));
			$this->request->data = $this->Socialactivity->find('first', $options);
		}
		$patients = $this->Socialactivity->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Socialactivity->id = $id;
		if (!$this->Socialactivity->exists()) {
			throw new NotFoundException(__('Invalid socialactivity'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Socialactivity->delete()) {
			$this->Session->setFlash(__('The socialactivity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The socialactivity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Socialactivity->recursive = 0;
		$this->set('socialactivities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Socialactivity->exists($id)) {
			throw new NotFoundException(__('Invalid socialactivity'));
		}
		$options = array('conditions' => array('Socialactivity.' . $this->Socialactivity->primaryKey => $id));
		$this->set('socialactivity', $this->Socialactivity->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Socialactivity->create();
			if ($this->Socialactivity->save($this->request->data)) {
				$this->Session->setFlash(__('The socialactivity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The socialactivity could not be saved. Please, try again.'));
			}
		}
		$patients = $this->Socialactivity->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Socialactivity->exists($id)) {
			throw new NotFoundException(__('Invalid socialactivity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Socialactivity->save($this->request->data)) {
				$this->Session->setFlash(__('The socialactivity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The socialactivity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Socialactivity.' . $this->Socialactivity->primaryKey => $id));
			$this->request->data = $this->Socialactivity->find('first', $options);
		}
		$patients = $this->Socialactivity->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Socialactivity->id = $id;
		if (!$this->Socialactivity->exists()) {
			throw new NotFoundException(__('Invalid socialactivity'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Socialactivity->delete()) {
			$this->Session->setFlash(__('The socialactivity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The socialactivity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
