<?php
App::uses('AppController', 'Controller');
/**
 * PrincipleDiagonisises Controller
 *
 * @property PrincipleDiagonisise $PrincipleDiagonisise
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PrincipleDiagonisisesController extends AppController {

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
		$this->PrincipleDiagonisise->recursive = 0;
		$this->set('principleDiagonisises', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PrincipleDiagonisise->exists($id)) {
			throw new NotFoundException(__('Invalid principle diagonisise'));
		}
		$options = array('conditions' => array('PrincipleDiagonisise.' . $this->PrincipleDiagonisise->primaryKey => $id));
		$this->set('principleDiagonisise', $this->PrincipleDiagonisise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PrincipleDiagonisise->create();
			if ($this->PrincipleDiagonisise->save($this->request->data)) {
				$this->Session->setFlash(__('The principle diagonisise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The principle diagonisise could not be saved. Please, try again.'));
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
		if (!$this->PrincipleDiagonisise->exists($id)) {
			throw new NotFoundException(__('Invalid principle diagonisise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PrincipleDiagonisise->save($this->request->data)) {
				$this->Session->setFlash(__('The principle diagonisise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The principle diagonisise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrincipleDiagonisise.' . $this->PrincipleDiagonisise->primaryKey => $id));
			$this->request->data = $this->PrincipleDiagonisise->find('first', $options);
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
		$this->PrincipleDiagonisise->id = $id;
		if (!$this->PrincipleDiagonisise->exists()) {
			throw new NotFoundException(__('Invalid principle diagonisise'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PrincipleDiagonisise->delete()) {
			$this->Session->setFlash(__('The principle diagonisise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The principle diagonisise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PrincipleDiagonisise->recursive = 0;
		$this->set('principleDiagonisises', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PrincipleDiagonisise->exists($id)) {
			throw new NotFoundException(__('Invalid principle diagonisise'));
		}
		$options = array('conditions' => array('PrincipleDiagonisise.' . $this->PrincipleDiagonisise->primaryKey => $id));
		$this->set('principleDiagonisise', $this->PrincipleDiagonisise->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PrincipleDiagonisise->create();
			if ($this->PrincipleDiagonisise->save($this->request->data)) {
				$this->Session->setFlash(__('The principle diagonisise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The principle diagonisise could not be saved. Please, try again.'));
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
		if (!$this->PrincipleDiagonisise->exists($id)) {
			throw new NotFoundException(__('Invalid principle diagonisise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PrincipleDiagonisise->save($this->request->data)) {
				$this->Session->setFlash(__('The principle diagonisise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The principle diagonisise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrincipleDiagonisise.' . $this->PrincipleDiagonisise->primaryKey => $id));
			$this->request->data = $this->PrincipleDiagonisise->find('first', $options);
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
		$this->PrincipleDiagonisise->id = $id;
		if (!$this->PrincipleDiagonisise->exists()) {
			throw new NotFoundException(__('Invalid principle diagonisise'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PrincipleDiagonisise->delete()) {
			$this->Session->setFlash(__('The principle diagonisise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The principle diagonisise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
