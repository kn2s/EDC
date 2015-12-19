<?php 
	//pr($doctorCase);
	$availabledate = date("y-m-d");
	$opinionduedate = date("y-m-d",strtotime("+15 day",strtotime($availabledate)));
	$fees = "80";
	$caseid='0';
	$ispaymentdone = 0;
	if(isset($doctorCase['DoctorCase']) && is_array($doctorCase['DoctorCase']) && count($doctorCase['DoctorCase'])>0){
		$caseid = isset($doctorCase['DoctorCase']['id'])?$doctorCase['DoctorCase']['id']:'0';
		$availabledate = isset($doctorCase['DoctorCase']['available_date'])?$doctorCase['DoctorCase']['available_date']:date("Y-m-d");
		$opinionduedate = isset($doctorCase['DoctorCase']['opinion_due_date'])?$doctorCase['DoctorCase']['opinion_due_date']:date("Y-m-d");
		$fees = isset($doctorCase['DoctorCase']['consultant_fee'])?$doctorCase['DoctorCase']['consultant_fee']:'80';
		$ispaymentdone = isset($doctorCase['DoctorCase']['ispaymentdone'])?$doctorCase['DoctorCase']['ispaymentdone']:'0';
	}
	
?>
<div class="container">
	<div class="row">
		<div class="availibilityDate">
			<p>Availibility of Physician</p>
			<h3><?=date("d M Y",strtotime($availabledate))?></h3>
		</div>
		<div class="opinionDate">
			<p>Opinion Due Date</p>
			<h3><?=date("d M Y",strtotime($opinionduedate))?></h3>
		</div>
		<div class="fees">
			<p>Consultation Fee</p>
			<h3>$ <?=number_format($fees,2)?></h3>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear50"></div>
	<?php 
		if($ispaymentdone==1){
			echo $this->Html->link('Done',array('controller'=>'patients','action'=>'dashboard','full_base'=>false),array('escape'=>false,'class'=>'cancelBtn'));
		}
		else{
			echo $this->Html->link('Payment',array('controller'=>'patientDetails','action'=>'payments','full_base'=>false),array('escape'=>false,'class'=>'paymentBtn'));
		}
		
		echo $this->Html->link('Cancel',array('controller'=>'patients','action'=>'dashboard','full_base'=>false),array('escape'=>false,'class'=>'cancelBtn'));
	?>
	<!--
	<a href="javascript:void(0)" class="paymentBtn">Payment</a>
	<a href="javascript:void(0)" class="cancelBtn">Cancel</a>
	-->
	<div class="clear50"></div>
</div>
