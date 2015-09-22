<div class="patientDetails view">
<h2><?php echo __('Patient Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patientDetail['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $patientDetail['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob Month'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['dob_month']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob Day'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['dob_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob Year'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['dob_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patientDetail['Country']['name'], array('controller' => 'countries', 'action' => 'view', $patientDetail['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Performance'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['performance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Performance Comment'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['performance_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($patientDetail['PatientDetail']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Patient Detail'), array('action' => 'edit', $patientDetail['PatientDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Patient Detail'), array('action' => 'delete', $patientDetail['PatientDetail']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $patientDetail['PatientDetail']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
