<?php
echo $this->Html->css('jquery.bxslider.css');
echo $this->Html->script('jquery.bxslider.js');

//pr($patient);

/*$patientallhistory = array('PatientDetail'=>'Patient Details',
							'SocialHistory'=>'Social History',
							'AboutTheIllness'=>'About The Illness',
							'PastHistory'=>'Past History',
							'TestReport'=>'Test Reports');*/
							
$numberformpost = $patient['Patient']['detailsformsubmit'];

?>
<section class="myDashBordCont">
  	<div class="leftWhitePart">
    	
		<?php 
			//$numberformpost=3;
			if($numberformpost<6){
				echo $this->element('patientdashboardone',array("patient",$patient));
			}
			else{
				echo $this->element('patientdashboardtwo',array("patient",$patient));
			}
		?>
    </div>
	
    <div class="rightHIW">
    	<ul class="bxslider">
          <li><?php echo $this->Html->image('slide1.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide2.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide3.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide4.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide5.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide6.jpg',array('alt'=>''));?></li>
        </ul>
    </div>
    <div class="clear"></div>
  </section>