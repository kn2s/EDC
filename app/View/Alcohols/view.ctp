<div class="alcohols view">
<h2><?php echo __('Alcohol'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alcohol['Alcohol']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Socialactivity'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alcohol['Socialactivity']['id'], array('controller' => 'socialactivities', 'action' => 'view', $alcohol['Socialactivity']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alcoholname'); ?></dt>
		<dd>
			<?php echo h($alcohol['Alcohol']['alcoholname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($alcohol['Alcohol']['quantity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alcohol'), array('action' => 'edit', $alcohol['Alcohol']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alcohol'), array('action' => 'delete', $alcohol['Alcohol']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $alcohol['Alcohol']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Alcohols'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alcohol'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('controller' => 'socialactivities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('controller' => 'socialactivities', 'action' => 'add')); ?> </li>
	</ul>
</div>
