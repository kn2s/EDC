<div class="col-md-4 col-md-offset-4">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Please Sign In</h3>
		</div>
		<div class="panel-body">
			<!--<form role="form">-->
			<?php echo $this->Form->create('Admin',array('action'=>'index','role'=>'form'));?>
				<fieldset>
					<?php echo $this->Session->flash(); ?>
					<!--<div class="form-group">
						<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Password" name="password" type="password" value="">
					</div>-->
					
					<?php echo $this->Form->input('email',array('type'=>'text','class'=>'form-control','placeholder'=>'E-mail','div'=>'form-group','label'=>false,'autofocus'=>true));?>
					<?php echo $this->Form->input('password',array('type'=>'password','div'=>'form-group','label'=>false,'class'=>'form-control','placeholder'=>'Password'));?>
					<div class="checkbox">
						<label>
							<input name="remember" type="checkbox" value="Remember Me">Remember Me
						</label>
					</div>
					<!-- Change this to a button or input when using this as a form -->
					<!--<a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
					<?php echo $this->Form->input('Login',array('type'=>'submit','div'=>false,'label'=>false,'class'=>'btn btn-lg btn-success btn-block')); ?>
				</fieldset>
			</form>
		</div>
	</div>
</div>