<div class="smokings form">
<?php echo $this->Form->create('Smoking'); ?>
	<fieldset>
		<legend><?php echo __('Add Smoking'); ?></legend>
	<?php
		echo $this->Form->input('socialactivity_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('frommonth');
		echo $this->Form->input('fromyear');
		echo $this->Form->input('tomonth');
		echo $this->Form->input('toyear');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Smokings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('controller' => 'socialactivities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('controller' => 'socialactivities', 'action' => 'add')); ?> </li>
	</ul>
</div>
