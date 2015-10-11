<div class="drugAlergies view">
<h2><?php echo __('Drug Alergy'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($drugAlergy['DrugAlergy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($drugAlergy['PatientDetail']['name'], array('controller' => 'patient_details', 'action' => 'view', $drugAlergy['PatientDetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($drugAlergy['DrugAlergy']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction'); ?></dt>
		<dd>
			<?php echo h($drugAlergy['DrugAlergy']['reaction']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Drug Alergy'), array('action' => 'edit', $drugAlergy['DrugAlergy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Drug Alergy'), array('action' => 'delete', $drugAlergy['DrugAlergy']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $drugAlergy['DrugAlergy']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Drug Alergies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Drug Alergy'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
