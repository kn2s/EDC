<div class="commonHolidays index">
	<h2><?php echo __('Common Holidays'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('holidayname'); ?></th>
			<th><?php echo $this->Paginator->sort('holidaydate'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th><?php echo $this->Paginator->sort('isdeleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($commonHolidays as $commonHoliday): ?>
	<tr>
		<td><?php echo h($commonHoliday['CommonHoliday']['id']); ?>&nbsp;</td>
		<td><?php echo h($commonHoliday['CommonHoliday']['holidayname']); ?>&nbsp;</td>
		<td><?php echo h($commonHoliday['CommonHoliday']['holidaydate']); ?>&nbsp;</td>
		<td><?php echo h($commonHoliday['CommonHoliday']['isactive']); ?>&nbsp;</td>
		<td><?php echo h($commonHoliday['CommonHoliday']['isdeleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $commonHoliday['CommonHoliday']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $commonHoliday['CommonHoliday']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $commonHoliday['CommonHoliday']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $commonHoliday['CommonHoliday']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Common Holiday'), array('action' => 'add')); ?></li>
	</ul>
</div>
