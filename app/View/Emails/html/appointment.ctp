<div style="width:100%;border-bottom: 2px solid #fff; margin-bottom:15px;">
					
	<p style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;color: #fff; font-weight:500; padding:0 0 0 0;" mc:edit="hi_name"> Hi, <?=$name?></p>
	<p>
	<?php
		if(isset($bodymessage) && $bodymessage!=''){
			echo $bodymessage;
		}
		else{
			//echo "This is your appointment. Accorning to your questionnairs information provided by you.";
		}
	?>
	</p>
	
	<div style="clear:both;"></div>
</div>
					
<div style="width:100%;border-bottom: 2px solid #fff; margin-bottom:15px;">
	
	<h1 style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;color: #fff; font-weight:600; padding:0 0 10px 0; margin:0;">Appointment details</h1>
	
	<div style="width:100%; padding:0 0 10px 0;" mc:edit="details">
		<p style="margin:0 0 5px 10px;">Appointment Id : <?=$case_id?></p>
		<p style="margin:0 0 5px 10px;">Doctor Name : <?=$doctorname?></p>
		<p style="margin:0 0 5px 10px;">Diagonisis Name : <?=$diagonisis?></p>
		<p style="margin:0 0 5px 10px;">Appointment Date : <?=$available_date?></p>
		<p style="margin:0 0 5px 10px;">Opinion Due Date : <?=$opinion_due_date?></p>
		<p style="margin:0 0 5px 10px;">Consultant Fee : $<?=$consultant_fee?></p>
	</div>
	
	<div style="clear:both;"></div>
</div>			