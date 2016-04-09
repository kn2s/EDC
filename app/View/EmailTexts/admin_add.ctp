<div class="emailTexts form">
<?php echo $this->Form->create('EmailText'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Email Text'); ?></legend>
	<?php
		echo $this->Form->input('registration');
		echo $this->Form->input('appointment_confirm');
		echo $this->Form->input('opinion_send');
		echo $this->Form->input('doc_allow_modify');
		echo $this->Form->input('quesionair_modify');
		echo $this->Form->input('communication_recieve');
		echo $this->Form->input('password_recovery');
		echo $this->Form->input('case_assign');
		echo $this->Form->input('opinion_due_alert');
		echo $this->Form->input('opinion_submited');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Email Texts'), array('action' => 'index')); ?></li>
	</ul>
</div>
