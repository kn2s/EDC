<div class="sampleOpinions index">
	<h2><?php echo __('Sample Opinions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_name'); ?></th>
			<th><?php echo $this->Paginator->sort('create_date'); ?></th>
			<th><?php echo $this->Paginator->sort('refferences'); ?></th>
			<th><?php echo $this->Paginator->sort('assesment'); ?></th>
			<th><?php echo $this->Paginator->sort('prognosis'); ?></th>
			<th><?php echo $this->Paginator->sort('best_tritment_strategy'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_strategy'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_qualification'); ?></th>
			<th><?php echo $this->Paginator->sort('create_time'); ?></th>
			<th><?php echo $this->Paginator->sort('is_deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sampleOpinions as $sampleOpinion): ?>
	<tr>
		<td><?php echo h($sampleOpinion['SampleOpinion']['id']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['doctor_name']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['create_date']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['refferences']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['assesment']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['prognosis']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['best_tritment_strategy']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['alternative_strategy']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['doctor_qualification']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['create_time']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['is_deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sampleOpinion['SampleOpinion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sampleOpinion['SampleOpinion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sampleOpinion['SampleOpinion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sampleOpinion['SampleOpinion']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Sample Opinion'), array('action' => 'add')); ?></li>
	</ul>
</div>
