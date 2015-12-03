<div class="statusPart">
	<ul>
		<!--<li><?php echo $this->Html->link('Patient Details',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Social History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('About The Illness',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Past History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Upload Documents',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'current'));?>-->
		
		<li><a href="javascript:void(0)" class="js-preview done" sec="1">Patient Details</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="2">Social History</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="3">About The Illness</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="4">Past History</a></li>
		<li><a href="javascript:void(0)" class="js-preview current" sec="5">Upload Documents</a></li>
		<li><a href="javascript:void(0)">Review</a></li>
	</ul>
</div>

<?php 
	// datas
	pr($PatientDocuments);
	$docupid='';
	$bloodreports = array('test'=>array(''),'month'=>array(),'year'=>array(''),'flname'=>array(''),'flispresent'=>array(''));
	$imagingreports=array();
	$pathologyreports=array();
	$otherreports=array();
	$comment='';
	if(isset($PatientDocuments['PatientDocument']) && is_array($PatientDocuments['PatientDocument']) && count($PatientDocuments['PatientDocument'])>0){
		$PatientDocument = $PatientDocuments['PatientDocument'];
		$bloodreports = unserialize($PatientDocument['bloodreport']);
		$imagingreports = unserialize($PatientDocument['imagingreport']);
		$pathologyreports = unserialize($PatientDocument['pathologyreport']);
		$otherreports = unserialize($PatientDocument['otherreport']);
		$comment = unserialize($PatientDocument['comment']);
		$docupid = $PatientDocument['id'];
	}
	
	pr($bloodreports);
?>
<div class="questionPart">
<!-- main display code here -->

<div class="doccumentupload" id="doccumentupload">
	<h2>Upload Documents</h2>
	<?php 
		echo $this->Form->create('PatientDocument',array("id"=>"docupfrms"));
		echo $this->Form->hidden('id',array('value'=>$docupid,'id'=>'docupid'));
	?>	
		<div class="whatTest">
			<h4>What are the tests have been done?</h4>
			<p>Please provide the following details and upload the available reports.</p>
		</div>
		<div class="whatTest">
			<h3>Blood &amp; Laboratory Tests (Hemoglobin, CBC, BMP etc.)</h3>
			<?php 
				if(count($bloodreports)>0){
					for($i=0; $i<count($bloodreports);$i++){
					
						$test = $bloodreports['test'][$i];
						$mont = $bloodreports['month'][$i];
						$year = $bloodreports['year'][$i];
						$flname = $bloodreports['flname'][$i];
						$flispresent = $bloodreports['flispresent'][$i];
						if($i==0){
						?>
							<div class="gender">
								<label class="blue">Test</label>
								<input type="text" placeholder="Hint Text" name="data[BloodTest][test][]" value="<?=$test?>">
								
							</div>
							<div class="datesTwo ml20">
								<label class="blue">Date</label>
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
								<?php 
									echo $this->Form->input('BloodTest.month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields',
										'value'=>$mont
									));
									
									echo $this->Form->input('BloodTest.year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields',
										'value'=>$year
									));
								?>
							</div>
							<div class="report ml20">
								<label class="blue">Report</label>
								<?php 
									if($flname!=''){
									?>
										<span class="reportCard"><?=$flname?></span>
										<a href="javascript:void(0)" class="reportCardDel">X</a>
									<?php
									}
									else{
									?>
										<a href="javascript:void(0)" class="uploadReport">Upload report</a>
									<?php
									}
								?>
								<input class="flnamecontain" type="hidden" name="data[BloodTest][flname][]" value="<?=$flname?>"/>
								
								<label class="noreport ml14"><input type="checkbox" name="data[BloodTest][flispresent][]" value="1" <?=($flispresent==1)?"ckecked":''?> >Not available</label>
							</div>
							<div class="clear10"></div>
							<div class="blodtestingmore">
						<?php
						}
						else{
						?>
							<div class="gender">
								<input type="text" placeholder="Hint Text" name="data[BloodTest][test][]" value="<?=$test?>">
								
							</div>
							<div class="datesTwo ml20">
								<label class="blue">Date</label>
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
								<?php 
									echo $this->Form->input('BloodTest.month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields',
										'value'=>$mont
									));
									
									echo $this->Form->input('BloodTest.year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields',
										'value'=>$year
									));
								?>
							</div>
							<div class="report ml20">
								<label class="blue">Report</label>
								<?php 
									if($flname!=''){
									?>
										<span class="reportCard"><?=$flname?></span>
										<a href="javascript:void(0)" class="reportCardDel">X</a>
									<?php
									}
									else{
									?>
										<a href="javascript:void(0)" class="uploadReport">Upload report</a>
									<?php
									}
								?>
								<input class="flnamecontain" type="hidden" name="data[BloodTest][flname][]" value="<?=$flname?>"/>
								
								<label class="noreport ml14"><input type="checkbox" name="data[BloodTest][flispresent][]" value="1" <?=($flispresent==1)?"ckecked":''?> >Not available</label>
							</div>
						<?php
						}
					}
					echo "</div>";
				}
			?>
			
			
			
			<!--<div class="gender">
				<input type="text" placeholder="Hint Text">
			</div>
			<div class="datesTwo ml20">
				<select class="month"><option>Month</option></select>
				<select class="year"><option>Year</option></select>
			</div>
			<div class="report ml20">
				<label class="noreport"><input type="checkbox" name="RadioGroup1" value="checkbox" checked >Not available</label>
				<div class="w300 ml20"><input type="text" placeholder="What was the result?"></div>
			</div>-->
			<div class="clear10"></div>
			
			<a href="javascript:void(0)" class="greenText js-addmorebloodtest">+ Add More</a>
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
		
	<a href="javascript:void(0)" class="backBtn js-preview"  sec="4" id="docupbackbtn">Back</a>
    <input type="button" class="nextBtn js-nextview" value="Next" id="nextviewxx">
	<input type="submit" class="saveBtn js-docupssaved" value="Save" name="save" id="docupssaved">
	</form>
</div>

</div>