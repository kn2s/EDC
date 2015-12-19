<div class="scheduleDoctors form">
<?php echo $this->Form->create('ScheduleDoctor'); ?>
	<fieldset>
		<legend><?php echo __('Add Schedule Doctor'); ?></legend>
	<?php
		echo $this->Form->input('work_schedule_id');
		echo $this->Form->input('doct_id');
		echo $this->Form->input('isonholiday');
		echo $this->Form->input('assignment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Schedule Doctors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Work Schedules'), array('controller' => 'work_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Schedule'), array('controller' => 'work_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
