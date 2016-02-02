<?php 
	//pr($doctcaseDetail);
	//pr($doctorCases);
	$imagepath=FULL_BASE_URL.$this->base."/images/docActive.jpg";
	$doctname = "";
	$patient_id=0;
	$doctor_id=0;
	$patientname='';
	$doctcaseid=0;
	$patientimagepath = FULL_BASE_URL.$this->base."/images/man.png";
	
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
		$doctcaseid = $doctcaseDetail['DoctorCase']['id'];
	}
	$communications = (isset($doctcaseDetail['CaseCommunication']))?$doctcaseDetail['CaseCommunication']:array();
?>
<div class="patientDetails">
	<?php echo $this->element('casesummery',array("casedetails"=>$doctcaseDetail,'ispatient'=>'0'))?>
</div>
<h2>Communication</h2>
<div class="clear"></div>
<div class="comunication">
<?php 
	if(is_array($communications) && count($communications)>0){
		foreach($communications as $key=>$communication){
			$datetm = isset($communication['createdate'])?$communication['createdate']:date();
			$comment = isset($communication['comment'])?$communication['comment']:'';
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
			<img src="<?=$patientimagepath?>" alt="patient image">
			
		</div>
		<div class="textCont">
			<h3 id="ptnnameid"><?=$patientname?></h3>
			
			<?php 	
				echo $this->Form->create('CaseCommunication',array("action"=>"add","id"=>"patientcomment"));
				echo $this->Form->hidden('doctor_case_id',array('value'=>$doctcaseid));
				echo $this->Form->hidden('patient_id',array('value'=>$patient_id));
				echo $this->Form->hidden('doct_id',array('value'=>$doctor_id,));
				echo $this->Form->hidden('isdoctoresent',array('value'=>'0'));
			?>
			<textarea class="commentpost js-communicationcomment" id="pcommunicationcomment" name="data[CaseCommunication][comment]">Type your comment</textarea>
			<div class="clear10"></div>
			<!--<label><input type="checkbox" id="allowedit" name="data[CaseCommunication][isquestionaryedit]">Allow to edit the questionnaire</label>-->
			<div class="clear20"></div>
			<input type="submit" class="submitBtn js-doctCommentPost" value="Send">
			</form>
			<div class="clear20"></div>
		</div>
	</div>
</div>