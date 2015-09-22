<div class="principleDiagonisises view">
<h2><?php echo __('Principle Diagonisise'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($principleDiagonisise['PrincipleDiagonisise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($principleDiagonisise['PrincipleDiagonisise']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($principleDiagonisise['PrincipleDiagonisise']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($principleDiagonisise['PrincipleDiagonisise']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Principle Diagonisise'), array('action' => 'edit', $principleDiagonisise['PrincipleDiagonisise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Principle Diagonisise'), array('action' => 'delete', $principleDiagonisise['PrincipleDiagonisise']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $principleDiagonisise['PrincipleDiagonisise']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Principle Diagonisises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Principle Diagonisise'), array('action' => 'add')); ?> </li>
	</ul>
</div>
