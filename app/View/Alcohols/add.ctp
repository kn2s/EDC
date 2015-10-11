<div class="alcohols form">
<?php echo $this->Form->create('Alcohol'); ?>
	<fieldset>
		<legend><?php echo __('Add Alcohol'); ?></legend>
	<?php
		echo $this->Form->input('socialactivity_id');
		echo $this->Form->input('alcoholname');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Alcohols'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('controller' => 'socialactivities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('controller' => 'socialactivities', 'action' => 'add')); ?> </li>
	</ul>
</div>
