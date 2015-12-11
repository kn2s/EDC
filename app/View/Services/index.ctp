<script>
	
	$(document).ready(function(){
		var stttt = ""+window.location;
		var str='';
		var urlss = stttt.split("#");
		if( $.isArray(urlss) && urlss.length>1){
			str = urlss[1];
			$($('.tabSwitch')[1]).trigger("click");
		}
		//alert(str);
	});
</script>
<section class="serviceTypeCont">
  	<div class="container">
    	<a href="#patientService" class="patient tabSwitch">
        	<!--<img src="images/patientNor.jpg" class="normal" alt="">
			<img src="images/patientActive.jpg" class="active" alt="">
			-->
			<?php echo $this->Html->image('patientNor.jpg',array('alt'=>'','class'=>'normal'));
				echo $this->Html->image('patientActive.jpg',array('alt'=>'','class'=>'active'));
			?>
            
        </a>
        <a href="#doctorService" class="doctor tabSwitch">
        	<!--<img src="images/doctorNor.jpg" class="normal" alt="">
            <img src="images/doctorActive.jpg" class="active" alt="" style="display:none;">-->
			<?php 
				echo $this->Html->image('doctorNor.jpg',array('alt'=>'','class'=>'normal'));
				echo $this->Html->image('doctorActive.jpg',array('alt'=>'','class'=>'active','style'=>'display:none;'));
			?>
        </a>
    </div>
</section>
<section id="patientService" class="tabContent">
  	<section class="facility" data-appear-top-offset="-200">
        <div class="container">
		  <div class="box icon1 smooth">
			<p><?=isset($homepagecontent['Homepagecontent']['tag_one'])?$homepagecontent['Homepagecontent']['tag_one']:''?></p>
		  </div>
		  <div class="box icon2 smooth">
			<p><?=isset($homepagecontent['Homepagecontent']['tag_two'])?$homepagecontent['Homepagecontent']['tag_two']:''?></p>
		  </div>
		  <div class="box icon3 smooth">
			<p><?=isset($homepagecontent['Homepagecontent']['tag_three'])?$homepagecontent['Homepagecontent']['tag_three']:''?></p>
		  </div>
          <div class="clear"></div>
        </div>
    </section>
	
	<section class="patientText GreayBg" style="z-index:5; padding-bottom:160px">
    	<div class="container">
        	<div class="box1">
            	<p><?php echo (isset($services['Service']['patient_service_brif']))?$services['Service']['patient_service_brif']:'';?></p>
            </div>
            <div class="box">
            	<p><?php echo (isset($services['Service']['patient_service_detail']))?$services['Service']['patient_service_detail']:'';?></p>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <section class="patientText" style="z-index:6; padding-bottom:230px;">
    	<div class="container">
        	<div class="box1">
            	<p><?php echo (isset($services['Service']['patient_hepling_title']))?$services['Service']['patient_hepling_title']:'';?></p>
            </div>
            <div class="box">
            	<?php echo (isset($services['Service']['patient_helping_way']))?$services['Service']['patient_helping_way']:'';?>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <section class="patientText GreayBg twoCircle" data-appear-top-offset="-350" style="z-index:7; padding-bottom:340px;">
    	<div class="box2">
        	<div class="blueCircle smooth2">
            	<h3><span>$<?php echo (isset($services['Service']['consulting_charge']))?$services['Service']['consulting_charge']:'0.00';?></span>Consulting fees<br>will be charged for<br> these services</h3>
            </div>
            <a href="#" class="whiteCircle smooth2"><h3>Check, How it works</h3></a>
        </div>
    </section>
    <section class="patientText iconPart" style="z-index:8;">
    	<div class="container">
        	<a href="<?php echo FULL_BASE_URL.$this->base."/patients/account"; ?>" class="createAccount">Create Account<br>&nbsp;</a>
            <a href="#" class="sampleQuestion">View <br>Sample Questioner</a>
            <a href="#" class="sampleOpinion">View <br>Sample Opinion</a>
            <a href="mailto:<?php echo (isset($services['Service']['doc_colla_email']))?$services['Service']['doc_colla_email']:'';?>" class="writeUsAt">Write us at <br><?php echo (isset($services['Service']['doc_colla_email']))?$services['Service']['doc_colla_email']:'';?></a>
        </div>
    </section>
</section>

<section id="doctorService" class="tabContent">
  	<section class="patientText" style="z-index:5; padding-bottom:170px;">
    	<div class="container940">
        	<p class="bigText"><?php echo (isset($services['Service']['doct_service_brif']))?$services['Service']['doct_service_brif']:'';?></p>
            <p class="smallText"><?php echo (isset($services['Service']['doct_service_detail']))?$services['Service']['doct_service_detail']:'';?></p>
        </div>
    </section>
    <section class="patientText GreayBg" style="z-index:6; padding-bottom:270px;">
    	<div class="container">
        	<p class="bigText tcenter"><?php echo (isset($services['Service']['doc_collabration_title']))?$services['Service']['doc_collabration_title']:'';?></p>
            <div class="box3 first"><p><?php echo (isset($services['Service']['doc_colla_option_one']))?$services['Service']['doc_colla_option_one']:'';?></p></div>
            <div class="box3"><p><?php echo (isset($services['Service']['doc_colla_option_two']))?$services['Service']['doc_colla_option_two']:'';?></p></div>
            <div class="box3"><p><?php echo (isset($services['Service']['doc_colla_option_three']))?$services['Service']['doc_colla_option_three']:'';?></p></div>
            <div class="box3"><p><?php echo (isset($services['Service']['doc_colla_option_four']))?$services['Service']['doc_colla_option_four']:'';?></p></div>
            <div class="clear"></div>
        </div>
    </section>  
    <section class="patientText tcenter" style="z-index:7">
  		<div class="container">
        	<p class="bigText tcenter"><img src="images/icon10.png" alt=""> &nbsp;&nbsp;Interested to know more about collaboration?</p>
            <a href="mailto:<?php echo (isset($services['Service']['doc_colla_email']))?$services['Service']['doc_colla_email']:'';?>" class="greenButton">Write us at <?php echo (isset($services['Service']['doc_colla_email']))?$services['Service']['doc_colla_email']:'';?></a>
        </div>
    </section>
</section>