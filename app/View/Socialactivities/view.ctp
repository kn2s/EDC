<div class="socialactivities view">
<h2><?php echo __('Socialactivity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($socialactivity['Socialactivity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($socialactivity['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $socialactivity['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($socialactivity['Socialactivity']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($socialactivity['Socialactivity']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Socialactivity'), array('action' => 'edit', $socialactivity['Socialactivity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Socialactivity'), array('action' => 'delete', $socialactivity['Socialactivity']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $socialactivity['Socialactivity']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Socialactivities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alcohols'), array('controller' => 'alcohols', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alcohol'), array('controller' => 'alcohols', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Drugs'), array('controller' => 'drugs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Drug'), array('controller' => 'drugs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Smokings'), array('controller' => 'smokings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Smoking'), array('controller' => 'smokings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Alcohols'); ?></h3>
	<?php if (!empty($socialactivity['Alcohol'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Socialactivity Id'); ?></th>
		<th><?php echo __('Alcoholname'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($socialactivity['Alcohol'] as $alcohol): ?>
		<tr>
			<td><?php echo $alcohol['id']; ?></td>
			<td><?php echo $alcohol['socialactivity_id']; ?></td>
			<td><?php echo $alcohol['alcoholname']; ?></td>
			<td><?php echo $alcohol['quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'alcohols', 'action' => 'view', $alcohol['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'alcohols', 'action' => 'edit', $alcohol['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'alcohols', 'action' => 'delete', $alcohol['id']), array('confirm' => __('Are you sure you want to delete # %s?', $alcohol['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Alcohol'), array('controller' => 'alcohols', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Drugs'); ?></h3>
	<?php if (!empty($socialactivity['Drug'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Socialactivity Id'); ?></th>
		<th><?php echo __('Drugname'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($socialactivity['Drug'] as $drug): ?>
		<tr>
			<td><?php echo $drug['id']; ?></td>
			<td><?php echo $drug['socialactivity_id']; ?></td>
			<td><?php echo $drug['drugname']; ?></td>
			<td><?php echo $drug['quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'drugs', 'action' => 'view', $drug['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'drugs', 'action' => 'edit', $drug['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'drugs', 'action' => 'delete', $drug['id']), array('confirm' => __('Are you sure you want to delete # %s?', $drug['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Drug'), array('controller' => 'drugs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Smokings'); ?></h3>
	<?php if (!empty($socialactivity['Smoking'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Socialactivity Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Frommonth'); ?></th>
		<th><?php echo __('Fromyear'); ?></th>
		<th><?php echo __('Tomonth'); ?></th>
		<th><?php echo __('Toyear'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($socialactivity['Smoking'] as $smoking): ?>
		<tr>
			<td><?php echo $smoking['id']; ?></td>
			<td><?php echo $smoking['socialactivity_id']; ?></td>
			<td><?php echo $smoking['quantity']; ?></td>
			<td><?php echo $smoking['frommonth']; ?></td>
			<td><?php echo $smoking['fromyear']; ?></td>
			<td><?php echo $smoking['tomonth']; ?></td>
			<td><?php echo $smoking['toyear']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'smokings', 'action' => 'view', $smoking['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'smokings', 'action' => 'edit', $smoking['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'smokings', 'action' => 'delete', $smoking['id']), array('confirm' => __('Are you sure you want to delete # %s?', $smoking['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Smoking'), array('controller' => 'smokings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
