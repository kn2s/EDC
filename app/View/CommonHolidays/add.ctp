<div class="commonHolidays form">
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
</div>
