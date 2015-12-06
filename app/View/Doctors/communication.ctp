<?php 
	//pr($doctcaseDetail);
	//pr($doctorCases);
	$imagepath="images/docActive.jpg";
	$doctname = "";
	if(isset($doctcaseDetail['Doctor']['DoctorDetail']['image']) && $doctcaseDetail['Doctor']['DoctorDetail']['image']!=''){
		//image found
		$imagepath = FULL_BASE_URL.$this->base."/doctorimage/".$doctcaseDetail['Doctor']['DoctorDetail']['image'];
	}
	
	if(isset($doctcaseDetail['Doctor']['name']) && $doctcaseDetail['Doctor']['name']!=''){
		//image found
		$doctname = $doctcaseDetail['Doctor']['name'];
	}
	
	$communications = (isset($doctcaseDetail['CaseCommunication']))?$doctcaseDetail['CaseCommunication']:array();
?>
<h2>Communication</h2>
<div class="clear"></div>
<div class="comunication">
<?php 
	if(is_array($communications) && count($communications)>0){
		foreach($communications as $communication){
			$datetm = isset($communication['caseCommunication']['createdate'])?$communication['caseCommunication']['createdate']:date();
			$comment = isset($communication['caseCommunication']['comment'])?$communication['caseCommunication']['comment']:'';
			?>
			<div class="talk">
				<div class="picCont">
					<img src="images/docActive.jpg" alt="">
				</div>
				<div class="textCont">
					<h3>Dr. Abhimanyu Ghosh <span><?=date("H:i - d M Y",strtotime($datetm))?></span></h3>
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
	
	<div class="talk">
		<div class="picCont">
			<img src="<?=$imagepath?>" alt="doct image">
		</div>
		<div class="textCont">
			<h3>Dr. <?=$doctname?></h3>
			<textarea class="commentpost">Type your comment</textarea>
			<div class="clear10"></div>
			<label><input type="checkbox" id="allowedit">Allow to edit the questionnaire</label>
			<div class="clear20"></div>
			<input type="submit" class="submitBtn js-doctCommentPost" value="Send">
			<div class="clear20"></div>
		</div>
	</div>
</div>