	<h2>My Questionnaire</h2>
	<div class="completedStatus">
	<?php 
		$clsdone="done";
		$cmpwidth='100';
		$complt="";
		$pddone=$shdone=$atidone=$phdone=$trdone="";
		$pdwidth=$shwidth=$atiwidth=$phwidth=$trwidth="0";
		$numberformpost = $patient['Patient']['detailsformsubmit'];
		$totalpercent = $patient['Patient']['detailsubmitpercent'];
		
		$totalcompletedper=($numberformpost>=4)?5:$numberformpost;
		
		switch($numberformpost){
			case 0:
				$pdwidth=$totalpercent;
				if($totalpercent=='100'){
					$pddone=$clsdone;
					$totalcompletedper=1;
				}
				break;
			case 1:
				$pddone=$clsdone;
				$pdwidth=$cmpwidth;
				$shwidth=$totalpercent;
				if($totalpercent>=100){
					$shdone=$clsdone;
					$totalcompletedper=2;
				}
				break;
			case 2:
				$pddone=$shdone=$clsdone;
				$pdwidth=$shwidth=$cmpwidth;
				$atiwidth=$totalpercent;
				if($totalpercent>=100){
					$atidone=$clsdone;
					$totalcompletedper=3;
				}
				break;
			case 3:
				$pddone=$shdone=$atidone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$cmpwidth;
				$phwidth=$totalpercent;
				if($totalpercent>=100){
					$phdone=$clsdone;
					$totalcompletedper=4;
				}
				break;
			case 4:
				$pddone=$shdone=$atidone=$phdone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$phwidth=$cmpwidth;
				$trwidth=$totalpercent;
				if($totalpercent>=100){
					$trdone=$clsdone;
					$totalcompletedper=5;
				}
				break;
			default:
				$pddone=$shdone=$atidone=$phdone=$trdone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$phwidth=$trwidth=$cmpwidth;
				$totalcompletedper=5;
				break;
		}
		
		if($totalcompletedper==5){
			$complt="<span style='left:0px; top:39px;'>The Questionnaire is complete</span>";
		}
	?>
	   <div class="step First <?=$pddone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$pdwidth?>%"></span></span><span class="TextPart">Patient Details</span></div>
		<div class="step <?=$shdone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$shwidth?>%"></span></span><span class="TextPart">Social History</span></div>
		<div class="step <?=$atidone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$atiwidth?>%;"></span></span><span class="TextPart">About The Illness</span></div>
		<div class="step <?=$phdone?>" ><span class="normalBG"><span class="GreenBG" style="width:<?=$phwidth?>%;"></span></span><span class="TextPart">Past History</span></div>
		<div class="step Last <?=$trdone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$trwidth?>%;"></span></span><span class="TextPart">Test Reports</span></div>
	</div>
	<h3 style="padding:75px 0 0 4px;"><?=$complt?><?=($totalcompletedper*20)?>%</h3>
	<?php
	
		if($totalcompletedper==5){
			echo $this->Html->link('Submit',array('controller'=>'patientDetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'blueButton submitBtn','style'=>'margin: 66px 17px 0 0;'));
		}
		//if($numberformpost<5){
		else{
			echo $this->Html->link('Enter questionnaire',array('controller'=>'patientDetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton','style'=>'margin:90px 4px 0 0;')); //
		}
		
	?>
		