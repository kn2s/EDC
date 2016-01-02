<?php 
//pr($patientDetails);
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

// selected class
$clss="current";

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
	
	//$clss="done";
}
if(isset($patientDetails['DrugAlergy']) && is_array($patientDetails['DrugAlergy']) && count($patientDetails['DrugAlergy'])>0){
	$pddrugallergy=$patientDetails['DrugAlergy'];
}
?>

<div class="statusPart">
	<ul>
		<?php
			$clsss = "js-preview done";
			$socialcls='';
			$illness='';
			$pasthis='';
			$updocts='';
			$review='';
			
			switch($lastquestionformno){
				case 0:
					break;
				case 1:
					$socialcls=$clsss;
					break;
				case 2:
					$socialcls=$illness=$clsss;
					break;
				case 3:
					$socialcls=$illness=$pasthis=$clsss;
					break;
				case 4:
					$socialcls=$illness=$pasthis=$updocts=$clsss;
					break;
				case 5:
					$socialcls=$illness=$pasthis=$updocts=$review=$clsss;
					break;
				default:
					
					break;
			}
		?>
		<li><a href="javascript:void(0)" class="<?=$clss?>" sec="1">Patient Details</a></li>
		<li><a href="javascript:void(0)" class="<?=$socialcls?>" sec="2">Social History</a></li>
		<li><a href="javascript:void(0)" class="<?=$illness?>" sec="3">About The Illness</a></li>
		<li><a href="javascript:void(0)" class="<?=$pasthis?>" sec="4">Past History</a></li>
		<li><a href="javascript:void(0)" class="<?=$updocts?>" sec="5">Upload Documents</a></li>
		<li><a href="javascript:void(0)" class="<?=$review?>" sec="6">Review</a></li>
	</ul>
</div>

<div class="questionPart">
<!-- main display code here -->


<div id="pddetailss" class="pertionalcontainer">
<h2>Patients Details</h2>
<?php echo $this->Form->create('PatientDetail',array('action'=>'add','id'=>'pddetailsfrm'));
	echo $this->Form->hidden('id',array("id"=>"pdid","value"=>$pdid));
	echo $this->Form->hidden('completed_per',array("id"=>"completed_per","value"=>'0'));
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
					echo $this->Form->input('performance_comment',array("type"=>"textarea","value"=>$pdpercomments,"label"=>''));
				?>
              </div>
            </div>
            <div class="clear35"></div>
            <a href="javascript:void(0)" class="backBtn disable">Back</a>
            <input type="button" class="nextBtn js-pdfrmsmt" value="Next" id="nextviewsa">
			<input type="submit" class="saveBtn js-pdfrmsmt" value="Save" name="save" id="pdsaved">
			
</form>
</div>

</div>