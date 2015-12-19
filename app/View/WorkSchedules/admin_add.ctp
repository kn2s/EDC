<div class="workSchedules form">
<?php echo $this->Form->create('WorkSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Work Schedule'); ?></legend>
	<?php
		echo $this->Form->input('workday');
		echo $this->Form->input('isholiday');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Work Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedule Doctors'), array('controller' => 'schedule_doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule Doctor'), array('controller' => 'schedule_doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
