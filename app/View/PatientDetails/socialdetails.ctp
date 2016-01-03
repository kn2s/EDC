<div class="statusPart">
	<ul>
		<!--<li><?php echo $this->Html->link('Patient Details',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'done'));?>
		<li><?php echo $this->Html->link('Social History',array('controller'=>'patientDetails','action'=>'index'),array('escape'=>false,'class'=>'current'));?>-->
		
		<?php
			$clsss = "js-preview done";
			$illness='';
			$pasthis='';
			$updocts='';
			$review='';
			
			switch($lastquestionformno){
				case 0:
					break;
				case 1:
					break;
				case 2:
					$illness=$clsss;
					break;
				case 3:
					$illness=$pasthis=$clsss;
					break;
				case 4:
					$illness=$pasthis=$updocts=$clsss;
					break;
				case 5:
					$illness=$pasthis=$updocts=$review=$clsss;
					break;
				default:
					$illness=$pasthis=$updocts=$review=$clsss;
					break;
			}
		?>
		
		<li><a href="javascript:void(0)" class="js-preview done" sec="1">Patient Details</a></li>
		<li><a href="javascript:void(0)" class="current" sec="2">Social History</a></li>
		<li><a href="javascript:void(0)" class="<?=$illness?>" sec="3">About The Illness</a></li>
		<li><a href="javascript:void(0)" class="<?=$pasthis?>" sec="4">Past History</a></li>
		<li><a href="javascript:void(0)" class="<?=$updocts?>" sec="5">Upload Documents</a></li>
		<li><a href="javascript:void(0)" class="<?=$review?>" sec="6">Review</a></li>
		
		<!--<li><a href="javascript:void(0)">About The Illness</a></li>
		<li><a href="javascript:void(0)">Past History</a></li>
		<li><a href="javascript:void(0)">Upload Documents</a></li>
		<li><a href="javascript:void(0)">Review</a></li>-->
	</ul>
</div>


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
	$smokingunit="in a day";
	$saalcoholunit = "in a day";
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
		$smokingunit = $smiking['smkunit'];
	}
?>

<div class="questionPart">
<!-- main display code here -->

<div id="socialActivity" class="socialActivity">
	<?php 
		echo $this->Form->create('Socialactivity',array("id"=>"safrms"));
		echo $this->Form->hidden('id',array('value'=>$said,'id'=>'said'));
		echo $this->Form->hidden('completed_per',array("id"=>"completed_per","value"=>'0'));
	?>
	<h2>Social History</h2>
            <div class="Smoking">
            	<h3>Smoking</h3>
                <p class="mb10">Please provide the following details if the patient has or had smoking habits.</p>
                <div class="clear"></div>
                <div class="quantity">
                	<label class="blue">Quantity</label>
                    <input type="text" placeholder="0" name="data[Smoking][quantity]" class="savaliedatefields" value="<?=$sasmkquantity?>">
                    <select name="data[Smoking][smkunit]">
                    	<option value="in a day" <?php if($smokingunit=="in a day"){ echo "selected";}?> >In a Day</option>
                    	<option value="in a week" <?php if($smokingunit=="in a week"){ echo "selected";}?> >In a Week</option>
                    	<option value="in a month" <?php if($smokingunit=="in a month"){ echo "selected";}?> >In a Month</option>
                    	<option value="in a year" <?php if($smokingunit=="in a year"){ echo "selected";}?> >In a Year</option>
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
										<option value="in a day" <?php if($alcohalsdtls['alcoholunit']=='in a day'){ echo 'selected';}?> >In a Day</option>
										<option value="in a week" <?php if($alcohalsdtls['alcoholunit']=='in a week'){ echo 'selected';}?> >In a Week</option>
										<option value="in a month" <?php if($alcohalsdtls['alcoholunit']=='in a month'){ echo 'selected';}?> >In a Month</option>
										<option value="in a year" <?php if($alcohalsdtls['alcoholunit']=='in a year'){ echo 'selected';}?> >In a Year</option>
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
										<option value="in a day" <?php if($alcohalsdtls['alcoholunit']=='in a day'){ echo 'selected';}?> >In a Day</option>
										<option value="in a week" <?php if($alcohalsdtls['alcoholunit']=='in a week'){ echo 'selected';}?> >In a Week</option>
										<option value="in a month" <?php if($alcohalsdtls['alcoholunit']=='in a month'){ echo 'selecte';}?> >In a Month</option>
										<option value="in a year" <?php if($alcohalsdtls['alcoholunit']=='in a year'){ echo 'selected';}?> >In a Year</option>
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
									<input type="text" name="samoredrugquantity[]" placeholder="0" class="" value="<?=$drag['quantity']?>">
									<select name="samoredrugunit[]">
										<option value="in a day" <?php if($drag['drugunit']=='in a day'){echo 'selected';}?> > In a Day</option>
										<option value="in a week" <?php if($drag["drugunit"]=='in a week'){echo 'selected';}?> >In a Week</option>
										<option value="in a month" <?php if($drag["drugunit"]=='in a month'){echo 'selected';}?> >In a Month</option>
										<option value="in a year" <?php if($drag["drugunit"]=='in a year'){echo 'selected';}?> >In a Year</option>
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
									<input type="text" name="samoredrugquantity[]" placeholder="0" class="" value="<?=$drag['quantity']?>">
									<select name="samoredrugunit[]">
										<option value="in a day" <?php if($drag['drugunit']=='in a day'){echo 'selected';}?> >In a Day</option>
										<option value="in a week" <?php if($drag['drugunit']=='in a week'){echo 'selected';}?> >In a Week</option>
										<option value="in a month" <?php if($drag['drugunit']=='in a month'){echo 'selected';}?> >In a Month</option>
										<option value="in a year" <?php if($drag['drugunit']=='in a year'){echo 'selected';}?> >In a Year</option>
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
                	<p>Do you want to tell us anyhing else</p>
          
					<?php 
						echo $this->Form->input('comment',array("type"=>"textarea","value"=>$sacomment,"label"=>''));
					?>
                </div>
            </div>
            <div class="clear35"></div>
			
            <a href="javascript:void(0)" class="backBtn js-preview"  sec="1" id="sabackbtn" >Back</a>
            <input type="button" class="nextBtn js-sasaved" value="Next" id="nextviewill">
			<input type="submit" class="saveBtn js-sasaved" value="Save" name="save" id="sasaved">
			
	</form>
</div>
</div>