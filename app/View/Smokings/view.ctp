<div class="smokings view">
<h2><?php echo __('Smoking'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($smoking['Smoking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Socialactivity'); ?></dt>
		<dd>
			<?php echo $this->Html->link($smoking['Socialactivity']['id'], array('controller' => 'socialactivities', 'action' => 'view', $smoking['Socialactivity']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($smoking['Smoking']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Frommonth'); ?></dt>
		<dd>
			<?php echo h($smoking['Smoking']['frommonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fromyear'); ?></dt>
		<dd>
			<?php echo h($smoking['Smoking']['fromyear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tomonth'); ?></dt>
		<dd>
			<?php echo h($smoking['Smoking']['tomonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Toyear'); ?></dt>
		<dd>
			<?php echo h($smoking['Smoking']['toyear']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Smoking'), array('action' => 'edit', $smoking['Smoking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Smoking'), array('action' => 'delete', $smoking['Smoking']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $smoking['Smoking']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Smokings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Smoking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('controller' => 'socialactivities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('controller' => 'socialactivities', 'action' => 'add')); ?> </li>
	</ul>
</div>
