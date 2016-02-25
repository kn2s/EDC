
<?php 
	//pr($caseOpinion);
?>
<div class="leftWhiteBox">
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
</div>
<div class="rightGrayBox">
	
	<div class="details">
		<p>patient</p>
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
