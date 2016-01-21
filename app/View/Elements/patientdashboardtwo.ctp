<?php
	//pr($patient);
	$numberformpost = $patient['Patient']['detailsformsubmit'];
	$blktitle = "My Questionnaire";
	$crtdate = date("d M Y",strtotime($patient['PatientCase']['createdate']));
	$blktext = "The questionnaire is successfully submitted on ".$crtdate.".<br/> Doctor will get back to you, if any clarificaion required.";
	$status = isset($patient['PatientCase']['satatus'])?$patient['PatientCase']['satatus']:0;
	$hcls="";
	//$status=5;
	if($status==2){
		$hcls="Message";
		$blktitle="Message Recieved";
		$blktext="You have recieved a message from your doctor.<br/> Please <span>check the message </span> and reply as soon as possible";
	}
	//opinion sections
	if($status==5){
		$blktitle="Opinion Recieved";
		$hcls="OpinionPart";
		$blktext="You have recieved the <span>opinion</span>.<br/> If you have any question, feel free to ask the doctor.";
	}
	//details
	$availabledate = $patient['PatientCase']['available_date'];
	$opinionduedate = $patient['PatientCase']['opinion_due_date'];
	$doctorname = $patient['PatientCase']['Doctor']['name'];
	$doctorimage = $patient['PatientCase']['Doctor']['DoctorDetail']['image'];
	if($doctorimage!=''){
		$doctorimage = FULL_BASE_URL.$this->base.'/doctorimage/'.$doctorimage;
	}
	else{
		$doctorimage = FULL_BASE_URL.$this->base.'/image/docActive.jpg';
	}
?>

	<h2 class="<?=$hcls?>"><?=$blktitle?></h2>

	<p class="TextPart <?=$hcls?>"><?=$blktext?></p>
	
	<div class="SecondPart">
		<?php 
			if($status==5){
			?>
			<div class="oneThird">
            	<p>Opinion Received Date</p>
                <h4><?=($opinionduedate)?date("d M Y",strtotime($opinionduedate)):''?></h4>
            </div>
            <div class="oneThird">
            	<p>Aask The Doctor Period</p>
                <h4>Till <?=($opinionduedate)?date("d M Y",strtotime("+30 day",strtotime($opinionduedate))):''?></h4>
            </div>
            <div class="oneThird">
            	<p>Your Account Expires on</p>
                <h4><?=($opinionduedate)?date("d M Y",strtotime("+4 month",strtotime($opinionduedate))):''?></h4>
            </div>
			<?php
			}
			else{
			?>
			<div class="oneThird">
				<p>Opinion Due Date</p>
				<h4><?=($opinionduedate)?date("d M Y",strtotime($opinionduedate)):''?></h4>
			</div>
			<div class="doctor">
				<p>Doctor</p>
				<img src="<?=$doctorimage?>" />
				<h4>Dr. <?=$doctorname?></h4>               
			</div>
			<?php
			}
		?>
		
	</div>
	
	<?php
		
		if($status==5){
			echo $this->Html->link('Opinion',array('controller'=>'CaseOpinions','action'=>'view',$patient['PatientCase']['id'],'full_base'=>false),array('escape'=>false,'class'=>'OpinionLink'));
		}
		if($status==2 || $status==5){
			echo $this->Html->link('Message',array('controller'=>'Patients','action'=>'communication','full_base'=>false),array('escape'=>false,'class'=>'MessageLink'));
		}

		if($numberformpost>4){
			echo $this->Html->link('Questionary(Keep a copy for your records)',array('controller'=>'Patients','action'=>'questionary','full_base'=>false),array('escape'=>false,'class'=>'Questionnaire'));
		}
	?>
