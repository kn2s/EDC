
<?php 
	
	/*$core->addPage('', 'USLETTER');
	$pdf->core->setFont('helvetica', '', 12);
	$pdf->core->cell(30, 0, 'Hello World');
	$pdf->core->Output('example_001.pdf', 'D');*/
	
	App::import('Vendor','tcpdf');
	//pr($patientalldeatils);
	
	$htmldata = '<div class="details">
			<div class="heiding">
				<h2>Paitient Details</h2>
			</div>
			<div class="clear5"></div>
			<div class="w770">
				<div class="row">
					<div class="width1">
						<label class="blue">Full Name</label>
					</div>
					<div class="width2">
						<label>';
						$htmldata.=(isset($patientalldeatils["PatientDetail"]["name"])?$patientalldeatils["PatientDetail"]["name"]:"hjshfj" ).'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Gender</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['PatientDetail']['gender'])?$patientalldeatils['PatientDetail']['gender']:'').'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Date of Birth</label>
					</div>
					<div class="width2">
						<label>'; 
							$day = isset($patientalldeatils['PatientDetail']['dob_day'])?$patientalldeatils['PatientDetail']['dob_day']:'1';
							$month = isset($patientalldeatils['PatientDetail']['dob_month'])?$patientalldeatils['PatientDetail']['dob_month']:'1';
							$year = isset($patientalldeatils['PatientDetail']['dob_year'])?$patientalldeatils['PatientDetail']['dob_year']:'1973';
							$dob = $day."-".$month."-".$year;
					
						//echo date("d M Y",strtotime($dob));
				$htmldata.=date("d M Y",strtotime($dob)).'
						</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Place</label>
					</div>
					<div class="width2">
						<label>';
						
							$city = isset($patientalldeatils['PatientDetail']['city'])?$patientalldeatils['PatientDetail']['city'].", ":'';
							$state = isset($patientalldeatils['PatientDetail']['state'])?$patientalldeatils['PatientDetail']['state'].", ":'';
							$country = isset($patientalldeatils['PatientDetail']['Country']['name'])?$patientalldeatils['PatientDetail']['Country']['name']:'';
							$dd= $city.$state.$country;
							
					$htmldata.=$dd.'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Weight</label>
					</div>
					<div class="width2">
						<label>'.( isset($patientalldeatils['PatientDetail']['weight'])?$patientalldeatils['PatientDetail']['weight']." KG ":'').'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Height</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['PatientDetail']['height'])?$patientalldeatils['PatientDetail']['height']." CM ":'').'</label>
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
				</div>';
				//$htmldata
				$ddds='';
					$drugalergies = isset($patientalldeatils['PatientDetail']['DrugAlergy'])?$patientalldeatils['PatientDetail']['DrugAlergy']:array();
					if(is_array($drugalergies) && count($drugalergies)>0){
						foreach($drugalergies as $drugalergy){
							$name=isset($drugalergy['name'])?$drugalergy['name']:'';
							$report=isset($drugalergy['reaction'])?$drugalergy['reaction']:'';
							$ddds.='<div class="row"><div class="width1"><label>'.$name.'</label>
								</div>
								<div class="width2">
									<label>'.$report.'</label>
								</div>
							</div>';
						}
					}
					
				$htmldata.=$ddds.'<div class="clear20"></div>
				<h3>Performance</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Current Performence Status</label>
					</div>
					<div class="width2">
						<label>';
						$pers = isset($patientalldeatils['PatientDetail']['performance'])?$patientalldeatils['PatientDetail']['performance']:''; 
							
						$persstr = explode("_",$pers);
						if(is_array($persstr) && count($persstr)>0){
							$pers= $persstr[0];
						}
						else{
							$pers= $persstr;
						}
				$htmldata.=$pers.'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Comment about Performence Status</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['PatientDetail']['performance_comment'])?$patientalldeatils['PatientDetail']['performance_comment']:'').'</label>
					</div>
				</div>
			</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>Social History</h2>
				<div class="clear"></div>
			</div>
			<div class="clear5"></div>
			<div class="w770">
				<h3>Smoking</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Quantity</label>
					</div>
					<div class="width2">
						<label class="blue">Period</label>
					</div>
				</div>';
				
					$smokings = isset($patientalldeatils['Socialactivity']['Smoking'])?$patientalldeatils['Socialactivity']['Smoking']:array();
					if(is_array($smokings) && count($smokings)>0){
						foreach($smokings as $smoking){
							$quantiry = isset($smoking['quantity'])?$smoking['quantity']." in a day":'0 in a day';
							
							$Periodstartmonth = isset($smoking['frommonth'])?$smoking['frommonth']:'1';
							$Periodstartyear = isset($smoking['fromyear'])?$smoking['fromyear']:'1973';
							$startdate = "1-".$Periodstartmonth."-".$Periodstartyear;
							
							$Periodendmonth = isset($smoking['tomonth'])?$smoking['tomonth']:'1';
							$Periodendyear = isset($smoking['toyear'])?$smoking['toyear']:'1977';
							$enddate = "1-".$Periodendmonth."-".$Periodendyear;
							
							$preriodstr = date("M Y",strtotime($startdate));
							$preriodend = date("M Y",strtotime($enddate));
							$htmldata.='<div class="row">
									<div class="width1">
										<label><?=$quantiry?></label>
									</div>
									<div class="width2">
										<label>'.$preriodstr." - ".$preriodend.'</label>
									</div>
								</div>';
						}
					}
				
				$htmldata.='<div class="clear20"></div>
				<h3>Alcohol</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Alcohol type</label>
					</div>
					<div class="width2">
						<label class="blue">quantity</label>
					</div>
				</div>';
				
					$alcohals = isset($patientalldeatils['Socialactivity']['Alcohol'])?$patientalldeatils['Socialactivity']['Alcohol']:array();
					if(is_array($alcohals) && count($alcohals)>0){
						foreach($alcohals as $alcohal){
							$name=isset($alcohal['alcoholname'])?$alcohal['alcoholname']:'';
							$quant=isset($alcohal['quantity'])?$alcohal['quantity']." ML in a day":"0 ML in a day";
						
							$htmldata.='<div class="row">
								<div class="width1">
									<label>'.$name.'</label>
								</div>
								<div class="width2">
									<label>'.$quant.'</label>
								</div>
							</div>';
						}
					}
					
				$htmldata.='<div class="row">
					<div class="width1">
						<label class="blue">Period</label>
					</div>
					<div class="width2">
						<label>';
						
							$startmonth = isset($patientalldeatils['Socialactivity']['alcohalstartmonth'])?$patientalldeatils['Socialactivity']['alcohalstartmonth']:'1';
							$startyear = isset($patientalldeatils['Socialactivity']['alcohalstartyear'])?$patientalldeatils['Socialactivity']['alcohalstartyear']:'1973';
							$startdate = "1-".$startmonth."-".$startyear;
							
							$endmonth = isset($patientalldeatils['Socialactivity']['alcohalendmonth'])?$patientalldeatils['Socialactivity']['alcohalendmonth']:'1';
							$endyear = isset($patientalldeatils['Socialactivity']['alcohalendyear'])?$patientalldeatils['Socialactivity']['alcohalendyear']:'1977';
							$enddate = "1-".$endmonth."-".$endyear;
							
							$preriodstr = date("M Y",strtotime($startdate));
							$preriodend = date("M Y",strtotime($enddate));
							$ddd = $preriodstr." - ".$preriodend;
					$htmldata.=$ddd.'</label>
					</div>
				</div>
				<div class="clear20"></div>
				<h3>Drugs</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Drug Type</label>
					</div>
					<div class="width2">
						<label class="blue">Quantity</label>
					</div>
				</div>';
				
					$drugss = isset($patientalldeatils['Socialactivity']['Drug'])?$patientalldeatils['Socialactivity']['Drug']:array();
					if(is_array($drugss) && count($drugss)>0){
						foreach($drugss as $drug){
							$name=isset($drug['drugname'])?$drug['drugname']:'';
							$quant=isset($drug['quantity'])?$drug['quantity']." in a day":'0 in a day';
							
							$htmldata.='<div class="row">
								<div class="width1">
									<label>'.$name.'</label>
								</div>
								<div class="width2">
									<label>'.$quant.'</label>
								</div>
							</div>';
						}
					}
				
				$htmldata.='<div class="row">
					<div class="width1">
						<label class="blue">Additional Comments</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['Socialactivity']['comment'])?$patientalldeatils['Socialactivity']['comment']:'').'</label>
					</div>
				</div>
			</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>About the Illness</h2>
				<div class="clear"></div>
			</div>
			<div class="clear5"></div>
			<div class="w770">
				<div class="row">
					<div class="width1">
						<label class="blue">Principal Diagnosis</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['AboutIllness']['PrincipleDiagonisises']['name'])?$patientalldeatils['AboutIllness']['PrincipleDiagonisises']['name']:'').'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Date of Diagnosis</label>
					</div>
					<div class="width2">
						<label>';
							$startmonth = isset($patientalldeatils['AboutIllness']['startdiagomonth'])?$patientalldeatils['AboutIllness']['startdiagomonth']:'1';
							$startyear = isset($patientalldeatils['AboutIllness']['startdiagoyear'])?$patientalldeatils['AboutIllness']['startdiagoyear']:'1973';
							$startday = isset($patientalldeatils['AboutIllness']['startdiagoday'])?$patientalldeatils['AboutIllness']['startdiagoday']:'1';
							$startdate = $startday."-".$startmonth."-".$startyear;
							
							$preriodstr = date("M d, Y",strtotime($startdate));
							
					$htmldata.=$preriodstr.'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Give a detailed history of how diagnosis was made</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['AboutIllness']['diagodetails'])?$patientalldeatils['AboutIllness']['diagodetails']:'-').'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">What is your oncologists recommendation?</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['AboutIllness']['diagorecomandation'])?$patientalldeatils['AboutIllness']['diagorecomandation']:'-').'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Last Examination Date</label>
					</div>
					<div class="width2">
						<label>';
						
							$startmonth = isset($patientalldeatils['AboutIllness']['enddiagomonth'])?$patientalldeatils['AboutIllness']['enddiagomonth']:'1';
							$startyear = isset($patientalldeatils['AboutIllness']['enddiagoyear'])?$patientalldeatils['AboutIllness']['enddiagoyear']:'1973';
							$startday = isset($patientalldeatils['AboutIllness']['enddiagoday'])?$patientalldeatils['AboutIllness']['enddiagoday']:'1';
							$startdate = $startday."-".$startmonth."-".$startyear;
							
							$preriodstr = date("M d, Y",strtotime($startdate));
					$htmldata.=$preriodstr.'</label>
					</div>
				</div>
				<div class="row">
					<div class="width1">
						<label class="blue">Do you have results of any tumor markers? </label>
					</div>
					<div class="width2">
						<label>'.((isset($patientalldeatils['AboutIllness']['istumarmarker']) && $patientalldeatils['AboutIllness']['istumarmarker']==1)?'Yes':'No').'</label>
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
				</div>';
				
					$tumarMarkers = isset($patientalldeatils['AboutIllness']['TumarMarker'])?$patientalldeatils['AboutIllness']['TumarMarker']:array();
					if(is_array($tumarMarkers) && count($tumarMarkers)>0){
						foreach($tumarMarkers as $tumarMarker){
							$name = isset($tumarMarker['name'])?$tumarMarker['name']:'';
							$result = isset($tumarMarker['tumorresult'])?$tumarMarker['tumorresult']:'';
							$startmonth = isset($tumarMarker['tumormonth'])?$tumarMarker['tumormonth']:'1';
							$startyear = isset($tumarMarker['tumoryear'])?$tumarMarker['tumoryear']:'1973';
							$startdate = "1-".$startmonth."-".$startyear;
							
							$dates = date("M, Y",strtotime($startdate));
							
							$htmldata.='<div class="row">
								<div class="width1">
									<label>'.$name.'</label>
								</div>
								<div class="width1">
									<label>'.$dates.'</label>
								</div>
								<div class="width3">
									<label>'.$result.'</label>
								</div>
							</div>';
						}
					}
			$htmldata.='</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>Past History</h2>
				<div class="clear"></div>
			</div>
			<div class="clear5"></div>
			<div class="w770">
				<h3>Any past medical or cancer history?</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Diagnosis</label>
					</div>
					<div class="width2">
						<label class="blue">Date of diagnosis</label>
					</div>
				</div>';
				
				$cancerhistories = isset($patientalldeatils['PatientPastHistory']['cancer_history'])?unserialize($patientalldeatils['PatientPastHistory']['cancer_history']):array();
					if(is_array($cancerhistories) && count($cancerhistories)>0){
						$diagnosis_names = $cancerhistories['diagnosis_name'];
						$diagnosis_months = $cancerhistories['diagnosis_month'];
						$diagnosis_years = $cancerhistories['diagnosis_year'];
						
						for($i=0;$i<count($diagnosis_names);$i++){
							$diagnosis_name = $diagnosis_names[$i];
							$diagnosis_month = isset($diagnosis_months[$i])?$diagnosis_months[$i]:'1';
							$diagnosis_year = isset($diagnosis_years[$i])?$diagnosis_years[$i]:'1977';
							
							$startdate = "1-".$diagnosis_month."-".$diagnosis_year;
							$dates = date("M, Y",strtotime($startdate));
							
							$htmldata.='<div class="row">
								<div class="width1">
									<label>'.$diagnosis_name.'</label>
								</div>
								<div class="width2">
									<label>'.$dates.'</label>
								</div>
							</div>';
						}
					}
					
				$htmldata.='<div class="clear20"></div>
				
				<h3>Any past surgical history?</h3>
				<div class="row">
					<div class="width1">
						<label class="blue">Surgical</label>
					</div>
					<div class="width2">
						<label class="blue">Date of Surgical</label>
					</div>
				</div>';
				
					$surgicalhistories = isset($patientalldeatils['PatientPastHistory']['surgical_history'])?unserialize($patientalldeatils['PatientPastHistory']['surgical_history']):array();
					if(is_array($surgicalhistories) && count($surgicalhistories)>0){
						$surgery_names =$surgicalhistories['surgery_name'];
						$surgery_months =$surgicalhistories['surgery_month'];
						$surgery_years =$surgicalhistories['surgery_year'];
						
						for($j=0;$j<count($surgery_names);$j++){
							$surgery_name = $surgery_names[$j];
							$surgery_month = isset($surgery_months[$j])?$surgery_months[$j]:'1';
							$surgery_year =isset($surgery_years[$j])?$surgery_years[$j]:'1977';
							
							$startdate = "1-".$surgery_month."-".$surgery_year;
							$dates = date("M, Y",strtotime($startdate));
							
						$htmldata.='<div class="row">
								<div class="width1">
									<label>'.$surgery_name.'</label>
								</div>
								<div class="width2">
									<label>'.$dates.'</label>
								</div>
							</div>';
						}
					}
				
				$htmldata.='<div class="clear20"></div>
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
				</div>';
				
					$hospitalizations = isset($patientalldeatils['PatientPastHistory']['hospitalization'])?unserialize($patientalldeatils['PatientPastHistory']['hospitalization']):array();
					if(is_array($hospitalizations) && count($hospitalizations)>0){
						$hospitaliz_resones = $hospitalizations['hospitaliz_resone'];
						$hospitaliz_months = $hospitalizations['hospitaliz_month'];
						$hospitaliz_years = $hospitalizations['hospitaliz_year'];
						$hospitaliz_dayss = $hospitalizations['hospitaliz_days'];
						
						for($k=0;$k<count($hospitaliz_resones);$k++){
							$hospitaliz_resone = isset($hospitaliz_resones[$k])?$hospitaliz_resones[$k]:'';
							$hospitaliz_month = isset($hospitaliz_months[$k])?$hospitaliz_months[$k]:'1';
							$hospitaliz_year = isset($hospitaliz_years[$k])?$hospitaliz_years[$k]:'1977';
							$hospitaliz_days = isset($hospitaliz_dayss[$k])?$hospitaliz_dayss[$k]:'0';
							
							$startdate = "1-".$surgery_month."-".$surgery_year;
							$dates = date("M, Y",strtotime($startdate));
							
							$htmldata.='<div class="row">
								<div class="width1">
									<label>'.$hospitaliz_resone.'</label>
								</div>
								<div class="width1">
									<label>'.$dates.'</label>
								</div>
								<div class="width3">
									<label>'.$hospitaliz_days.'Days</label>
								</div>
							</div>';
						}	
					}
				
				$htmldata.='<div class="clear20"></div>
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
				</div>';
				
					$family_cancer_histories = isset($patientalldeatils['PatientPastHistory']['family_cancer_history'])?unserialize($patientalldeatils['PatientPastHistory']['family_cancer_history']):array();
					if(is_array($family_cancer_histories) && count($family_cancer_histories)>0){
						$relation_withs = $family_cancer_histories['relation_with'];
						$cancer_types = $family_cancer_histories['cancer_type'];
						$age_of_diagonisiss = $family_cancer_histories['age_of_diagonisis'];
						
						for($l=0;$l<count($relation_withs);$l++){
							$relation_with = isset($relation_withs[$l])?$relation_withs[$l]:'';
							$cancer_type = isset($cancer_types[$l])?$cancer_types[$l]:'';
							$age_of_diagonisis = isset($age_of_diagonisiss[$l])?$age_of_diagonisiss[$l]:'0';
							
								$htmldata.='<div class="row">
									<div class="width1">
										<label>'.$relation_with.'</label>
									</div>
									<div class="width1">
										<label>'.$cancer_type.'</label>
									</div>
									<div class="width3">
										<label>'.$age_of_diagonisis.' Years</label>
									</div>
								</div>';
						}
					}
				
				$htmldata.='<div class="row">
					<div class="width1">
						<label class="blue">Any specific comment about the medical history</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['PatientPastHistory']['comments'])?$patientalldeatils['PatientPastHistory']['comments']:'').'</label>
					</div>
				</div>
			</div>
		</div>
		<div class="details">
			<div class="heiding">
				<h2>Test Reports</h2>
				<div class="clear"></div>
			</div>
			<div class="clear5"></div>
			<div class="w770">
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
				<h3>Blood &amp; Laboratory Tests (Hemoglobin, CBC, BMP etc.)</h3>';
				
					$bloodreports = isset($patientalldeatils['PatientDocument']['bloodreport'])?unserialize($patientalldeatils['PatientDocument']['bloodreport']):array();
					if(is_array($bloodreports) && count($bloodreports)>0){
						$tests = isset($bloodreports['test'])?$bloodreports['test']:array();
						$monts = isset($bloodreports['month'])?$bloodreports['month']:array();
						$yearss = isset($bloodreports['year'])?$bloodreports['year']:array();
						$flnames = isset($bloodreports['flname'])?$bloodreports['flname']:array();
						$flispresents = isset($bloodreports['flispresent'])?$bloodreports['flispresent']:array();
						for($i=0; $i<count($tests);$i++){
							$test = isset($tests[$i])?$tests[$i]:'';
							$mont = isset($monts[$i])?$monts[$i]:'1';
							$year = isset($yearss[$i])?$yearss[$i]:'1977';
							$flname = isset($flnames[$i])?$flnames[$i]:'';
							$flispresent = isset($flispresents[$i])?$flispresents[$i]:'0';
							$comments="";
							if($flispresent==1){
								$comments="document not uploaded"; //comment sections
							}
							
							$startdate = "1-".$mont."-".$year;
							$dates = date("M, Y",strtotime($startdate));
							
							$htmldata.='<div class="row">
									<div class="width1">
										<label>'.$test.'</label>
									</div>
									<div class="width1">
										<label>'.$dates.'</label>
									</div>
									<div class="width3">';
										if($flispresent==1){
											$htmldata.='<label>'.$comments.'</label>';
										}
										else{
											$htmldata.='<span class="reportCard">'.$flname.'</span>';
										}
									$htmldata.='</div>
								</div>';
						}
					}
				
				$htmldata.='<div class="clear20"></div>
				<h3>Imaging Tests (X-Ray, CT Scan, MRI etc.)</h3>';
				
					$imagingreports = isset($patientalldeatils['PatientDocument']['imagingreport'])?unserialize($patientalldeatils['PatientDocument']['imagingreport']):array();
					if(is_array($imagingreports) && count($imagingreports)>0){
						$imgtests = isset($imagingreports['test'])?$imagingreports['test']:array();
						$imgmonths = isset($imagingreports['month'])?$imagingreports['month']:array();
						$imgyears = isset($imagingreports['year'])?$imagingreports['year']:array();
						$imgfilenames = isset($imagingreports['flname'])?$imagingreports['flname']:array();
						$imgfileispresents = isset($imagingreports['flispresent'])?$imagingreports['flispresent']:array();
						for($k=0;$k<count($imgtests);$k++){
							$imgtest = isset($imgtests[$k])?$imgtests[$k]:'';
							$imgmonth = isset($imgmonths[$k])?$imgmonths[$k]:'1';
							$imgyear = isset($imgyears[$k])?$imgyears[$k]:'1977';
							$imgfilename = isset($imgfilenames[$k])?$imgfilenames[$k]:'';
							$imgfileispresent = isset($imgfileispresents[$k])?$imgfileispresents[$k]:'0';
							$comments='';
							if($imgfileispresent==1){
								$comments="document not uploaded";//
							}
							$startdate = "1-".$imgmonth."-".$imgyear;
							$dates = date("M, Y",strtotime($startdate));
							
							$htmldata.='<div class="row">
									<div class="width1">
										<label>'.$imgtest.'</label>
									</div>
									<div class="width1">
										<label>'.$dates.'</label>
									</div>
									<div class="width3">';
									if($imgfileispresent==1){
										$htmldata.='<label>'.$comments.'</label>';
									}
									else{
										$htmldata.='<span class="reportCard">'.$imgfilename.'</span>';
									}
									$htmldata.='</div>
								</div>';
						}	
					}
				
				$htmldata.='<div class="clear20"></div>
				<h3>Pathology Tests (Biopsy, FNA etc.)</h3>';
				
					$pathologyreports = isset($patientalldeatils['PatientDocument']['pathologyreport'])?unserialize($patientalldeatils['PatientDocument']['pathologyreport']):array();
					if(is_array($pathologyreports) && count($pathologyreports)>0){
						$pathtests = isset($pathologyreports['test'])?$pathologyreports['test']:array();
						$pathmonts = isset($pathologyreports['month'])?$pathologyreports['month']:array();
						$pathyears = isset($pathologyreports['year'])?$pathologyreports['year']:array();
						$pathflnames = isset($pathologyreports['flname'])?$pathologyreports['flname']:array();
						$pathflispresents = isset($pathologyreports['flispresent'])?$pathologyreports['flispresent']:array();
						for($i=0; $i<count($pathtests);$i++){
							$pathtest = isset($pathtests[$i])?$pathtests[$i]:'';
							$pathmont = isset($pathmonts[$i])?$pathmonts[$i]:'1';
							$pathyear = isset($pathyears[$i])?$pathyears[$i]:'1977';
							$pathflname = isset($pathflnames[$i])?$pathflnames[$i]:'';
							$pathflispresent = isset($pathflispresents[$i])?$pathflispresents[$i]:'0';
							$comments='';
							if($pathflispresent==1){
								$comments="document not uploaded";//
							}
							$startdate = "1-".$pathmont."-".$pathyear;
							$dates = date("M, Y",strtotime($startdate));
							
							$htmldata.='<div class="row">
									<div class="width1">
										<label>'.$pathtest.'</label>
									</div>
									<div class="width1">
										<label>'.$dates.'</label>
									</div>
									<div class="width3">';
									if($pathflispresent==1){
										$htmldata.='<label>'.$comments.'</label>';
									}
									else{
										$htmldata.='<span class="reportCard">'.$pathflname.'</span>';
									}
								$htmldata.='</div>
								</div>';
						}
					}
				
				$htmldata.='<div class="row">
					<div class="width1">
						<label class="blue">Any specific questions you want to ask the doctor</label>
					</div>
					<div class="width2">
						<label>'.(isset($patientalldeatils['PatientDocument']['comment'])?$patientalldeatils['PatientDocument']['comment']:'').'</label>
					</div>
				</div>
			</div>
		</div>';
	
	$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
 
	$pdf->AddPage();
	// echo $htmldata;
	 
	/*$html = '</pre>
	<h1>hello world</h1>
	';*/
	$html = '<html><head><title>My Questionnaire</title>
		<link rel="stylesheet" href="'.FULL_BASE_URL.$this->base.'/css/reset.css" type="text/css" />
		<link rel="stylesheet" href="'.FULL_BASE_URL.$this->base.'/css/screen.css" type="text/css" />
		</head><body>
		<div class="Wrapper">
		  <div class="questionnaireHeading">
			<div class="container">
			<div class="clear"></div>
				<div class="TextPart"></div>
				<div class="clear"></div>
			</div>
		  </div>
		  <div class="questionnaireBody">
			<div class="container mmm">
				<div class="container">
					<div class="statusPart">
					</div>
					<div class="questionPart">
						<div class="clear"></div>
	';
	 $html.=$htmldata;
	$html.='<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
		<div class="clear"></div>
		</div>
	  </div>
	</div>
	</body></html>';
	echo $html;
	//die();
	$pdf->writeHTML($html, true, false, true, false, '');
	 
	$pdf->lastPage();
	 
	//echo $pdf->Output(APP . 'files/pdf' . DS . 'test.pdf', 'F');
	ob_end_clean();
	//$pdf->Output();
	$pdf->Output('example_001.pdf', 'D');
	
?>