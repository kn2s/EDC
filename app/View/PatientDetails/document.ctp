<div class="statusPart">
	<ul>
		<li><?php echo $this->Html->link('Patient Details',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Social History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('About The Illness',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Past History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Upload Documents',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'current'));?>

	   
	   <!-- <li><a href="#" class="done"></a></li>
		<li><a href="#" class="done">About The Illness</a></li>
		<li><a href="#" class="done">Past History</a></li>
		<li><a href="#" class="done">Upload Documents</a></li>
		<li><a href="#" class="current">Review</a></li>-->
		
		<li><a href="javascript:void(0)">Review</a></li>
	</ul>
</div>

<?php 
	// datas 
	$docupid='';
?>
<div class="questionPart">
<!-- main display code here -->

<div class="doccumentupload" id="doccumentupload">
	<h2>Upload Documents</h2>
	<?php 
		echo $this->Form->create('PastHistory',array("id"=>"docupfrms"));
		echo $this->Form->hidden('id',array('value'=>$docupid,'id'=>'docupid'));
	?>	
		<div class="whatTest">
			<h4>What are the tests have been done?</h4>
			<p>Please provide the following details and upload the available reports.</p>
		</div>
		<div class="whatTest">
			<h3>Blood &amp; Laboratory Tests (Hemoglobin, CBC, BMP etc.)</h3>
			<div class="gender">
				<label class="blue">Test</label>
				<input type="text" placeholder="Hint Text">
			</div>
			<div class="datesTwo ml20">
				<label class="blue">Date</label>
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<div class="report ml20">
				<label class="blue">Report</label>
				<a href="#" class="uploadReport">Upload report</a>
				<label class="noreport ml14"><input type="checkbox" name="RadioGroup1" value="checkbox" >Not available</label>
			</div>
			<div class="clear10"></div>
			<div class="gender">
				<input type="text" placeholder="Hint Text">
			</div>
			<div class="datesTwo ml20">
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<div class="report ml20">
				<label class="noreport"><input type="checkbox" name="RadioGroup1" value="checkbox" checked >Not available</label>
				<div class="w300 ml20"><input type="text" placeholder="What was the result?"></div>
			</div>
			<div class="clear10"></div>
			<a href="#" class="greenText">+ Add More</a>
			<div class="clear"></div>
		</div>
		<div class="whatTest">
			<h3>Imaging Tests (X-Ray, CT Scan, MRI etc.)</h3>
			<div class="gender">
				<label class="blue">Test</label>
				<input type="text" placeholder="Hint Text">
			</div>
			<div class="datesTwo ml20">
				<label class="blue">Date</label>
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<div class="report ml20">
				<label class="blue">Report</label>
				<span class="reportCard">Lorem ipsum dolor...pdf</span>
				<a href="#" class="reportCardDel">X</a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="whatTest">
			<h3>Pathology Tests (Biopsy, FNA etc.)</h3>
			<div class="gender">
				<label class="blue">Test</label>
				<input type="text" placeholder="Hint Text">
			</div>
			<div class="datesTwo ml20">
				<label class="blue">Date</label>
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<div class="report ml20">
				<label class="blue">Report</label>
				<a href="#" class="uploadReport">Upload report</a>
				<label class="noreport ml14"><input type="checkbox" name="RadioGroup1" value="checkbox" >Not available</label>
			</div>
			<div class="clear"></div>
		</div>
		<div class="whatTest">
			<h3>Others</h3>
			<div class="gender">
				<label class="blue">Test</label>
				<input type="text" placeholder="Hint Text">
			</div>
			<div class="datesTwo ml20">
				<label class="blue">Date</label>
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<div class="report ml20">
				<label class="blue">Report</label>
				<a href="#" class="uploadReport">Upload report</a>
				<label class="noreport ml14"><input type="checkbox" name="RadioGroup1" value="checkbox" >Not available</label>
			</div>
			<div class="clear"></div>
		</div>
		<div class="whatTest">
			<div class="w700">
				<label class="blue">Any specific questions you want to ask the doctor</label>
				<textarea class="h225"></textarea>
			</div>
			<div class="clear10"></div>
		</div>
		<div class="clear35"></div>
		
	<a href="javascript:void(0)" class="backBtn js-prevdivview" id="docupbackbtn">Back</a>
    <input type="button" class="nextBtn js-nextview" value="Next" id="nextviewxx">
	<input type="submit" class="saveBtn js-docupssaved" value="Save" name="save" id="docupssaved">
	</form>
</div>

</div>