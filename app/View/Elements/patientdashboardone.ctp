	<h2>My Questionnaire</h2>
	<div class="completedStatus">
	<?php 
		$clsdone="done";
		$cmpwidth='100';
		$pddone=$shdone=$atidone=$phdone=$trdone="";
		$pdwidth=$shwidth=$atiwidth=$phwidth=$trwidth="0";
		$numberformpost = $patient['Patient']['detailsformsubmit'];
		$totalpercent = $patient['Patient']['detailsubmitpercent'];
		
		$totalcompletedper=($numberformpost>5)?5:$numberformpost;
		
		switch($numberformpost){
			case 0:
				$pdwidth=$totalpercent;
				if($totalpercent=='100'){
					$pddone=$clsdone;
				}
				break;
			case 1:
				$pddone=$clsdone;
				$pdwidth=$cmpwidth;
				$shwidth=$totalpercent;
				if($totalpercent>=100){
					$shdone=$clsdone;
				}
				break;
			case 2:
				$pddone=$shdone=$clsdone;
				$pdwidth=$shwidth=$cmpwidth;
				$atiwidth=$totalpercent;
				if($totalpercent>=100){
					$atidone=$clsdone;
				}
				break;
			case 3:
				$pddone=$shdone=$atidone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$cmpwidth;
				$phwidth=$totalpercent;
				if($totalpercent>=100){
					$phdone=$clsdone;
				}
				break;
			case 4:
				$pddone=$shdone=$atidone=$phdone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$phwidth=$cmpwidth;
				$trwidth=$totalpercent;
				if($totalpercent>=100){
					$trdone=$clsdone;
				}
				break;
			default:
				$pddone=$shdone=$atidone=$phdone=$trdone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$phwidth=$trwidth=$cmpwidth;
				break;
		}
	?>
	   <div class="step First <?=$pddone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$pdwidth?>%"></span></span><span class="TextPart">Patient Details</span></div>
		<div class="step <?=$shdone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$shwidth?>%"></span></span><span class="TextPart">Social History</span></div>
		<div class="step <?=$atidone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$atiwidth?>%;"></span></span><span class="TextPart">About The Illness</span></div>
		<div class="step <?=$phdone?>" ><span class="normalBG"><span class="GreenBG" style="width:<?=$phwidth?>%;"></span></span><span class="TextPart">Past History</span></div>
		<div class="step Last <?=$trdone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$trwidth?>%;"></span></span><span class="TextPart">Test Reports</span></div>
	</div>
	<h3><?=($totalcompletedper*20)?>%</h3>
	<?php
		if($numberformpost>4){
			echo $this->Html->link('   Submit   ',array('controller'=>'patientDetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton saveBtn',"style"=>'background-color:blue; color:#fff;'));
		}
		if($numberformpost<5){
			echo $this->Html->link('Enter questionnaire',array('controller'=>'patientDetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton'));
		}
		
	?>
		