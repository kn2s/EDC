<div class="smtpConfigs form">
<?php echo $this->Form->create('SmtpConfig'); ?>
	<fieldset>
		<legend><?php echo __('Add Smtp Config'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Smtp Configs'), array('action' => 'index')); ?></li>
	</ul>
</div>
