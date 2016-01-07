<div class="doctorSpecializetions index">
	<h2><?php echo __('Doctor Specializetions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('doct_id'); ?></th>
			<th><?php echo $this->Paginator->sort('specialization_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($doctorSpecializetions as $doctorSpecializetion): ?>
	<tr>
		<td><?php echo h($doctorSpecializetion['DoctorSpecializetion']['id']); ?>&nbsp;</td>
		<td><?php echo h($doctorSpecializetion['DoctorSpecializetion']['doct_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($doctorSpecializetion['Specialization']['name'], array('controller' => 'specializations', 'action' => 'view', $doctorSpecializetion['Specialization']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $doctorSpecializetion['DoctorSpecializetion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doctorSpecializetion['DoctorSpecializetion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doctorSpecializetion['DoctorSpecializetion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctorSpecializetion['DoctorSpecializetion']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Doctor Specializetion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Specializations'), array('controller' => 'specializations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specialization'), array('controller' => 'specializations', 'action' => 'add')); ?> </li>
	</ul>
</div>
