<div class="emailTexts index">
	<h2><?php echo __('Email Texts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('registration'); ?></th>
			<th><?php echo $this->Paginator->sort('appointment_confirm'); ?></th>
			<th><?php echo $this->Paginator->sort('opinion_send'); ?></th>
			<th><?php echo $this->Paginator->sort('doc_allow_modify'); ?></th>
			<th><?php echo $this->Paginator->sort('quesionair_modify'); ?></th>
			<th><?php echo $this->Paginator->sort('communication_recieve'); ?></th>
			<th><?php echo $this->Paginator->sort('password_recovery'); ?></th>
			<th><?php echo $this->Paginator->sort('case_assign'); ?></th>
			<th><?php echo $this->Paginator->sort('opinion_due_alert'); ?></th>
			<th><?php echo $this->Paginator->sort('opinion_submited'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($emailTexts as $emailText): ?>
	<tr>
		<td><?php echo h($emailText['EmailText']['id']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['registration']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['appointment_confirm']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['opinion_send']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['doc_allow_modify']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['quesionair_modify']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['communication_recieve']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['password_recovery']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['case_assign']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['opinion_due_alert']); ?>&nbsp;</td>
		<td><?php echo h($emailText['EmailText']['opinion_submited']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $emailText['EmailText']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $emailText['EmailText']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $emailText['EmailText']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $emailText['EmailText']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Email Text'), array('action' => 'add')); ?></li>
	</ul>
</div>
