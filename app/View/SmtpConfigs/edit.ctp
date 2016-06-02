<div class="smtpConfigs form">
<?php echo $this->Form->create('SmtpConfig'); ?>
	<fieldset>
		<legend><?php echo __('Edit Smtp Config'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('smtp_host');
		echo $this->Form->input('smtp_port');
		echo $this->Form->input('smtp_username');
		echo $this->Form->input('smtp_password');
		echo $this->Form->input('smtp_client');
		echo $this->Form->input('is_default');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SmtpConfig.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('SmtpConfig.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Smtp Configs'), array('action' => 'index')); ?></li>
	</ul>
</div>
