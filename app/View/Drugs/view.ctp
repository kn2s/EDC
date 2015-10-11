<div class="drugs view">
<h2><?php echo __('Drug'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($drug['Drug']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Socialactivity'); ?></dt>
		<dd>
			<?php echo $this->Html->link($drug['Socialactivity']['id'], array('controller' => 'socialactivities', 'action' => 'view', $drug['Socialactivity']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drugname'); ?></dt>
		<dd>
			<?php echo h($drug['Drug']['drugname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($drug['Drug']['quantity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Drug'), array('action' => 'edit', $drug['Drug']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Drug'), array('action' => 'delete', $drug['Drug']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $drug['Drug']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Drugs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Drug'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('controller' => 'socialactivities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('controller' => 'socialactivities', 'action' => 'add')); ?> </li>
	</ul>
</div>
