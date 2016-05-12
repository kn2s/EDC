<script>
var doctsobj = [];
var timeouts='';
var imagecount=6;
var lastind=imagecount;
var fstind=0;

$(document).ready(function(){
	$.each($(".js-docts"),function(i,item){
		$(item).addClass("onebyoneappear");
		doctsobj.push(item);
	});
	
	if(doctsobj.length>imagecount){
		$(".doctsimages").html('');
		
		timeouts = setInterval(function(){
			$(".doctsimages").html('');
			//$(".onebyoneappear").removeClass("appear");
			fstind = lastind;
			lastind = lastind+imagecount;
			if(lastind>doctsobj.length){
				//clearInterval(timeouts);
				fstind = 0;
				lastind =imagecount;
			}
			
			for(var i = fstind;i<lastind;i++){
				$(doctsobj[i]).removeClass("appear");
				$(".doctsimages").append(doctsobj[i]);
			}
			
			$('.doctsimages .onebyoneappear:not(.appear)').each(function(k) {
				//console.log("k : "+k);
				var $li = $(this);
				setTimeout(function() {
				  $li.addClass('appear');
				  
				}, k*300); // delay 100 ms
			});
			
		},3000);
	}
});
</script>

  <section class="bodyBannerSlider appear">
  	<a href="<?=FULL_BASE_URL.$this->base?>/services" class="banner1">
    	<div class="container">
    		<h3 class="smooth2">Fighting Cancer?</h3>
        	<h4 class="smooth2">Consult with the <span>specialists</span> across the globe</h4>
        </div>
    </a>
    <a href="<?=FULL_BASE_URL.$this->base?>/services#doctoreService" class="banner2">
    	<div class="container">
    		<h3 class="smooth2">Collaborate Globally</h3>
        	<h4 class="smooth2">To <span>eradicate cancer</span></h4>
        </div>
    </a> 
  </section>
  <section class="facility" data-appear-top-offset="-150">
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
  
  <section class="secondOption" data-appear-top-offset="-300">
    <div class="container">
      <h3>Get Second Opinion in <span>3 Steps</span></h3>
      <div class="clear"></div>
      <div class="box1 smooth"><a href="<?php echo FULL_BASE_URL.$this->base."/patients/account"; ?>">
	  <?php echo $this->Html->image('icon4.png',array('alt'=>'','class'=>'icon'));?>
        <h2>Create Account</h2>
        <p>Create account with your basic information</p>
        <span class="link">Register</span></a> </div>
		
      <div class="box2 smooth"><a href="<?php echo FULL_BASE_URL.$this->base."/patients/samplequestioner"; ?>"> <img src="images/icon5.png" class="icon2">
        <h2>Tell Us about the disease</h2>
        <p>Fill up the online questionnaire  and upload <br>
          the required documents</p>
        <span class="link">View Sample Questionnaire </span></a> </div>
		
      <div class="box1 smooth"><a href="<?php echo FULL_BASE_URL.$this->base."/patients/sampleopinion"; ?>"> <img src="images/icon6.png" class="icon2">
        <h2>Get Opinion</h2>
        <p>Receive opinion from the apropriate physician <br>
          within scheduled time frame</p>
        <span class="link">View Sample Opinion</span></a> </div>
      <div class="clear"></div>
    </div>
  </section>
  
  
  <section class="knowTheSpecialists" data-appear-top-offset="-450">
  <a href="<?=FULL_BASE_URL.$this->base?>/aboutus">
    <div class="container">
      <h3>Know The <span>Specialists</span></h3>
      <p><?=isset($homepagecontent['Homepagecontent']['specialisttag'])?$homepagecontent['Homepagecontent']['specialisttag']:''?></p>
      <div class="clear"></div>
	  <div class="doctsimages">
	  <?php 
		if(count($doctors)>0){
			$i=0;
			foreach($doctors as $doctor){
				$i++;
				$cls='';
				if($i>6){
					$cls='style="display:none;"';
					$cls='hh';
				}
			?>
			<div class="box js-docts" <?=$cls?>><img src="<?=FULL_BASE_URL.$this->base.'/doctorimage/'.$doctor['Doctor']['image']?>" class="smooth" /></div>
			<?php
			}
		}
	  ?>
     </div>
      <div class="clear"></div>
    </div></a>
  </section>
  