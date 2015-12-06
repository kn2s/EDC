<div class="caseCommunications index">
	<h2><?php echo __('Case Communications'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_case_id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('createdate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($caseCommunications as $caseCommunication): ?>
	<tr>
		<td><?php echo h($caseCommunication['CaseCommunication']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($caseCommunication['DoctorCase']['id'], array('controller' => 'doctor_cases', 'action' => 'view', $caseCommunication['DoctorCase']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($caseCommunication['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $caseCommunication['Patient']['id'])); ?>
		</td>
		<td><?php echo h($caseCommunication['CaseCommunication']['comment']); ?>&nbsp;</td>
		<td><?php echo h($caseCommunication['CaseCommunication']['createdate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $caseCommunication['CaseCommunication']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $caseCommunication['CaseCommunication']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $caseCommunication['CaseCommunication']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $caseCommunication['CaseCommunication']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Case Communication'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('controller' => 'doctor_cases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('controller' => 'doctor_cases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
