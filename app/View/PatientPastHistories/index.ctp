<div class="patientPastHistories index">
	<h2><?php echo __('Patient Past Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cancer_history'); ?></th>
			<th><?php echo $this->Paginator->sort('surgical_history'); ?></th>
			<th><?php echo $this->Paginator->sort('hospitalization'); ?></th>
			<th><?php echo $this->Paginator->sort('family_cancer_history'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($patientPastHistories as $patientPastHistory): ?>
	<tr>
		<td><?php echo h($patientPastHistory['PatientPastHistory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($patientPastHistory['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $patientPastHistory['Patient']['id'])); ?>
		</td>
		<td><?php echo h($patientPastHistory['PatientPastHistory']['cancer_history']); ?>&nbsp;</td>
		<td><?php echo h($patientPastHistory['PatientPastHistory']['surgical_history']); ?>&nbsp;</td>
		<td><?php echo h($patientPastHistory['PatientPastHistory']['hospitalization']); ?>&nbsp;</td>
		<td><?php echo h($patientPastHistory['PatientPastHistory']['family_cancer_history']); ?>&nbsp;</td>
		<td><?php echo h($patientPastHistory['PatientPastHistory']['comments']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $patientPastHistory['PatientPastHistory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $patientPastHistory['PatientPastHistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $patientPastHistory['PatientPastHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $patientPastHistory['PatientPastHistory']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Patient Past History'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
