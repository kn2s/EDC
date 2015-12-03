<div class="patientDocuments form">
<?php echo $this->Form->create('PatientDocument'); ?>
	<fieldset>
		<legend><?php echo __('Edit Patient Document'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('bloodreport');
		echo $this->Form->input('imagingreport');
		echo $this->Form->input('pathologyreport');
		echo $this->Form->input('otherreport');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PatientDocument.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PatientDocument.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Documents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
