<div class="workSchedules view">
<h2><?php echo __('Work Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($workSchedule['WorkSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workday'); ?></dt>
		<dd>
			<?php echo h($workSchedule['WorkSchedule']['workday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isholiday'); ?></dt>
		<dd>
			<?php echo h($workSchedule['WorkSchedule']['isholiday']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Schedule'), array('action' => 'edit', $workSchedule['WorkSchedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Schedule'), array('action' => 'delete', $workSchedule['WorkSchedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workSchedule['WorkSchedule']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedule Doctors'), array('controller' => 'schedule_doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule Doctor'), array('controller' => 'schedule_doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Schedule Doctors'); ?></h3>
	<?php if (!empty($workSchedule['ScheduleDoctor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Work Schedule Id'); ?></th>
		<th><?php echo __('Doct Id'); ?></th>
		<th><?php echo __('Isonholiday'); ?></th>
		<th><?php echo __('Assignment'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workSchedule['ScheduleDoctor'] as $scheduleDoctor): ?>
		<tr>
			<td><?php echo $scheduleDoctor['id']; ?></td>
			<td><?php echo $scheduleDoctor['work_schedule_id']; ?></td>
			<td><?php echo $scheduleDoctor['doct_id']; ?></td>
			<td><?php echo $scheduleDoctor['isonholiday']; ?></td>
			<td><?php echo $scheduleDoctor['assignment']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'schedule_doctors', 'action' => 'view', $scheduleDoctor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'schedule_doctors', 'action' => 'edit', $scheduleDoctor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'schedule_doctors', 'action' => 'delete', $scheduleDoctor['id']), array('confirm' => __('Are you sure you want to delete # %s?', $scheduleDoctor['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Schedule Doctor'), array('controller' => 'schedule_doctors', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
