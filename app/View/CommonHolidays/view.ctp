<div class="commonHolidays view">
<h2><?php echo __('Common Holiday'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($commonHoliday['CommonHoliday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holidayname'); ?></dt>
		<dd>
			<?php echo h($commonHoliday['CommonHoliday']['holidayname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holidaydate'); ?></dt>
		<dd>
			<?php echo h($commonHoliday['CommonHoliday']['holidaydate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($commonHoliday['CommonHoliday']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($commonHoliday['CommonHoliday']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Common Holiday'), array('action' => 'edit', $commonHoliday['CommonHoliday']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Common Holiday'), array('action' => 'delete', $commonHoliday['CommonHoliday']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $commonHoliday['CommonHoliday']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Common Holidays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Common Holiday'), array('action' => 'add')); ?> </li>
	</ul>
</div>
