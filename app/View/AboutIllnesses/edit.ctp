<div class="aboutIllnesses form">
<?php echo $this->Form->create('AboutIllness'); ?>
	<fieldset>
		<legend><?php echo __('Edit About Illness'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('principle_diagonisises_id');
		echo $this->Form->input('startdiagomonth');
		echo $this->Form->input('startdiagoday');
		echo $this->Form->input('startdiagoyear');
		echo $this->Form->input('enddiagomonth');
		echo $this->Form->input('enddiagoyear');
		echo $this->Form->input('enddiagoday');
		echo $this->Form->input('diagodetails');
		echo $this->Form->input('diagorecomandation');
		echo $this->Form->input('istumarmarker');
		echo $this->Form->input('tumartype');
		echo $this->Form->input('tumarmonth');
		echo $this->Form->input('tumoryear');
		echo $this->Form->input('tumarresult');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AboutIllness.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('AboutIllness.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List About Illnesses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Principle Diagonisises'), array('controller' => 'principle_diagonisises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Principle Diagonisises'), array('controller' => 'principle_diagonisises', 'action' => 'add')); ?> </li>
	</ul>
</div>
