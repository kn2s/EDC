<?php
	$numberformpost = $patient['Patient']['detailsformsubmit'];
	$blktitle = "My Questionnaire";
	$crtdate = date("d M Y",strtotime($patient['PatientCase']['createdate']));
	$blktext = "The questionnaire is successfully submitted on ".$crtdate." Doctor will get back to you, if any clarificaion required";
	$status = isset($patient['PatientCase']['satatus'])?$patient['PatientCase']['satatus']:0;
	if($status==2){
		$blktitle="Message Recieved";
		$blktext="You have recieved a message from your doctor. Please <span style='color:blue;'>check the message </span> and reply as soon as possible";
	}
	//opinion sections
	if($status==5){
		$blktitle="Opinion Recieved";
		$blktext="You have recieved the <span style='color:pink;'>opinion</span>. \n If you have any question feel free to ask the doctor.";
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
<style>
	.doctcasedtl{
		float: left;
		margin: 20px auto;
		//background-color: green;
		//width: 300px;
		text-align: left;
		padding-left: 10px;
	}
</style>
<h2><?=$blktitle?></h2>
<div class="completedStatus" style="margin: 31px auto 0;">
	<p style="margin:15px auto;"><?=$blktext?></p>
	
	<div class="">
		<div class="clear"></div>
		<div class="row">
			<div class="doctcasedtl">
				<p style="padding-bottum:30px;">Opinion Due Date</p>
				<span><?=($opinionduedate)?date("d M Y",strtotime($opinionduedate)):''?></span>
			</div>
			<div class="doctcasedtl" style="padding-left:30px;">
				<p>Doctor</p>
				<img src="<?=$doctorimage?>" width="50" height="50" style="border-radius: 50%; float: left;" />
				<span style="float: left; margin: 20px 10px;">Dr.<?=$doctorname?></span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
</div>
<div style="margin-top:30px;margin-left:20px;">
	<a href="javascript:void(0)">Opinion</a>
	
	<?php echo $this->Html->link('Message',array('controller'=>'Patients','action'=>'communication','full_base'=>false),array('escape'=>false));?>
	
	<?php 
		if($numberformpost>4){
			echo $this->Html->link('Questionary',array('controller'=>'Patients','action'=>'questionary','full_base'=>false),array('escape'=>false));
		}
		else{
	?>
		<a href="javascript:void(0)">Questionary</a>
	<?php
		}
	?>
</div>
