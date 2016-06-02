<div class="smtpConfigs view">
<h2><?php echo __('Smtp Config'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($smtpConfig['SmtpConfig']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Smtp Host'); ?></dt>
		<dd>
			<?php echo h($smtpConfig['SmtpConfig']['smtp_host']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Smtp Port'); ?></dt>
		<dd>
			<?php echo h($smtpConfig['SmtpConfig']['smtp_port']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Smtp Username'); ?></dt>
		<dd>
			<?php echo h($smtpConfig['SmtpConfig']['smtp_username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Smtp Password'); ?></dt>
		<dd>
			<?php echo h($smtpConfig['SmtpConfig']['smtp_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Smtp Client'); ?></dt>
		<dd>
			<?php echo h($smtpConfig['SmtpConfig']['smtp_client']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Default'); ?></dt>
		<dd>
			<?php echo h($smtpConfig['SmtpConfig']['is_default']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Smtp Config'), array('action' => 'edit', $smtpConfig['SmtpConfig']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Smtp Config'), array('action' => 'delete', $smtpConfig['SmtpConfig']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $smtpConfig['SmtpConfig']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Smtp Configs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Smtp Config'), array('action' => 'add')); ?> </li>
	</ul>
</div>
