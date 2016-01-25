<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Change Doctor Password</h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
				 <!-- create by php form fields -->
						<?php
							echo $this->Form->create('Doctor',array('id'=>'passchange'));
							echo $this->Form->input('id',array('type'=>'hidden'));
							echo $this->Form->input('patient_id',array('type'=>'hidden'));
							echo $this->Form->input('Patient.id',array('type'=>'hidden'));
							echo $this->Form->input('Patient.dpdfldshow',array('type'=>'text','div'=>'form-group','label'=>'*New Password','class'=>'form-control', 'placeholder'=>'New password','required'=>'true'));
							//echo $this->Form->input('Patient.cpassword',array('type'=>'text','div'=>'form-group','label'=>'*Confirm Password','class'=>'form-control', 'placeholder'=>'Confirm password','required'=>'true'));
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default js-doctpasswordchange">Reset Password</button>
						<button type="reset" class="btn btn-back">Back</button>
						<!--<a href="javascript:void(0)" class="btn btn-back">Back</a>-->
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