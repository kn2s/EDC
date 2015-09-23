
  <section class="bodyBannerSlider appear">
  	<a href="javascript:void(0)" class="banner1">
    	<div class="container">
    		<h3 class="smooth2">Fighiting Cancer?</h3>
        	<h4 class="smooth2">Consult with the <span>specialists</span> across the globe</h4>
        </div>
    </a>
    <a href="javascript:void(0)" class="banner2">
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
      <h3>Get Second Opinion in <span>3 Stapes</span></h3>
      <div class="clear"></div>
      <div class="box1 smooth"><a href="<?php echo FULL_BASE_URL.$this->base."/patients/account"; ?>">
	  <?php echo $this->Html->image('icon4.png',array('alt'=>'','class'=>'icon'));?>
        <h2>Create Account</h2>
        <p>Create account with your basic information</p>
        <span class="link">Register</span></a> </div>
		
      <div class="box2 smooth"><a href="#"> <img src="images/icon5.png" class="icon2">
        <h2>Tell Us about the disease</h2>
        <p>Fill up the online questioner and upload <br>
          the required documents</p>
        <span class="link">View Sample Questioner</span></a> </div>
		
      <div class="box1 smooth"> <img src="images/icon6.png" class="icon2">
        <h2>Get Opinion</h2>
        <p>Receive opinion from the apropriate physician <br>
          within scheduled time frame</p>
        <span class="link">View Sample Opinion</span></a> </div>
      <div class="clear"></div>
    </div>
  </section>
  
  
  <section class="knowTheSpecialists" data-appear-top-offset="-450">
    <div class="container">
      <h3>Know The <span>Specialists</span></h3>
      <p><?=isset($homepagecontent['Homepagecontent']['specialisttag'])?$homepagecontent['Homepagecontent']['specialisttag']:''?></p>
      <div class="clear"></div>
	  <?php 
		if(count($doctors)>0){
			foreach($doctors as $doctor){
			?>
			<div class="box"><img src="<?=FULL_BASE_URL.$this->base.'/doctorimage/'.$doctor['Doctor']['image']?>" class="smooth" /></div>
			<?php
			}
		}
	  ?>
     
      <div class="clear"></div>
    </div>
  </section>
  