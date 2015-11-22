<div class="tumarMarkers index">
	<h2><?php echo __('Tumar Markers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('about_illness_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('tumormonth'); ?></th>
			<th><?php echo $this->Paginator->sort('tumoryear'); ?></th>
			<th><?php echo $this->Paginator->sort('tumorresult'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tumarMarkers as $tumarMarker): ?>
	<tr>
		<td><?php echo h($tumarMarker['TumarMarker']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tumarMarker['AboutIllness']['id'], array('controller' => 'about_illnesses', 'action' => 'view', $tumarMarker['AboutIllness']['id'])); ?>
		</td>
		<td><?php echo h($tumarMarker['TumarMarker']['name']); ?>&nbsp;</td>
		<td><?php echo h($tumarMarker['TumarMarker']['tumormonth']); ?>&nbsp;</td>
		<td><?php echo h($tumarMarker['TumarMarker']['tumoryear']); ?>&nbsp;</td>
		<td><?php echo h($tumarMarker['TumarMarker']['tumorresult']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tumarMarker['TumarMarker']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tumarMarker['TumarMarker']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tumarMarker['TumarMarker']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tumarMarker['TumarMarker']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Tumar Marker'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List About Illnesses'), array('controller' => 'about_illnesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New About Illness'), array('controller' => 'about_illnesses', 'action' => 'add')); ?> </li>
	</ul>
</div>
