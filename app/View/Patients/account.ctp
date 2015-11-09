<section class="myAccountBanner"> </section>

  <section class="myAccountLogin">
  	<div class="clear"></div>
  	<div class="container940">
	<?php echo $this->Session->flash(); ?>
    	<section class="signIn">
        	<h2>Sign in</h2>
            <div class="formCont">
			<?php echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false),'id'=>'loginform')); 
				echo $this->Form->hidden('signuporlogin',array('value'=>'0'));
			?>
            	<div class="mailId"><input type="text" placeholder="Email" name="data[Patient][email]" id="lemail"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][password]" placeholder="Password" id="pass"></div>
                <input type="button" class="blueButton js-signin" value="Sign In" >
                <label><input type="checkbox">Keep me signed in</label>
				<label id="loginerror" style="color:red;"></label>
			</form>
                <div class="clear"></div>
                <a href="javascript:void(0)">Forgot your password?</a>
            </div>
			
        </section>
        <section class="signUp">
        	<h2>Create Account</h2>
            <div class="formCont">
			<?php echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false),'id'=>'signupform'));
				echo $this->Form->hidden('signuporlogin',array('value'=>'1'));
			?>
            	<div class="userName"><input type="text" name="data[Patient][name]" placeholder="Name" id="name"></div>
                <div class="mailId"><input type="text" name="data[Patient][email]" placeholder="Email" id="email"></div>
                <div class="pass"><input type="password" name="data[Patient][password]" placeholder="Password" id="spass"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][cpassword]" placeholder="Re enter" id="cpass"></div>
                <label><input type="checkbox" name="data[Patient][terms]" value="1" id="chkbtn">Accept <a href="javascript:void(0)">terms and conditions</a></label>
                <input type="button" class="blueButton js-signup" value="Register" >

			</form>
			
            </div>
			
        </section>
        <div class="clear"></div>
    </div>
  </section>