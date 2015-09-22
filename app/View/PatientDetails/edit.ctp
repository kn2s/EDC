<div class="patientDetails form">
<?php echo $this->Form->create('PatientDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Patient Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('name');
		echo $this->Form->input('gender');
		echo $this->Form->input('dob_month');
		echo $this->Form->input('dob_day');
		echo $this->Form->input('dob_year');
		echo $this->Form->input('weight');
		echo $this->Form->input('height');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('country_id');
		echo $this->Form->input('performance');
		echo $this->Form->input('performance_comment');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PatientDetail.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PatientDetail.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
