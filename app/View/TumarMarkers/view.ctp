<div class="tumarMarkers view">
<h2><?php echo __('Tumar Marker'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tumarMarker['TumarMarker']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('About Illness'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tumarMarker['AboutIllness']['id'], array('controller' => 'about_illnesses', 'action' => 'view', $tumarMarker['AboutIllness']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tumarMarker['TumarMarker']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tumormonth'); ?></dt>
		<dd>
			<?php echo h($tumarMarker['TumarMarker']['tumormonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tumoryear'); ?></dt>
		<dd>
			<?php echo h($tumarMarker['TumarMarker']['tumoryear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tumorresult'); ?></dt>
		<dd>
			<?php echo h($tumarMarker['TumarMarker']['tumorresult']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tumar Marker'), array('action' => 'edit', $tumarMarker['TumarMarker']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tumar Marker'), array('action' => 'delete', $tumarMarker['TumarMarker']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tumarMarker['TumarMarker']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tumar Markers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tumar Marker'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List About Illnesses'), array('controller' => 'about_illnesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New About Illness'), array('controller' => 'about_illnesses', 'action' => 'add')); ?> </li>
	</ul>
</div>
