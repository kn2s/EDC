  
  <section class="myAccountBanner"> </section>
  <section class="myAccountLogin">
  	<div class="clear"></div>
  	<div class="container940">
	
	<?php echo $this->Session->flash(); ?>
	
    	<section class="signIn">
        	<h2>Sign in</h2>
            <div class="formCont">
			<?php echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false))); 
				echo $this->Form->hidden('signuporlogin',array('value'=>'0'));
			?>
            	<div class="mailId"><input type="text" placeholder="Email" name="data[Patient][email]"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][password] placeholder="Password"></div>
                <input type="submit" class="blueButton" value="Sign In">
                <label><input type="checkbox">Keep me signed in</label>
			</form>
                <div class="clear"></div>
                <a href="#">Forgot your password?</a>
            </div>
        </section>
        <section class="signUp">
        	<h2>Create Account</h2>
            <div class="formCont">
			<?php echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false)));
				echo $this->Form->hidden('signuporlogin',array('value'=>'1'));
			?>
            	<div class="userName"><input type="text" name="data[Patient][name]" placeholder="Name"></div>
                <div class="mailId"><input type="text" name="data[Patient][email]" placeholder="Email"></div>
                <div class="pass"><input type="password" name="data[Patient][password]" placeholder="Password"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][cpassword]" placeholder="Re enter"></div>
                <label><input type="checkbox" name="data[Patient][terms]" value="1">Accept <a href="#">terms and conditions</a></label>
                <input type="submit" class="blueButton" value="Register">
			</form>
            </div>
        </section>
        <div class="clear"></div>
    </div>
  </section>