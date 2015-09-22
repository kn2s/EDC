<div class="patients form">
<?php echo $this->Form->create('Patient'); ?>
	<fieldset>
		<legend><?php echo __('Add Patient'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('createtime');
		echo $this->Form->input('browserdetails');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Patients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
