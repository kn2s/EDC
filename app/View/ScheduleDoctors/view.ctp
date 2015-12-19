<div class="scheduleDoctors view">
<h2><?php echo __('Schedule Doctor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($scheduleDoctor['ScheduleDoctor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($scheduleDoctor['WorkSchedule']['id'], array('controller' => 'work_schedules', 'action' => 'view', $scheduleDoctor['WorkSchedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doct Id'); ?></dt>
		<dd>
			<?php echo h($scheduleDoctor['ScheduleDoctor']['doct_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isonholiday'); ?></dt>
		<dd>
			<?php echo h($scheduleDoctor['ScheduleDoctor']['isonholiday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assignment'); ?></dt>
		<dd>
			<?php echo h($scheduleDoctor['ScheduleDoctor']['assignment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Schedule Doctor'), array('action' => 'edit', $scheduleDoctor['ScheduleDoctor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Schedule Doctor'), array('action' => 'delete', $scheduleDoctor['ScheduleDoctor']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $scheduleDoctor['ScheduleDoctor']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedule Doctors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule Doctor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Schedules'), array('controller' => 'work_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Schedule'), array('controller' => 'work_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
