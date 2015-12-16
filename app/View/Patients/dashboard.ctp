<?php
echo $this->Html->css('jquery.bxslider.css');
echo $this->Html->script('jquery.bxslider.js');
//pr($patient);
$patientallhistory = array('PatientDetail'=>'Patient Details',
							'SocialHistory'=>'Social History',
							'AboutTheIllness'=>'About The Illness',
							'PastHistory'=>'Past History',
							'TestReport'=>'Test Reports');
?>
<section class="myDashBordCont">
  	<div class="leftWhitePart">
    	<h2>My Questionnaire</h2>
        <div class="completedStatus">
		<?php 
			$i=0;
			$totalcompletedper=($patient['Patient']['detailsformsubmit']>5)?5:$patient['Patient']['detailsformsubmit'];
			
			$totalpercent = $patient['Patient']['detailsubmitpercent'];
			foreach($patientallhistory as $key=>$val){
				$clsdone="";
				$cmpwidth=$totalpercent;
				$frst="";
				if($i==0){
					$frst="First";
				}
				elseif($i==(count($patientallhistory)-1)){
					$frst="Last";
				}
				$i++;
				/*if(isset($patient[$key]) && count($patient[$key])>0){
					$clsdone="";
					$cmpwidth = (isset($patient[$key]['completepercent']))?$patient[$key]['completepercent']:"0";
					if($cmpwidth==100){
						$clsdone="done";
						$totalcompletedper++;
					}
				}*/
				//newsection
				$clsdone="";
				if($key=='PatientDetail' && $totalcompletedper>0){
					$clsdone="done";
					$cmpwidth='100';
				}
				elseif($key=='SocialHistory' && $totalcompletedper>1){
					$clsdone="done";
					$cmpwidth='100';
				}
				elseif($key=='AboutTheIllness' && $totalcompletedper>2){
					$clsdone="done";
					$cmpwidth='100';
				}
				elseif($key=='PastHistory' && $totalcompletedper>3){
					$clsdone="done";
					$cmpwidth='100';
				}
				elseif($key=='TestReport' && $totalcompletedper>4){
					$clsdone="done";
					$cmpwidth='100';
				}
				else{
					//$clsdone="done";
					//$cmpwidth='0';
				}
			?>
				<div class="step <?=$frst?> <?=$clsdone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$cmpwidth?>%"></span></span><span class="TextPart"><?=$val?></span></div>
			<?php
			
			}
		?>
           <!-- <div class="step First done"><span class="normalBG"><span class="GreenBG" style="width:100%"></span></span><span class="TextPart">Patient Details</span></div>
            <div class="step done"><span class="normalBG"><span class="GreenBG" style="width:100%"></span></span><span class="TextPart">Social History</span></div>
            <div class="step"><span class="normalBG"><span class="GreenBG" style="width:10%;"></span></span><span class="TextPart">About The Illness</span></div>
            <div class="step"><span class="normalBG"><span class="GreenBG"></span></span><span class="TextPart">Past History</span></div>
            <div class="step Last"><span class="normalBG"><span class="GreenBG"></span></span><span class="TextPart">Test Reports</span></div>-->
        </div>
        <h3><?=($totalcompletedper*20)?>%</h3>
		<?php 
			/*switch($totalcompletedper){
				case 0:
				echo $this->Html->link('Finish',array('controller'=>'patientdetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton'));
				break;
				case 1:
				echo $this->Html->link('Finish',array('controller'=>'patienthistory','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton'));
				break;
				case 2:
				echo $this->Html->link('Finish',array('controller'=>'','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton'));
				break;
				case 3:
				echo $this->Html->link('Finish',array('controller'=>'','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton'));
				break;
				case 4:
				echo $this->Html->link('Finish',array('controller'=>'','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton'));
				break;
				default:
				break;
			}*/
			echo $this->Html->link('Enter questionnaire',array('controller'=>'patientDetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton'));
		?>
        <!--<a href="#" class="finishButton">Enter questionnaire</a>-->
		<div style="margin-top:288px;margin-left:20px;">
			<a href="javascript:void(0)">Opinion</a>
			<?php echo $this->Html->link('Message',array('controller'=>'Patients','action'=>'communication','full_base'=>false),array('escape'=>false));?>
			<a href="javascript:void(0)">Questionary</a>
		</div>
    </div>
    <div class="rightHIW">
    	<ul class="bxslider">
          <li><?php echo $this->Html->image('slide1.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide2.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide1.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide2.jpg',array('alt'=>''));?></li>
        </ul>
    </div>
    <div class="clear"></div>
  </section>