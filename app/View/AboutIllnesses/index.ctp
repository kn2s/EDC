<div class="aboutIllnesses index">
	<h2><?php echo __('About Illnesses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('principle_diagonisises_id'); ?></th>
			<th><?php echo $this->Paginator->sort('startdiagomonth'); ?></th>
			<th><?php echo $this->Paginator->sort('startdiagoday'); ?></th>
			<th><?php echo $this->Paginator->sort('startdiagoyear'); ?></th>
			<th><?php echo $this->Paginator->sort('enddiagomonth'); ?></th>
			<th><?php echo $this->Paginator->sort('enddiagoyear'); ?></th>
			<th><?php echo $this->Paginator->sort('enddiagoday'); ?></th>
			<th><?php echo $this->Paginator->sort('diagodetails'); ?></th>
			<th><?php echo $this->Paginator->sort('diagorecomandation'); ?></th>
			<th><?php echo $this->Paginator->sort('istumarmarker'); ?></th>
			<th><?php echo $this->Paginator->sort('tumartype'); ?></th>
			<th><?php echo $this->Paginator->sort('tumarmonth'); ?></th>
			<th><?php echo $this->Paginator->sort('tumoryear'); ?></th>
			<th><?php echo $this->Paginator->sort('tumarresult'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($aboutIllnesses as $aboutIllness): ?>
	<tr>
		<td><?php echo h($aboutIllness['AboutIllness']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aboutIllness['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $aboutIllness['Patient']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aboutIllness['PrincipleDiagonisises']['name'], array('controller' => 'principle_diagonisises', 'action' => 'view', $aboutIllness['PrincipleDiagonisises']['id'])); ?>
		</td>
		<td><?php echo h($aboutIllness['AboutIllness']['startdiagomonth']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['startdiagoday']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['startdiagoyear']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['enddiagomonth']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['enddiagoyear']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['enddiagoday']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['diagodetails']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['diagorecomandation']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['istumarmarker']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['tumartype']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['tumarmonth']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['tumoryear']); ?>&nbsp;</td>
		<td><?php echo h($aboutIllness['AboutIllness']['tumarresult']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aboutIllness['AboutIllness']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aboutIllness['AboutIllness']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aboutIllness['AboutIllness']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $aboutIllness['AboutIllness']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New About Illness'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Principle Diagonisises'), array('controller' => 'principle_diagonisises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Principle Diagonisises'), array('controller' => 'principle_diagonisises', 'action' => 'add')); ?> </li>
	</ul>
</div>
