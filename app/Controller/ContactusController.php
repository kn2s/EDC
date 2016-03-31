<?php
App::uses('AppController', 'Controller');
/**
 * Contactus Controller
 *
 * @property Contactu $Contactu
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContactusController extends AppController {

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
		$this->layout="smallheader";
	}
	
	public function contact(){
		if($this->request->is('post')){
			//pr($this->request->data);
			$name = $this->request->data['name'];
			$email = $this->request->data['email'];
			$message = $this->request->data['message'];
			// send email
			$data = array(
				'name'=>$name,
				'email'=>$email,
				'message'=>$message
			);
			$this->sitemailsend($mailtype=8,$from=array(),$to="","User want to connect with you",$data);
		}
		die(json_encode(array('status'=>'1','message'=>'Thanks for contacting us.')));
	}
}
