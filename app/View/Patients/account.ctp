<script type="text/javascript">
	var baseurl = "<?php echo FULL_BASE_URL.$this->base;?>";
	$(document).ready(function(){
		$("#lsbtn").bind('click',loginvalidate);
		$("#ssbtn").bind('click',signuuvalidate);
		$("#lsbtn").disabled=true;
		$("#ssbtn").disabled=true;
	});
	function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
	function loginvalidate(e){
		$("#loginerror").hthl("");
		if(!ValidateEmail($("#lemail").val())){
			$("#lemail").val('');
			//$("#lemail").attr('placeholder','Valid email address required');
			$("#loginerror").hthl("Invalid email address");
			return false;
		}
		
		if($("#pass").val()=='' || $("#pass").val().lenght<4){
			//$("#pass").attr('placeholder','Password required');
			$("#loginerror").hthl("Invalid password formate");
			return false;
		}
		
		$("#preloaderdv").show();
		$.ajax({
			url:baseurl+'/patients/ajaxlogin',
			method:'post',
			dataType:'json',
			data:$("#loginform").serialize(),
			error:function(response){
				console.log(response);
				$("#preloaderdv").hide();
			},
			success:function(response){
				console.log(response);
				$("#preloaderdv").hide();
				//alert(response.message);
				if(parseInt(response.status) === 1){
					
					window.location=baseurl+'/patients/dashboard';
				}
				else{	
					alert(response.message);
				}
			}
		});
		return false;
	}
	
	
	function signuuvalidate(e){
		$("#errormsgsg").html("");
		if($("#name").val()=='' || $("#name").val().length<4){
			//$("#name").attr('placeholder','Name should be at least 5 char');
			$("#errormsgsg").html("Name should be at lease 5 char");
			return false;
		}
		
		if(!ValidateEmail($("#email").val())){
			$("#email").val('');
			//$("#email").attr('placeholder','Invalid email address');
			$("#errormsgsg").html("Invalid email address");
			return false;
		}
		
		if($("#spass").val()=='' || $("#spass").val().length<4){
			//$("#spass").attr('placeholder','Password should be atleast 5 char');
			$("#errormsgsg").html("Password should be atleast 5 char");
			return false;
		}
		else{
			if($("#spass").val()!=$("#cpass").val()){
				//$("#cpass").attr('placeholder','Confirm password should be same as password');
				$("#errormsgsg").html("Confirm password shoudbe same as password");
				return false;
			}
		}
		//term and conditions
		if(!$("#chkbtn").is(":checked")){
			//alert("Accept the term and condition");
			$("#errormsgsg").html("Accept the term and condition");
			return false;
		}
		//
		$("#preloaderdv").show();
		$.ajax({
			url:baseurl+'/patients/ajaxsignup',
			method:'post',
			dataType:'json',
			data:$("#signupform").serialize(),
			error:function(response){
				console.log(response);
				//alert("error");
				$("#preloaderdv").hide();
			},
			success:function(response){
				console.log(response);
				$("#signupform")[0].reset();
				$("#preloaderdv").hide();
				alert(response.message);
			}
		});
		return false;
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
			<?php echo $this->Form->create('Patient',array('inputDefaults' => array('label' => false,'div' => false),'id'=>'loginform')); 
				echo $this->Form->hidden('signuporlogin',array('value'=>'0'));
			?>
            	<div class="mailId"><input type="text" placeholder="Email" name="data[Patient][email]" id="lemail"></div>
                <div class="pass bb40"><input type="password" name="data[Patient][password]" placeholder="Password" id="pass"></div>
                <input type="submit" class="blueButton" value="Sign In" id="lsbtn">
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
                <label id="errormsgsg" style="color:red;"></label>
				<label><input type="checkbox" name="data[Patient][terms]" value="1" id="chkbtn">Accept <a href="javascript:void(0)">terms and conditions</a></label>
                <input type="submit" class="blueButton" value="Register" id="ssbtn">
			</form>
			
            </div>
			
        </section>
        <div class="clear"></div>
    </div>
  </section>