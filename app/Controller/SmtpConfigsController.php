<?php
App::uses('AppController', 'Controller');
/**
 * SmtpConfigs Controller
 *
 * @property SmtpConfig $SmtpConfig
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SmtpConfigsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	/*public function admin_index() {
		$this->SmtpConfig->recursive = 0;
		$this->set('smtpConfigs', $this->Paginator->paginate());
	}*/

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function admin_view($id = null) {
		if (!$this->SmtpConfig->exists($id)) {
			throw new NotFoundException(__('Invalid smtp config'));
		}
		$options = array('conditions' => array('SmtpConfig.' . $this->SmtpConfig->primaryKey => $id));
		$this->set('smtpConfig', $this->SmtpConfig->find('first', $options));
	}*/

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->adminloginchecked();
		$this->layout="admin";
		
		if ($this->request->is(array('post','put'))) {
			$this->SmtpConfig->create();
			$this->request->data['SmtpConfig']['is_default']='0';
			
			if ($this->SmtpConfig->save($this->request->data)) {
				//$this->Session->setFlash(__('The smtp config has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The smtp config could not be saved. Please, try again.'));
			}
		}
		else{
			//find all the email settings 
			//$order = array('SmtpConfig.is_default'=>'DESC');
			$order=array();
			$smtpConfigs = $this->SmtpConfig->find('all',array('limit'=>'2','order'=>$order));
			$defaultconfig=array();
			$workingconfig=array();
			if(is_array($smtpConfigs) && count($smtpConfigs)>0){
				foreach($smtpConfigs as $smtpConfig){
					if($smtpConfig['SmtpConfig']['is_default']){
						$defaultconfig = $smtpConfig['SmtpConfig'];
					}
					else{
						$workingconfig = $smtpConfig['SmtpConfig'];
					}
				}
			}
			$this->request->data['SmtpConfig']=$workingconfig;
			$this->request->data['SmtpConfigDflt']=$defaultconfig;
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function admin_edit($id = null) {
		if (!$this->SmtpConfig->exists($id)) {
			throw new NotFoundException(__('Invalid smtp config'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SmtpConfig->save($this->request->data)) {
				$this->Session->setFlash(__('The smtp config has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The smtp config could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SmtpConfig.' . $this->SmtpConfig->primaryKey => $id));
			$this->request->data = $this->SmtpConfig->find('first', $options);
		}
	}*/

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function admin_delete($id = null) {
		$this->SmtpConfig->id = $id;
		if (!$this->SmtpConfig->exists()) {
			throw new NotFoundException(__('Invalid smtp config'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SmtpConfig->delete()) {
			$this->Session->setFlash(__('The smtp config has been deleted.'));
		} else {
			$this->Session->setFlash(__('The smtp config could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
