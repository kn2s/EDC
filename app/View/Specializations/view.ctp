<div class="specializations view">
<h2><?php echo __('Specialization'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($specialization['Specialization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($specialization['Specialization']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($specialization['Specialization']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($specialization['Specialization']['isdeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdon'); ?></dt>
		<dd>
			<?php echo h($specialization['Specialization']['createdon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Specialization'), array('action' => 'edit', $specialization['Specialization']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Specialization'), array('action' => 'delete', $specialization['Specialization']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $specialization['Specialization']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Specializations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specialization'), array('action' => 'add')); ?> </li>
	</ul>
</div>
