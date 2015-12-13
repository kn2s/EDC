<div class="caseOpinions index">
	<h2><?php echo __('Case Opinions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_case_id'); ?></th>
			<th><?php echo $this->Paginator->sort('assessment'); ?></th>
			<th><?php echo $this->Paginator->sort('prognosis'); ?></th>
			<th><?php echo $this->Paginator->sort('treatmentstrategy'); ?></th>
			<th><?php echo $this->Paginator->sort('alternativestrategy'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('cteratedatetime'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($caseOpinions as $caseOpinion): ?>
	<tr>
		<td><?php echo h($caseOpinion['CaseOpinion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($caseOpinion['DoctorCase']['id'], array('controller' => 'doctor_cases', 'action' => 'view', $caseOpinion['DoctorCase']['id'])); ?>
		</td>
		<td><?php echo h($caseOpinion['CaseOpinion']['assessment']); ?>&nbsp;</td>
		<td><?php echo h($caseOpinion['CaseOpinion']['prognosis']); ?>&nbsp;</td>
		<td><?php echo h($caseOpinion['CaseOpinion']['treatmentstrategy']); ?>&nbsp;</td>
		<td><?php echo h($caseOpinion['CaseOpinion']['alternativestrategy']); ?>&nbsp;</td>
		<td><?php echo h($caseOpinion['CaseOpinion']['comment']); ?>&nbsp;</td>
		<td><?php echo h($caseOpinion['CaseOpinion']['cteratedatetime']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $caseOpinion['CaseOpinion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $caseOpinion['CaseOpinion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $caseOpinion['CaseOpinion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $caseOpinion['CaseOpinion']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Case Opinion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('controller' => 'doctor_cases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('controller' => 'doctor_cases', 'action' => 'add')); ?> </li>
	</ul>
</div>
