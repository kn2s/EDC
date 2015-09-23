<div class="homepagecontents index">
	<h2><?php echo __('Homepagecontents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('specialisttag'); ?></th>
			<th><?php echo $this->Paginator->sort('facebook'); ?></th>
			<th><?php echo $this->Paginator->sort('twitter'); ?></th>
			<th><?php echo $this->Paginator->sort('youtube'); ?></th>
			<th><?php echo $this->Paginator->sort('tag_one'); ?></th>
			<th><?php echo $this->Paginator->sort('tag_two'); ?></th>
			<th><?php echo $this->Paginator->sort('tag_three'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($homepagecontents as $homepagecontent): ?>
	<tr>
		<td><?php echo h($homepagecontent['Homepagecontent']['id']); ?>&nbsp;</td>
		<td><?php echo h($homepagecontent['Homepagecontent']['specialisttag']); ?>&nbsp;</td>
		<td><?php echo h($homepagecontent['Homepagecontent']['facebook']); ?>&nbsp;</td>
		<td><?php echo h($homepagecontent['Homepagecontent']['twitter']); ?>&nbsp;</td>
		<td><?php echo h($homepagecontent['Homepagecontent']['youtube']); ?>&nbsp;</td>
		<td><?php echo h($homepagecontent['Homepagecontent']['tag_one']); ?>&nbsp;</td>
		<td><?php echo h($homepagecontent['Homepagecontent']['tag_two']); ?>&nbsp;</td>
		<td><?php echo h($homepagecontent['Homepagecontent']['tag_three']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $homepagecontent['Homepagecontent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $homepagecontent['Homepagecontent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $homepagecontent['Homepagecontent']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $homepagecontent['Homepagecontent']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Homepagecontent'), array('action' => 'add')); ?></li>
	</ul>
</div>
