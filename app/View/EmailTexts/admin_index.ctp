<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Email Body Text</h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
	<!-- form section start -->
<?php 
	echo $this->Form->create('EmailText');
	echo $this->Form->input('id',array('type'=>'hidden'));
?>
		<div class="panel panel-default">
			<div class="panel-heading">
				Email Text
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
					 <!-- create by php form fields -->
							<?php
								echo $this->Form->input('registration',array('type'=>'textarea','div'=>'form-group','label'=>'Registration Text','class'=>'form-control', 'placeholder'=>'Registration body text','required'=>'true'));
								echo $this->Form->input('appointment_confirm',array('type'=>'textarea','div'=>'form-group','class'=>'form-control','required'=>'true','placeholder'=>'Appintment body text'));
								echo $this->Form->input('contact_us',array('type'=>'textarea','class'=>'form-control','required'=>'true','placeholder'=>'Contact us body text'));
								
								echo $this->Form->input('doc_allow_modify',array('type'=>'textarea','div'=>'form-group','class'=>'form-control', 'placeholder'=>'Document modify allowed text','required'=>'true'));
								echo $this->Form->input('quesionair_modify',array('type'=>'textarea','div'=>'form-group','label'=>'Questionnair modify confirm','class'=>'form-control', 'placeholder'=>'Questionnair modify confirm body text','required'=>'true'));
								echo $this->Form->input('communication_recieve',array('type'=>'textarea','div'=>'form-group','class'=>'form-control', 'placeholder'=>'communication received body text','required'=>'true','label'=>'Communication Receive'));
								
								echo $this->Form->input('password_recovery',array('type'=>'textarea','div'=>'form-group','class'=>'form-control', 'placeholder'=>'Password recovery body text'));
								echo $this->Form->input('case_assign',array('type'=>'textarea','div'=>'form-group','class'=>'form-control', 'placeholder'=>'Case assign body text'));
								echo $this->Form->input('opinion_due_alert',array('type'=>'textarea','div'=>'form-group','class'=>'form-control','placeholder'=>'Opinion due alert body text'));
								echo $this->Form->input('opinion_submited',array('type'=>'textarea','div'=>'form-group','class'=>'form-control','placeholder'=>'Opinion submitted'));//
								echo $this->Form->input('opinion_thanks',array('type'=>'textarea','div'=>'form-group','class'=>'form-control','placeholder'=>'Thanks to doctor for submitting opion'));//
								echo $this->Form->input('opinion_missed',array('type'=>'textarea','div'=>'form-group','class'=>'form-control','placeholder'=>'doctor miss to submit the opionion'));//
							?>
					</div>
					<!-- /.col-lg-6 (nested) -->
				</div>	
					<!-- /.col-lg-6 (nested) -->
			</div>
				<!-- /.row (nested) -->
		</div>
		<!-- foem end sections -->
	<button type="submit" class="btn btn-default">Update Texts</button>
	<button type="reset" class="btn btn-back">Back</button>
	</form>
	</div>
	<!-- /.panel -->
</div>
