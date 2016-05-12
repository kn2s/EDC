<script type="text/javascript">
	var opinionconfirm = "<?=$caseOpinion['CaseOpinion']['is_confirm']?>";
	$(document).ready(function(){
		if(opinionconfirm==0){
			//preview section
			$(".TextPart h2").html("Opinion Preview");
		}
	});
</script>
<?php 
	//pr($caseOpinion);
	//pr($otheropinions);
?>
<div class="leftWhiteBox">
<?php 
	if(isset($is_new) && $is_new==2){
	?>
	<div class="box">
		<p>Your opinion is successfully saved.</p>
	</div>
	<?php
	}
?>
	<p id="succmessage"></p>
	<div class="box">
		<div class="leftPart">
			<h4>Assessment &amp; Explanation</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['assessment']))?$caseOpinion['CaseOpinion']['assessment']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Prognosis</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['prognosis']))?$caseOpinion['CaseOpinion']['prognosis']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Best Treatment Strategy</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['treatmentstrategy']))?$caseOpinion['CaseOpinion']['treatmentstrategy']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Alternative Strategy</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['alternativestrategy']))?$caseOpinion['CaseOpinion']['alternativestrategy']:""?></p>
		</div>
	</div>
	<div class="box">
		<div class="leftPart">
			<h4>Comment</h4>
		</div>
		<div class="rightPart">
			<p><?=(isset($caseOpinion['CaseOpinion']['comment']))?$caseOpinion['CaseOpinion']['comment']:""?></p>
		</div>
	</div>
	
	<div class="box">
		<div class="leftPart">
			<h4>Attachment</h4>
		</div>
		<div class="rightPart">
			<p><span class="reportCard">
		<?php 
			if(isset($caseOpinion['CaseOpinion']['attachementname']) && $caseOpinion['CaseOpinion']['attachementname']!=''){
				$pathflname =$caseOpinion['CaseOpinion']['attachementname'];
				echo $this->Html->link(__($pathflname),array('controller'=>'CaseOpinions','action'=>'attachementdownload',$pathflname,'full_base'=>true),array('target'=>'_blank'));
			}
		?>
		</span></p>
		</div>
	</div>
	
	<div class="doctorsName">
		<h4>Yours truly,</h4>
		<h4><?php 
			$str = "Dr. ";
			if(isset($caseOpinion['DoctorCase']['Doctor']['name'])){
				$str .=$caseOpinion['DoctorCase']['Doctor']['name'];
			}
			if(isset($caseOpinion['DoctorCase']['Doctor']['DoctorDetail']['designation'])){
				$str .="&nbsp; ".$caseOpinion['DoctorCase']['Doctor']['DoctorDetail']['designation'];
				$str .=", ".$caseOpinion['DoctorCase']['Doctor']['DoctorDetail']['fellowship_from'];
			}
			echo $str;
		?></h4>
	</div>
	<?php 
		if(!$caseOpinion['CaseOpinion']['is_confirm'] && !$caseOpinion['CaseOpinion']['is_deleted']){
	?>
	<div class="box">
		<button opid="<?=$caseOpinion['CaseOpinion']['id']?>" for="confirm" class="blueButton js-opinionconcan" style="float:right; width:20%; margin-left:10px;"> Confirm </button>
		<!--<button opid="<?=$caseOpinion['CaseOpinion']['id']?>" for="cancel" class="blueButton js-opinionconcan" style="float:right; width:20%;"> Edit </button>-->
		<button opid="<?=$caseOpinion['CaseOpinion']['id']?>" for="cancel" class="blueButton js-doctoptions" vals="4" style="float:right; width:20%;"> Edit </button>
	</div>
	<?php 
		}
	?>
</div>
<div class="rightGrayBox">
	
	<div class="details">
		<p>Patient</p>
		<h4>Mr. <?=(isset($caseOpinion['DoctorCase']['Patient']['PatientDetail']['name']))?$caseOpinion['DoctorCase']['Patient']['PatientDetail']['name']:""?></h4>
		<p>Date</p>
		<h4><?=(isset($caseOpinion['DoctorCase']['opinion_due_date']))?date("d M Y",strtotime($caseOpinion['DoctorCase']['opinion_due_date'])):""?></h4>
	</div>
	<div class="refarence">
		<h4>References</h4>
		<ol>
			<li><span><?=(isset($caseOpinion['CaseOpinion']['refference']))?$caseOpinion['CaseOpinion']['refference']:""?></span></li>
		</ol>
	</div>
	<div class="refarence">
		<h4>All Opinions</h4>
		<ul>
			<?php 
				if(is_array($otheropinions) && count($otheropinions)>0){
					foreach($otheropinions as $otheropinion){
						$displayname = date("Y-m-d",strtotime($otheropinion['CaseOpinion']['cteratedatetime']));
						$displayname.="( ".$otheropinion['DoctorCase']['diagonisis']." )";
						$rec_id = $otheropinion['CaseOpinion']['doctor_case_id'];
					?>
					<li><span><?php echo $this->Html->link(__($displayname),array('controller'=>'CaseOpinions','action'=>'doctorview',$rec_id));?></span></li>
					<?php
					}
				}
			?>
			<li><span><?=(isset($caseOpinion['CaseOpinion']['refference']))?$caseOpinion['CaseOpinion']['refference']:""?></span></li>
		</ul>
	</div>
</div>

<div class="sendOpinionBox" style="display:none; width:95%;height:95%;">
  <?php 
	$doctcaseid = $caseOpinion['DoctorCase']['id'];
	$asss =(isset($caseOpinion['CaseOpinion']['assessment']))?$caseOpinion['CaseOpinion']['assessment']:"";
	$prognosis = (isset($caseOpinion['CaseOpinion']['prognosis']))?$caseOpinion['CaseOpinion']['prognosis']:"";
	$tstraitagy = (isset($caseOpinion['CaseOpinion']['treatmentstrategy']))?$caseOpinion['CaseOpinion']['treatmentstrategy']:"";
	$altstra = (isset($caseOpinion['CaseOpinion']['alternativestrategy']))?$caseOpinion['CaseOpinion']['alternativestrategy']:"";
	$mess = (isset($caseOpinion['CaseOpinion']['comment']))?$caseOpinion['CaseOpinion']['comment']:"Type Something";
	$flsattaach = (isset($caseOpinion['CaseOpinion']['attachementname']))?"File attached : ".$caseOpinion['CaseOpinion']['attachementname']:"";
	
	echo $this->Form->create('CaseOpinion',array('action'=>'add','id'=>'caseopinionfrm'));
	echo $this->Form->hidden('doctor_case_id',array('value'=>$doctcaseid,'id'=>'opinioncaseid'));
  ?>
  	<h2>Send Opinion</h2>
    <a href="javascript:void(0)" class="close js-opinionpanel"></a>
    <div class="clear"></div>
    <div class="block">
    	<label>Assessment &amp; Explanation</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][assessment]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][assessment]" ><?=$asss?></textarea>
    </div>
    <div class="block">
    	<label>Prognosis</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][prognosis]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][prognosis]" ><?=$prognosis?></textarea>
    </div>
    <div class="block">
    	<label>Best Treatment Strategy</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][treatmentstrategy]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][treatmentstrategy]" ><?=$tstraitagy?></textarea>
    </div>
    <div class="block">
    	<label>Alternative Strategy</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][alternativestrategy]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][alternativestrategy]" ><?=$altstra?></textarea>
    </div>
    <div class="block">
    	<label>Comment</label>
        <textarea name="data[CaseOpinion][comment]" class="js-opinioncomments" ><?=$mess?></textarea>
    </div>
	<div class="block">
    	<label id="flsattaach"><?=$flsattaach?></label>
    </div>
	<input type="file" name="opiniondoct" class="js-opiniondoc" style="display:none;">
	<input type="hidden" name="data[CaseOpinion][attachementname]" id="attachementname">
	
    <input type="submit" class="blueButton js-caseopinionpost" value="Save">
    <a href="javascript:void(0)" class="attachButton js-attachedopinionfile">Attach</a>
	</form>
  </div>
