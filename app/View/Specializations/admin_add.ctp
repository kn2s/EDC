
<div class="row">
	<center><?php echo $this->Session->flash(); ?></center>
	<div class="col-lg-12">
		<h1 class="page-header">Add Specialization</h1>
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
							echo $this->Form->create('Specialization');
							echo $this->Form->input('createdon',array('type'=>'hidden','value'=>'0'));
							echo $this->Form->input('isactive',array('type'=>'hidden','value'=>'1'));
							echo $this->Form->input('name',array('type'=>'text','div'=>'form-group','label'=>'Cancer Specialization Name','class'=>'form-control', 'placeholder'=>'Specialization Name'));
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default">Add Specialization</button>
						<button type="reset" class="btn btn-default">Reset Specialization</button>
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