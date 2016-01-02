<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Doctor</h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			New doctor details
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
				 
					
						<!-- create by php form fields -->
						<?php
							echo $this->Form->create('Doctor',array('type'=>'file','id'=>'crtdoctfrm'));
							echo $this->Form->input('patient_id',array('type'=>'hidden','value'=>'0'));
							echo $this->Form->input('Patient.ispatient',array('type'=>'hidden','value'=>'0'));
							echo $this->Form->input('Patient.createtime',array('type'=>'hidden','value'=>'0'));
							echo $this->Form->input('Patient.name',array('type'=>'text','div'=>'form-group','label'=>'*Doctor Name','class'=>'form-control', 'placeholder'=>'Doctor Name'));
							echo $this->Form->input('Patient.email',array('type'=>'email','div'=>'form-group','label'=>'*Doctor Email','class'=>'form-control', 'placeholder'=>'Doctor Email'));
							echo $this->Form->input('Patient.password',array('type'=>'password','div'=>'form-group','label'=>'*Password','class'=>'form-control', 'placeholder'=>'Password'));
							echo $this->Form->input('specialization_id',array('div'=>'form-group','label'=>'Specialized In','class'=>'form-control'));
							echo $this->Form->input('image',array('type'=>'file','div'=>'form-group','label'=>'*Doctor Image','id'=>'doctimage'));
							echo $this->Form->input('designation',array('type'=>'text','div'=>'form-group','label'=>'*Doctorate In','class'=>'form-control', 'placeholder'=>'Doctorate In','required'=>'true'));
							echo $this->Form->input('medical_school',array('type'=>'text','div'=>'form-group','label'=>'*Doctorate School','class'=>'form-control', 'placeholder'=>'Doctorate School','required'=>'true'));
							echo $this->Form->input('residency',array('type'=>'text','div'=>'form-group','label'=>'*Residency In','class'=>'form-control', 'placeholder'=>'Residency In','required'=>'true'));
							echo $this->Form->input('residency_from',array('type'=>'text','div'=>'form-group','label'=>'*Residency From','class'=>'form-control', 'placeholder'=>'Residency From','required'=>'true'));
			
							echo $this->Form->input('fellowship',array('type'=>'text','div'=>'form-group','label'=>'*Fellowship In','class'=>'form-control', 'placeholder'=>'Fellowship In','required'=>'true'));
							echo $this->Form->input('fellowship_from',array('type'=>'text','div'=>'form-group','label'=>'*Fellowship From','class'=>'form-control', 'placeholder'=>'Fellowship From','required'=>'true'));
							echo $this->Form->input('twitter',array('type'=>'text','div'=>'form-group','label'=>'*Twitter Profile','class'=>'form-control', 'placeholder'=>'Twitter Profile','required'=>'true'));
							echo $this->Form->input('facebook',array('type'=>'text','div'=>'form-group','label'=>'*Facebook Profile','class'=>'form-control', 'placeholder'=>'Facebook Profile','required'=>'true'));
							echo $this->Form->input('description_one',array('type'=>'textarea','div'=>'form-group','label'=>'*Description','class'=>'form-control', 'placeholder'=>'Description','required'=>'true'));
							echo $this->Form->input('description_two',array('type'=>'textarea','div'=>'form-group','label'=>'*More Description','class'=>'form-control', 'placeholder'=>'More Description','required'=>'true'));
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default js-doctadd">Add Doctor</button>
						<button type="reset" class="btn btn-default">Reset Doctor</button>
					</form>
				</div>
				<!-- /.col-lg-6 (nested) -->
			   
			 
					<!--<form role="form">
						<div class="form-group has-success">
							<label class="control-label" for="inputSuccess">Input with success</label>
							<input type="text" class="form-control" id="inputSuccess">
						</div>
						<div class="form-group has-warning">
							<label class="control-label" for="inputWarning">Input with warning</label>
							<input type="text" class="form-control" id="inputWarning">
						</div>
						<div class="form-group has-error">
							<label class="control-label" for="inputError">Input with error</label>
							<input type="text" class="form-control" id="inputError">
						</div>
					</form>-->
				 
				</div>
				<!-- /.col-lg-6 (nested) -->
			</div>
			<!-- /.row (nested) -->
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>