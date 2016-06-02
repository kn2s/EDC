<style>
.txtareamy{
margin: 0px; 
height: 88px;
width: 289px; 
padding: 5px 0 5px 10px;
}
.mt10{
margin-top:10px;
}
</style>
<section class="myAccountBanner"> </section>
<section class="myAccountLogin">
  	<div class="clear"></div>
  	<div class="container940">
	<?php echo $this->Session->flash(); ?>
    	
		<center>
        <section class="signUp" style="float:none!important;">
        	<h2>Contact With Us</h2>
            <div class="formCont">
			<?php 
				echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false),'id'=>'signupform'));
			?>
            	<div class="userName"><input type="text" name="name" placeholder="Name" id="name" class="sgnufld vldinput"></div>
                <div class="mailId"><input type="text" name="email" placeholder="Email" id="email" class="sgnufld vldinput"></div>
                <div class="bb40 mt10">
				<textarea class="sgnufld txtareamy" name="message" placeholder="write your message"></textarea>
				</div>
				<input type="button" class="blueButton js-contactus" value="Send" />

			</form>
			
            </div>
			
        </section>
		<center>
        <div class="clear"></div>
    </div>
  </section>