<?php 
	//pr($doctorCases);
	if(isset($doctorCases) && is_array($doctorCases) && count($doctorCases)>0){
		foreach($doctorCases as $doctorCase){
			$gender = isset($doctorCase['Patient']['PatientDetail']['gender'])?$doctorCase['Patient']['PatientDetail']['gender']:'';
			$name = isset($doctorCase['Patient']['PatientDetail']['name'])?$doctorCase['Patient']['PatientDetail']['name']:'';
			$caseid = isset($doctorCase['DoctorCase']['id'])?$doctorCase['DoctorCase']['id']:'0';
			$duedate = isset($doctorCase['DoctorCase']['opinion_due_date'])?$doctorCase['DoctorCase']['opinion_due_date']:date("Y-m-d");
			$status = isset($doctorCase['DoctorCase']['satatus'])?$doctorCase['DoctorCase']['satatus']:'0';
			$status = "AWAITING INPUT";
			$diagonisis = isset($doctorCase['DoctorCase']['diagonisis'])?$doctorCase['DoctorCase']['diagonisis']:'Blood Cancer';
			//$diagonisis="Blood Cancer";
			if($diagonisis==''){
				$diagonisis="Blood Cancer";
			}
			$gencalss = "man";
			if($gender=="femail"){
				$gencalss="woman";
			}
			?>
			<div class="patientBox">
				<a href="javascript:void(0)" class="js-doccasedetail" vals="<?=$caseid?>">
				<div class="whitePart">
					<h2 class="<?=$gencalss?>"><?=$name?></h2>
					<p class="status"><span class="awatingGreen"><?=$status?></span></p>
					<p class="blueText fleft"><?=$diagonisis?></p>
					<p class="blueText fright">Case #<?=$caseid?></p>
					<div class="clear"></div>
					<p class="dueDate">Due Date</p>
					<h3><?=date("d M Y",strtotime($duedate))?></h3>
				</div>
				</a>
			</div>
			<?php
		}
	}
?>

<!--
<div class="patientBox">
	<div class="whitePart">
		<h2 class="woman">Shrila Roy</h2>
		<p class="status"><span class="awatingGreen">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
	<div class="grayPart">
		<p class="message">Received Message</p>
	</div>
</div>

<div class="patientBox">
	<div class="whitePart">
		<h2 class="man">John Smith</h2>
		<p class="status"><span class="awatingOrange">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="man"><span class="tick">John Smith</span></h2>
		<p class="status"><span class="awatingOrange">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="man">John Smith</h2>
		<p class="status"><span class="awatingGreen">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="woman">Shrila Roy</h2>
		<p class="status"><span class="awatingGreen">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="man">John Smith</h2>
		<p class="status"><span class="awatingOrange">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="man">John Smith</h2>
		<p class="status"><span class="awatingGreen">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="woman">Shrila Roy</h2>
		<p class="status"><span class="awatingGreen">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="man">John Smith</h2>
		<p class="status"><span class="awatingOrange">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="man">John Smith</h2>
		<p class="status"><span class="awatingOrange">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
<div class="patientBox">
	<div class="whitePart">
		<h2 class="man">John Smith</h2>
		<p class="status"><span class="awatingOrange">AWAITING INPUT</span></p>
		<p class="blueText fleft">Blood Cancer</p>
		<p class="blueText fright">Case #123456</p>
		<div class="clear"></div>
		<p class="dueDate">DUe Date</p>
		<h3>02 DEC 2015</h3>
	</div>
</div>
-->