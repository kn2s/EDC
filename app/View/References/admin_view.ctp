<div class="references view">
<h2><?php echo __('Reference'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reference Data'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['reference_data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdate'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['createdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['is_deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reference'), array('action' => 'edit', $reference['Reference']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reference'), array('action' => 'delete', $reference['Reference']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reference['Reference']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List References'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reference'), array('action' => 'add')); ?> </li>
	</ul>
</div>
