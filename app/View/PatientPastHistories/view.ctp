<div class="patientPastHistories view">
<h2><?php echo __('Patient Past History'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patientPastHistory['PatientPastHistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patientPastHistory['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $patientPastHistory['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cancer History'); ?></dt>
		<dd>
			<?php echo h($patientPastHistory['PatientPastHistory']['cancer_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Surgical History'); ?></dt>
		<dd>
			<?php echo h($patientPastHistory['PatientPastHistory']['surgical_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hospitalization'); ?></dt>
		<dd>
			<?php echo h($patientPastHistory['PatientPastHistory']['hospitalization']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family Cancer History'); ?></dt>
		<dd>
			<?php echo h($patientPastHistory['PatientPastHistory']['family_cancer_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($patientPastHistory['PatientPastHistory']['comments']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Patient Past History'), array('action' => 'edit', $patientPastHistory['PatientPastHistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Patient Past History'), array('action' => 'delete', $patientPastHistory['PatientPastHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $patientPastHistory['PatientPastHistory']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Patient Past Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Past History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
