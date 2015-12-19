<div class="workSchedules index">
	<h2><?php echo __('Work Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('workday'); ?></th>
			<th><?php echo $this->Paginator->sort('isholiday'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($workSchedules as $workSchedule): ?>
	<tr>
		<td><?php echo h($workSchedule['WorkSchedule']['id']); ?>&nbsp;</td>
		<td><?php echo h($workSchedule['WorkSchedule']['workday']); ?>&nbsp;</td>
		<td><?php echo h($workSchedule['WorkSchedule']['isholiday']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $workSchedule['WorkSchedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $workSchedule['WorkSchedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $workSchedule['WorkSchedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workSchedule['WorkSchedule']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Work Schedule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Schedule Doctors'), array('controller' => 'schedule_doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule Doctor'), array('controller' => 'schedule_doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
