<div style="width:100%;border-bottom: 2px solid #fff; margin-bottom:15px;">
					
	<p style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;color: #fff; font-weight:500; padding:0 0 0 0;" mc:edit="hi_name"> Hi, <?=$name?></p>
	<p>
	<?php
		if(isset($bodymessage) && $bodymessage!=''){
			echo $bodymessage;
		}
	?>
	</p>
	<div style="clear:both;"></div>
</div>