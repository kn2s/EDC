<!--<div class="specializations form">
<?php echo $this->Form->create('Specialization'); ?>
	<fieldset>
		<legend><?php echo __('Edit Specialization'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
		echo $this->Form->input('createdon');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Specialization.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Specialization.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Specializations'), array('action' => 'index')); ?></li>
	</ul>
</div>
-->


<div class="row">
	
	<div class="col-lg-12">
		<h1 class="page-header">Edit Specialization</h1>
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
							echo $this->Form->input('name',array('type'=>'text','div'=>'form-group','label'=>'Cancer Specialization Name','class'=>'form-control', 'placeholder'=>'Specialization Name'));
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default">Update Specialization</button>
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