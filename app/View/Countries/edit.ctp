<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
	<fieldset>
		<legend><?php echo __('Edit Country'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('shortname');
		echo $this->Form->input('countrycode');
		echo $this->Form->input('countryflag');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Country.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Country.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
