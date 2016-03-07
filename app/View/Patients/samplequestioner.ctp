<?php
	
	//pr($patientalldeatils); //rishiagarwal@test.ac
?>
		
		<div class="details">
			<div class="heiding">
				<h2>Paitient Details</h2>
				<div class="clear"></div>
			</div>
			<div class="clear5"></div>
			<div class="w7702">
				<div class="row">
					<div class="width1">
						<label class="blue">Full Name</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QPatientDetails']['name'])?$patientalldeatils['QPatientDetails']['name']:'';?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Gender</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QPatientDetails']['gender'])?$patientalldeatils['QPatientDetails']['gender']:'';?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Date of Birth</label>
					</div>
					<div class="width2">
						<label><?php 
							echo isset($patientalldeatils['QPatientDetails']['dob_txt'])?date("d M Y",strtotime($patientalldeatils['QPatientDetails']['dob_txt'])):'';	
						?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Place</label>
					</div>
					<div class="width2">
						<label><?php 
							echo isset($patientalldeatils['QPatientDetails']['place'])?$patientalldeatils['QPatientDetails']['place']:'';
						?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Weight</label>
					</div>
					<div class="width2">
						<label><?php 
							echo isset($patientalldeatils['QPatientDetails']['weight'])?$patientalldeatils['QPatientDetails']['weight']." KG ":'';
						?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Height</label>
					</div>
					<div class="width2">
						<label><?php 
							echo isset($patientalldeatils['QPatientDetails']['height'])?$patientalldeatils['QPatientDetails']['height']." CM ":'';
						?></label>
					</div>
				</div>
				<div class="clear20"></div>
				<h3>Drug Allergy</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Drug</label>
					</div>
					<div class="width2">
						<label class="blue">Reaction</label>
					</div>
				</div>
				<?php
					$drugalergiesnames = isset($patientalldeatils['QPatientDetails']['drug_name'])?explode(',',$patientalldeatils['QPatientDetails']['drug_name']):array();
					$drugalergiesreactions = isset($patientalldeatils['QPatientDetails']['reaction'])?explode(',',$patientalldeatils['QPatientDetails']['reaction']):array();
					
					if(is_array($drugalergiesnames) && count($drugalergiesnames)>0){
						foreach($drugalergiesnames as $key=>$name){
							$report=isset($drugalergiesreactions[$key])?$drugalergiesreactions[$key]:'';
						?>
							<div class="row">
								<div class="width1">
									<label><?=$name?></label>
								</div>
								<div class="width2">
									<label><?=$report?></label>
								</div>
							</div>
						<?php
						}
					}
				?>
				
				<div class="clear20"></div>
				<h3>Performance</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Current Performence Status</label>
					</div>
					<div class="width2">
						<label><?php 
							$pers = isset($patientalldeatils['QPatientDetails']['performance_status'])?$patientalldeatils['QPatientDetails']['performance_status']:'0'; 
							echo isset($performance_status[$pers])?$performance_status[$pers]:'';
						?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Comment about Performence Status</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QPatientDetails']['performance_status_comment'])?$patientalldeatils['QPatientDetails']['performance_status_comment']:'';?></label>
					</div>
				</div>
			</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>Social History</h2>
			</div>
			<div class="clear5"></div>
			<div class="w7702">
				<h3>Smoking</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Quantity</label>
					</div>
					<div class="width2">
						<label class="blue">Period</label>
					</div>
				</div>
				<?php 
					$smokings = isset($patientalldeatils['QSocialHistory']['smocking'])?$patientalldeatils['QSocialHistory']['smocking']:array();
					
					if(is_array($smokings) && count($smokings)>0){
						//foreach($smokings as $smoking){
						$smoking = $smokings;
							$quantiry = isset($smoking['quantity'])?$smoking['quantity']:'0';
							$unit = isset($smoking['unit'])?$smoking['unit']:'in a day';
							
							$startdate = isset($smoking['preriod_from'])?$smoking['preriod_from']:'';;
							
							$enddate = isset($smoking['preriod_to'])?$smoking['preriod_to']:'';;
							
							$preriodstr = ($startdate!='')?date("d M Y",strtotime($startdate)):'';
							$preriodend = ($enddate!='')?date("d M Y",strtotime($enddate)):'';
							?>
								<div class="row">
									<div class="width1">
										<label><?=$quantiry." ".$unit?></label>
									</div>
									<div class="width2">
										<label><?php echo $preriodstr." - ".$preriodend;?></label>
									</div>
								</div>
							<?php
						//}
					}
				?>
				
				<div class="clear20"></div>
				<h3>Alcohol</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Alcohol type</label>
					</div>
					<div class="width2">
						<label class="blue">quantity</label>
					</div>
				</div>
				<?php 
					$alcohals = isset($patientalldeatils['QSocialHistory']['alcohol'])?$patientalldeatils['QSocialHistory']['alcohol']:array();
					if(is_array($alcohals) && count($alcohals)>0){
						//foreach($alcohals as $alcohal){
						$alcohal=$alcohals;
							$name=isset($alcohal['alcohol_type'])?$alcohal['alcohol_type']:'';
							$quant=isset($alcohal['quantity'])?$alcohal['quantity']." ML in a day":'0 ML in a day';
							?>
							<div class="row">
								<div class="width1">
									<label><?=$name?></label>
								</div>
								<div class="width2">
									<label><?=$quant?></label>
								</div>
							</div>
							<?php
						//}
					}
				?>
				
				<div class="row">
					<div class="width1">
						<label class="blue">Period</label>
					</div>
					<div class="width2">
						<label><?php 
							$startdate =isset($patientalldeatils['QSocialHistory']['alcohol_period_from'])?$patientalldeatils['QSocialHistory']['alcohol_period_from']:'';
							$enddate =isset($patientalldeatils['QSocialHistory']['alcohol_period_to'])?$patientalldeatils['QSocialHistory']['alcohol_period_to']:'';
							
							$preriodstr = ($startdate!='')?date("d M Y",strtotime($startdate)):'';
							$preriodend = ($enddate!='')?" - ".date("d M Y",strtotime($enddate)):'';
							echo $preriodstr."".$preriodend;
						?></label>
					</div>
				</div>
				<div class="clear20"></div>
				
				<div class="row">
					<div class="width1">
						<label class="blue">Additional Comments</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QSocialHistory']['comments'])?$patientalldeatils['QSocialHistory']['comments']:'';?></label>
					</div>
				</div>
			</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>About the Illness</h2>
			</div>
			<div class="clear5"></div>
			<div class="w7702">
				<div class="row">
					<div class="width1">
						<label class="blue">Principal Diagnosis</label>
					</div>
					<div class="width2">
						<label><?php 
							echo isset($patientalldeatils['QAboutTheIll']['principle_diagnosis_name'])?$patientalldeatils['QAboutTheIll']['principle_diagnosis_name']:'';
						?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Date of Diagnosis</label>
					</div>
					<div class="width2">
						<label>
						<?php
							$startdate = isset($patientalldeatils['QAboutTheIll']['date_of_diagnosis'])?$patientalldeatils['QAboutTheIll']['date_of_diagnosis']:'';
							
							$preriodstr = ($startdate!='')?date("d M, Y",strtotime($startdate)):'';
							echo $preriodstr;
						?>
						</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Give a detailed history of how diagnosis was made</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QAboutTheIll']['diagnosis_history'])?$patientalldeatils['QAboutTheIll']['diagnosis_history']:'-';?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">What is your oncologist's recommendation?</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QAboutTheIll']['oncologist_recommendation'])?$patientalldeatils['QAboutTheIll']['oncologist_recommendation']:'-';?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Last Examination Date</label>
					</div>
					<div class="width2">
						<label><?php 
							$startdate = isset($patientalldeatils['QAboutTheIll']['last_examanation_date'])?$patientalldeatils['QAboutTheIll']['last_examanation_date']:'';
							
							$preriodstr =($startdate!='')?date("d M, Y",strtotime($startdate)):'';
							echo $preriodstr;
						?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Do you have results of any tumor markers? </label>
					</div>
					<div class="width2">
						<label><?php  
							echo (isset($patientalldeatils['QAboutTheIll']['have_tumor_marker']) && $patientalldeatils['QAboutTheIll']['have_tumor_marker']=='yes')?'Yes':'No';
						?></label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Type of tumor marker</label>
					</div>
					<div class="width1">
						<label class="blue">Date</label>
					</div>
					<div class="width3">
						<label class="blue">Result</label>
					</div>
				</div>
				<?php 
					$tumarMarkers = isset($patientalldeatils['QAboutTheIll']['tumor_marker'])?$patientalldeatils['QAboutTheIll']['tumor_marker']:array();
					if(is_array($tumarMarkers) && count($tumarMarkers)>0){
						//foreach($tumarMarkers as $tumarMarker){
							$tumarMarker = $tumarMarkers;
							$name = isset($tumarMarker['tumor_type'])?$tumarMarker['tumor_type']:'';
							$result = isset($tumarMarker['result'])?$tumarMarker['result']:'';
							
							$startdate = isset($tumarMarker['tumor_date'])?$tumarMarker['tumor_date']:'';
							
							$dates = ($startdate!='')?date("M, Y",strtotime($startdate)):'';
							?>
							<div class="row">
								<div class="width1">
									<label><?=$name?></label>
								</div>
								<div class="width1">
									<label><?=$dates?></label>
								</div>
								<div class="width3">
									<label><?=$result?></label>
								</div>
							</div>
							<?php
						//}
					}
				?>
				
			</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>Past History</h2>
			</div>
			<div class="clear5"></div>
			<div class="w7702">
				<h3>Any past medical or cancer history?</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Diagnosis</label>
					</div>
					<div class="width2">
						<label class="blue">Date of diagnosis</label>
					</div>
				</div>
				<?php 
					
					$cancerhistories = isset($patientalldeatils['QPastHistory']['cancer_history'])?$patientalldeatils['QPastHistory']['cancer_history']:array();
					
					if(is_array($cancerhistories) && count($cancerhistories)>0){
						$diagnosis_names = explode(",",$cancerhistories['diagnosis_type']);
						$startdates = explode(",",$cancerhistories['date_of_diagnosis']);
						
						for($i=0;$i<count($diagnosis_names);$i++){
							$diagnosis_name = $diagnosis_names[$i];
							$startdate = isset($startdates[$i])?$startdates[$i]:'';
							$dates = ($startdate!='')?date("d M, Y",strtotime($startdate)):'';
							
						?>
							<div class="row">
								<div class="width1">
									<label><?=$diagnosis_name?></label>
								</div>
								<div class="width2">
									<label><?=$dates?></label>
								</div>
							</div>
							<?php
						}
					}
				?>
				
				<div class="clear20"></div>
				
				<h3>Any past surgical history?</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Surgical</label>
					</div>
					<div class="width2">
						<label class="blue">Date of Surgical</label>
					</div>
				</div>
				<?php 
					$surgicalhistories = isset($patientalldeatils['QPastHistory']['surgical_history'])?$patientalldeatils['QPastHistory']['surgical_history']:array();
					if(is_array($surgicalhistories) && count($surgicalhistories)>0){
						$surgery_names =explode(",",$surgicalhistories['surgical_type']);
						$startdates =explode(",",$surgicalhistories['date_of_surgical']);
						
						for($j=0;$j<count($surgery_names);$j++){
							$surgery_name = $surgery_names[$j];
							$startdate = isset($startdates[$j])?$startdates[$j]:'';
							$dates = ($startdate!='')?date("d M, Y",strtotime($startdate)):'';
						?>
							<div class="row">
								<div class="width1">
									<label><?=$surgery_name?></label>
								</div>
								<div class="width2">
									<label><?=$dates?></label>
								</div>
							</div>
						<?php
						}
					}
				?>
				
				<div class="clear20"></div>
				<h3>Any other hospitalizations?</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Reason</label>
					</div>
					<div class="width1">
						<label class="blue">Date of hospitalization</label>
					</div>
					<div class="width3">
						<label class="blue">Period of hospitalization</label>
					</div>
				</div>
				<?php 
					$hospitalizations = isset($patientalldeatils['QPastHistory']['hospitalizations'])?$patientalldeatils['QPastHistory']['hospitalizations']:array();
					if(is_array($hospitalizations) && count($hospitalizations)>0){
						$hospitaliz_resones = explode(",",$hospitalizations['reason']);
						$startdates = explode(",",$hospitalizations['date_of_hospltalize']);
						$hospitaliz_days = explode(",",$hospitalizations['period_of_hospltalize']);
						for($k=0;$k<count($hospitaliz_resones);$k++){
							$hospitaliz_resone = isset($hospitaliz_resones[$k])?$hospitaliz_resones[$k]:'';
							$hospitaliz_day = isset($hospitaliz_days[$k])?$hospitaliz_days[$k]:'0';
							$startdate = isset($startdates[$k])?$startdates[$k]:'';
							$dates = ($startdate!='')?date("d M, Y",strtotime($startdate)):'';
							
							?>
							<div class="row">
								<div class="width1">
									<label><?=$hospitaliz_resone?></label>
								</div>
								<div class="width1">
									<label><?=$dates?></label>
								</div>
								<div class="width3">
									<label><?=$hospitaliz_day?> Days</label>
								</div>
							</div>
							<?php
						}	
					}
				?>
				
				<div class="clear20"></div>
				<h3>Any history of cancer in family?</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Relation with patient </label>
					</div>
					<div class="width1">
						<label class="blue">Type of cancer </label>
					</div>
					<div class="width3">
						<label class="blue">At what age it was diagnosed?</label>
					</div>
				</div>
				<?php 
					$family_cancer_histories = isset($patientalldeatils['QPastHistory']['family_cancer'])?$patientalldeatils['QPastHistory']['family_cancer']:array();
					if(is_array($family_cancer_histories) && count($family_cancer_histories)>0){
						$relation_withs =explode(",",$family_cancer_histories['relation']);
						$cancer_types = explode(",",$family_cancer_histories['cancer_type']);
						$age_of_diagonisiss = explode(",",$family_cancer_histories['diagoniazed_age']);
						
						for($l=0;$l<count($relation_withs);$l++){
							$relation_with = isset($relation_withs[$l])?$relation_withs[$l]:'';
							$cancer_type = isset($cancer_types[$l])?$cancer_types[$l]:'';
							$age_of_diagonisis = isset($age_of_diagonisiss[$l])?$age_of_diagonisiss[$l]:'0';
							?>
								<div class="row">
									<div class="width1">
										<label><?=$relation_with?></label>
									</div>
									<div class="width1">
										<label><?=$cancer_type?></label>
									</div>
									<div class="width3">
										<label><?=$age_of_diagonisis?> Years</label>
									</div>
								</div>
							<?php
						}
					}
				?>
				
				<div class="row">
					<div class="width1">
						<label class="blue">Any specific comment about the medical history</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QPastHistory']['comment'])?$patientalldeatils['QPastHistory']['comment']:''?></label>
					</div>
				</div>
			</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>Test Reports</h2>
			</div>
			<div class="clear5"></div>
			<div class="w7702">
				<div class="row">
					<div class="width1">
						<label class="blue">Test</label>
					</div>
					<div class="width1">
						<label class="blue">Dates</label>
					</div>
					<div class="width3">
						<label class="blue">Reports / Results</label>
					</div>
				</div>
				<div class="clear20"></div>
				<h3>Blood &amp; Laboratory Tests (Hemoglobin, CBC, BMP etc.)</h3>
				<?php 
					$bloodreports = isset($patientalldeatils['QTestReport']['blood_laboritory'])?$patientalldeatils['QTestReport']['blood_laboritory']:array();
					
					if(is_array($bloodreports) && count($bloodreports)>0){
						$tests = isset($bloodreports['test_name'])?explode(",",$bloodreports['test_name']):array();
						$flnames = isset($bloodreports['test_report'])?explode(",",$bloodreports['test_report']):array();
						$startdates = isset($bloodreports['test_date'])?explode(",",$bloodreports['test_date']):array();
						
						$comments="document not uploaded";
						
						for($i=0; $i<count($tests);$i++){
							$test = isset($tests[$i])?$tests[$i]:'';
							$startdate = isset($startdates[$i])?$startdates[$i]:'';
							$flname = isset($flnames[$i])?$flnames[$i]:'';
							$dates = ($startdate!='')?date("M, Y",strtotime($startdate)):'';
							
							?>
								<div class="row">
									<div class="width1">
										<label><?=$test?></label>
									</div>
									<div class="width1">
										<label><?=$dates?></label>
									</div>
									<div class="width3">
										<?php if($flname==''){
										?>
										<label><?=$comments?></label>
										<?php
										}else{
											?>
											<span class="reportCard"><?=$flname?></span>
											<?php
										}
										?>
									</div>
								</div>
							<?php
						}
					}
				?>
				
				<div class="clear20"></div>
				<h3>Imaging Tests (X-Ray, CT Scan, MRI etc.)</h3>
				<?php 
					$imagingreports = isset($patientalldeatils['QTestReport']['imaging_test'])?$patientalldeatils['QTestReport']['imaging_test']:array();
					if(is_array($imagingreports) && count($imagingreports)>0){
						$imgtests = isset($imagingreports['test_name'])?explode(",",$imagingreports['test_name']):array();
						$imgfilenames = isset($imagingreports['test_report'])?explode(",",$imagingreports['test_report']):array();
						$startdates = isset($imagingreports['test_date'])?explode(",",$imagingreports['test_date']):array();
						
						$comments="document not uploaded";
						
						for($k=0;$k<count($imgtests);$k++){
							$imgtest = isset($imgtests[$k])?$imgtests[$k]:'';
							$startdate = isset($startdates[$k])?$startdates[$k]:'';
							$imgfilename = isset($imgfilenames[$k])?$imgfilenames[$k]:'';
							
							$dates =($startdate!='')?date("M, Y",strtotime($startdate)):'';
							
							?>
								<div class="row">
									<div class="width1">
										<label><?=$imgtest?></label>
									</div>
									<div class="width1">
										<label><?=$dates?></label>
									</div>
									<div class="width3">
										<?php if($imgfilename==''){
										?>
										<label><?=$comments?></label>
										<?php
										}else{
											?>
											<span class="reportCard"><?=$imgfilename?></span>
											<?php
										}
										?>
									</div>
								</div>
							<?php
						}	
					}
				?>
				
				<div class="clear20"></div>
				<h3>Pathology Tests (Biopsy, FNA etc.)</h3>
				<?php 
					$pathologyreports = isset($patientalldeatils['QTestReport']['pathologyreport'])?$patientalldeatils['QTestReport']['pathologyreport']:array();
					if(is_array($pathologyreports) && count($pathologyreports)>0){
						$pathtests = isset($pathologyreports['test_name'])?expolde(",",$pathologyreports['test_name']):array();
						$startdates = isset($pathologyreports['test_date'])?expolde(",",$pathologyreports['test_date']):array();
						$pathflnames = isset($pathologyreports['test_report'])?expolde(",",$pathologyreports['test_report']):array();
						$comments="document not uploaded";//
						for($i=0; $i<count($pathtests);$i++){
							$pathtest = isset($pathtests[$i])?$pathtests[$i]:'';
							$startdate = isset($startdates[$i])?$startdates[$i]:'';
							$pathflname = isset($pathflnames[$i])?$pathflnames[$i]:'';
							
							$dates =($startdate!='')?date("M, Y",strtotime($startdate)):'';
							?>
								<div class="row">
									<div class="width1">
										<label><?=$pathtest?></label>
									</div>
									<div class="width1">
										<label><?=$dates?></label>
									</div>
									<div class="width3">
										<?php if($pathflname==''){
										?>
										<label><?=$comments?></label>
										<?php
										}else{
											?>
											<span class="reportCard"><?=$pathflname?></span>
											<?php
										}
										?>
									</div>
								</div>
							<?php
						}
					}
				?>
				
				<div class="row">
					<div class="width1">
						<label class="blue">Any specific questions you want to ask the doctor</label>
					</div>
					<div class="width2">
						<label><?php echo isset($patientalldeatils['QTestReport']['comment'])?$patientalldeatils['QTestReport']['comment']:'';?></label>
					</div>
				</div>
			</div>
		</div>          
		<div class="clear35"></div>