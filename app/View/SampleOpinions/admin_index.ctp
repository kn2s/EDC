<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sample Opinion</h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Sample Opinion Details
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
				 
					
						<!-- create by php form fields -->
						<?php
							echo $this->Form->create('SampleOpinion',array('action'=>'edit','id'=>'sampleopinion'));
							echo $this->Form->input('SampleOpinion.id',array('type'=>'hidden'));
							echo $this->Form->input('SampleOpinion.doctor_name',array('type'=>'text','div'=>'form-group','label'=>'*Doctor Name','class'=>'form-control', 'placeholder'=>'Doctor Name','required'=>'true'));
							echo $this->Form->input('SampleOpinion.doctor_qualification',array('type'=>'text','div'=>'form-group','label'=>'*Doctorate Qualification','class'=>'form-control', 'placeholder'=>'Doctorate Qualification','required'=>'true'));//,'required'=>'true'
							
							echo $this->Form->input('SampleOpinion.patient_name',array('type'=>'test','div'=>'form-group','label'=>'*Patient Name','class'=>'form-control', 'placeholder'=>'Patient Name','required'=>'true'));
							echo $this->Form->input('SampleOpinion.create_date',array('type'=>'text','div'=>'form-group','label'=>'*Opinion Date','class'=>'form-control', 'placeholder'=>'Opinion Date','required'=>'true'));
							echo $this->Form->input('SampleOpinion.refferences',array('div'=>'form-group','label'=>'Refference','class'=>'form-control','placeholder'=>'Refference','required'=>'true'));
							
							echo $this->Form->input('SampleOpinion.assesment',array('type'=>'textarea','div'=>'form-group','label'=>'*Assessment & Explanation','class'=>'form-control', 'placeholder'=>'Assessment & Explanation','required'=>'true'));//
							echo $this->Form->input('SampleOpinion.prognosis',array('type'=>'textarea','div'=>'form-group','label'=>'*Prognosis','class'=>'form-control', 'placeholder'=>'Prognosis','required'=>'true'));//
							echo $this->Form->input('SampleOpinion.best_tritment_strategy',array('type'=>'textarea','div'=>'form-group','label'=>'*Best Tritment Strategy','class'=>'form-control', 'placeholder'=>'Best Tritment Strategy','required'=>'true'));//
							echo $this->Form->input('SampleOpinion.alternative_strategy',array('type'=>'textarea','div'=>'form-group','label'=>'*Alternative Strategy','class'=>'form-control', 'placeholder'=>'Alternative Strategy','required'=>'true'));//
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default js-sampleopinion">Update Opinion</button>
						<button type="reset" class="btn btn-default">Reset Opinion</button>
						<button type="reset" class="btn btn-back">Back</button>
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