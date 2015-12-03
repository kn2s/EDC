<div class="patientDocuments view">
<h2><?php echo __('Patient Document'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patientDocument['PatientDocument']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patientDocument['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $patientDocument['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bloodreport'); ?></dt>
		<dd>
			<?php echo h($patientDocument['PatientDocument']['bloodreport']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagingreport'); ?></dt>
		<dd>
			<?php echo h($patientDocument['PatientDocument']['imagingreport']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pathologyreport'); ?></dt>
		<dd>
			<?php echo h($patientDocument['PatientDocument']['pathologyreport']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otherreport'); ?></dt>
		<dd>
			<?php echo h($patientDocument['PatientDocument']['otherreport']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Patient Document'), array('action' => 'edit', $patientDocument['PatientDocument']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Patient Document'), array('action' => 'delete', $patientDocument['PatientDocument']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $patientDocument['PatientDocument']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Patient Documents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
