<?php
App::uses('AppController', 'Controller');
/**
 * Alcohols Controller
 *
 * @property Alcohol $Alcohol
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlcoholsController extends AppController {

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
		$this->Alcohol->recursive = 0;
		$this->set('alcohols', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Alcohol->exists($id)) {
			throw new NotFoundException(__('Invalid alcohol'));
		}
		$options = array('conditions' => array('Alcohol.' . $this->Alcohol->primaryKey => $id));
		$this->set('alcohol', $this->Alcohol->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Alcohol->create();
			if ($this->Alcohol->save($this->request->data)) {
				$this->Session->setFlash(__('The alcohol has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alcohol could not be saved. Please, try again.'));
			}
		}
		$socialactivities = $this->Alcohol->Socialactivity->find('list');
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
		if (!$this->Alcohol->exists($id)) {
			throw new NotFoundException(__('Invalid alcohol'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alcohol->save($this->request->data)) {
				$this->Session->setFlash(__('The alcohol has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alcohol could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Alcohol.' . $this->Alcohol->primaryKey => $id));
			$this->request->data = $this->Alcohol->find('first', $options);
		}
		$socialactivities = $this->Alcohol->Socialactivity->find('list');
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
		$this->Alcohol->id = $id;
		if (!$this->Alcohol->exists()) {
			throw new NotFoundException(__('Invalid alcohol'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Alcohol->delete()) {
			$this->Session->setFlash(__('The alcohol has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alcohol could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Alcohol->recursive = 0;
		$this->set('alcohols', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Alcohol->exists($id)) {
			throw new NotFoundException(__('Invalid alcohol'));
		}
		$options = array('conditions' => array('Alcohol.' . $this->Alcohol->primaryKey => $id));
		$this->set('alcohol', $this->Alcohol->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Alcohol->create();
			if ($this->Alcohol->save($this->request->data)) {
				$this->Session->setFlash(__('The alcohol has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alcohol could not be saved. Please, try again.'));
			}
		}
		$socialactivities = $this->Alcohol->Socialactivity->find('list');
		$this->set(compact('socialactivities'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Alcohol->exists($id)) {
			throw new NotFoundException(__('Invalid alcohol'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alcohol->save($this->request->data)) {
				$this->Session->setFlash(__('The alcohol has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alcohol could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Alcohol.' . $this->Alcohol->primaryKey => $id));
			$this->request->data = $this->Alcohol->find('first', $options);
		}
		$socialactivities = $this->Alcohol->Socialactivity->find('list');
		$this->set(compact('socialactivities'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Alcohol->id = $id;
		if (!$this->Alcohol->exists()) {
			throw new NotFoundException(__('Invalid alcohol'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Alcohol->delete()) {
			$this->Session->setFlash(__('The alcohol has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alcohol could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
