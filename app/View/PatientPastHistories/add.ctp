<div class="patientPastHistories form">
<?php echo $this->Form->create('PatientPastHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Patient Past History'); ?></legend>
	<?php
		echo $this->Form->input('patient_id');
		echo $this->Form->input('cancer_history');
		echo $this->Form->input('surgical_history');
		echo $this->Form->input('hospitalization');
		echo $this->Form->input('family_cancer_history');
		echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Patient Past Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
