<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Service Page Content</h1>
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
							echo $this->Form->create('Service');
							echo $this->Form->hidden('id');
							echo $this->Form->input('doct_service_brif',array('type'=>'textarea','div'=>'form-group','label'=>'Doctor Service Heading','class'=>'form-control', 'placeholder'=>'Doctor Service Heading'));
							echo $this->Form->input('doct_service_detail',array('type'=>'textarea','div'=>'form-group','label'=>'Doctor Service Description','class'=>'form-control', 'placeholder'=>'Doctor Service Description'));
							echo $this->Form->input('doc_collabration_title',array('type'=>'text','div'=>'form-group','label'=>'Doctor Collabration Heading','class'=>'form-control', 'placeholder'=>'Doctor Collabration Heading'));
							echo $this->Form->input('doc_colla_option_one',array('type'=>'textarea','div'=>'form-group','label'=>'Doctor Collabration Section One','class'=>'form-control', 'placeholder'=>'Doctor Collabration Text'));
							echo $this->Form->input('doc_colla_option_two',array('type'=>'textarea','div'=>'form-group','label'=>'Doctor Collabration Section Two','class'=>'form-control', 'placeholder'=>'Doctor Collabration Text'));
							echo $this->Form->input('doc_colla_option_three',array('type'=>'textarea','div'=>'form-group','label'=>'Doctor Collabration Section Three','class'=>'form-control', 'placeholder'=>'Doctor Collabration Text'));
							echo $this->Form->input('doc_colla_option_four',array('type'=>'textarea','div'=>'form-group','label'=>'Doctor Collabration Section Four','class'=>'form-control', 'placeholder'=>'Doctor Collabration Text'));
							echo $this->Form->input('doc_colla_email',array('type'=>'email','div'=>'form-group','label'=>'Doctor Collabration Email','class'=>'form-control', 'placeholder'=>'Doctor Collabration Email'));
							
							echo $this->Form->input('patient_service_brif',array('type'=>'textarea','div'=>'form-group','label'=>'Patient Service Heading','class'=>'form-control', 'placeholder'=>'Patient Service Heading'));
							echo $this->Form->input('patient_service_detail',array('type'=>'textarea','div'=>'form-group','label'=>'Patient Service Description','class'=>'form-control', 'placeholder'=>'Patient Service Description'));
							
							echo $this->Form->input('patient_hepling_title',array('type'=>'textarea','div'=>'form-group','label'=>'Patient Helping Heading','class'=>'form-control', 'placeholder'=>'Patient Helping Heading'));
							echo $this->Form->input('patient_helping_way',array('type'=>'textarea','div'=>'form-group','label'=>'How Doctors Helping Way(Each way write between <h4></h4>)','class'=>'form-control', 'placeholder'=>'How Doctor Helping Patients'));
							echo $this->Form->input('consulting_charge',array('type'=>'text','div'=>'form-group','label'=>'Patient Consulting Charge($)','class'=>'form-control', 'placeholder'=>'Patient Consulting Charge($)'));
						 
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