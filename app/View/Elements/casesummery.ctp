<?php 
	//pr($casedetails);
	$names="";
	$images="man.png";
	
	$status='AWAITING INPUT';
	$duedate = isset($casedetails['DoctorCase']['opinion_due_date'])?$casedetails['DoctorCase']['opinion_due_date']:date("Y-m-d",strtotime("+21 day"));
	$diagonisis = isset($casedetails['DoctorCase']['diagonisis'])?$casedetails['DoctorCase']['diagonisis']:'';
	$idss = isset($casedetails['DoctorCase']['id'])?$casedetails['DoctorCase']['id']:0;
	$status = isset($casedetails['DoctorCase']['satatus'])?$casedetails['DoctorCase']['satatus']:'0';
	
	switch($status){
		case 1:
			$status = "Pending"; //Opened, sitting idle
			break;
		case 2:
			$status = "AWAITING INPUT"; //When Doctor has sent message in communication and waiting for the reply from the Patient
			break;
		case 3:
			$status = "INPUT RECEIVED"; //When received any input
			break;
		case 4:
			$status = "OPINION SENT"; //when sent an opinion
			break;
		case 5:
			$status = "DELETED"; //where everything stays for 3 months [After deleted from admin]
			break;
		case 6:
			$status = "ARCHIVED"; //only opinion stays for 1 year [after 1 year automatically it will go to archive folder ]
			break;
		default:
			$status = "Unread";
			break;
	}
	$ispatientdetailsshown = (isset($ispatient) && $ispatient==1)?1:0;
	
	if($ispatientdetailsshown){
		if(isset($casedetails['Patient']['PatientDetail']['id'])){
			$names = $casedetails['Patient']['PatientDetail']['name'];
			if($casedetails['Patient']['PatientDetail']['gender']=="femail"){
				$images="woman.png";
			}
		}
	}
	else{
		if(isset($casedetails['Doctor']['DoctorDetail']['id'])){
			$names = "Dr. ".$casedetails['Doctor']['name'];
			
			if($casedetails['Doctor']['DoctorDetail']['image']!=''){
				$images = FULL_BASE_URL.$this->base."/doctorimage/".$casedetails['Doctor']['DoctorDetail']['image'];
			}
			else{
				$images = FULL_BASE_URL.$this->base."/images/".$images;
			}
		}
		else{
			$images = FULL_BASE_URL.$this->base."/images/".$images;
		}
	}
?>

<div class="w1">
<?php 
	echo $this->Html->link(
		$this->Html->image('cross2.png', array('alt'=>'X')),
		array('controller'=>'Doctors','action'=>'dashboard','full_base'=>true),
		array('escape'=>false,'class'=>'crossButton')
	);
?>
</div>
                
<div class="w2">
	<h3><?php 
		if($ispatientdetailsshown){
			echo $this->Html->image($images, array('alt'=>'X'));
		}
		else{
			?>
			<img src="<?=$images?>" alt="doct image">
			<?php
		} 
		?><?=$names?></h3>
</div>
<div class="w3">
	<p>Status</p>
	<span class="awatingGreen"><?=$status?></span>
</div>
<div class="w4">
	<p>Case #</p>
	<h3><?=$idss?></h3>
</div>
<div class="w5">
	<p>Due Date</p>
	<h3><?=date("d M Y",strtotime($duedate))?></h3>
</div>
<div class="w5">
	<p>Diagonisis</p>
	<h3><?=$diagonisis?></h3>
</div>