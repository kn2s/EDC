<script type="text/javascript">
	$(document).ready(function(){
		$("#lsbtn").bind('click',loginvalidate);
		$("#ssbtn").bind('click',signuuvalidate);
		$("#lsbtn").disabled=true;
		$("#ssbtn").disabled=true;
	});
	function loginvalidate(e){
		
		if($("#lemail").val()==''){
			
			$("#lemail").attr('placeholder','Email required');
			return false;
		}
		if($("#pass").val()==''){
			
			$("#pass").attr('placeholder','Password required');
			return false;
		}
		return true;
	}
	function signuuvalidate(e){
		if($("#name").val()==''){
			$("#name").attr('placeholder','Name required');
			return false;
		}
		if($("#email").val()==''){
			$("#email").attr('placeholder','Email required');
			return false;
		}
		if($("#spass").val()==''){
			$("#spass").attr('placeholder','Password required');
			return false;
		}
		else{
			if($("#spass").val()!=$("#cpass").val()){
				$("#cpass").attr('placeholder','Password dose not match');
				return false;
			}
		}
		return true;
	}
</script>  
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
            	<div class="mailId"><input type="text" placeholder="Email" name="data[Patient][email]" id="lemail"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][password]" placeholder="Password" id="pass"></div>
                <input type="submit" class="blueButton" value="Sign In" id="lsbtn">
                <label><input type="checkbox">Keep me signed in</label>
			</form>
                <div class="clear"></div>
                <a href="javascript:void(0)">Forgot your password?</a>
            </div>
			
        </section>
        <section class="signUp">
        	<h2>Create Account</h2>
            <div class="formCont">
			<?php echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false)));
				echo $this->Form->hidden('signuporlogin',array('value'=>'1'));
			?>
            	<div class="userName"><input type="text" name="data[Patient][name]" placeholder="Name" id="name"></div>
                <div class="mailId"><input type="text" name="data[Patient][email]" placeholder="Email" id="email"></div>
                <div class="pass"><input type="password" name="data[Patient][password]" placeholder="Password" id="spass"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][cpassword]" placeholder="Re enter" id="cpass"></div>
                <label><input type="checkbox" name="data[Patient][terms]" value="1" id="chkbtn">Accept <a href="javascript:void(0)">terms and conditions</a></label>
                <input type="submit" class="blueButton" value="Register" id="ssbtn">
			</form>
			
            </div>
			
        </section>
        <div class="clear"></div>
    </div>
  </section>