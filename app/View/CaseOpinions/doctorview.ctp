
<?php 
	//pr($caseOpinion);
?>
<div class="leftWhiteBox">
<?php 
	if(isset($is_new) && $is_new==1){
	?>
	<div class="box">
		<p>Thank you for your opinion, Please confirm to able this opinion to patient</p>
	</div>
	<?php
	}
?>
	<div class="box">
		<div class="leftPart">
			<h4>Assessment &amp; Explanation</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['assessment']))?$caseOpinion['CaseOpinion']['assessment']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Prognosis</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['prognosis']))?$caseOpinion['CaseOpinion']['prognosis']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Best Treatment Strategy</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['treatmentstrategy']))?$caseOpinion['CaseOpinion']['treatmentstrategy']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Alternative Strategy</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['alternativestrategy']))?$caseOpinion['CaseOpinion']['alternativestrategy']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Attachment</h4>
		</div>
		<div class="rightPart">
			<p><span class="reportCard">
		<?php 
			if(isset($caseOpinion['CaseOpinion']['attachementname']) && $caseOpinion['CaseOpinion']['attachementname']!=''){
				$pathflname =$caseOpinion['CaseOpinion']['attachementname'];
				echo $this->Html->link(__($pathflname),array('controller'=>'CaseOpinions','action'=>'attachementdownload',$pathflname,'full_base'=>true),array('target'=>'_blank'));
			}
		?>
		</span></p>
		</div>
	</div>
	
	<div class="doctorsName">
		<h4>Yours truly,</h4>
		<h4><?php 
			$str = "Dr. ";
			if(isset($caseOpinion['DoctorCase']['Doctor']['name'])){
				$str .=$caseOpinion['DoctorCase']['Doctor']['name'];
			}
			if(isset($caseOpinion['DoctorCase']['Doctor']['DoctorDetail']['designation'])){
				$str .="&nbsp; ".$caseOpinion['DoctorCase']['Doctor']['DoctorDetail']['designation'];
				$str .=", ".$caseOpinion['DoctorCase']['Doctor']['DoctorDetail']['fellowship_from'];
			}
			echo $str;
		?></h4>
	</div>
	<?php 
		if(!$caseOpinion['CaseOpinion']['is_confirm'] && !$caseOpinion['CaseOpinion']['is_deleted']){
	?>
	<div class="box">
		<button opid="<?=$caseOpinion['CaseOpinion']['id']?>" for="confirm" class="blueButton js-opinionconcan" style="float:right; width:20%; margin-left:10px;"> Confirm </button>
		<button opid="<?=$caseOpinion['CaseOpinion']['id']?>" for="cancel" class="blueButton js-opinionconcan" style="float:right; width:20%;"> Cancel </button>
	</div>
	<?php 
		}
	?>
</div>
<div class="rightGrayBox">
	
	<div class="details">
		<p>Patient</p>
		<h4>Mr. <?=(isset($caseOpinion['DoctorCase']['Patient']['PatientDetail']['name']))?$caseOpinion['DoctorCase']['Patient']['PatientDetail']['name']:""?></h4>
		<p>Date</p>
		<h4><?=(isset($caseOpinion['DoctorCase']['opinion_due_date']))?date("d M Y",strtotime($caseOpinion['DoctorCase']['opinion_due_date'])):""?></h4>
	</div>
	<div class="refarence">
		<h4>References</h4>
		<ol>
			<li><span><?=(isset($caseOpinion['CaseOpinion']['refference']))?$caseOpinion['CaseOpinion']['refference']:""?></span></li>
		</ol>
	</div>
</div>
