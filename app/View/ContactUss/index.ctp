<section class="myAccountBanner"> </section>
<section class="myAccountLogin">
  	<div class="clear"></div>
  	<div class="container940">
	<?php echo $this->Session->flash(); ?>
    	<!--<section class="signIn">
        	<h2>Sign in</h2>
            <div class="formCont">
			<?php echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false),'id'=>'loginform')); 
				echo $this->Form->hidden('signuporlogin',array('value'=>'0'));
			?>
            	<div class="mailId"><input type="text" placeholder="Email" name="data[Patient][email]" id="lemail" class="lginfld"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][password]" placeholder="Password" id="pass" class="lginfld"></div>
                <input type="button" class="blueButton js-signin" value="Sign In" >
                <label><input type="checkbox">Keep me signed in</label>
				<label id="loginerror" style="color:red;"></label>
			</form>
                <div class="clear"></div>
                <a href="javascript:void(0)">Forgot your password?</a>
            </div>
			
        </section>-->
		<center>
        <section class="signUp" style="float:none!important;">
        	<h2>Contact With Us</h2>
            <div class="formCont">
			<?php 
				echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false),'id'=>'signupform'));
			?>
            	<div class="userName"><input type="text" name="name" placeholder="Name" id="name" class="sgnufld vldinput"></div>
                <div class="mailId bb40"><input type="text" name="email" placeholder="Email" id="email" class="sgnufld vldinput"></div>
                <input type="button" class="blueButton js-contactus" value="Send" />

			</form>
			
            </div>
			
        </section>
		<center>
        <div class="clear"></div>
    </div>
  </section>