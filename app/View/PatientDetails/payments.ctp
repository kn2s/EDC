<div style="display:none;">
<form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="item_name" value="<?=$configdata['item_name']?>">
    <input type="hidden" name="item_number" value="<?=$configdata['item_number']?>">
    <input type="hidden" name="amount" value="<?=$configdata['amount']?>">
    <input type="hidden" name="currency_code" value="<?=$configdata['currency_code']?>">
	<input type="hidden" name="custom" value="<?=$configdata['case_id']?>">
	
	<!--<input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
	<input type="hidden" name="credits" value="510">
	<input type="hidden" name="handling" value="0">
	<input type="hidden" name="userid" value="1">
	-->
    
    <input type="hidden" name="cancel_return" value="<?=$configdata['cancel_return']?>">
    <input type="hidden" name="return" value="<?=$configdata['return']?>">
	
    <!--<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">-->
	<input type="submit" id="pfrms">
</form>
</div>

<?php 
	echo "<script>$('#pfrms').trigger('click');</script>";
?>