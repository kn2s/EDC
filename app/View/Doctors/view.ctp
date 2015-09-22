<div class="doctors view">
<h2><?php echo __('Doctor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $doctor['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specialization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctor['Specialization']['name'], array('controller' => 'specializations', 'action' => 'view', $doctor['Specialization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['designation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medical School'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['medical_school']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Residency'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['residency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fellowship'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['fellowship']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description One'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['description_one']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description Two'); ?></dt>
		<dd>
			<?php echo h($doctor['Doctor']['description_two']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doctor'), array('action' => 'edit', $doctor['Doctor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doctor'), array('action' => 'delete', $doctor['Doctor']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctor['Doctor']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specializations'), array('controller' => 'specializations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specialization'), array('controller' => 'specializations', 'action' => 'add')); ?> </li>
	</ul>
</div>
