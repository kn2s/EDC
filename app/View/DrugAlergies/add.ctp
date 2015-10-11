<div class="drugAlergies form">
<?php echo $this->Form->create('DrugAlergy'); ?>
	<fieldset>
		<legend><?php echo __('Add Drug Alergy'); ?></legend>
	<?php
		echo $this->Form->input('patient_detail_id');
		echo $this->Form->input('name');
		echo $this->Form->input('reaction');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Drug Alergies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
