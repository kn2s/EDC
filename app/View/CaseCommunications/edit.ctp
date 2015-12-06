<div class="caseCommunications form">
<?php echo $this->Form->create('CaseCommunication'); ?>
	<fieldset>
		<legend><?php echo __('Edit Case Communication'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('doctor_case_id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('comment');
		echo $this->Form->input('createdate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CaseCommunication.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CaseCommunication.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Case Communications'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('controller' => 'doctor_cases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('controller' => 'doctor_cases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
