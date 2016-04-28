<div class="statusPart">
	<ul>
		<!--<li><?php echo $this->Html->link('Patient Details',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Social History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('About The Illness',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Past History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'current'));?>-->
	   
	   <?php
			$clsss = "js-preview done";
			$updocts='';
			$review='';
			
			switch($lastquestionformno){
				case 0:
					break;
				case 1:
					break;
				case 2:
					break;
				case 3:
					break;
				case 4:
					$updocts=$clsss;
					break;
				case 5:
					$updocts=$review=$clsss;
					break;
				default:
					$updocts=$review=$clsss;
					break;
			}
		?>
	   
		<li><a href="javascript:void(0)" class="js-preview done" sec="1">Patient Details</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="2">Social History</a></li>
		<li><a href="javascript:void(0)" class="js-preview done" sec="3">About The Illness</a></li>
		<li><a href="javascript:void(0)" class="current" sec="4">Past History</a></li>
		<li><a href="javascript:void(0)" class="<?=$updocts?>" sec="5">Upload Documents</a></li>
		<li><a href="javascript:void(0)" class="<?=$review?>" sec="6">Review</a></li>
		
		<!--<li><a href="javascript:void(0)">Upload Documents</a></li>
		<li><a href="javascript:void(0)">Review</a></li>-->
	</ul>
</div>

<?php 
	// datas 
	//pr($PatientPastHistories);
	$psthisid='';
	$cancer_details = array('diagnosis_name'=>array(''),'diagnosis_day'=>array(''),'diagnosis_month'=>array(''),'diagnosis_year'=>array(''));
	$surgical_details = array('surgery_name'=>array(''),'surgery_day'=>array(''),'surgery_month'=>array(''),'surgery_year'=>array(''));
	$hospitalization_details = array('hospitaliz_resone'=>array(''),'hospitaliz_day'=>array(''),'hospitaliz_month'=>array(''),'hospitaliz_year'=>array(''),'hospitaliz_days'=>array(''));
	$family_cancer_details = array('relation_with'=>array(''),'cancer_type'=>array(''),'age_of_diagonisis'=>array(''));
	$comments=''; 
	if(isset($PatientPastHistories['PatientPastHistory']) && is_array($PatientPastHistories['PatientPastHistory']) && count($PatientPastHistories['PatientPastHistory'])>0){
		if($PatientPastHistories['PatientPastHistory']['cancer_history']!=''){
			$cancer_details = unserialize($PatientPastHistories['PatientPastHistory']['cancer_history']);
			if(!is_array($cancer_details)){
				$cancer_details = array('diagnosis_name'=>array(''),'diagnosis_month'=>array(''),'diagnosis_year'=>array(''));
			}
		}
		if($PatientPastHistories['PatientPastHistory']['surgical_history']!=''){
			$surgical_details = unserialize($PatientPastHistories['PatientPastHistory']['surgical_history']);
			if(!is_array($surgical_details)){
				$surgical_details = array('surgery_name'=>array(''),'surgery_month'=>array(''),'surgery_year'=>array(''));
			}
		}
		if($PatientPastHistories['PatientPastHistory']['hospitalization']!=''){
			$hospitalization_details = unserialize($PatientPastHistories['PatientPastHistory']['hospitalization']);
			if(!is_array($hospitalization_details)){
				$hospitalization_details = array('hospitaliz_resone'=>array(''),'hospitaliz_month'=>array(''),'hospitaliz_year'=>array(''),'hospitaliz_days'=>array(''));
			}
		}
		if($PatientPastHistories['PatientPastHistory']['family_cancer_history']!=''){
			$family_cancer_details = unserialize($PatientPastHistories['PatientPastHistory']['family_cancer_history']);
			if(!is_array($family_cancer_details)){
				$family_cancer_details = array('relation_with'=>array(''),'cancer_type'=>array(''),'age_of_diagonisis'=>array(''));
			}
		}
		
		$comments = $PatientPastHistories['PatientPastHistory']['comments'];
	}
	
	/*pr($cancer_details);
	pr($surgical_details);
	pr($hospitalization_details);
	pr($family_cancer_details);*/
?>
<div class="questionPart">
<!-- main display code here -->

<div class="pasthistory" id="pasthistory">
	<h2>Past History</h2>
	<?php 
		echo $this->Form->create('PatientPastHistory',array("id"=>"psthisfrms"));
		echo $this->Form->hidden('id',array('value'=>$psthisid,'id'=>'psthisid'));
		echo $this->Form->hidden('completed_per',array("id"=>"completed_per","value"=>'0'));
	?>
		<div class="history">
			<div class="clear20"></div>
			<h3>Any past medical or cancer history?</h3>
			<?php 
				if(count($cancer_details)>0){
					$diagnosis_names = $cancer_details['diagnosis_name'];
					$diagnosis_months = $cancer_details['diagnosis_month'];
					$diagnosis_days = $cancer_details['diagnosis_month'];
					$diagnosis_years = $cancer_details['diagnosis_year'];
					
					for($i=0;$i<count($diagnosis_names);$i++){
						$diagnosis_name = $diagnosis_names[$i];
						$diagnosis_day = isset($diagnosis_days[$i])?$diagnosis_days[$i]:'';
						$diagnosis_month = isset($diagnosis_months[$i])?$diagnosis_months[$i]:'';
						$diagnosis_year = isset($diagnosis_years[$i])?$diagnosis_years[$i]:'';
						if($i==0){
						?>
							<div class="diagnosis">
								<label class="blue">Diagnosis</label>
								<input type="text" placeholder="Blood Cancer" name="data[CancerDetails][diagnosis_name][]" value="<?=$diagnosis_name?>">
							</div>
							<div class="datesThree ml20">
								<label class="blue">Date of Diagnosis</label>
								<div class="dateparent">
								<?php
									
									echo $this->Form->input('CancerDetails.diagnosis_day][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$days,
										'default'=>'0',
										'class'=>'date savaliedatefields  datevalidate',
										'value'=>$diagnosis_day
									));
									
									echo $this->Form->input('CancerDetails.diagnosis_month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields  datevalidate',
										'value'=>$diagnosis_month
									));
									
									echo $this->Form->input('CancerDetails.diagnosis_year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields  datevalidate',
										'value'=>$diagnosis_year
									));
								?>
								</div>
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
							</div>
							
							<div id="cancermore">
						<?php
						}
						else{
							?>
								<div class="clear10"></div>
								<div class="diagnosis">
									<input type="text" placeholder="Blood Cancer" name="data[CancerDetails][diagnosis_name][]" value="<?=$diagnosis_name?>">
								</div>
								<div class="datesThree ml20">
									<!--<select class="month"><option>Month</option></select>
									<select class="year"><option>Year</option></select>-->
									<div class="dateparent">
									<?php 
										
										echo $this->Form->input('CancerDetails.diagnosis_day][',array(
											'div'=>false,
											'label'=>false,
											'options'=>$days,
											'default'=>'0',
											'class'=>'date savaliedatefields  datevalidate',
											'value'=>$diagnosis_day
										));
										echo $this->Form->input('CancerDetails.diagnosis_month][',array(
											'div'=>false,
											'label'=>false,
											'options'=>$months,
											'default'=>'0',
											'class'=>'month savaliedatefields  datevalidate',
											'value'=>$diagnosis_month
										));
										
										echo $this->Form->input('CancerDetails.diagnosis_year][',array(
											'div'=>false,
											'label'=>false,
											'options'=>$years,
											'default'=>'0',
											'class'=>'year savaliedatefields  datevalidate',
											'value'=>$diagnosis_year
										));
									?>
									</div>
								</div>
							<?php
						}
					}
					echo "</div>";
				}
			?>
			<a href="javascript:void(0)" class="greenText ml20 mt37 js-morepastdetails" id="cancer">+ Add More</a>
			<div class="clear50"></div>
			
			
			
			<h3>Any past surgical history?</h3>
			
			<?php 
					
				if(count($surgical_details)>0){
					$surgery_names =$surgical_details['surgery_name'];
					$surgery_months =$surgical_details['surgery_month'];
					$surgery_days = isset($surgical_details['surgery_day'])?$surgical_details['surgery_day']:array();
					$surgery_years =$surgical_details['surgery_year'];
					
					for($j=0;$j<count($surgery_names);$j++){
						$surgery_name = $surgery_names[$j];
						$surgery_day = isset($surgery_days[$j])?$surgery_days[$j]:'';
						$surgery_month = isset($surgery_months[$j])?$surgery_months[$j]:'';
						$surgery_year =isset($surgery_years[$j])?$surgery_years[$j]:'';
						
						
						if($j==0){
						?>
							<div class="diagnosis">
								<label class="blue">Surgery</label>
								<input type="text" name="data[SurgeryDetail][surgery_name][]" value="<?=$surgery_name?>">
							</div>
							<div class="datesThree ml20">
								<label class="blue">Date of Surgery</label>
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
								<div class="dateparent">
								<?php
									
									echo $this->Form->input('SurgeryDetail.surgery_day][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$days,
										'default'=>'0',
										'class'=>'date savaliedatefields  datevalidate',
										'value'=>$surgery_day
									));
									
									echo $this->Form->input('SurgeryDetail.surgery_month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields  datevalidate',
										'value'=>$surgery_month
									));
									
									echo $this->Form->input('SurgeryDetail.surgery_year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields  datevalidate',
										'value'=>$surgery_year
									));
								?>
								</div>
							</div>
							<div id="surgerymorediv">
						<?php
						}
						else{
						?>
							<div class="clear10"></div>
							<div class="diagnosis">
								<input type="text" name="data[SurgeryDetail][surgery_name][]" value="<?=$surgery_name?>">
							</div>
							<div class="datesThree ml20">
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
								<div class="dateparent">
								<?php
									
									echo $this->Form->input('SurgeryDetail.surgery_day][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$days,
										'default'=>'0',
										'class'=>'date savaliedatefields  datevalidate',
										'value'=>$surgery_day
									));
									
									echo $this->Form->input('SurgeryDetail.surgery_month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields  datevalidate',
										'value'=>$surgery_month
									));
									
									echo $this->Form->input('SurgeryDetail.surgery_year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields  datevalidate',
										'value'=>$surgery_year
									));
								?>
								</div>
							</div>
						<?php
						}
					}
					echo "</div>";
				}
			?>
			
			<a href="javascript:void(0)" class="greenText ml20 mt37 js-morepastdetails" id="surgeries">+ Add More</a>
			<div class="clear50"></div>
			
			
			<h3>Any relevant hospitalizations?</h3>
			<?php
			
				if(count($hospitalization_details)>0){
					$hospitaliz_resones = $hospitalization_details['hospitaliz_resone'];
					$hospitaliz_days = isset($hospitalization_details['hospitaliz_day'])?$hospitalization_details['hospitaliz_day']:array();
					$hospitaliz_months = $hospitalization_details['hospitaliz_month'];
					$hospitaliz_years = $hospitalization_details['hospitaliz_year'];
					$hospitaliz_dayss = $hospitalization_details['hospitaliz_days'];
					
					for($k=0;$k<count($hospitaliz_resones);$k++){
						$hospitaliz_resone = $hospitaliz_resones[$k];
						$hospitaliz_day = isset($hospitaliz_days[$k])?$hospitaliz_days[$k]:'';
						$hospitaliz_month = isset($hospitaliz_months[$k])?$hospitaliz_months[$k]:'';
						$hospitaliz_year = isset($hospitaliz_years[$k])?$hospitaliz_years[$k]:'';
						$hospitaliz_days = isset($hospitaliz_dayss[$k])?$hospitaliz_dayss[$k]:'';
						
						if($k==0){
						?>
							<div class="diagnosis">
								<label class="blue">Reason</label>
								<input type="text" name="data[HostpitalDetails][hospitaliz_resone][]" value="<?=$hospitaliz_resone?>">
							</div>
							<div class="datesThree ml20">
								<label class="blue">Date of hospitalizations</label>
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
								<div class="dateparent">
								<?php 
									
									echo $this->Form->input('HostpitalDetails.hospitaliz_day][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$days,
										'default'=>'0',
										'class'=>'date savaliedatefields  datevalidate',
										'value'=>$hospitaliz_day
									));
									
									echo $this->Form->input('HostpitalDetails.hospitaliz_month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields  datevalidate',
										'value'=>$hospitaliz_month
									));
									
									echo $this->Form->input('HostpitalDetails.hospitaliz_year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields  datevalidate',
										'value'=>$hospitaliz_year
									));
								?>
								</div>
							</div>
							<div class="diagnosis ml20">
								<label class="blue">Period of hospitalizations</label>
								<input type="text" placeholder="0" class="days" name="data[HostpitalDetails][hospitaliz_days]" value="<?=$hospitaliz_days?>">
							</div>
							<div id="hostMore">
						<?php
						}
						else{
						?>
							<div class="clear10"></div>
							<div class="diagnosis">
								<input type="text" name="data[HostpitalDetails][hospitaliz_resone][]" value="<?=$hospitaliz_resone?>">
							</div>
							<div class="datesThree ml20">
								<!--<select class="month"><option>Month</option></select>
								<select class="year"><option>Year</option></select>-->
								<div class="dateparent">
								<?php 
									
									echo $this->Form->input('HostpitalDetails.hospitaliz_day][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$days,
										'default'=>'0',
										'class'=>'date savaliedatefields  datevalidate',
										'value'=>$hospitaliz_day
									));
									
									echo $this->Form->input('HostpitalDetails.hospitaliz_month][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$months,
										'default'=>'0',
										'class'=>'month savaliedatefields  datevalidate',
										'value'=>$hospitaliz_month
									));
									
									echo $this->Form->input('HostpitalDetails.hospitaliz_year][',array(
										'div'=>false,
										'label'=>false,
										'options'=>$years,
										'default'=>'0',
										'class'=>'year savaliedatefields  datevalidate',
										'value'=>$hospitaliz_year
									));
								?>
								</div>
							</div>
							<div class="diagnosis ml20">
								<input type="text" placeholder="0" class="days" name="data[HostpitalDetails][hospitaliz_days]" value="<?=$hospitaliz_days?>">
							</div>
						<?php
						}
					}
					echo "</div>";
				}
			?>
			
			<a href="javascript:void(0)" class="greenText ml20 mt37 mobileNoML js-morepastdetails" id="hostmoreanc">+ Add More</a>
			<div class="clear50"></div>
			
			<h3>Any history of cancer in family?</h3>
			<?php 
				
				if(count($family_cancer_details)>0){
					$relation_withs = $family_cancer_details['relation_with'];
					$cancer_types = $family_cancer_details['cancer_type'];
					$age_of_diagonisiss = $family_cancer_details['age_of_diagonisis'];
					
					for($l=0;$l<count($relation_withs);$l++){
						$relation_with = $relation_withs[$l];
						$cancer_type = isset($cancer_types[$l])?$cancer_types[$l]:'';
						$age_of_diagonisis = isset($age_of_diagonisiss[$l])?$age_of_diagonisiss[$l]:'';
						
						
						if($l==0){
						?>
							<div class="diagnosis">
								<label class="blue">Relation with patient </label>
								<input type="text" name="data[FamilyCancer][relation_with][]" value="<?=$relation_with?>">
							</div>
							<div class="diagnosis ml20">
								<label class="blue">Type of cancer </label>
								<input type="text" name="data[FamilyCancer][cancer_type][]" value="<?=$cancer_type?>">
							</div>
							<div class="diagnosis ml20">
								<label class="blue">At what age it was diagnosed?</label>
								<input type="text" placeholder="0" class="year" name="data[FamilyCancer][age_of_diagonisis][]" value="<?=$age_of_diagonisis?>">
							</div>
							
							<div id="familycancermore">
							
						<?php
						}
						else{
						?>
							<div class="clear10"></div>
							<div class="diagnosis">
								<input type="text" name="data[FamilyCancer][relation_with][]" value="<?=$relation_with?>">
							</div>
							<div class="diagnosis ml20">
								<input type="text" name="data[FamilyCancer][cancer_type][]" value="<?=$cancer_type?>">
							</div>
							<div class="diagnosis ml20">
								<input type="text" placeholder="0" class="year" name="data[FamilyCancer][age_of_diagonisis][]" value="<?=$age_of_diagonisis?>">
							</div>
						<?php
						}
					}
					echo "</div>";
				}
			?>
			
			<a href="javascript:void(0)" class="greenText ml20 mt37 mobileNoML js-morepastdetails" id="cancerfmanc">+ Add More</a>
			<div class="clear30"></div>
			
			<div class="w700">
				<label class="blue">Any specific comment about your medical history</label>
				<textarea class="h225" name="data[PatientPastHistory][comments]"><?=$comments?></textarea>
			</div>
		</div>
		<div class="clear35"></div>
			
		<a href="javascript:void(0)" class="backBtn js-preview"  sec="3" id="psthisbackbtn">Back</a>
        <input type="button" class="nextBtn js-psthissaved" value="Next" id="nextviewupddoc">
		<input type="submit" class="saveBtn js-psthissaved" value="Save" name="save" id="psthissaved">
		
	</form>		
</div>

</div>