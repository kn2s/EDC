<!--<div class="commonHolidays form">
<?php echo $this->Form->create('CommonHoliday'); ?>
	<fieldset>
		<legend><?php echo __('Add Common Holiday'); ?></legend>
	<?php
		echo $this->Form->input('holidayname');
		echo $this->Form->input('holidaydate');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Common Holidays'), array('action' => 'index')); ?></li>
	</ul>
</div>-->
<!-- script section for date picker sections -->
<script>
	var alldates = [];
	$(document).ready(function(){
		
		$.datepicker.setDefaults(
			$.extend($.datepicker.regional[''])
		);
		$('.datepicker').datepicker({
			dateFormat:'yy-mm-dd',
			minDate:'toDate'
		}).attr('readonly','readonly');
	});
</script>

<div class="row">
	<center><?php echo $this->Session->flash(); ?></center>
	<div class="col-lg-12">
		<h1 class="page-header">Add Commone Holiday</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		
		<div class="panel-body">
			<div class="row">
				<div class="datepickerdiv" style="padding-bottom:10px;">
				</div>
				
				<div class="col-lg-6">
						<!-- create by php form fields -->
						<?php
							echo $this->Form->create('CommonHoliday');
							echo $this->Form->input('holidayname',array('type'=>'text','div'=>'form-group','label'=>'Holiday Name','class'=>'form-control', 'placeholder'=>'Holiday Name'));
							echo $this->Form->input('holidaydate',array('type'=>'text','div'=>'form-group','label'=>'Holiday Date','class'=>'form-control datepicker', 'placeholder'=>'Holiday From'));
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
