<?php 
	//pr($casedetails)
	$names="";
	$images="man.png";
	$idss="0";
	if(isset($casedetails['Patient']['PatientDetail']['id'])){
		$idss = $casedetails['DoctorCase']['id'];
		$names = $casedetails['Patient']['PatientDetail']['name'];
		if($casedetails['Patient']['PatientDetail']['gender']=="femail"){
			$images="woman.png";
		}
		$duedate = isset($casedetails['DoctorCase']['opinion_due_date'])?$casedetails['DoctorCase']['opinion_due_date']:date("Y-m-d");
		$status = isset($casedetails['DoctorCase']['satatus'])?$casedetails['DoctorCase']['satatus']:'0';
		$status = "AWAITING INPUT";
		$diagonisis = isset($casedetails['DoctorCase']['diagonisis'])?$casedetails['DoctorCase']['diagonisis']:'Blood Cancer';
		if($diagonisis==''){
			$diagonisis="Blood Cancer";
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
	<h3><?php echo $this->Html->image($images, array('alt'=>'X')); ?><?=$names?></h3>
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