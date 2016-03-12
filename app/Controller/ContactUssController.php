<?php
App::uses('AppController', 'Controller');
/**
 * ContactUss Controller
 *
 * @property ContactUs $ContactUs
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContactUssController extends AppController {

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
			$name = $this->request->data['name'];
			$email = $this->request->data['email'];
			// send email
			$data = array(
				'name'=>$name,
				'email'=>$email
			);
			$this->sitemailsend($mailtype=8,$from=array(),$to="",$message="User try to connect to you",$data);
		}
		die(json_encode(array('status'=>'1','message'=>'Thanks for contacting us.')));
	}
}
