<div class="drugAlergies index">
	<h2><?php echo __('Drug Alergies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_detail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($drugAlergies as $drugAlergy): ?>
	<tr>
		<td><?php echo h($drugAlergy['DrugAlergy']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($drugAlergy['PatientDetail']['name'], array('controller' => 'patient_details', 'action' => 'view', $drugAlergy['PatientDetail']['id'])); ?>
		</td>
		<td><?php echo h($drugAlergy['DrugAlergy']['name']); ?>&nbsp;</td>
		<td><?php echo h($drugAlergy['DrugAlergy']['reaction']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $drugAlergy['DrugAlergy']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $drugAlergy['DrugAlergy']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $drugAlergy['DrugAlergy']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $drugAlergy['DrugAlergy']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Drug Alergy'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
