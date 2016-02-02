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
		$clsss="js-dashboardpreview";
		$basicdtls=$socialcls=$illness=$pasthis=$updocts=$review="";
		switch($numberformpost){
			case 0:
				$pdwidth=$totalpercent;
				if($totalpercent=='100'){
					$pddone=$clsdone;
					$totalcompletedper=1;
				}
				$basicdtls=$clsss;
				break;
			case 1:
				$pddone=$clsdone;
				$pdwidth=$cmpwidth;
				$shwidth=$totalpercent;
				if($totalpercent>=100){
					$shdone=$clsdone;
					$totalcompletedper=2;
				}
				$basicdtls=$socialcls=$clsss;
				break;
			case 2:
				$pddone=$shdone=$clsdone;
				$pdwidth=$shwidth=$cmpwidth;
				$atiwidth=$totalpercent;
				if($totalpercent>=100){
					$atidone=$clsdone;
					$totalcompletedper=3;
				}
				$basicdtls=$socialcls=$illness=$clsss;
				break;
			case 3:
				$pddone=$shdone=$atidone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$cmpwidth;
				$phwidth=$totalpercent;
				if($totalpercent>=100){
					$phdone=$clsdone;
					$totalcompletedper=4;
				}
				$basicdtls=$socialcls=$illness=$pasthis=$clsss;
				break;
			case 4:
				$pddone=$shdone=$atidone=$phdone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$phwidth=$cmpwidth;
				$trwidth=$totalpercent;
				if($totalpercent>=100){
					$trdone=$clsdone;
					$totalcompletedper=5;
				}
				$basicdtls=$socialcls=$illness=$pasthis=$updocts=$clsss;
				break;
			default:
				$pddone=$shdone=$atidone=$phdone=$trdone=$clsdone;
				$pdwidth=$shwidth=$atiwidth=$phwidth=$trwidth=$cmpwidth;
				$totalcompletedper=5;
				$basicdtls=$socialcls=$illness=$pasthis=$updocts=$review=$clsss;
				break;
		}
		
		if($totalcompletedper==5){
			$complt="<span>The Questionnaire is complete</span>";//style='left:0px; top:39px;'
		}
	?>
	   <div class="step First <?=$pddone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$pdwidth?>%"></span></span><span class="TextPart"><a href="javascript:void(0)" class="<?=$basicdtls?>" sec="0">Patient Details</a></span></div>
		<div class="step <?=$shdone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$shwidth?>%"></span></span><span class="TextPart"><a href="javascript:void(0)" class="<?=$socialcls?>" sec="1">Social History</a></span></div>
		<div class="step <?=$atidone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$atiwidth?>%;"></span></span><span class="TextPart"><a href="javascript:void(0)" class="<?=$illness?>" sec="2">About The Illness</a></span></div>
		<div class="step <?=$phdone?>" ><span class="normalBG"><span class="GreenBG" style="width:<?=$phwidth?>%;"></span></span><span class="TextPart"><a href="javascript:void(0)" class="<?=$pasthis?>" sec="3">Past History</a></span></div>
		<div class="step Last <?=$trdone?>"><span class="normalBG"><span class="GreenBG" style="width:<?=$trwidth?>%;"></span></span><span class="TextPart"><a href="javascript:void(0)" class="<?=$updocts?>" sec="4">Test Reports</a></span></div>
	</div>
	<h3><?=$complt?><?=($totalcompletedper*20)?>%</h3>
	<?php
	
		if($totalcompletedper==5){
			echo $this->Html->link('Submit',array('controller'=>'patientDetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'blueButton submitBtn'));//,'style'=>'margin: 66px 17px 0 0;'
		}
		//if($numberformpost<5){
		else{
			echo $this->Html->link('Enter questionnaire',array('controller'=>'patientDetails','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'finishButton')); //,'style'=>'margin:90px 4px 0 0;'
		}
		
	?>
		