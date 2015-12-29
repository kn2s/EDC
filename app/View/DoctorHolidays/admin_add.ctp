<!--<div class="doctorHolidays form">
<?php echo $this->Form->create('DoctorHoliday'); ?>
	<fieldset>
		<legend><?php echo __('Add Doctor Holiday'); ?></legend>
	<?php
		echo $this->Form->input('doct_id');
		echo $this->Form->input('holidaydate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Doctor Holidays'), array('action' => 'index')); ?></li>
	</ul>
</div>-->
<!--
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-ui.min.js"></script>
-->

<!-- script section for date picker sections -->
<script>
	$(document).ready(function(){
		$.datepicker.setDefaults(
			$.extend($.datepicker.regional[''])
		);
		$('.datepicker').datepicker({
			dateFormat:'yy-mm-dd',
			minDate:'toDate'
		});
	});
	

</script>
<div class="row">
	<center><?php echo $this->Session->flash(); ?></center>
	<div class="col-lg-12">
		<h1 class="page-header">Add Doctor Holiday</h1>
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
							echo $this->Form->create('DoctorHoliday');
							echo $this->Form->input('doct_id',array('label'=>'Doctor','class'=>'form-control','value'=>$coosedoct));
							echo $this->Form->input('holidaydate',array('id'=>'datepicker','type'=>'text','div'=>'form-group','label'=>'Holiday From','class'=>'form-control datepicker', 'placeholder'=>'Holiday From'));
							echo $this->Form->input('holidaydatetill',array('type'=>'text','div'=>'form-group','label'=>'Holiday Till','class'=>'form-control datepicker', 'placeholder'=>'Holiday Till'));
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default">Add Holiday</button>
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
