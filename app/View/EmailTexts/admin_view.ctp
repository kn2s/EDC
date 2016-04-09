<div class="emailTexts view">
<h2><?php echo __('Email Text'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registration'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['registration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appointment Confirm'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['appointment_confirm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Opinion Send'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['opinion_send']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Allow Modify'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['doc_allow_modify']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quesionair Modify'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['quesionair_modify']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Communication Recieve'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['communication_recieve']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password Recovery'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['password_recovery']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Case Assign'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['case_assign']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Opinion Due Alert'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['opinion_due_alert']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Opinion Submited'); ?></dt>
		<dd>
			<?php echo h($emailText['EmailText']['opinion_submited']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Email Text'), array('action' => 'edit', $emailText['EmailText']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Email Text'), array('action' => 'delete', $emailText['EmailText']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $emailText['EmailText']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Email Texts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email Text'), array('action' => 'add')); ?> </li>
	</ul>
</div>
