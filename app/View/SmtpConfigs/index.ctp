<div class="smtpConfigs index">
	<h2><?php echo __('Smtp Configs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('smtp_host'); ?></th>
			<th><?php echo $this->Paginator->sort('smtp_port'); ?></th>
			<th><?php echo $this->Paginator->sort('smtp_username'); ?></th>
			<th><?php echo $this->Paginator->sort('smtp_password'); ?></th>
			<th><?php echo $this->Paginator->sort('smtp_client'); ?></th>
			<th><?php echo $this->Paginator->sort('is_default'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($smtpConfigs as $smtpConfig): ?>
	<tr>
		<td><?php echo h($smtpConfig['SmtpConfig']['id']); ?>&nbsp;</td>
		<td><?php echo h($smtpConfig['SmtpConfig']['smtp_host']); ?>&nbsp;</td>
		<td><?php echo h($smtpConfig['SmtpConfig']['smtp_port']); ?>&nbsp;</td>
		<td><?php echo h($smtpConfig['SmtpConfig']['smtp_username']); ?>&nbsp;</td>
		<td><?php echo h($smtpConfig['SmtpConfig']['smtp_password']); ?>&nbsp;</td>
		<td><?php echo h($smtpConfig['SmtpConfig']['smtp_client']); ?>&nbsp;</td>
		<td><?php echo h($smtpConfig['SmtpConfig']['is_default']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $smtpConfig['SmtpConfig']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $smtpConfig['SmtpConfig']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $smtpConfig['SmtpConfig']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $smtpConfig['SmtpConfig']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Smtp Config'), array('action' => 'add')); ?></li>
	</ul>
</div>
