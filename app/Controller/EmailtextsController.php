<?php
App::uses('AppController', 'Controller');
/**
 * Emailtexts Controller
 *
 * @property Emailtexts $Emailtexts
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EmailtextsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $layout='default';
	
/**
 * admin_index method
 */
	public function admin_index(){
		if($this->request->is(array('post','put'))){
			$posteddata = $this->request->data;
			pr($posteddata);
			die();
			if($this->Emailtext->save($this->request->data)){
				//saved
			}
			else{
				//not saved
			}
		}
		else{
			$option = array(
				'recursive'=>'0',
				'conditions'=>array('Emailtext.is_deleted'=>'0');
			);
			$this->request->data = $this->Emailtext->find('first',$option);
		}
	}

}
