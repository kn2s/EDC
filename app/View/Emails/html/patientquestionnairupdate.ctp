<div style="width:100%;border-bottom: 2px solid #fff; margin-bottom:15px;">
					
	<p style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;color: #fff; font-weight:500; padding:0 0 0 0;" mc:edit="hi_name"> Hi, <?php echo $name;?></p>
	
	<p>Your Patient Mr.<?=$patient_name?> update the questionnair.</p>
	<p>
	<?php
		if(isset($bodymessage) && $bodymessage!=''){
			echo $bodymessage;
		}
	?>
	</p>
	<div style="clear:both;"></div>
</div>
					
<div style="width:100%;border-bottom: 2px solid #fff; margin-bottom:15px;">
	
	<h1 style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;color: #fff; font-weight:600; padding:0 0 10px 0; margin:0;">Case Details:</h1>
	
	<div style="width:100%; padding:0 0 10px 0;" mc:edit="details">
		<p style="margin:0 0 5px 10px;">Case Id : <?=$case_id?></p>
		<p style="margin:0 0 5px 10px;">Diagnosis : <?=$diagnosis?></p>
		<p style="margin:0 0 5px 10px;">Patient Name : <?=$patient_name?></p>
	</div>
	
	<div style="clear:both;"></div>
</div>
					