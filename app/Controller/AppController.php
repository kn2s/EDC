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
		//get the admin configre email sections
		$this->loadModel('Service');
		$adminemails = $this->Service->find('first',array('fields'=>array('Service.sending_email','Service.receiving_email','Service.id')));
		$adminname="EDC support team";
		$adminsendemail="edc@support.com";
		$adminrecieveemail="edc@support.com";
		$bodymessage="";
		
		if(is_array($adminemails) && count($adminemails)>0){
			$adminsendemail = (isset($adminemails['Service']['sending_email']) && $adminemails['Service']['sending_email']!='')?$adminemails['Service']['sending_email']:$adminsendemail;
			$adminrecieveemail = isset($adminemails['Service']['receiving_email'])?$adminemails['Service']['receiving_email']:$adminrecieveemail;
		}
		$Email = new CakeEmail($this->mailTransportType);
		
		if(!is_array($from) || count($from)==0){
			$from=array($adminsendemail=>$adminname);
		}
		//
		if($to==''){
			//admin will reciev the email
			$to=$adminrecieveemail;
		}
		//if reviever email is valid then
		if(filter_var($to,FILTER_VALIDATE_EMAIL)){
			//get the boddy text and data from admin 
			if($mailtype!=14){
				$emaildata = $this->getemailbodytext($mailtype);
				$bodymessage=isset($emaildata['body_txt'])?$emaildata['body_txt']:'';
			}
			//mail type
			$subjects="We thanksfull to you being with us";
			$templatenameview="admintemp";
			switch($mailtype){
				case 1:
					//regiatration
					$subjects="You are registered successfully";
					$templatenameview="registration";
					$data['signinlink']=FULL_BASE_URL.$this->base."/Patients/account";
					//$bodymessage="";
					break;
				case 2:
					//patient appoinment confirm
					$subjects="Your appointment schedule confirm for consultant";
					$templatenameview="appointment";
					break;
				case 3:
					//opinion give
					$subjects="Your doctor give the opinion about your case";
					$templatenameview="caseopinion";
					break;
				case 4:
					//doctor allow to modify
					$subjects="Your doctor allow you to edit your questionnair";
					$templatenameview="doctalloweditquestionnair";
					break;
				case 5:
					//patient give reply to the doctor message
					//$subjects="Your patient give reply to you";
					$subjects="You have received a communication from a patient";
					$templatenameview="patientreply";
					break;
				case 6:
					//patient re update the questionnair
					$subjects="Your patient update questionnair details";
					$templatenameview="patientquestionnairupdate";
					break;
				case 7:
					//paypal account not set so noify the admin about that
					$subjects="Paypal marchant account dose not set.";
					$templatenameview="paypalnotset";
				case 8:
					$subjects="Someone try to contact with you";
					$templatenameview="contactus";
					break;
				case 9: //password recovery
					$subjects="EDC password recovery";
					$templatenameview="forgotpassword";
					break;
				case 10: //new case assing
					$subjects="You have been assigned a case , with due date";
					$templatenameview="caseassign";
					break;
				case 11: //due alert
					$subjects="You are due to submit an opinion within 2 days";
					$templatenameview="opiniondue";
					break;
				case 12: //After opinion submission
					$subjects="Thank you for submitting your opinion.";
					$templatenameview="thanks";
					break;
				case 13: //Past Due opinion
					$subjects="Doctor missed to gave opinion";
					$templatenameview="opiniondueadmin";
					break;
				case 14://bulk mail from admin section
					$subjects=$data['email_sub'];
					$templatenameview="bulkmail";
					$bodymessage=$data['email_body'];
				default:
					break;
			}
			//now set the body message
			
			$data['bodymessage']=$bodymessage;
			
			$Email->from($from);
			$Email->to($to);
			//hear need to keep the admin as bcc
			$Email->bcc($adminrecieveemail);
			$Email->subject($subjects);
			$Email->template($templatenameview,'emain');
			$Email->emailFormat('html');
			$Email->viewVars($data);
			$Email->send();
		}
	}
	
	public function getemailbodytext($emailtype=0){
		$this->loadmodel('EmailText');
		$retdata=array('body_txt'=>'');
		$emailtexts = $this->EmailText->find('first');
		if(is_array($emailtexts) && count($emailtexts)>0){
			$body_txt='';
			switch($emailtype){
				case 1:
					$body_txt=isset($emailtexts['EmailText']['registration'])?$emailtexts['EmailText']['registration']:'';
					break;
				case 2:
					$body_txt=isset($emailtexts['EmailText']['appointment_confirm'])?$emailtexts['EmailText']['appointment_confirm']:'';
					break;
				case 3:
					$body_txt=isset($emailtexts['EmailText']['opinion_submited'])?$emailtexts['EmailText']['opinion_submited']:'';
					break;
				case 4:
					$body_txt=isset($emailtexts['EmailText']['doc_allow_modify'])?$emailtexts['EmailText']['doc_allow_modify']:'';
					break;
				case 5:
					$body_txt=isset($emailtexts['EmailText']['communication_recieve'])?$emailtexts['EmailText']['communication_recieve']:'';
					break;
				case 6:
					$body_txt=isset($emailtexts['EmailText']['quesionair_modify'])?$emailtexts['EmailText']['quesionair_modify']:'';
					break;
				case 8:
					$body_txt=isset($emailtexts['EmailText']['contact_us'])?$emailtexts['EmailText']['contact_us']:'';
					break;
				case 9:
					$body_txt=isset($emailtexts['EmailText']['password_recovery'])?$emailtexts['EmailText']['password_recovery']:'';
					break;
				case 10:
					$body_txt=isset($emailtexts['EmailText']['case_assign'])?$emailtexts['EmailText']['case_assign']:'';
					break;
				case 11:
					$body_txt=isset($emailtexts['EmailText']['opinion_due_alert'])?$emailtexts['EmailText']['opinion_due_alert']:'';
					break;
				case 12:
					$body_txt=isset($emailtexts['EmailText']['opinion_thanks'])?$emailtexts['EmailText']['opinion_thanks']:'';
					break;
				case 13:
					$body_txt=isset($emailtexts['EmailText']['opinion_missed'])?$emailtexts['EmailText']['opinion_missed']:'';
					break;
				default:
					break;
				
			}
			$retdata['body_txt']=$body_txt;
		}
		return $retdata;
	}
	
/**
 * siteyeargenerator method
 * @return array $years
 */
	public function siteyeargenerator(){
		$years = array();
		$min_year = date("Y",strtotime("-2 year"));
		$max_year = date("Y");
		$years['0']="year";
		for($min_year; $min_year<=$max_year;$min_year++){
			$years[$min_year]=$min_year;
		}
		return $years;
	}
	
/**
 * daymonthyearvalidation method
 */
	public function daymonthyearvalidation(){
		
	}
	
	
}
