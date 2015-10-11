<div class="alcohols form">
<?php echo $this->Form->create('Alcohol'); ?>
	<fieldset>
		<legend><?php echo __('Edit Alcohol'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Alcohol.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Alcohol.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Alcohols'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('controller' => 'socialactivities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('controller' => 'socialactivities', 'action' => 'add')); ?> </li>
	</ul>
</div>
