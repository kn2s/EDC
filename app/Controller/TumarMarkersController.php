<?php
App::uses('AppController', 'Controller');
/**
 * TumarMarkers Controller
 *
 * @property TumarMarker $TumarMarker
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TumarMarkersController extends AppController {

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
		$this->TumarMarker->recursive = 0;
		$this->set('tumarMarkers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TumarMarker->exists($id)) {
			throw new NotFoundException(__('Invalid tumar marker'));
		}
		$options = array('conditions' => array('TumarMarker.' . $this->TumarMarker->primaryKey => $id));
		$this->set('tumarMarker', $this->TumarMarker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TumarMarker->create();
			if ($this->TumarMarker->save($this->request->data)) {
				$this->Session->setFlash(__('The tumar marker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tumar marker could not be saved. Please, try again.'));
			}
		}
		$aboutIllnesses = $this->TumarMarker->AboutIllness->find('list');
		$this->set(compact('aboutIllnesses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TumarMarker->exists($id)) {
			throw new NotFoundException(__('Invalid tumar marker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TumarMarker->save($this->request->data)) {
				$this->Session->setFlash(__('The tumar marker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tumar marker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TumarMarker.' . $this->TumarMarker->primaryKey => $id));
			$this->request->data = $this->TumarMarker->find('first', $options);
		}
		$aboutIllnesses = $this->TumarMarker->AboutIllness->find('list');
		$this->set(compact('aboutIllnesses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TumarMarker->id = $id;
		if (!$this->TumarMarker->exists()) {
			throw new NotFoundException(__('Invalid tumar marker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TumarMarker->delete()) {
			$this->Session->setFlash(__('The tumar marker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tumar marker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TumarMarker->recursive = 0;
		$this->set('tumarMarkers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TumarMarker->exists($id)) {
			throw new NotFoundException(__('Invalid tumar marker'));
		}
		$options = array('conditions' => array('TumarMarker.' . $this->TumarMarker->primaryKey => $id));
		$this->set('tumarMarker', $this->TumarMarker->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TumarMarker->create();
			if ($this->TumarMarker->save($this->request->data)) {
				$this->Session->setFlash(__('The tumar marker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tumar marker could not be saved. Please, try again.'));
			}
		}
		$aboutIllnesses = $this->TumarMarker->AboutIllness->find('list');
		$this->set(compact('aboutIllnesses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TumarMarker->exists($id)) {
			throw new NotFoundException(__('Invalid tumar marker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TumarMarker->save($this->request->data)) {
				$this->Session->setFlash(__('The tumar marker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tumar marker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TumarMarker.' . $this->TumarMarker->primaryKey => $id));
			$this->request->data = $this->TumarMarker->find('first', $options);
		}
		$aboutIllnesses = $this->TumarMarker->AboutIllness->find('list');
		$this->set(compact('aboutIllnesses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TumarMarker->id = $id;
		if (!$this->TumarMarker->exists()) {
			throw new NotFoundException(__('Invalid tumar marker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TumarMarker->delete()) {
			$this->Session->setFlash(__('The tumar marker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tumar marker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
