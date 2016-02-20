<div class="references form">
<?php echo $this->Form->create('Reference'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Reference'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('reference_data');
		echo $this->Form->input('createdate');
		echo $this->Form->input('is_deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Reference.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Reference.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List References'), array('action' => 'index')); ?></li>
	</ul>
</div>
