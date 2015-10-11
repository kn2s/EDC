<div class="socialactivities form">
<?php echo $this->Form->create('Socialactivity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Socialactivity'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('comment');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Socialactivity.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Socialactivity.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alcohols'), array('controller' => 'alcohols', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alcohol'), array('controller' => 'alcohols', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Drugs'), array('controller' => 'drugs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Drug'), array('controller' => 'drugs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Smokings'), array('controller' => 'smokings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Smoking'), array('controller' => 'smokings', 'action' => 'add')); ?> </li>
	</ul>
</div>
