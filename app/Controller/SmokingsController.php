<?php
App::uses('AppController', 'Controller');
/**
 * Smokings Controller
 *
 * @property Smoking $Smoking
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SmokingsController extends AppController {

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
		$this->Smoking->recursive = 0;
		$this->set('smokings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Smoking->exists($id)) {
			throw new NotFoundException(__('Invalid smoking'));
		}
		$options = array('conditions' => array('Smoking.' . $this->Smoking->primaryKey => $id));
		$this->set('smoking', $this->Smoking->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Smoking->create();
			if ($this->Smoking->save($this->request->data)) {
				$this->Session->setFlash(__('The smoking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The smoking could not be saved. Please, try again.'));
			}
		}
		$socialactivities = $this->Smoking->Socialactivity->find('list');
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
		if (!$this->Smoking->exists($id)) {
			throw new NotFoundException(__('Invalid smoking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Smoking->save($this->request->data)) {
				$this->Session->setFlash(__('The smoking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The smoking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Smoking.' . $this->Smoking->primaryKey => $id));
			$this->request->data = $this->Smoking->find('first', $options);
		}
		$socialactivities = $this->Smoking->Socialactivity->find('list');
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
		$this->Smoking->id = $id;
		if (!$this->Smoking->exists()) {
			throw new NotFoundException(__('Invalid smoking'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Smoking->delete()) {
			$this->Session->setFlash(__('The smoking has been deleted.'));
		} else {
			$this->Session->setFlash(__('The smoking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Smoking->recursive = 0;
		$this->set('smokings', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Smoking->exists($id)) {
			throw new NotFoundException(__('Invalid smoking'));
		}
		$options = array('conditions' => array('Smoking.' . $this->Smoking->primaryKey => $id));
		$this->set('smoking', $this->Smoking->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Smoking->create();
			if ($this->Smoking->save($this->request->data)) {
				$this->Session->setFlash(__('The smoking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The smoking could not be saved. Please, try again.'));
			}
		}
		$socialactivities = $this->Smoking->Socialactivity->find('list');
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
		if (!$this->Smoking->exists($id)) {
			throw new NotFoundException(__('Invalid smoking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Smoking->save($this->request->data)) {
				$this->Session->setFlash(__('The smoking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The smoking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Smoking.' . $this->Smoking->primaryKey => $id));
			$this->request->data = $this->Smoking->find('first', $options);
		}
		$socialactivities = $this->Smoking->Socialactivity->find('list');
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
		$this->Smoking->id = $id;
		if (!$this->Smoking->exists()) {
			throw new NotFoundException(__('Invalid smoking'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Smoking->delete()) {
			$this->Session->setFlash(__('The smoking has been deleted.'));
		} else {
			$this->Session->setFlash(__('The smoking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
