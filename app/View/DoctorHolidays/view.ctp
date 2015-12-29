<div class="doctorHolidays view">
<h2><?php echo __('Doctor Holiday'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doctorHoliday['DoctorHoliday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doct Id'); ?></dt>
		<dd>
			<?php echo h($doctorHoliday['DoctorHoliday']['doct_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holidaydate'); ?></dt>
		<dd>
			<?php echo h($doctorHoliday['DoctorHoliday']['holidaydate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doctor Holiday'), array('action' => 'edit', $doctorHoliday['DoctorHoliday']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doctor Holiday'), array('action' => 'delete', $doctorHoliday['DoctorHoliday']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctorHoliday['DoctorHoliday']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Holidays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Holiday'), array('action' => 'add')); ?> </li>
	</ul>
</div>
