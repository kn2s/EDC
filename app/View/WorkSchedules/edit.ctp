<div class="workSchedules form">
<?php echo $this->Form->create('WorkSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Edit Work Schedule'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('workday');
		echo $this->Form->input('isholiday');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('WorkSchedule.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('WorkSchedule.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Work Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedule Doctors'), array('controller' => 'schedule_doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule Doctor'), array('controller' => 'schedule_doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
