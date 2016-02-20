<div class="sampleQuestionnaires index">
	<h2><?php echo __('Sample Questionnaires'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_detail'); ?></th>
			<th><?php echo $this->Paginator->sort('social_history'); ?></th>
			<th><?php echo $this->Paginator->sort('about_the_illness'); ?></th>
			<th><?php echo $this->Paginator->sort('past_history'); ?></th>
			<th><?php echo $this->Paginator->sort('test_report'); ?></th>
			<th><?php echo $this->Paginator->sort('createtime'); ?></th>
			<th><?php echo $this->Paginator->sort('is_deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sampleQuestionnaires as $sampleQuestionnaire): ?>
	<tr>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['id']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['patient_detail']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['social_history']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['about_the_illness']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['past_history']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['test_report']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['createtime']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['is_deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sampleQuestionnaire['SampleQuestionnaire']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sampleQuestionnaire['SampleQuestionnaire']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sampleQuestionnaire['SampleQuestionnaire']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sampleQuestionnaire['SampleQuestionnaire']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Sample Questionnaire'), array('action' => 'add')); ?></li>
	</ul>
</div>
