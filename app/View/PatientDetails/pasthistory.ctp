<div class="statusPart">
	<ul>
		<!--<li><?php echo $this->Html->link('Patient Details',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Social History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('About The Illness',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Past History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'current'));?>-->
	   
		<li><a href="javascript:void(0)" class="js-preview done" sec="1">Patient Details</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="2">Social History</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="3">About The Illness</a></li>
		<li><a href="javascript:void(0)" class="current" sec="4">Past History</a></li>
		<li><a href="javascript:void(0)">Upload Documents</a></li>
		<li><a href="javascript:void(0)">Review</a></li>
	</ul>
</div>

<?php 
	// datas 
	$psthisid='';
?>
<div class="questionPart">
<!-- main display code here -->

<div class="pasthistory" id="pasthistory">
	<h2>Past History</h2>
	<?php 
		echo $this->Form->create('PastHistory',array("id"=>"psthisfrms"));
		echo $this->Form->hidden('id',array('value'=>$psthisid,'id'=>'psthisid'));
	?>
		<div class="history">
			<div class="clear20"></div>
			<h3>Any past medical or cancer history?</h3>
			<div class="diagnosis">
				<label class="blue">Diagnosis</label>
				<input type="text" placeholder="Blood Cancer">
			</div>
			<div class="datesTwo ml20">
				<label class="blue">Date of Diagnosis</label>
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<a href="#" class="greenText ml20 mt37">+ Add More</a>
			<div class="clear50"></div>
			<h3>Any past surgical history?</h3>
			<div class="diagnosis">
				<label class="blue">Surgery</label>
				<input type="text">
			</div>
			<div class="datesTwo ml20">
				<label class="blue">Date of Surgery</label>
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<a href="#" class="greenText ml20 mt37">+ Add More</a>
			<div class="clear50"></div>
			<h3>Any other hospitalizations?</h3>
			<div class="diagnosis">
				<label class="blue">Reason</label>
				<input type="text">
			</div>
			<div class="datesTwo ml20">
				<label class="blue">Date of hospitalizations</label>
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<div class="diagnosis ml20">
				<label class="blue">Period of hospitalizations</label>
				<input type="text" placeholder="0" class="days">
			</div>
			<a href="#" class="greenText ml20 mt37 mobileNoML">+ Add More</a>
			<div class="clear50"></div>
			<h3>Any history of cancer in family?</h3>
			<div class="diagnosis">
				<label class="blue">Relation with patient </label>
				<input type="text">
			</div>
			<div class="diagnosis ml20">
				<label class="blue">Type of cancer </label>
				<input type="text">
			</div>
			<div class="diagnosis ml20">
				<label class="blue">At what age it was diagnosed?</label>
				<input type="text" placeholder="0" class="year">
			</div>
			<a href="#" class="greenText ml20 mt37 mobileNoML">+ Add More</a>
			<div class="clear30"></div>
			<div class="w700">
				<label class="blue">Any specific comment about your medical history</label>
				<textarea class="h225"></textarea>
			</div>
		</div>
		<div class="clear35"></div>
			
		<a href="javascript:void(0)" class="backBtn js-preview"  sec="3" id="psthisbackbtn">Back</a>
        <input type="button" class="nextBtn js-nextview" value="Next" id="nextviewupddoc">
		<input type="submit" class="saveBtn js-illsaved" value="Save" name="save" id="psthissaved">
	</form>		
</div>

</div>