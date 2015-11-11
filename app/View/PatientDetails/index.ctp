
<?php 
//pr($socialactivity);
//configure the varialbe
$pdid='';
$pdname='';
$pdgender='';
$pdmonth=0;
$pdday=0;
$pdyear=0;
$pdcity='';
$pdstate='';
$pdcountryid=0;
$pdweight='';
$pdheight='';
$pddrugallergy=array(array('name'=>'','reaction'=>''));
$pdperformanceoption=0;
$pdpercomments='';

if(isset($patientDetails['PatientDetail']) && is_array($patientDetails['PatientDetail']) && count($patientDetails['PatientDetail'])>0){
	$pdid=$patientDetails['PatientDetail']['id'];
	$pdname=$patientDetails['PatientDetail']['name'];
	$pdgender=$patientDetails['PatientDetail']['gender'];
	$pdmonth=$patientDetails['PatientDetail']['dob_month'];
	$pdday=$patientDetails['PatientDetail']['dob_day'];
	$pdyear=$patientDetails['PatientDetail']['dob_year'];
	$pdcity=$patientDetails['PatientDetail']['city'];
	$pdstate=$patientDetails['PatientDetail']['state'];
	$pdcountryid=$patientDetails['PatientDetail']['country_id'];
	$pdweight=$patientDetails['PatientDetail']['weight'];
	$pdheight=$patientDetails['PatientDetail']['height'];
	$pdpercomments=$patientDetails['PatientDetail']['performance_comment'];
	$optoptions= explode("_",$patientDetails['PatientDetail']['performance']);
	$pdperformanceoption=(count($optoptions)>0)?$optoptions[1]:0;
}
if(isset($patientDetails['DrugAlergy']) && is_array($patientDetails['DrugAlergy']) && count($patientDetails['DrugAlergy'])>0){
	$pddrugallergy=$patientDetails['DrugAlergy'];
}
?>
<div id="pddetailss" class="pertionalcontainer">
<h2>Patients Details</h2>
<?php echo $this->Form->create('PatientDetail',array('action'=>'add','id'=>'pddetailsfrm'));
	echo $this->Form->hidden('id',array("id"=>"pdid","value"=>$pdid));
?>
            
			<div class="pertionalDetails">
            	
				<?php echo $this->Form->input('name',array(
					'div'=>'name',
					'label'=>array(
						'class'=>'blue',
						'text'=>'* Full Name'
					),
					'class'=>'frmMfields',
					'value'=>$pdname,
				));  
					echo $this->Form->input('gender',array(
					'options'=>array('male'=>'Male','female'=>'Female'),
					'default'=>'male',
					'div'=>'gender ml20',
					'label'=>array('class'=>'blue','text'=>'* Gender'),
					'value'=>$pdgender
					));
				?>
                <div class="clear"></div>
                <div class="name">
                	<label class="blue">* Date of Birth</label>
                    
					<?php 
						$months=array('Month');
						$days=array('Day');
						$years=array('Year');
						for($i=1;$i<13;$i++){
							//array_push($months,$i);
							$months[$i]=$i;
						}
						for($j=1;$j<32;$j++){
							//array_push($days,$j);
							$days[$j]=$j;
						}
						for($k=(date('Y')-90);$k<date('Y');$k++){
							//array_push($years,$k);
							$years[$k]=$k;
						}
						echo $this->Form->input('dob_month',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'oneThird frmMfields js-patientdb',
							'id'=>'pdmonth',
							'value'=>$pdmonth
						));
						echo $this->Form->input('dob_day',array(
							'div'=>false,
							'label'=>false,
							'options'=>$days,
							'default'=>'0',
							'class'=>'oneThird frmMfields js-patientdb',
							'id'=>'pdday',
							'value'=>$pdday,
						));
						echo $this->Form->input('dob_year',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'oneThird frmMfields js-patientdb',
							'id'=>'pdyear',
							'value'=>$pdyear,
						));
					?>
					
                </div>
                <div class="clear"></div>
                <div class="place">
                	<label class="blue">*Place</label>
                    
					<?php
					echo $this->Form->input('city',array(
							'div'=>false,
							'label'=>false,
							'type'=>'text',
							'placeholder'=>'City',
							'id'=>'pdcity',
							'class'=>'frmMfields',
							'value'=>$pdcity,
						));
						
					echo $this->Form->input('state',array(
							'div'=>false,
							'label'=>false,
							'class'=>'ml14',
							'type'=>'text',
							'placeholder'=>'State / Province',
							'id'=>'pdstate',
							'class'=>'frmMfields',
							'value'=>$pdstate,
						));
					
					echo $this->Form->input('country_id',array(
						'div'=>false,
						'label'=>false,
						'options'=>$countries,
						'default'=>'0',
						'id'=>'pdcountry',
						'class'=>'frmMfields',
						'value'=>$pdcountryid,
					));
					?>
                </div>
                <div class="clear"></div>
                
				<?php 
					echo $this->Form->input('weight',array(
						'div'=>'gender',
						'label'=>array('text'=>'* Weight','class'=>'blue'),
						'placeholder'=>'0.0',
						'class'=>'weight frmMfields',
						'type'=>'text',
						'id'=>'pdweight',
						'value'=>$pdweight,
					));
					echo $this->Form->input('height',array(
						'div'=>'gender ml20',
						'label'=>array('text'=>'* Height','class'=>'blue'),
						'placeholder'=>'00',
						'class'=>'height frmMfields',
						'type'=>'text',
						'id'=>'pdheight',
						'value'=>$pdheight,
					));
				?>
                <div class="clear"></div>
            </div>
            <div class="dragDetails" >
            	<h3>Drug Allergy</h3>
                <p class="mb20">Please provide the following details if the patient has drug allergy</p>
                <div class="clear"></div>
				<?php 
					
					if(count($pddrugallergy)>0){
						for($i=0;$i<count($pddrugallergy);$i++){
							$alergy = $pddrugallergy[$i];
							if($i==0){
							?>
								<div class="drag">
									<label class="blue">Drug</label>
									<input type="text" name='pddralergyname[]' value="<?=$alergy['name']?>">
								</div>
								<div class="name ml20">
									<label class="blue">Reaction</label>
									<input type="text" name='pddralergyrection[]' value="<?=$alergy['reaction']?>">
								</div>
								<div class="clear10"></div>
								
								<div id="pddrgalergy">
							<?php
							}
							else{
							?>
								<div class="drag">
									<input type="text" name="pddralergyname[]" value="<?=$alergy['name']?>">
								</div>
								<div class="name ml20">
									<input type="text" name="pddralergyrection[]" value="<?=$alergy['reaction']?>">
								</div>
								<div class="clear10"></div>
							<?php
							}
						}
						echo "</div>";
					}
				?>
                
                
                <a href="javascript:void(0)" class="greenText ml20 js-addmoredrug" id='addmoredrug'>+ Add More</a>
                <div class="clear"></div>
            </div>
			
            <div class="performance">
           	  <h3 class="mb20">Performance</h3>
              <label class="blue">* Current performance status:</label>
              <div class="clear10"></div>
              <div class="w540">
				<label><input type="radio" name="RadioGroup1" value="0" <?php if($pdperformanceoption==0){ echo "checked";}?> />Patient is fully active, able to carry on all pre-disease performance without restriction.</label>
				<label><input type="radio" name="RadioGroup1" value="1" <?php if($pdperformanceoption==1){ echo "checked";}?> />Patient is restricted in physically strenuous activity but ambulatory and able to carry out work of a light or sedentary nature, e.g., light house work, office work</label>
                <label><input type="radio" name="RadioGroup1" value="2" <?php if($pdperformanceoption==2){ echo "checked";}?>/>Patient is ambulatory and capable of all self-care but unable to carry out any work activities. Up and about more than 50% of waking hours (excluding the normal sleeping time).</label>
				<label><input type="radio" name="RadioGroup1" value="3" <?php if($pdperformanceoption==3){ echo "checked";}?>/>Patient is capable of only limited self-care, confined to bed or chair more than 50% of waking hours (excluding the normal sleeping time).
</label>
                <label><input type="radio" name="RadioGroup1" value="4" <?php if($pdperformanceoption==4){ echo "checked";}?> />Patient is completely disabled. Cannot carry on any self-care. Totally confined to bed or chair.</label>
                <label class="blue">Comments about performance status</label>
                
				<?php 
					echo $this->Form->input('performance_comment',array("type"=>"textarea","value"=>$pdpercomments));
				?>
              </div>
            </div>
            <div class="clear35"></div>
            <a href="javascript:void(0)" class="backBtn disable">Back</a>
            <input type="button" class="nextBtn js-nextview" value="Next" id="nextviewsa">
			<input type="submit" class="saveBtn js-pdfrmsmt" value="Save" name="save" id="pdsaved">
			
</form>
</div>

<!-- social activity html part -->

<?php
	$said='';
	$sacomment='';
	$saalhlstartmonth=0;
	$saalhlstartyear=0;
	$saalhlendmonth=0;
	$saalhlendyear=0;
	
	$sasmkquantity='';
	$sasmkstartmonth=0;
	$sasmkstartyear=0;
	$sasmkendmonth=0;
	$sasmkendyear=0;
	
	$saalcohals=array(array('alcoholname'=>'','quantity'=>0,'takingunit'=>0));
	
	$sadrugs =array(array('drugname'=>'','quantity'=>''));
	
	if(isset($socialactivity['Socialactivity']) && is_array($socialactivity['Socialactivity']) && count($socialactivity['Socialactivity'])>0){
		$said=$socialactivity['Socialactivity']['id'];
		$sacomment=$socialactivity['Socialactivity']['comment'];
		$saalhlstartmonth=$socialactivity['Socialactivity']['alcohalstartmonth'];
		$saalhlstartyear=$socialactivity['Socialactivity']['alcohalstartyear'];
		$saalhlendmonth=$socialactivity['Socialactivity']['alcohalendmonth'];
		$saalhlendyear=$socialactivity['Socialactivity']['alcohalendyear'];
	}
	//alcohal section
	if(isset($socialactivity['Alcohol']) && is_array($socialactivity['Alcohol']) && count($socialactivity['Alcohol'])>0){
		$saalcohals = $socialactivity['Alcohol'];
	}
	//drug sections
	if(isset($socialactivity['Drug']) && is_array($socialactivity['Drug']) && count($socialactivity['Drug'])>0){
		$sadrugs = $socialactivity['Drug'];
	}
	//smoking sections
	if(isset($socialactivity['Smoking']) && is_array($socialactivity['Smoking']) && count($socialactivity['Smoking'])>0){
		$smiking = $socialactivity['Smoking'][0];
		$sasmkquantity=$smiking['quantity'];
		$sasmkstartmonth=$smiking['frommonth'];
		$sasmkstartyear=$smiking['fromyear'];
		$sasmkendmonth=$smiking['tomonth'];
		$sasmkendyear=$smiking['toyear'];
	}
?>
<div id="socialActivity" class="socialActivity">
	<?php 
		echo $this->Form->create('Socialactivity',array("id"=>"safrms"));
		echo $this->Form->hidden('id',array('value'=>$said,'id'=>'said'));
	?>
	<h2>Social History</h2>
            <div class="Smoking">
            	<h3>Smoking</h3>
                <p class="mb10">Please provide the following details if the patient has or had smoking habits.</p>
                <div class="clear"></div>
                <div class="quantity">
                	<label class="blue">Quantity</label>
                    <input type="text" placeholder="0" name="data[Smoking][quantity]" class="savaliedatefields" value="<?=$sasmkquantity?>">
                    <select>
                    	<option value="0">In a Day</option>
                    </select>
                </div>
                <div class="period ml20">
                	<label class="blue">Period</label>
					
					<?php 
						echo $this->Form->input('Smoking.frommonth',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month savaliedatefields',
							'id'=>'sasmkstartmonth',
							'value'=>$sasmkstartmonth
						));
						
						echo $this->Form->input('Smoking.fromyear',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year savaliedatefields',
							'id'=>'sasmkstartyear',
							'value'=>$sasmkendyear
						));
					
					?>
					<p class="dash">-</p>
					<?php 
						echo $this->Form->input('Smoking.tomonth',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month savaliedatefields',
							'id'=>'sasmkendmonth',
							'value'=>$sasmkendmonth
						));
						
						echo $this->Form->input('Smoking.toyear',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year savaliedatefields',
							'id'=>'sasmkendyear',
							'value'=>$sasmkendyear
						));
					
					?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="alcohal">
            	<h3>Alcohol</h3>
                <p class="mb10">Please provide the following details if the patient consumes or used to consume alcohol.</p>
                
				<?php 
					if(count($saalcohals)>0){
						for($i=0;$i<count($saalcohals);$i++){
							$alcohalsdtls=$saalcohals[$i];
							if($i==0){
							?>
								<div class="gender">
									<label class="blue">Alcohol Type</label>
									<input type="text" name="saalcohaltype[]" value="<?=$alcohalsdtls['alcoholname']?>">
								</div>
								<div class="quantity ml20">
									<label class="blue">Quantity</label>
									<input type="text" name="saalcohalquantity[]" placeholder="0" class="ml" value="<?=$alcohalsdtls['quantity']?>" >
									<select name="saalcoholunit[]">
										<option value="0">In a Day</option>
									</select>
								</div>
								<div class="clear10"></div>
								<div id="morealcoholdiv">
							<?php
							}
							else{
							?>
								<div class="gender">
									<input type="text" name="saalcohaltype[]" value="<?=$alcohalsdtls['alcoholname']?>">
								</div>
								<div class="quantity ml20">
									<input type="text" name="saalcohalquantity[]" placeholder="0" class="ml" value="<?=$alcohalsdtls['quantity']?>">
									<select name="saalcoholunit[]">
										<option value="0">In a Day</option>
									</select>
								</div>
								<div class="clear10"></div>
							<?php
							}
						}
						echo "</div>";
					}
				?>
			   <div class="clear10"></div>
                <a href="javascript:void(0)" class="greenText ml20 js-saalcoholmore" id="saalcoholmore">+ Add More</a>
                <div class="clear15"></div>
                
				<div class="period">
                	<label class="blue">Period</label>
					<?php 
						echo $this->Form->input('alcohalstartmonth',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month',
							'id'=>'saalhlstartmonth',
							'value'=>$saalhlstartmonth
						));
						
						echo $this->Form->input('alcohalstartyear',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year',
							'id'=>'saalhlstartyear',
							'value'=>$saalhlstartyear
						));
					
					?>
					<p class="dash">-</p>
					<?php 
						echo $this->Form->input('alcohalendmonth',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month',
							'id'=>'saalhlendmonth',
							'value'=>$saalhlendmonth
						));
						
						echo $this->Form->input('alcohalendyear',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year',
							'id'=>'saalhlendyear',
							'value'=>$saalhlendyear
						));
					
					?>
					
                </div>
                <div class="clear"></div>
            </div>
            <div class="drug">
            	<h3>Drugs</h3>
                <p class="mb10">Please provide the following details if the patient consumes drugs</p>
               
				<?php 
					if(count($sadrugs)>0){
						for($i=0;$i<count($sadrugs);$i++){
							$drag=$sadrugs[$i];
							if($i==0){
							?>
								<div class="gender">
									<label class="blue">Drug Type</label>
									<input type="text" name="samoredrugtype[]" value="<?=$drag['drugname']?>">
								</div>
								<div class="quantity ml20">
									<label class="blue">Quantity</label>
									<input type="text" name="samoredrugquantity[]" placeholder="0" class="ml" value="<?=$drag['quantity']?>">
									<select name="samoredrugunit[]">
										<option value="0">In a Day</option>
									</select>
								</div>
								<div class="clear10"></div>
								 
								<div id="moredrugdiv">
								
							<?php
							}
							else{
							?>
								<div class="gender">
									<input type="text" name="samoredrugtype[]" value="<?=$drag['drugname']?>">
								</div>
								<div class="quantity ml20">
									<input type="text" name="samoredrugquantity[]" placeholder="0" class="ml" value="<?=$drag['quantity']?>">
									<select name="samoredrugunit[]">
										<option value="0">In a Day</option>
									</select>
								</div>
								<div class="clear10"></div>
							<?php
							}
						}
						echo "</div>";
					}
				?>
				
                <a href="javascript:void(0)" class="greenText ml20 js-sadrugmore" id="sadrugmore">+ Add More</a>
                <div class="clear"></div>
            </div>
            
			<div class="additional">
            	<div class="w540">
                	<label class="blue">Additional Comments</label>
                	<p>Do you want to tell us anyhing about the addiction</p>
          
					<?php 
						echo $this->Form->input('comment',array("type"=>"textarea","value"=>$sacomment));
					?>
                </div>
            </div>
            <div class="clear35"></div>
			
            <a href="javascript:void(0)" class="backBtn js-prevdivview" id="sabackbtn">Back</a>
            <input type="button" class="nextBtn" value="Next" id="sanextview">
			<input type="submit" class="saveBtn js-sasaved" value="Save" name="save" id="sasaved">
			
	</form>
</div>

<!-- script section for this page become one page -->