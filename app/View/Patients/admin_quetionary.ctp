<!--<div class="patients form">
<?php echo $this->Form->create('Patient'); ?>
	<fieldset>
		<legend><?php echo __('Edit Patient'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('createtime');
		echo $this->Form->input('browserdetails');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Patient.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Patient.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Questionnaire</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
<!-- main container sections -->
<?php 
//pr($patientalldeatils);
?>
<div class="col-lg-12">
	<div class="panel panel-default">
		<!-- /.panel-heading -->
		<div class="panel-heading">
			Patient Questionnaire
		</div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
			<?php 
				if(isset($patientalldeatils) && count($patientalldeatils)>0){
			?>
				<table class="table table-striped table-bordered table-hover" >
					<thead>
						<tr>
							<th colspan='2'>Basic Details</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td>Full Name</td>
							<td><?=(isset($patientalldeatils['PatientDetail']['name'])?$patientalldeatils['PatientDetail']['name']:'')?></td>
						</tr>
						<tr class="odd gradeX">
							<td>Gender</td>
							<td><?=(isset($patientalldeatils['PatientDetail']['gender'])?$patientalldeatils['PatientDetail']['gender']:'')?></td>
						</tr>
						<tr class="odd gradeX">
							<td>Date of Birth</td>
							<td><?php 
								$mn=isset($patientalldeatils['PatientDetail']['dob_month'])?$patientalldeatils['PatientDetail']['dob_month']:'';
								$dd=isset($patientalldeatils['PatientDetail']['dob_day'])?$patientalldeatils['PatientDetail']['dob_day']:'';
								$yy=isset($patientalldeatils['PatientDetail']['dob_year'])?$patientalldeatils['PatientDetail']['dob_year']:'';
								if($dd!='' && $mn!='' && $yy!=''){
									$dob = $yy."-".$mn."-".$dd;
									echo date("d M Y",strtotime($dob));
								}
							?></td>
						</tr>
						<tr class="odd gradeX">
							<td>Place</td>
							<td><?=(isset($patientalldeatils['PatientDetail']['city'])?$patientalldeatils['PatientDetail']['city'].", ":'')?>
								<?=(isset($patientalldeatils['PatientDetail']['state'])?$patientalldeatils['PatientDetail']['state'].", ":'')?>
								<?=(isset($patientalldeatils['PatientDetail']['Country']['name'])?$patientalldeatils['PatientDetail']['Country']['name']:'')?>
							</td>
						</tr>
						<tr class="odd gradeX">
							<td>Weight</td>
							<td><?=(isset($patientalldeatils['PatientDetail']['weight'])?$patientalldeatils['PatientDetail']['weight']." KG":'')?></td>
						</tr>
						<tr class="odd gradeX">
							<td>Height</td>
							<td><?=(isset($patientalldeatils['PatientDetail']['height'])?$patientalldeatils['PatientDetail']['height']." CM":'')?></td>
						</tr>
						
						<tr class="odd gradeX">
							<th colspan='2'>Drug Allergy</th>
						</tr>
						<tr class="odd gradeX">
							<td>Drug</td>
							<td>Reaction</td>
						</tr>
						<!-- if drug allergy present then how this sections -->
						<?php 
							if(isset($patientalldeatils['PatientDetail']['DrugAlergy']) && count($patientalldeatils['PatientDetail']['DrugAlergy'])>0){
								foreach($patientalldeatils['PatientDetail']['DrugAlergy'] as $drugralergy){
									?>
									<tr class="odd gradeX">
										<td><?=$drugralergy['name']?></td>
										<td><?=$drugralergy['reaction']?></td>
									</tr>
									<?php
								}
							}
							else{
						?>
						<tr class="odd gradeX">
							<td colspan='2'>No details for drug allergy</td>
						</tr>
						<?php
							}
						?>
						
						
						<tr class="odd gradeX">
							<th colspan='2'>Performance</th>
						</tr>
						<tr class="odd gradeX">
							<th>Current Performance Status</th>
							<td><?php 
								if(isset($patientalldeatils['PatientDetail']['performance'])){
									$prf = explode("_",$patientalldeatils['PatientDetail']['performance']);
									echo $prf[0];
								}
							?></td>
						</tr>
						<tr class="odd gradeX">
							<th>Comment about Performance Status</th>
							<td><?=(isset($patientalldeatils['PatientDetail']['performance_comment'])?$patientalldeatils['PatientDetail']['performance_comment']:'')?></td>
						</tr>
					</tbody>
		 
				</table>
				<!-- separate section for all type social history form id="dataTables-example" -->
				
				<table class="table table-striped table-bordered table-hover" > 
					<thead>
						<tr>
							<th colspan="2">Social History</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<th colspan='2'>Smoking</th>
						</tr>
						<tr class="odd gradeX">
							<td>Quantity</td>
							<td>Period</td>
						</tr>
						<?php 
							if(isset($patientalldeatils['Socialactivity']['Smoking']) && count($patientalldeatils['Socialactivity']['Smoking'])>0){
								foreach($patientalldeatils['Socialactivity']['Smoking'] as $smoking){
								?>
								<tr class="odd gradeX">
									<td><?=$smoking['quantity'].' '.$smoking['smkunit']?></td>
									<td><?php 
										$frmdate = $smoking['fromyear']."-".$smoking['frommonth']."-01";
										$todate = $smoking['toyear']."-".$smoking['tomonth']."-01";
										echo date("M Y",strtotime($frmdate))."-".date("M Y",strtotime($todate));
									?></td>
								</tr>
								<?php
								}
							}
							else{
							?>
								<tr class="odd gradeX">
									<td>--</td>
									<td>--</td>
								</tr>
							<?php
							}
						?>
						
						<tr class="odd gradeX">
							<th colspan='2'>Alcohol</th>
						</tr>
						<tr class="odd gradeX">
							<th>Alcohol Type</th>
							<th>Quantity</th>
						</tr>
						<?php 
							if(isset($patientalldeatils['Socialactivity']['Alcohol']) && count($patientalldeatils['Socialactivity']['Alcohol'])>0){
								foreach($patientalldeatils['Socialactivity']['Alcohol'] as $alcohol){
								?>
								<tr class="odd gradeX">
									<td><?=isset($alcohol['alcoholname'])?$alcohol['alcoholname']:''?></td>
									<td>
										<?=isset($alcohol['quantity'])?$alcohol['quantity']:'0'?>
										<?=isset($alcohol['alcoholunit'])?$alcohol['alcoholunit']:'in a day'?> 
									</td>
								</tr>
								<?php 
								}
							}
							else{
							?>
							<tr class="odd gradeX">
								<td>--</td>
								<td>--</td>
							</tr>
							<?php
							}
						?>
						<tr class="odd gradeX">
							<th>Period</th>
							<td><?php
							
								$smonth = isset($alcohol['alcohalstartmonth'])?$alcohol['alcohalstartmonth']:'';
								$syesr = isset($alcohol['alcohalstartyear'])?$alcohol['alcohalstartyear']:'';
								$emonth = isset($alcohol['alcohalendmonth'])?$alcohol['alcohalendmonth']:'';
								$eyear = isset($alcohol['alcohalendyear'])?$alcohol['alcohalendyear']:'';
								
								$frmdate = $syesr."-".$smonth."-01";
								$todate = $eyear."-".$emonth."-01";
								
								echo date("M Y",strtotime($frmdate))."-".date("M Y",strtotime($todate));
							?></td>
						</tr>
						<!--
						<tr class="odd gradeX">
							<th colspan='2'>Drugs</th>
						</tr>
						<tr class="odd gradeX">
							<th>Dug type</th>
							<th>Quantity</th>
						</tr>
						<?php 
							if(isset($patientalldeatils['Socialactivity']['Drug']) && count($patientalldeatils['Socialactivity']['Drug'])>0){
								foreach($patientalldeatils['Socialactivity']['Drug'] as $drug){
								?>
									<tr class="odd gradeX">
										<td><?=isset($drug['drugname'])?$drug['drugname']:''?></td>
										<td><?=isset($drug['quantity'])?$drug['quantity']:'0'?><?=isset($drug['drugunit'])?$drug['drugunit']:'in a day'?></td>
									</tr>
								<?php
								}
							}
							else{
							?>
							<tr class="odd gradeX">
								<td>--</td>
								<td>--</td>
							</tr>
							<?php
							}
						?>
						-->
						<tr class="odd gradeX">
							<th>Additional Comments</th>
							<td><?=isset($patientalldeatils['Socialactivity']['comment'])?$patientalldeatils['Socialactivity']['comment']:''?></td>
						</tr>
						
					</tbody>
		 
				</table>
				
				<!-- About The Illness -->
				<table class="table table-striped table-bordered table-hover" >
					<thead>
						<tr>
							<th colspan="2">About The Illness</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<th>Principal Diagnosis</th>
							<td><?=isset($patientalldeatils['AboutIllness']['Specialization']['name'])?$patientalldeatils['AboutIllness']['Specialization']['name']:''?></td>
						</tr>
						<tr class="odd gradeX">
							<th>Date of Diagnosis</th>
							<td><?php 
								$sday = isset($patientalldeatils['AboutIllness']['startdiagoday'])?$patientalldeatils['AboutIllness']['startdiagoday']:'';
								$smonth = isset($patientalldeatils['AboutIllness']['startdiagomonth'])?$patientalldeatils['AboutIllness']['startdiagomonth']:'';
								$syear = isset($patientalldeatils['AboutIllness']['startdiagoyear'])?$patientalldeatils['AboutIllness']['startdiagoyear']:'';
								
								$sdate = $syear."-".$smonth."-".$sday;
								//
								
								
								echo date("M d, Y",strtotime($sdate));
								
							?>
							</td>
						</tr>
						<tr class="odd gradeX">
							<th>Give a detailed history of how diagnosis was made</th>
							<td><?=isset($patientalldeatils['AboutIllness']['diagodetails'])?$patientalldeatils['AboutIllness']['diagodetails']:''?></td>
						</tr>
						<tr class="odd gradeX">
							<th>What is your oncologist's recommendation?</th>
							<td><?=isset($patientalldeatils['AboutIllness']['diagorecomandation'])?$patientalldeatils['AboutIllness']['diagorecomandation']:''?></td>
						</tr>
						<tr class="odd gradeX">
							<th>Last Examination Date</th>
							<td><?php 
								$eday = isset($patientalldeatils['AboutIllness']['enddiagoday'])?$patientalldeatils['AboutIllness']['enddiagoday']:'';
								$emonth = isset($patientalldeatils['AboutIllness']['enddiagomonth'])?$patientalldeatils['AboutIllness']['enddiagomonth']:'';
								$etear = isset($patientalldeatils['AboutIllness']['enddiagoyear'])?$patientalldeatils['AboutIllness']['enddiagoyear']:'';
								$edate = $syear."-".$emonth."-".$eday;
								echo date("M d, Y",strtotime($edate));
							?></td>
						</tr>
						<tr class="odd gradeX">
							<th>Do you have results of any tumor markers?</th>
							<td><?php 
								echo (isset($patientalldeatils['AboutIllness']['istumarmarker']) && $patientalldeatils['AboutIllness']['istumarmarker']==1)?'Yes':'No';
							?></td>
						</tr>
						<tr class="odd gradeX">
							<th>Type of tumor marker</th>
							<td>Result</td>
						</tr>
						<?php 
							if(isset($patientalldeatils['AboutIllness']['TumarMarker']) && count($patientalldeatils['AboutIllness']['TumarMarker'])>0 ){
								foreach($patientalldeatils['AboutIllness']['TumarMarker'] as $tmmarker){
								?>
								 <!--<td><?=$tmmarker['tmmarker']?></td>-->
								 <td colspan="2" ><?=$tmmarker['tumorresult']?></td>
								<?php
								}
							}
							else{
							?>
							<tr class="odd gradeX">
								<td colspan="2">--</td>
								
							</tr>
							<?php
							}
						?>
						
					</tbody>
		 
				</table>
				
				<!-- Past History -->
				<table class="table table-striped table-bordered table-hover" >
					<thead>
						<tr>
							<th colspan="2">Past History</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<th colspan='2'>Any past medical or cancer history?</th>
						</tr>
						
						<tr>
							<th>Diagnosis</th>
							<th>Date of diagnosis</th>
						</tr>
						<?php 
						//comments
						
						$cancer_histories='';
						if(isset($patientalldeatils['PatientPastHistory']['cancer_history']) && $patientalldeatils['PatientPastHistory']['cancer_history']!=''){
							$cancer_histories = unserialize($patientalldeatils['PatientPastHistory']['cancer_history']);
						}
						
						//pr($cancer_histories);
						if(is_array($cancer_histories) && count($cancer_histories)>0){
							$diagnosis_names = isset($cancer_histories['diagnosis_name'])?$cancer_histories['diagnosis_name']:'';
							$diagnosis_months = isset($cancer_histories['diagnosis_month'])?$cancer_histories['diagnosis_month']:'';
							$diagnosis_years = isset($cancer_histories['diagnosis_year'])?$cancer_histories['diagnosis_year']:'';
							
							if(is_array($diagnosis_names)){
								for($i=0;$i<count($diagnosis_names);$i++){
									$name = isset($diagnosis_names[$i])?$diagnosis_names[$i]:'';
									$mm = (isset($diagnosis_months[$i]) && $diagnosis_months[$i]>0)?$diagnosis_months[$i]:'';
									$yy = (isset($diagnosis_years[$i]) && $diagnosis_years[$i]>0)?$diagnosis_years[$i]:'';
									$datess='';
									if($mm!='' && $yy!=''){
										$datess = $yy."-".$mm."-01";
										$datess = date("M, Y",strtotime($datess));
									}
								?>
								<td><?=$name?></td>
								<td><?=$datess?></td>
								<?php
								}
							}
						}
						?>
						
						<tr class="odd gradeX">
							<th colspan='2'>Any past surgical history?</th>
						</tr>
						
						<tr>
							<th>Surgical</th>
							<th>Date of Surgical</th>
						</tr>
						<?php 
						
						$surgical_history='';
						if(isset($patientalldeatils['PatientPastHistory']['surgical_history']) && $patientalldeatils['PatientPastHistory']['surgical_history']!=''){
							$surgical_history = unserialize($patientalldeatils['PatientPastHistory']['surgical_history']);
						}
							
							//pr($surgical_history);
							if(is_array($surgical_history) && count($surgical_history)>0){
								$surgery_names = isset($surgical_history['surgery_name'])?$surgical_history['surgery_name']:'';
								$surgery_months = isset($surgical_history['surgery_month'])?$surgical_history['surgery_month']:'';
								$surgery_years = isset($surgical_history['surgery_year'])?$surgical_history['surgery_year']:'';
								
								if(is_array($surgery_names)){
									for($i=0;$i<count($surgery_names);$i++){
										$name = isset($surgery_names[$i])?$surgery_names[$i]:'';
										$mm = (isset($surgery_months[$i]) && $surgery_months[$i]>0)?$surgery_months[$i]:'';
										$yy = (isset($surgery_years[$i]) && $surgery_years[$i]>0)?$surgery_years[$i]:'';
										$datess='';
										if($mm!='' && $yy!=''){
											$datess = $yy."-".$mm."-01";
											$datess = date("M, Y",strtotime($datess));
										}
									?>
									<td><?=$name?></td>
									<td><?=$datess?></td>
									<?php
									}
								}
							}
						?>
						<tr class="odd gradeX">
							<th colspan='2'>Any other hospitalizations?</th>
						</tr>
						
						<tr>
							<th>Reason</th>
							<th>Date of hospitalization</th>
						</tr>
						<?php 
						
						$hospitalization='';
						if(isset($patientalldeatils['PatientPastHistory']['hospitalization']) && $patientalldeatils['PatientPastHistory']['hospitalization']!=''){
							$hospitalization = unserialize($patientalldeatils['PatientPastHistory']['hospitalization']);
						}
							
							//pr($hospitalization);
							if(is_array($hospitalization) && count($hospitalization)>0){
								$hospitaliz_resones = isset($hospitalization['hospitaliz_resone'])?$hospitalization['hospitaliz_resone']:'';
								$hospitaliz_months = isset($hospitalization['hospitaliz_month'])?$hospitalization['hospitaliz_month']:'';
								$hospitaliz_years = isset($hospitalization['hospitaliz_year'])?$hospitalization['hospitaliz_year']:'';
								$hospitaliz_dayss = isset($hospitalization['hospitaliz_days'])?$hospitalization['hospitaliz_days']:'';
								
								if(is_array($hospitaliz_resones)){
									for($i=0;$i<count($hospitaliz_resones);$i++){
										$name = isset($hospitaliz_resones[$i])?$hospitaliz_resones[$i]:'';
										$mm = (isset($hospitaliz_months[$i]) && $hospitaliz_months[$i]>0)?$hospitaliz_months[$i]:'';
										$yy = (isset($hospitaliz_years[$i]) && $hospitaliz_years[$i]>0)?$hospitaliz_years[$i]:'';
										$dayin = (isset($hospitaliz_dayss[$i]) && $hospitaliz_dayss[$i]>0)?$hospitaliz_dayss[$i]:'0';
										$datess='';
										if($mm!='' && $yy!=''){
											$datess = $yy."-".$mm."-01";
											$datess = date("M, Y",strtotime($datess))."(".$dayin.") Days";
										}
									?>
									<td><?=$name?></td>
									<td><?=$datess?></td>
									<?php
									}
								}
							}
						?>
						
						<tr class="odd gradeX">
							<th colspan='2'>Any history of cancer in family?</th>
						</tr>
						<tr>
							<th>Relation with patient</th>
							<th>Type of cancer</th>
						</tr>
						<?php 
						
						$family_cancer_history ='';
						if(isset($patientalldeatils['PatientPastHistory']['family_cancer_history']) && $patientalldeatils['PatientPastHistory']['family_cancer_history']!=''){
							$family_cancer_history = unserialize($patientalldeatils['PatientPastHistory']['family_cancer_history']);
						}
							
							//pr($family_cancer_history);
							if(is_array($family_cancer_history) && count($family_cancer_history)>0){
								$relation_withs = isset($family_cancer_history['relation_with'])?$family_cancer_history['relation_with']:'';
								$cancer_types = isset($family_cancer_history['cancer_type'])?$family_cancer_history['cancer_type']:'';
								$age_of_diagonisis = isset($family_cancer_history['age_of_diagonisis'])?$family_cancer_history['age_of_diagonisis']:'';
								
								if(is_array($relation_withs)){
									for($i=0;$i<count($relation_withs);$i++){
										$name = isset($relation_withs[$i])?$relation_withs[$i]:'';
										$ctype = (isset($cancer_types[$i]) && $cancer_types[$i]>0)?$cancer_types[$i]:'';
										$agdiagon = (isset($age_of_diagonisis[$i]) && $age_of_diagonisis[$i]>0)?$age_of_diagonisis[$i]:'';
										$datess=$ctype;
										if($agdiagon!=''){
											$datess =$ctype." ( at $agdiagon Year)";
										}
									?>
									<td><?=$name?></td>
									<td><?=$datess?></td>
									<?php
									}
								}
							}
							
						?>
						<tr>
							<th>Any specific comment about the medical history</th>
							<td><?=isset($patientalldeatils['PatientPastHistory']['comments'])?$patientalldeatils['PatientPastHistory']['comments']:''?></td>
						</tr>
					</tbody>
		 
				</table>
				
				<!-- Test Reports -->
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th colspan="3">Test Reports</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td>Test</td>
							<td>Date</td>
							<td>Reports/Results</td>
						</tr>
						<tr>
							<th colspan="3">Blood & Laboratory Tests (Hemoglobin, CBC, BMP etc.)</th>
						</tr>
						<?php 
							$bloodreports =(isset($patientalldeatils['PatientDocument']['bloodreport']) && $patientalldeatils['PatientDocument']['bloodreport']!='')?unserialize($patientalldeatils['PatientDocument']['bloodreport']):'';
							$imagingreports =(isset($patientalldeatils['PatientDocument']['imagingreport']) && $patientalldeatils['PatientDocument']['imagingreport']!='')?unserialize($patientalldeatils['PatientDocument']['imagingreport']):'';
							$pathologyreports =(isset($patientalldeatils['PatientDocument']['pathologyreport']) && $patientalldeatils['PatientDocument']['pathologyreport']!='')?unserialize($patientalldeatils['PatientDocument']['pathologyreport']):'';
							//pr($pathologyreports);
							if(is_array($bloodreports) && count($bloodreports)>0){
								$tests = (isset($bloodreports['test']))?$bloodreports['test']:array();
								$months = (isset($bloodreports['month']))?$bloodreports['month']:array();
								$years = (isset($bloodreports['year']))?$bloodreports['year']:array();
								$flnames = (isset($bloodreports['flname']))?$bloodreports['flname']:array();
								$flispresents = (isset($bloodreports['flispresent']))?$bloodreports['flispresent']:array();
								if(is_array($tests) && count($tests)>0){
									for($i=0;$i<count($tests);$i++){
										$test = isset($tests[$i])?$tests[$i]:'';
										$month = isset($months[$i])?$months[$i]:'';
										$year = isset($years[$i])?$years[$i]:'';
										$flname = isset($flnames[$i])?$flnames[$i]:'';
										$flispresent = isset($flispresents[$i])?$flispresents[$i]:'';
										$rpdate='';
										if($month>0 && $year>0){
											$my = $year."-".$month."-01";
											$rpdate = date("M, Y",strtotime($my));
										}
										?>
										<tr>
											<td><?=$test?></td>
											<td><?=$rpdate?></td>
											<td><?php 
												if($flname!=''){
													echo $this->Html->link(__($flname),array('controller'=>'PatientDetails','action'=>'reportdownload',$flname,'full_base'=>true),array('target'=>'_blank'));
												}
												else{
													echo "doct not uploaded";
												}
											?></td>
										</tr>
										<?php
									}
								}
							}
						?>
						
						<tr>
							<th colspan="3">Imaging Tests (X-Ray, CT Scan, MRI etc.)</th>
						</tr>
						<?php
							if(is_array($imagingreports) && count($imagingreports)>0){
								$tests = (isset($imagingreports['test']))?$imagingreports['test']:array();
								$months = (isset($imagingreports['month']))?$imagingreports['month']:array();
								$years = (isset($imagingreports['year']))?$imagingreports['year']:array();
								$flnames = (isset($imagingreports['flname']))?$imagingreports['flname']:array();
								$flispresents = (isset($imagingreports['flispresent']))?$imagingreports['flispresent']:array();
								if(is_array($tests) && count($tests)>0){
									for($i=0;$i<count($tests);$i++){
										$test = isset($tests[$i])?$tests[$i]:'';
										$month = isset($months[$i])?$months[$i]:'';
										$year = isset($years[$i])?$years[$i]:'';
										$flname = isset($flnames[$i])?$flnames[$i]:'';
										$flispresent = isset($flispresents[$i])?$flispresents[$i]:'';
										$rpdate='';
										if($month>0 && $year>0){
											$my = $year."-".$month."-01";
											$rpdate = date("M, Y",strtotime($my));
										}
										?>
										<tr>
											<td><?=$test?></td>
											<td><?=$rpdate?></td>
											<td><?php 
												if($flname!=''){
													//echo $flname;
													echo $this->Html->link(__($flname),array('controller'=>'PatientDetails','action'=>'reportdownload',$flname,'full_base'=>true),array('target'=>'_blank'));
												
												}
												else{
													echo "doct not uploaded";
												}
											?></td>
										</tr>
										<?php
									}
								}
							}
						?>
						<tr>
							<th colspan="3">Pathology Tests (Biopsy, FNA etc.)</th>
						</tr>
						<?php
							if(is_array($pathologyreports) && count($pathologyreports)>0){
								$tests = (isset($pathologyreports['test']))?$pathologyreports['test']:array();
								$months = (isset($pathologyreports['month']))?$pathologyreports['month']:array();
								$years = (isset($pathologyreports['year']))?$pathologyreports['year']:array();
								$flnames = (isset($pathologyreports['flname']))?$pathologyreports['flname']:array();
								$flispresents = (isset($pathologyreports['flispresent']))?$pathologyreports['flispresent']:array();
								if(is_array($tests) && count($tests)>0){
									for($i=0;$i<count($tests);$i++){
										$test = isset($tests[$i])?$tests[$i]:'';
										$month = isset($months[$i])?$months[$i]:'';
										$year = isset($years[$i])?$years[$i]:'';
										$flname = isset($flnames[$i])?$flnames[$i]:'';
										$flispresent = isset($flispresents[$i])?$flispresents[$i]:'';
										$rpdate='';
										if($month>0 && $year>0){
											$my = $year."-".$month."-01";
											$rpdate = date("M, Y",strtotime($my));
										}
										?>
										<tr>
											<td><?=$test?></td>
											<td><?=$rpdate?></td>
											<td><?php 
												if($flname!=''){
													//echo $flname;
													echo $this->Html->link(__($flname),array('controller'=>'PatientDetails','action'=>'reportdownload',$flname,'full_base'=>true),array('target'=>'_blank'));
												}
												else{
													echo "doct not uploaded";
												}
											?></td>
										</tr>
										<?php
									}
								}
							}
						?>
						<tr>
							<th>Any specific questions you want to ask the doctor</th>
							<td colspan="2"><?=isset($patientalldeatils['PatientDocument']['comment'])?$patientalldeatils['PatientDocument']['comment']:''?></td>
						</tr>
					</tbody>
		 
				</table>
				
				<?php 
					}
					else{
					?>
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th colspan="2">Questionnaire not submited</th>
								
							</tr>
						</thead>
			 
					</table>
					<?php
					}
				?>
			</div>
			<button type="reset" class="btn btn-back">Back</button>
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>

</div>