<div class="statusPart">
	<ul>
		<!--<li><?php echo $this->Html->link('Patient Details',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Social History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('About The Illness',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'current'));?>-->
	   
		<li><a href="javascript:void(0)" class="js-preview done" sec="1">Patient Details</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="2">Social History</a></li>
		<li><a href="javascript:void(0)" class="current" sec="3">About The Illness</a></li>
		<li><a href="javascript:void(0)">Past History</a></li>
		<li><a href="javascript:void(0)">Upload Documents</a></li>
		<li><a href="javascript:void(0)">Review</a></li>
	</ul>
</div>

<?php 
//pr($aboutIllnesses);
// datas 
$aisid='';
$principle_diagonisises_id=0;

$startdiagomonth=0;
$startdiagoyear=0;
$startdiagoday=0;

$enddiagomonth=0;
$enddiagoyear=0;
$enddiagoday=0;

$diagodetails='';
$diagorecomandation='';
$istumarmarker=0;

$tumartype='';
$tumoryear=0;
$tumarmonth=0;
$tumarresult='';

$tumormarks=array(array('name'=>'','tumormonth'=>'0','tumoryear'=>'0','tumorresult'=>''));

if(isset($aboutIllnesses['AboutIllness']) && is_array($aboutIllnesses['AboutIllness']) && count($aboutIllnesses['AboutIllness'])>0){
	$aisid=$aboutIllnesses['AboutIllness']['id'];
	$principle_diagonisises_id=$aboutIllnesses['AboutIllness']['principle_diagonisises_id'];

	$startdiagomonth=$aboutIllnesses['AboutIllness']['startdiagomonth'];
	$startdiagoyear=$aboutIllnesses['AboutIllness']['startdiagoyear'];
	$startdiagoday=$aboutIllnesses['AboutIllness']['startdiagoday'];

	$enddiagomonth=$aboutIllnesses['AboutIllness']['enddiagomonth'];
	$enddiagoyear=$aboutIllnesses['AboutIllness']['enddiagoyear'];
	$enddiagoday=$aboutIllnesses['AboutIllness']['enddiagoday'];

	$diagodetails=$aboutIllnesses['AboutIllness']['diagodetails'];
	$diagorecomandation=$aboutIllnesses['AboutIllness']['diagorecomandation'];
	$istumarmarker=$aboutIllnesses['AboutIllness']['istumarmarker'];

	/*$tumartype=$aboutIllnesses['AboutIllness']['tumartype'];
	$tumoryear=$aboutIllnesses['AboutIllness']['tumoryear'];
	$tumarmonth=$aboutIllnesses['AboutIllness']['tumarmonth'];
	$tumarresult=$aboutIllnesses['AboutIllness']['tumarresult'];*/
}
//if tumer data set
if(isset($aboutIllnesses['TumarMarker']) && is_array($aboutIllnesses['TumarMarker']) && count($aboutIllnesses['TumarMarker'])>0){
	$tumormarks = $aboutIllnesses['TumarMarker'];
}
?>
<div class="questionPart">
<!-- main display code here -->

<div class="aboutillness" id="aboutillness">
	<h2>About The Illness</h2>
	<?php 
		echo $this->Form->create('AboutIllness',array("id"=>"aisfrms"));
		echo $this->Form->hidden('id',array('value'=>$aisid,'id'=>'aisid'));
	?>
		<div class="illness">
			<div class="diagnosis">
				<label class="blue">*Principal Diagnosis</label>
				<!--<select>
					<option>Select</option>
				</select>-->
				<?php 
					echo $this->Form->input('AboutIllness.principle_diagonisises_id',array(
						'div'=>false,
						'label'=>false,
						'options'=>$Specializations,
						'default'=>'0',
						'class'=>'savaliedatefields',
						'id'=>'principle_diagonisises_id',
						'value'=>$principle_diagonisises_id
					));
				?>
			</div>
			<div class="datesThree ml20">
				<label class="blue">*Date of Diagnosis</label>
				<!--<select class="month"><option>Month</option></select>
				<select class="date"><option>Day</option></select>
				<select class="year"><option>Year</option></select>-->
				
				<?php 
					echo $this->Form->input('AboutIllness.startdiagomonth',array(
						'div'=>false,
						'label'=>false,
						'options'=>$months,
						'default'=>'0',
						'class'=>'month savaliedatefields js-illnessdate',
						'id'=>'startdiagomonth',
						'value'=>$startdiagomonth
					));
					echo $this->Form->input('AboutIllness.startdiagoday',array(
						'div'=>false,
						'label'=>false,
						'options'=>$days,
						'default'=>'0',
						'class'=>'date savaliedatefields js-illnessdate',
						'id'=>'startdiagoday',
						'value'=>$startdiagoday
					));
					
					echo $this->Form->input('AboutIllness.startdiagoyear',array(
						'div'=>false,
						'label'=>false,
						'options'=>$years,
						'default'=>'0',
						'class'=>'year savaliedatefields js-illnessdate',
						'id'=>'startdiagoyear',
						'value'=>$startdiagoyear
					));
				
				?>
				
			</div>
			<div class="clear10"></div>
			<label class="blue">*Give a detailed history of how diagnosis was made</label>
			<div class="w700">
				
				<?php 
						echo $this->Form->input('diagodetails',array("type"=>"textarea","value"=>$diagodetails,'label'=>''));
				?>
			</div>
			<div class="clear10"></div>
			<label class="blue">What is your oncologist’s recommendation?</label>
			<div class="w700">
				<?php 
						echo $this->Form->input('diagorecomandation',array("type"=>"textarea","value"=>$diagorecomandation,'label'=>''));
				?>
			</div>
			<div class="clear10"></div>
			<div class="datesThree">
				<label class="blue">*Last Examination Date</label>
				<?php 
					echo $this->Form->input('enddiagomonth',array(
						'div'=>false,
						'label'=>false,
						'options'=>$months,
						'default'=>'0',
						'class'=>'month savaliedatefields js-illnessenddate',
						'id'=>'enddiagomonth',
						'value'=>$enddiagomonth
					));
					echo $this->Form->input('enddiagoday',array(
						'div'=>false,
						'label'=>false,
						'options'=>$days,
						'default'=>'0',
						'class'=>'date savaliedatefields js-illnessenddate',
						'id'=>'enddiagoday',
						'value'=>$enddiagoday
					));
					
					echo $this->Form->input('enddiagoyear',array(
						'div'=>false,
						'label'=>false,
						'options'=>$years,
						'default'=>'0',
						'class'=>'year savaliedatefields js-illnessenddate',
						'id'=>'enddiagoyear',
						'value'=>$enddiagoyear
					));
				
				?>
				
			</div>
			<div class="clear10"></div>
			<label class="blue">*Do you have results of any tumor markers? <a href="javascript:void(0)" title="">what is tumor marker?</a></label>
			<div class="w80">
				<label><input type="radio" name="data[AboutIllness][istumarmarker]" value="1" <?=($istumarmarker==1)?"checked":""?> > Yes</label>
			</div>
			<div class="w80">
				<label><input type="radio" name="data[AboutIllness][istumarmarker]" value="0" <?=($istumarmarker==0)?"checked":""?> > No</label>
			</div>
			<div class="clear10"></div>
			
			<?php 
				for($i=0;$i<count($tumormarks);$i++){
					$markresult = $tumormarks[$i];
					if($i==0){
					?>
						<div class="diagnosis">
							<label class="blue">*Type of tumor marker</label>
							<input type="text" placeholder="PSA, AFP, CEA, CA19-9, etc " name="data[TumarMarker][name][]" value="<?=$markresult['name']?>">
						</div>
						<div class="datesTwo ml20">
							<label class="blue">Date</label>
						<?php
							echo $this->Form->input('TumarMarker.tumormonth][',array(
								'div'=>false,
								'label'=>false,
								'options'=>$months,
								'default'=>'0',
								'class'=>'month savaliedatefields',
								'value'=>$markresult['tumormonth']
							));
							
							echo $this->Form->input('TumarMarker.tumoryear][',array(
								'div'=>false,
								'label'=>false,
								'options'=>$years,
								'default'=>'0',
								'class'=>'year savaliedatefields',
								'value'=>$markresult['tumoryear']
							));
						?>
							<!--<select class="month" name="data[TumarMarker][tumormonth][]" value="<?=$markresult['tumormonth']?>"><option>Month</option></select>
							<select class="year" name="data[TumarMarker][tumoryear][]" value="<?=$markresult['tumoryear']?>"><option>Year</option></select>
							-->
						</div>
						<div class="result ml20">
							<label class="blue">*Result</label>
							<input type="text" placeholder="" name="data[TumarMarker][tumorresult][]" value="<?=$markresult['tumorresult']?>">
						</div>
						<div class="clear10"></div>
						
						<div id="moretumorecontainer">
					<?php
					}
					else{
					?>
						<div class="diagnosis">
							<input type="text" placeholder="PSA, AFP, CEA, CA19-9, etc " name="data[TumarMarker][name][]" value="<?=$markresult['name']?>">
						</div>
						<div class="datesTwo ml20">
							<!--<select class="month" name="data[TumarMarker][tumormonth][]" value="<?=$markresult['tumormonth']?>"><option>Month</option></select>
							<select class="year" name="data[TumarMarker][tumoryear][]" value="<?=$markresult['tumoryear']?>"><option>Year</option></select>
							-->
							
							<?php
							echo $this->Form->input('TumarMarker.tumormonth][',array(
								'div'=>false,
								'label'=>false,
								'options'=>$months,
								'default'=>'0',
								'class'=>'month savaliedatefields',
								'value'=>$markresult['tumormonth']
							));
							
							echo $this->Form->input('TumarMarker.tumoryear][',array(
								'div'=>false,
								'label'=>false,
								'options'=>$years,
								'default'=>'0',
								'class'=>'year savaliedatefields',
								'value'=>$markresult['tumoryear']
							));
						?>
							
						</div>
						<div class="result ml20">
							<input type="text" placeholder="" name="data[TumarMarker][tumorresult][]" value="<?=$markresult['tumorresult']?>">
						</div>
						<div class="clear10"></div>
					<?php
					}
				}
				echo "</div>";
			?>
			
			<a href="javascript:void(0)" class="greenText js-addtumore">+ Add More</a>
			<div class="clear"></div>
		</div>
		<div class="clear35"></div>
		
		<a href="javascript:void(0)" class="backBtn js-preview"  sec="2" id="illbackbtn">Back</a>
        <input type="button" class="nextBtn js-illsaved" value="Next" id="nextviewpsthis">
		<input type="submit" class="saveBtn js-illsaved" value="Save" name="save" id="illsaved">
	</form>
</div>

</div>