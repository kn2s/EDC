<div class="doctorCases form">
<?php echo $this->Form->create('DoctorCase'); ?>
	<fieldset>
		<legend><?php echo __('Add Doctor Case'); ?></legend>
	<?php
		echo $this->Form->input('patient_id');
		echo $this->Form->input('doctor_id');
		echo $this->Form->input('casecode');
		echo $this->Form->input('opinion_due_date');
		echo $this->Form->input('available_date');
		echo $this->Form->input('consultant_fee');
		echo $this->Form->input('satatus');
		echo $this->Form->input('diagonisis');
		echo $this->Form->input('ispaymentdone');
		echo $this->Form->input('createdate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
