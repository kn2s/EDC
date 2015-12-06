<div class="doctorCases view">
<h2><?php echo __('Doctor Case'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctorCase['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $doctorCase['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctorCase['Doctor']['id'], array('controller' => 'doctors', 'action' => 'view', $doctorCase['Doctor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Casecode'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['casecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Opinion Due Date'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['opinion_due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Available Date'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['available_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consultant Fee'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['consultant_fee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Satatus'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['satatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagonisis'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['diagonisis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ispaymentdone'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['ispaymentdone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdate'); ?></dt>
		<dd>
			<?php echo h($doctorCase['DoctorCase']['createdate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doctor Case'), array('action' => 'edit', $doctorCase['DoctorCase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doctor Case'), array('action' => 'delete', $doctorCase['DoctorCase']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctorCase['DoctorCase']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
