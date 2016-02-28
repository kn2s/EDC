<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $mailTransportType="default";
	//public $mailTransportType="smtp";
	public $opinionduedatewithin="+10 day"; //days
	public $activeafteropinionreceive="+30 day";
	
	
	public function userislogin(){
		if($this->Session->check('loggedpatientid') && $this->Session->read('loggedpatientid')>0){
			return true;
		}
		return false;
	}
	
	public function doctuserislogin(){
		if($this->Session->check('loggeddoctid') && $this->Session->read('loggeddoctid')>0){
			return true;
		}
		return false;
	}
	
	public function userloginsessionchecked(){
		if(!$this->Session->check('loggedpatientid')){
			//return true;
			$this->usersessionremove();
			$this->redirect(array('controller'=>'patients','action'=>'index'));
		}
	}
	
	public function usersessionremove(){
		$this->Session->delete('loggedpatientid');
		$this->Session->delete('loggedpatientname');
		$this->Session->delete('quesformno');
		$this->Session->delete('lastquestionformno');
	}
	
	public function doctuserloginsessionchecked(){
		if(!$this->Session->check('loggeddoctid')){
			//return true;
			$this->doctusersessionremove();
			
			$this->redirect(array('controller'=>'patients','action'=>'account'));
		}
	}
	
	public function doctusersessionremove(){
		$this->Session->delete('loggeddoctid');
		$this->Session->delete('loggeddocttname');
	}
	
	//admin section
	public function adminloginchecked(){
		/*if(!$this->Session->check('loggeddoctid')){
			//return true;
			$this->doctusersessionremove();
			
			$this->redirect(array('controller'=>'patients','action'=>'account'));
		}*/
	}
	public function gotodashboard(){
		
	}
/**
 * setadminsession method
 * @param array $admin
 * @return void
 */	
	public function setadminsession($admin=array()){
		if(is_array($admin) && count($admin)>0){
			$loggedadminid = isset($admin['Admin']['id'])?$admin['Admin']['id']:'';
			$loggedadminemail = isset($admin['Admin']['email'])?$admin['Admin']['email']:'';
			if($loggedadminid!='' && $loggedadminemail!=''){
				$this->Session->write(array('loggedadminid'=>$loggedadminid,'loggedadminemail'=>$loggedadminemail));
			}
		}
	}
/**
 * validateadminsession method
 * @return void
 */
	public function validateadminsession(){
		if(!$this->Session->check('loggedadminid') || !$this->Session->read('loggedadminid')>0){
			//admin session is expired 
			$this->redirect(array('controller'=>'admins','action'=>'index'));
		}
	}
/**
 * isadminalreadylogged method
 * @return void
 */
	public function isadminalreadylogged(){
		if($this->Session->check('loggedadminid') && $this->Session->read('loggedadminid')>0){
			//admin session is not expired 
			$this->redirect(array('controller'=>'doctors','action'=>'index'));
		}
	}
/**
 * destroyadminsession method
 * @return void
 */
	public function destroyadminsession(){
		$this->Session->delete('loggedadminid');
		$this->Session->delete('loggedadminemail');
		$this->validateadminsession();
	}
	
	public function socialmedialinks(){
		if($this->request->is('requested')){
			$this->loadModel('Homepagecontent');
			$socialdatas = $this->Homepagecontent->find('first',array('recursive'=>'0'));
			return $socialdatas;
		}
	}
	
	//common secion
	public function strreplace($str=''){
		$replacechar = array(" ","%","(",")","#","$","@","!");
		$str = str_replace($replacechar,'_',$str);
		return $str;
	}
	//download the file
	public function downloadfile($filename='',$filepath=''){
		if($filepath!=''){
			$filepath= WWW_ROOT."/".$filepath;
			$filename=time()."_".$filename;
			if(file_exists($filepath)){
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Length: ". filesize("$filepath").";");
				header("Content-Disposition: attachment; filename=$filename");
				//header("Content-Type: application/octet-stream; "); 
				header("Content-Type: text/plain; "); 
				header("Content-Transfer-Encoding: binary");
				readfile ($filepath);
			}
		}
		else{
			//filepath value empty
		}
	}
	
	public function sitemailsend($mailtype=0,$from=array(),$to="",$message="EDC Email",$data=array()){
		
		$Email = new CakeEmail($this->mailTransportType);
		if(!is_array($from) || count($from)==0){
			$from=array('edc@support.com'=>'EDC support team');
		}
		if(!filter_var($to,FILTER_VALIDATE_EMAIL)){
			$to="edcadmin@support.com";
		}
		//for test
		//$to="mrintoryal@yahoo.in";
		
		//mail type
		$subjects="We thanksfull to you being with us";
		$templatenameview="admintemp";
		switch($mailtype){
			case 1:
				//regiatration
				$subjects="You are registered successfully";
				$templatenameview="registration";
			break;
			case 2:
				//patient appoinment confirm
				$subjects="Your appointment schedule confirm for consultant";
				$templatenameview="appointment";
				break;
			case 3:
				$subjects="Your doctor give the opinion about your case";
				$templatenameview="caseopinion";
				break;
			case 4:
				$subjects="Your doctor allow you to edit your questionnair";
				$templatenameview="doctalloweditquestionnair";
				break;
			default:
				break;
		}
		$Email->from($from);
		$Email->to($to);
		
		$Email->subject($subjects);
		$Email->template($templatenameview,'emain');
		$Email->emailFormat('html');
		$Email->viewVars($data);
		//$Email->delivery = 'smtp';
		$Email->send();
	}
}
