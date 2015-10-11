<?php
App::uses('AppController', 'Controller');
/**
 * Drugs Controller
 *
 * @property Drug $Drug
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DrugsController extends AppController {

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
		$this->Drug->recursive = 0;
		$this->set('drugs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Drug->exists($id)) {
			throw new NotFoundException(__('Invalid drug'));
		}
		$options = array('conditions' => array('Drug.' . $this->Drug->primaryKey => $id));
		$this->set('drug', $this->Drug->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Drug->create();
			if ($this->Drug->save($this->request->data)) {
				$this->Session->setFlash(__('The drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The drug could not be saved. Please, try again.'));
			}
		}
		$socialactivities = $this->Drug->Socialactivity->find('list');
		$this->set(compact('socialactivities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Drug->exists($id)) {
			throw new NotFoundException(__('Invalid drug'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Drug->save($this->request->data)) {
				$this->Session->setFlash(__('The drug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The drug could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Drug.' . $this->Drug->primaryKey => $id));
			$this->request->data = $this->Drug->find('first', $options);
		}
		$socialactivities = $this->Drug->Socialactivity->find('list');
		$this->set(compact('socialactivities'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Drug->id = $id;
		if (!$this->Drug->exists()) {
			throw new NotFoundException(__('Invalid drug'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Drug->delete()) {
			$this->Session->setFlash(__('The drug has been deleted.'));
		} else {
			$this->Session->setFlash(__('The drug could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
