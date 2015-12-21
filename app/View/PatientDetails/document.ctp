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
	//pr($PatientDocuments);
	$docupid='';
	$bloodreports = array('test'=>array(''),'month'=>array(),'year'=>array(''),'flname'=>array(''),'flispresent'=>array(''));
	
	$imagingreports=array('test'=>array(''),'month'=>array(),'year'=>array(''),'flname'=>array(''),'flispresent'=>array(''));
	$pathologyreports=array('test'=>array(''),'month'=>array(),'year'=>array(''),'flname'=>array(''),'flispresent'=>array(''));
	$otherreports=array('test'=>array(''),'month'=>array(),'year'=>array(''),'flname'=>array(''),'flispresent'=>array(''));
	$comment='';
	if(isset($PatientDocuments['PatientDocument']) && is_array($PatientDocuments['PatientDocument']) && count($PatientDocuments['PatientDocument'])>0){
		$PatientDocument = $PatientDocuments['PatientDocument'];
		$bloodreports = unserialize($PatientDocument['bloodreport']);
		$imagingreports = unserialize($PatientDocument['imagingreport']);
		$pathologyreports = unserialize($PatientDocument['pathologyreport']);
		$otherreports = unserialize($PatientDocument['otherreport']);
		$comment = $PatientDocument['comment'];
		$docupid = $PatientDocument['id'];
	}
	
	//pr($bloodreports);
?>
<div class="questionPart">
<!-- main display code here -->
<div class="imageuploadingfrm" style="display:none;">
	<form id="imaguploadfrm" method="post" enctype="multipart/form-data">
		<input type="file" name="docfile" id="docfile" />
		<input type="submit" />
	</form>
</div>

<div class="doccumentupload" id="doccumentupload">
	<h2>Upload Documents</h2>
	<?php 
		echo $this->Form->create('PatientDocument',array("id"=>"docupfrms"));
		echo $this->Form->hidden('id',array('value'=>$docupid,'id'=>'docupid'));
		echo $this->Form->hidden('completed_per',array("id"=>"completed_per","value"=>'0'));
	?>	
		
		<div class="whatTest">
			<h4>What are the tests have been done?</h4>
			<p>Please provide the following details and upload the available reports.</p>
		</div>
		<div class="whatTest">
			<h3>Blood &amp; Laboratory Tests (Hemoglobin, CBC, BMP etc.)</h3>
			<?php 
				if(count($bloodreports)>0){
					$tests = isset($bloodreports['test'])?$bloodreports['test']:array();
					$monts = isset($bloodreports['month'])?$bloodreports['month']:array();
					$yearss = isset($bloodreports['year'])?$bloodreports['year']:array();
					$flnames = isset($bloodreports['flname'])?$bloodreports['flname']:array();
					$flispresents = isset($bloodreports['flispresent'])?$bloodreports['flispresent']:array();
					for($i=0; $i<count($tests);$i++){
					
						$test = isset($tests[$i])?$tests[$i]:'';
						$mont = isset($monts[$i])?$monts[$i]:'';
						$year = isset($yearss[$i])?$yearss[$i]:'';
						$flname = isset($flnames[$i])?$flnames[$i]:'';
						$flispresent = isset($flispresents[$i])?$flispresents[$i]:'';
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
										<a href="javascript:void(0)" class="reportCardDel js-removeDoct" value="<?=$flname?>">X</a>
									<?php
									}
									else{
									?>
										<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>
										<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" <?=($flispresent==1)?"ckecked":''?> >Not available</label>
									<?php
									}
								?>
								<input class="flnamecontain" type="hidden" name="data[BloodTest][flname][]" value="<?=$flname?>"/>
								<input type="hidden" class="chkvalue" name="data[BloodTest][flispresent][]" value="<?=$flispresent?>" />
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
								<?php 
									if($flname!=''){
									?>
										<span class="reportCard"><?=$flname?></span>
										<a href="javascript:void(0)" class="reportCardDel js-removeDoct" value="<?=$flname?>">X</a>
									<?php
									}
									else{
									?>
										<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>
										<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" <?=($flispresent==1)?"ckecked":''?> >Not available</label>
									<?php
									}
								?>
								<input class="flnamecontain" type="hidden" name="data[BloodTest][flname][]" value="<?=$flname?>"/>
								<input type="hidden" class="chkvalue" name="data[BloodTest][flispresent][]" value="<?=$flispresent?>" />
							</div>
						<?php
						}
					}
					echo "</div>";
				}
			?>
			
			<div class="clear10"></div>
			
			<a href="javascript:void(0)" class="greenText js-addmorebloodtest" >+ Add More</a>
			<div class="clear"></div>
		</div>
		
		<div class="whatTest">
			<h3>Imaging Tests (X-Ray, CT Scan, MRI etc.)</h3>
			<?php
					if(count($imagingreports)>0){
						$imgtests = isset($imagingreports['test'])?$imagingreports['test']:array();
						$imgmonths = isset($imagingreports['month'])?$imagingreports['month']:array();
						$imgyears = isset($imagingreports['year'])?$imagingreports['year']:array();
						$imgfilenames = isset($imagingreports['flname'])?$imagingreports['flname']:array();
						$imgfileispresents = isset($imagingreports['flispresent'])?$imagingreports['flispresent']:array();
						for($k=0;$k<count($imgtests);$k++){
							$imgtest = isset($imgtests[$k])?$imgtests[$k]:'';
							$imgmonth = isset($imgmonths[$k])?$imgmonths[$k]:'';
							$imgyear = isset($imgyears[$k])?$imgyears[$k]:'';
							$imgfilename = isset($imgfilenames[$k])?$imgfilenames[$k]:'';
							$imgfileispresent = isset($imgfileispresents[$k])?$imgfileispresents[$k]:'0';
							if($k==0){
							?>
							<div class="gender">
								<label class="blue">Test</label>
								<input type="text" placeholder="Hint Text" name="data[ImagingTest][test][]" value="<?=$imgtest?>" />
							</div>	
							<div class="datesTwo ml20">
								<label class="blue">Date</label>
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
								<?php 
									echo $this->Form->input('ImagingTest.month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields',
										'value'=>$imgmonth
									));
									
									echo $this->Form->input('ImagingTest.year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields',
										'value'=>$imgyear
									));
								?>
							</div>
							<div class="report ml20">
								<label class="blue">Report</label>
								<?php 
									if($imgfilename!=''){
									?>
										<span class="reportCard"><?=$imgfilename?></span>
										<a href="javascript:void(0)" class="reportCardDel js-removeDoct" value="<?=$imgfilename?>" >X</a>
									<?php
									}
									else{
									?>
									<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>
										<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" <?=($imgfileispresent==1)?"ckecked":''?> >Not available</label>	
									<?php
									}
								?>
								<input class="flnamecontain" type="hidden" name="data[ImagingTest][flname][]" value="<?=$imgfilename?>"/>
								<input type="hidden" class="chkvalue" name="data[ImagingTest][flispresent][]" value="<?=$imgfileispresent?>" />
							</div>
							<?php
							}
							else{
							?>
							<div class="gender">
								<input type="text" placeholder="Hint Text" name="data[ImagingTest][test][]" value="<?=$imgtest?>" />
							</div>
							<div class="datesTwo ml20">
								<?php 
									echo $this->Form->input('ImagingTest.month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields',
										'value'=>$imgmonth
									));
									
									echo $this->Form->input('ImagingTest.year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields',
										'value'=>$imgyear
									));
								?>
							</div>
							<div class="report ml20">
								<label class="blue">Report</label>
								<?php 
									if($imgfilename!=''){
									?>
										<span class="reportCard"><?=$imgfilename?></span>
										<a href="javascript:void(0)" class="reportCardDel js-removeDoct" value="<?=$imgfilename?>" >X</a>
									<?php
									}
									else{
									?>
									<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>
										<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" <?=($imgfileispresent==1)?"ckecked":''?> >Not available</label>	
									<?php
									}
								?>
								<input class="flnamecontain" type="hidden" name="data[ImagingTest][flname][]" value="<?=$imgfilename?>"/>
								<input type="hidden" class="chkvalue" name="data[ImagingTest][flispresent][]" value="<?=$imgfileispresent?>" />
							</div>
							<?php
							}
						}
						
					}
				?>
			<div class="clear"></div>
		</div>
		
		<div class="whatTest">
			<h3>Pathology Tests (Biopsy, FNA etc.)</h3>
			<?php 
				
				if(count($pathologyreports)>0){
					$pathtests = isset($pathologyreports['test'])?$pathologyreports['test']:array();
					$pathmonts = isset($pathologyreports['month'])?$pathologyreports['month']:array();
					$pathyears = isset($pathologyreports['year'])?$pathologyreports['year']:array();
					$pathflnames = isset($pathologyreports['flname'])?$pathologyreports['flname']:array();
					$pathflispresents = isset($pathologyreports['flispresent'])?$pathologyreports['flispresent']:array();
					for($i=0; $i<count($pathtests);$i++){
						$pathtest = isset($pathtests[$i])?$pathtests[$i]:'';
						$pathmont = isset($pathmonts[$i])?$pathmonts[$i]:'';
						$pathyear = isset($pathyears[$i])?$pathyears[$i]:'';
						$pathflname = isset($pathflnames[$i])?$pathflnames[$i]:'';
						$pathflispresent = isset($pathflispresents[$i])?$pathflispresents[$i]:'0';
					?>
						<div class="gender">
							<label class="blue">Test</label>
							<input type="text" placeholder="Hint Text" name="data[Pathology][test][]" value="<?=$pathtest?>" />
						</div>	
						<div class="datesTwo ml20">
							<label class="blue">Date</label>
							<?php 
								echo $this->Form->input('Pathology.month][',array(
									'div'=>false,
									'label'=>false,
									'options'=>$months,
									'default'=>'0',
									'class'=>'month savaliedatefields',
									'value'=>$pathmont
								));
								
								echo $this->Form->input('Pathology.year][',array(
									'div'=>false,
									'label'=>false,
									'options'=>$years,
									'default'=>'0',
									'class'=>'year savaliedatefields',
									'value'=>$pathyear
								));
							?>
						</div>
						<div class="report ml20">
							<label class="blue">Report</label>
							<?php 
								if($pathflname!=''){
								?>
									<span class="reportCard"><?=$pathflname?></span>
									<a href="javascript:void(0)" class="reportCardDel js-removeDoct" value="<?=$pathflname?>" >X</a>
								<?php
								}
								else{
								?>
								<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>
								<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" <?=($pathflispresent==1)?"ckecked":''?> >Not available</label>								
								<?php
								}
							?>
							<input type="hidden" class="chkvalue" name="data[Pathology][flispresent][]" value="<?=$pathflispresent?>" />
							<input class="flnamecontain" type="hidden" name="data[Pathology][flname][]" value="<?=$pathflname?>"/>
						</div>
					<?php
					}
				}
			?>
			
			<div class="clear"></div>
		</div>
		
		<div class="whatTest">
			<h3>Others</h3>
			<?php 
				if(count($otherreports)>0){
					$ohtests = isset($otherreports['test'])?$otherreports['test']:array();
					$ohmonts = isset($otherreports['month'])?$otherreports['month']:array();
					$ohyears = isset($otherreports['year'])?$otherreports['year']:array();
					$ohflnames = isset($otherreports['flname'])?$otherreports['flname']:array();
					$ohflispresents = isset($otherreports['flispresent'])?$otherreports['flispresent']:array();
					for($i=0; $i<count($ohtests);$i++){
						$ohtest = isset($ohtests[$i])?$ohtests[$i]:'';
						$ohmont = isset($ohmonts[$i])?$ohmonts[$i]:'';
						$ohyear = isset($ohyears[$i])?$ohyears[$i]:'';
						$ohflname = isset($ohflnames[$i])?$ohflnames[$i]:'';
						$ohflispresent = isset($ohflispresents[$i])?$ohflispresents[$i]:'0';
					?>
						<div class="gender">
							<label class="blue">Test</label>
							<input type="text" placeholder="Hint Text" name="data[OtherTest][test][]" value="<?=$ohtest?>" />
						</div>	
						<div class="datesTwo ml20">
							<label class="blue">Date</label>
							<?php 
								echo $this->Form->input('OtherTest.month][',array(
									'div'=>false,
									'label'=>false,
									'options'=>$months,
									'default'=>'0',
									'class'=>'month savaliedatefields',
									'value'=>$ohmont
								));
								
								echo $this->Form->input('OtherTest.year][',array(
									'div'=>false,
									'label'=>false,
									'options'=>$years,
									'default'=>'0',
									'class'=>'year savaliedatefields',
									'value'=>$ohyear
								));
							?>
						</div>
						<div class="report ml20">
							<label class="blue">Report</label>
							<?php 
								if($ohflname!=''){
								?>
									<span class="reportCard"><?=$ohflname?></span>
									<a href="javascript:void(0)" class="reportCardDel js-removeDoct" value="<?=$ohflname?>" >X</a>
								<?php
								}
								else{
								?>
								<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>
								<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" <?=($ohflispresent==1)?"ckecked":''?> >Not available</label>									
								<?php
								}
							?>
							<input class="flnamecontain" type="hidden" name="data[OtherTest][flname][]" value="<?=$ohflname?>"/>
							<input type="hidden" class="chkvalue" name="data[OtherTest][flispresent][]" value="<?=$ohflispresent?>" />
						</div>
					<?php
					}
				}
			?>
			<div class="clear"></div>
		</div>
		<div class="whatTest">
			<div class="w700">
				<label class="blue">Any specific questions you want to ask the doctor</label>
				<textarea class="h225" name="data[PatientDocument][comment]"><?=$comment?></textarea>
			</div>
			<div class="clear10"></div>
		</div>
		<div class="clear35"></div>
		
	<a href="javascript:void(0)" class="backBtn js-preview"  sec="4" id="docupbackbtn">Back</a>
    <input type="button" class="nextBtn js-docupssaved" value="Next" id="nextviewxx">
	<input type="submit" class="saveBtn js-docupssaved" value="Save" name="save" id="docupssaved">
	</form>
</div>

</div>