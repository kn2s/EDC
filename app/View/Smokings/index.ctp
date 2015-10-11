<div class="smokings index">
	<h2><?php echo __('Smokings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('socialactivity_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('frommonth'); ?></th>
			<th><?php echo $this->Paginator->sort('fromyear'); ?></th>
			<th><?php echo $this->Paginator->sort('tomonth'); ?></th>
			<th><?php echo $this->Paginator->sort('toyear'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($smokings as $smoking): ?>
	<tr>
		<td><?php echo h($smoking['Smoking']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($smoking['Socialactivity']['id'], array('controller' => 'socialactivities', 'action' => 'view', $smoking['Socialactivity']['id'])); ?>
		</td>
		<td><?php echo h($smoking['Smoking']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($smoking['Smoking']['frommonth']); ?>&nbsp;</td>
		<td><?php echo h($smoking['Smoking']['fromyear']); ?>&nbsp;</td>
		<td><?php echo h($smoking['Smoking']['tomonth']); ?>&nbsp;</td>
		<td><?php echo h($smoking['Smoking']['toyear']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $smoking['Smoking']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $smoking['Smoking']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $smoking['Smoking']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $smoking['Smoking']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Smoking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('controller' => 'socialactivities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('controller' => 'socialactivities', 'action' => 'add')); ?> </li>
	</ul>
</div>
