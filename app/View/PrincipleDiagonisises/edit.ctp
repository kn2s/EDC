<div class="principleDiagonisises form">
<?php echo $this->Form->create('PrincipleDiagonisise'); ?>
	<fieldset>
		<legend><?php echo __('Edit Principle Diagonisise'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PrincipleDiagonisise.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PrincipleDiagonisise.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Principle Diagonisises'), array('action' => 'index')); ?></li>
	</ul>
</div>
