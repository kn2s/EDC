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
