<?php
App::uses('AppController', 'Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CountriesController extends AppController {

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
		$this->Country->recursive = 0;
		$this->set('countries', $this->Country->find('all'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__('Invalid country'));
		}
		$options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
		$this->set('country', $this->Country->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			//pr($this->request->data);
			//do validation here
			if(isset($this->request->data['Country']['name']) && $this->request->data['Country']['name']!=''){
				//validate image present or not
				if($this->request->data['Country']['countryflag']['size']>0){
					$filename = time().trim(str_replace("&,#, ,*","",$this->request->data['Country']['countryflag']['name']));
					$uploaddirectory = WWW_ROOT."\countryflags\\".$filename;
					if(move_uploaded_file($this->request->data['Country']['countryflag']['tmp_name'],$uploaddirectory)){
							$this->request->data['Country']['countryflag'] = $filename;
					}
					else{
						$this->request->data['Country']['countryflag'] = "";
					}
				}
				else{
					$this->request->data['Country']['countryflag'] = "";
				}
				
				$this->Country->create();
				if ($this->Country->save($this->request->data)) {
					$this->Session->setFlash(__('The country has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
				}
			}
			else{
				$this->Session->setFlash(__('The country name required.'));
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
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(isset($this->request->data['Country']['name']) && $this->request->data['Country']['name']!=''){
				//pr($this->request->data);
				//validate image present or not
				if($this->request->data['Country']['countryflag']['size']>0){
					$filename = time().trim(str_replace("&,#, ,*","",$this->request->data['Country']['countryflag']['name']));
					$uploaddirectory = WWW_ROOT."\countryflags\\".$filename;
					if(move_uploaded_file($this->request->data['Country']['countryflag']['tmp_name'],$uploaddirectory)){
						//removed old image
						$this->request->data['Country']['countryflag'] = $filename;
					}
					else{
						$this->request->data['Country']['countryflag'] = $this->request->data['Country']['oldcountryflag'];
					}
				}
				else{
					$this->request->data['Country']['countryflag'] = $this->request->data['Country']['oldcountryflag'];
				}
				
				if ($this->Country->save($this->request->data)) {
					$this->Session->setFlash(__('The country has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
				}
			}
			else{
				$this->Session->setFlash(__('The country name required.'));
			}
		} else {
			$options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
			$this->request->data = $this->Country->find('first', $options);
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Country->delete()) {
			$this->Session->setFlash(__('The country has been deleted.'));
		} else {
			$this->Session->setFlash(__('The country could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
