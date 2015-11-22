<div class="tumarMarkers form">
<?php echo $this->Form->create('TumarMarker'); ?>
	<fieldset>
		<legend><?php echo __('Add Tumar Marker'); ?></legend>
	<?php
		echo $this->Form->input('about_illness_id');
		echo $this->Form->input('name');
		echo $this->Form->input('tumormonth');
		echo $this->Form->input('tumoryear');
		echo $this->Form->input('tumorresult');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tumar Markers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List About Illnesses'), array('controller' => 'about_illnesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New About Illness'), array('controller' => 'about_illnesses', 'action' => 'add')); ?> </li>
	</ul>
</div>
