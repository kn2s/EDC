<?php 
	//pr($doctcaseDetail);
	//pr($doctorCases);
	$imagepath="images/docActive.jpg";
	$doctname = "";
	$patient_id=0;
	$doctor_id=0;
	$patientname='';
	if(isset($doctcaseDetail['Doctor']['DoctorDetail']['image']) && $doctcaseDetail['Doctor']['DoctorDetail']['image']!=''){
		//image found
		$imagepath = FULL_BASE_URL.$this->base."/doctorimage/".$doctcaseDetail['Doctor']['DoctorDetail']['image'];
	}
	
	if(isset($doctcaseDetail['Doctor']['name']) && $doctcaseDetail['Doctor']['name']!=''){
		//name found
		$doctname = $doctcaseDetail['Doctor']['name'];
	}
	
	if(isset($doctcaseDetail['Patient']['PatientDetail']['name']) && $doctcaseDetail['Patient']['PatientDetail']['name']!=''){
		//name found
		$patientname = $doctcaseDetail['Patient']['PatientDetail']['name'];
	}
	if(isset($doctcaseDetail['DoctorCase']['patient_id']) ){
		//patient id
		$patient_id = $doctcaseDetail['DoctorCase']['patient_id'];
		$doctor_id = $doctcaseDetail['DoctorCase']['doctor_id'];
	}
	$communications = (isset($doctcaseDetail['CaseCommunication']))?$doctcaseDetail['CaseCommunication']:array();
?>
<h2>Communication</h2>
<div class="clear"></div>
<div class="comunication">
<?php 
	if(is_array($communications) && count($communications)>0){
		foreach($communications as $key=>$communication){
			$datetm = isset($communication['createdate'])?$communication['createdate']:date();
			$comment = isset($communication['comment'])?$communication['comment']:'';
			$uploadeddoct = isset($communication['uploadeddoct'])?$communication['uploadeddoct']:'';
			$isquestionaryedit = isset($communication['isquestionaryedit'])?$communication['isquestionaryedit']:'0';
			$postername="";
			if($communication['isdoctoresent']==1){
				$coomimage=$imagepath;
				$postername="Dr. ".$doctname;
			}
			else{
				$coomimage = FULL_BASE_URL.$this->base."/images/man.png";
				$postername =$patientname;
			}
			$clslast='';
			if($key==(count($communications)-1)){
				$clslast="last";
			}
			?>
			<div class="talk <?=$clslast?>">
				<div class="picCont">
					<img src="<?=$coomimage?>" alt="">
				</div>
				<div class="textCont">
					<h3><?=$postername?> <span><?=date("H:i - d M Y",strtotime($datetm))?></span></h3>
					<p><?=$comment?></p>
					<?php 
						if($isquestionaryedit==1){
							echo "<p>You allow patient to edit the questionnaire</p>";
						}
					?>
					<?php 
						if($uploadeddoct!=''){
						?>
						<p><a href="<?=FULL_BASE_URL.$this->base."/Patients/communicationdocdownload/".$uploadeddoct?>" target="_blank">patients uploaded doct</a></p>
						<?php
						}
					?>
				</div>
				<div class="clear"></div>
			</div>
			<?php
		}
	}
?>
	<!--
	<div class="talk">
		<div class="picCont">
			<img src="images/docActive.jpg" alt="">
		</div>
		<div class="textCont">
			<h3>Dr. Abhimanyu Ghosh <span>15:22 - 25 NOV 2015</span></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices fringilla elit a rhoncus. Proin molestie posuere elit nec tristique. Sed imperdiet risus finibus suscipit malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices fringilla elit a rhoncus. Proin molestie posuere elit nec tristique. Sed imperdiet risus finibus suscipit malesuada.</p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="talk">
		<div class="picCont">
			<img src="images/man.png" alt="">
		</div>
		<div class="textCont">
			<h3>John Smith <span>15:22 - 25 NOV 2015</span></h3>
			<p>Re-submitted Questionnaire</p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="talk">
		<div class="picCont">
			<img src="images/docActive.jpg" alt="">
		</div>
		<div class="textCont">
			<h3>Dr. Abhimanyu Ghosh <span>15:22 - 25 NOV 2015</span></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices fringilla elit a rhoncus. Proin molestie posuere elit nec tristique. Sed imperdiet risus finibus suscipit malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices fringilla elit a rhoncus. Proin molestie posuere elit nec tristique. Sed imperdiet risus finibus suscipit malesuada.</p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="talk last">
		<div class="picCont">
			<img src="images/man.png" alt="">
		</div>
		<div class="textCont">
			<h3>John Smith <span>15:22 - 25 NOV 2015</span></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices fringilla elit a rhoncus. Proin molestie posuere elit nec tristique. Sed imperdiet risus finibus suscipit malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices fringilla elit a rhoncus.</p>
		</div>
		<div class="clear"></div>
	</div>-->
	
	<div class="talk comentpostsection">
		<div class="picCont">
			<img src="<?=$imagepath?>" alt="doct image">
		</div>
		<div class="textCont">
			<h3 id="dctnameid">Dr. <?=$doctname?></h3>
			
			<?php 	
				echo $this->Form->create('CaseCommunication',array("action"=>"add","id"=>"doctcomment"));
				echo $this->Form->hidden('doctor_case_id',array('value'=>$doctcaseid,'id'=>'caseid'));
				echo $this->Form->hidden('patient_id',array('value'=>$patient_id,'id'=>'patient_id'));
				echo $this->Form->hidden('doct_id',array('value'=>$doctor_id,'id'=>'doct_id'));
				echo $this->Form->hidden('isdoctoresent',array('value'=>'1','id'=>'isdoctoresent'));
			?>
			<textarea class="commentpost js-communicationcomment" id="communicationcomment" name="data[CaseCommunication][comment]">Type your comment</textarea>
			<div class="clear10"></div>
			<label><input type="checkbox" id="allowedit" name="data[CaseCommunication][isquestionaryedit]">Allow to edit the questionnaire</label>
			<div class="clear20"></div>
			<input type="submit" class="submitBtn js-doctCommentPost" value="Send">
			</form>
			<div class="clear20"></div>
		</div>
	</div>
</div>