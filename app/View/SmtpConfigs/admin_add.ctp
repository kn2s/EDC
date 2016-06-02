<!--<div class="smtpConfigs form">
<?php echo $this->Form->create('SmtpConfig'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Smtp Config'); ?></legend>
	<?php
		echo $this->Form->input('smtp_host');
		echo $this->Form->input('smtp_port');
		echo $this->Form->input('smtp_username');
		echo $this->Form->input('smtp_password');
		echo $this->Form->input('smtp_client');
		echo $this->Form->input('is_default');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">SMTP Email Setting</h1>
	</div>
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
						<!-- create by php form fields -->
						<?php
							echo $this->Form->create('SmtpConfig');
							echo $this->Form->hidden('id');
							echo $this->Form->input('smtp_host',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Host '));
							echo $this->Form->input('smtp_port',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Port No'));
							echo $this->Form->input('smtp_username',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Username'));
							echo $this->Form->input('smtp_password',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Password'));
							echo $this->Form->input('smtp_client',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Client'));
							echo $this->Form->input('is_active',array('type'=>'checkbox','style'=>'margin-left:0px;'));
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default">Save</button>
					</form>
				</div>
				<!-- /.col-lg-6 (nested) -->
			 
				</div>
				<!-- /.col-lg-6 (nested) -->
			</div>
			<!-- /.row (nested) -->
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Default SMTP Email Setting</h1>
	</div>
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
						<!-- create by php form fields -->
						<?php
							echo $this->Form->create('SmtpConfigDflt');
							echo $this->Form->input('smtp_host',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Host','readonly'=>true));
							echo $this->Form->input('smtp_port',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Port No','readonly'=>true));
							echo $this->Form->input('smtp_username',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Username','readonly'=>true));
							echo $this->Form->input('smtp_password',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Password','readonly'=>true));
							echo $this->Form->input('smtp_client',array('type'=>'text','div'=>'form-group','class'=>'form-control', 'placeholder'=>'SMTP Client','readonly'=>true));
						?>
					</form>
				</div>
				<!-- /.col-lg-6 (nested) -->
			 
				</div>
				<!-- /.col-lg-6 (nested) -->
			</div>
			<!-- /.row (nested) -->
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>