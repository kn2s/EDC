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
	<div style="text-align: center; padding-top: 10px;">
		<?php echo $this->Session->flash(); ?>
    </div>
		<center>
        <section class="signUp" style="float:none!important;">
        	<h2>Reset password</h2>
            <div class="formCont">
			<?php 
				echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false),'id'=>'resetfrm'));
			?>
            	<div class="pass"><input type="password" name="nwpass" placeholder="New Password" class="sgnufld vldinput"></div>
                <div class="pass bb40"><input type="password" name="nwcmpass" placeholder="Re-enter" class="sgnufld vldinput"></div>
                
				<input type="submit" class="blueButton js-resetpass" value="Reset" />

			</form>
			
            </div>
			
        </section>
		<center>
        <div class="clear"></div>
    </div>
  </section>