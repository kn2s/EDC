<!--<div class="caseOpinions view">
<h2><?php echo __('Case Opinion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Case'); ?></dt>
		<dd>
			<?php echo $this->Html->link($caseOpinion['DoctorCase']['id'], array('controller' => 'doctor_cases', 'action' => 'view', $caseOpinion['DoctorCase']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assessment'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['assessment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prognosis'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['prognosis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Treatmentstrategy'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['treatmentstrategy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alternativestrategy'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['alternativestrategy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cteratedatetime'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['cteratedatetime']); ?>
			&nbsp;
		</dd>
	</dl>
</div>-->
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
	<div class="options">
		<a href="javascript:void(0)" class="printBtn js-opinionprint"></a>
		<a href="javascript:void(0)" class="downloadBtn"></a>
	</div>
	<div class="details">
		<p>Physician</p>
		<h4>Dr. <?=(isset($caseOpinion['DoctorCase']['Doctor']['name']))?$caseOpinion['DoctorCase']['Doctor']['name']:""?></h4>
		<p>patient</p>
		<h4>Mr. <?=(isset($caseOpinion['DoctorCase']['Patient']['PatientDetail']['name']))?$caseOpinion['DoctorCase']['Patient']['PatientDetail']['name']:""?></h4>
		<p>Date</p>
		<h4><?=(isset($caseOpinion['DoctorCase']['opinion_due_date']))?date("d M Y",strtotime($caseOpinion['DoctorCase']['opinion_due_date'])):""?></h4>
	</div>
	<div class="ask">
		<a href="javascript:void(0)" class="askAQuestion">Ask physician</a>
		<p>Feel free to write us, If you have any questions.</p>
	</div>
	<div class="refarence">
		<h4>References</h4>
		<ol>
			<li><span><?=(isset($caseOpinion['CaseOpinion']['attachementname']))?$caseOpinion['CaseOpinion']['attachementname']:""?></span></li>
			<!--<li><span>Baselga J, Cortés J, Kim SB, Im SA, Hegg R, Im YH, Roman L, Pedrini JL,Pienkowski T, Knott A, Clark E, Benyunes MC, Ross G, Swain SM; CLEOPATRA Study Group. Pertuzumab plus trastuzumab plus docetaxel for metastatic breast cancer. N Engl J Med. 2012 Jan 12;366(2):109-19.</span></li>-->
		</ol>
	</div>
</div>
