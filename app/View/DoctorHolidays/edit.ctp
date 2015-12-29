<div class="doctorHolidays form">
<?php echo $this->Form->create('DoctorHoliday'); ?>
	<fieldset>
		<legend><?php echo __('Edit Doctor Holiday'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('doct_id');
		echo $this->Form->input('holidaydate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DoctorHoliday.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('DoctorHoliday.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Doctor Holidays'), array('action' => 'index')); ?></li>
	</ul>
</div>
