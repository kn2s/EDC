<?php
App::uses('AppController', 'Controller');
/**
 * SampleOpinions Controller
 *
 * @property SampleOpinion $SampleOpinion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SampleOpinionsController extends AppController {

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
		$this->SampleOpinion->recursive = 0;
		$this->set('sampleOpinions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SampleOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid sample opinion'));
		}
		$options = array('conditions' => array('SampleOpinion.' . $this->SampleOpinion->primaryKey => $id));
		$this->set('sampleOpinion', $this->SampleOpinion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SampleOpinion->create();
			if ($this->SampleOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The sample opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample opinion could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SampleOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid sample opinion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SampleOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The sample opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample opinion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SampleOpinion.' . $this->SampleOpinion->primaryKey => $id));
			$this->request->data = $this->SampleOpinion->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SampleOpinion->id = $id;
		if (!$this->SampleOpinion->exists()) {
			throw new NotFoundException(__('Invalid sample opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SampleOpinion->delete()) {
			$this->Session->setFlash(__('The sample opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sample opinion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout="admin";
		$this->SampleOpinion->recursive = 0;
		/*$sampleOpinions = $this->SampleOpinion->find('first',array('recursive'=>'1','conditions'=>array()));
		$this->set('sampleOpinions',$sampleOpinions );//$this->Paginator->paginate()*/
		$options = array('conditions' => array('SampleOpinion.is_deleted'=>'0'),'order'=>array('SampleOpinion.id'=>'DESC'));
		$this->request->data = $this->SampleOpinion->find('first', $options);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SampleOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid sample opinion'));
		}
		$options = array('conditions' => array('SampleOpinion.' . $this->SampleOpinion->primaryKey => $id));
		$this->set('sampleOpinion', $this->SampleOpinion->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SampleOpinion->create();
			if ($this->SampleOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The sample opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample opinion could not be saved. Please, try again.'));
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
		/*if (!$this->SampleOpinion->exists($id)) {
			throw new NotFoundException(__('Invalid sample opinion'));
		}*/
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SampleOpinion->save($this->request->data)) {
				$this->Session->setFlash(__('The sample opinion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sample opinion could not be saved. Please, try again.'));
			}
		} else {
			//$options = array('conditions' => array('SampleOpinion.' . $this->SampleOpinion->primaryKey => $id));
			$options = array('conditions' => array('SampleOpinion.is_deleted'=>'0'));
			$this->request->data = $this->SampleOpinion->find('first', $options);
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
		$this->SampleOpinion->id = $id;
		if (!$this->SampleOpinion->exists()) {
			throw new NotFoundException(__('Invalid sample opinion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SampleOpinion->delete()) {
			$this->Session->setFlash(__('The sample opinion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sample opinion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
