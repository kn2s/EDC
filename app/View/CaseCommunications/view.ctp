<div class="caseCommunications view">
<h2><?php echo __('Case Communication'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($caseCommunication['CaseCommunication']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Case'); ?></dt>
		<dd>
			<?php echo $this->Html->link($caseCommunication['DoctorCase']['id'], array('controller' => 'doctor_cases', 'action' => 'view', $caseCommunication['DoctorCase']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($caseCommunication['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $caseCommunication['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($caseCommunication['CaseCommunication']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdate'); ?></dt>
		<dd>
			<?php echo h($caseCommunication['CaseCommunication']['createdate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Case Communication'), array('action' => 'edit', $caseCommunication['CaseCommunication']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Case Communication'), array('action' => 'delete', $caseCommunication['CaseCommunication']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $caseCommunication['CaseCommunication']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Case Communications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Communication'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('controller' => 'doctor_cases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('controller' => 'doctor_cases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
