<div class="doctorSpecializetions view">
<h2><?php echo __('Doctor Specializetion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doctorSpecializetion['DoctorSpecializetion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doct Id'); ?></dt>
		<dd>
			<?php echo h($doctorSpecializetion['DoctorSpecializetion']['doct_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specialization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctorSpecializetion['Specialization']['name'], array('controller' => 'specializations', 'action' => 'view', $doctorSpecializetion['Specialization']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doctor Specializetion'), array('action' => 'edit', $doctorSpecializetion['DoctorSpecializetion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doctor Specializetion'), array('action' => 'delete', $doctorSpecializetion['DoctorSpecializetion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctorSpecializetion['DoctorSpecializetion']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Specializetions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Specializetion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specializations'), array('controller' => 'specializations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specialization'), array('controller' => 'specializations', 'action' => 'add')); ?> </li>
	</ul>
</div>
