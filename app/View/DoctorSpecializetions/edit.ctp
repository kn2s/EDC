<div class="doctorSpecializetions form">
<?php echo $this->Form->create('DoctorSpecializetion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Doctor Specializetion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('doct_id');
		echo $this->Form->input('specialization_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DoctorSpecializetion.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('DoctorSpecializetion.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Doctor Specializetions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Specializations'), array('controller' => 'specializations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specialization'), array('controller' => 'specializations', 'action' => 'add')); ?> </li>
	</ul>
</div>
