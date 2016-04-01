<div style="width:100%;border-bottom: 2px solid #fff; margin-bottom:15px;">
					
	<p style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;color: #fff; font-weight:500; padding:0 0 0 0;" mc:edit="hi_name"> Hi,<?=$name?></p>
	<p>
	<?php
		if(isset($bodymessage) && $bodymessage!=''){
			echo $bodymessage;
		}
		else{
			echo "Communications ";
		}
	?>
	</p>
	<div style="clear:both;"></div>
</div>
					
<div style="width:100%;border-bottom: 2px solid #fff; margin-bottom:15px;">
	
	<h1 style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;color: #fff; font-weight:600; padding:0 0 10px 0; margin:0;"><?=$who_do?></h1>
	
	<div style="width:100%; padding:0 0 10px 0;" mc:edit="details">
		<p style="margin:0 0 5px 10px;"><?=$user_message?></p>
	</div>
	
	<div style="clear:both;"></div>
</div>
					