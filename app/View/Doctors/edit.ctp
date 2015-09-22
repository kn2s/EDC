<div class="doctors form">
<?php echo $this->Form->create('Doctor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Doctor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('specialization_id');
		echo $this->Form->input('image');
		echo $this->Form->input('designation');
		echo $this->Form->input('medical_school');
		echo $this->Form->input('residency');
		echo $this->Form->input('fellowship');
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook');
		echo $this->Form->input('description_one');
		echo $this->Form->input('description_two');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Doctor.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Doctor.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specializations'), array('controller' => 'specializations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specialization'), array('controller' => 'specializations', 'action' => 'add')); ?> </li>
	</ul>
</div>
