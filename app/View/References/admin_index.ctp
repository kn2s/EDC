<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<?php 
	//pr($reference);
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Reference</h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Reference
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
						<!-- create by php form fields $reference['Reference'] -->
						<?php
							echo $this->Form->create('Reference',array('action'=>'edit','id'=>'reference'));
							echo $this->Form->input('Reference.id',array('type'=>'hidden'));
							echo $this->Form->input('Reference.reference_data',array('type'=>'hidden','div'=>'form-group','label'=>'','class'=>'form-control', 'placeholder'=>''));
							
							echo $this->Form->input('Reference.chemotherapy',array('type'=>'textarea','div'=>'form-group','label'=>'*What is Chemotherapy?','class'=>'form-control', 'placeholder'=>'Wright some thing Chemotherapy','required'=>'true'));//
							echo $this->Form->input('Reference.radiotherapy',array('type'=>'textarea','div'=>'form-group','label'=>'*What is Radiotherapy?','class'=>'form-control', 'placeholder'=>'Wright some thing Radiotherapy','required'=>'true'));//
							echo $this->Form->input('Reference.targeted_therapy',array('type'=>'textarea','div'=>'form-group','label'=>'*What is Targeted Therapy?','class'=>'form-control', 'placeholder'=>'Wright some thing Targeted Therapy','required'=>'true'));//
							echo $this->Form->input('Reference.immunotherapy',array('type'=>'textarea','div'=>'form-group','label'=>'*What is Immunotherapy?','class'=>'form-control', 'placeholder'=>'Wright some thing Immunotherapy','required'=>'true'));//
							echo $this->Form->input('Reference.clinical_trials',array('type'=>'textarea','div'=>'form-group','label'=>'*What is Clinical Trials?','class'=>'form-control', 'placeholder'=>'Wright some thing Clinical Trials?','required'=>'true'));//
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default js-reference">Update Refference</button>
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