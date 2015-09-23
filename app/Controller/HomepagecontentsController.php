<?php
App::uses('AppController', 'Controller');
/**
 * Homepagecontents Controller
 *
 * @property Homepagecontent $Homepagecontent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HomepagecontentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $layout = 'admin';

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Homepagecontent->recursive = 0;
		$this->set('homepagecontents', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Homepagecontent->exists($id)) {
			throw new NotFoundException(__('Invalid homepagecontent'));
		}
		$options = array('conditions' => array('Homepagecontent.' . $this->Homepagecontent->primaryKey => $id));
		$this->set('homepagecontent', $this->Homepagecontent->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->validateadminsession();
		if ($this->request->is('post')) {
			$this->Homepagecontent->create();
			if ($this->Homepagecontent->save($this->request->data)) {
				$this->Session->setFlash(__('The homepagecontent has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The homepagecontent could not be saved. Please, try again.'));
			}
		}
		//$options = array('conditions' => array('Homepagecontent.' . $this->Homepagecontent->primaryKey => $id));
		//$this->set('homepagecontent', $this->Homepagecontent->find('first'));
		$this->request->data = $this->Homepagecontent->find('first');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Homepagecontent->exists($id)) {
			throw new NotFoundException(__('Invalid homepagecontent'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Homepagecontent->save($this->request->data)) {
				$this->Session->setFlash(__('The homepagecontent has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The homepagecontent could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Homepagecontent.' . $this->Homepagecontent->primaryKey => $id));
			$this->request->data = $this->Homepagecontent->find('first', $options);
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
		$this->Homepagecontent->id = $id;
		if (!$this->Homepagecontent->exists()) {
			throw new NotFoundException(__('Invalid homepagecontent'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Homepagecontent->delete()) {
			$this->Session->setFlash(__('The homepagecontent has been deleted.'));
		} else {
			$this->Session->setFlash(__('The homepagecontent could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
