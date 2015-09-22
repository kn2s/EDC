<div class="patients view">
<h2><?php echo __('Patient'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createtime'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['createtime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Browserdetails'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['browserdetails']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Patient'), array('action' => 'edit', $patient['Patient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Patient'), array('action' => 'delete', $patient['Patient']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $patient['Patient']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Patient Details'); ?></h3>
	<?php if (!empty($patient['PatientDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Patient Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Dob Month'); ?></th>
		<th><?php echo __('Dob Day'); ?></th>
		<th><?php echo __('Dob Year'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Performance'); ?></th>
		<th><?php echo __('Performance Comment'); ?></th>
		<th><?php echo __('Isactive'); ?></th>
		<th><?php echo __('Isdeleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($patient['PatientDetail'] as $patientDetail): ?>
		<tr>
			<td><?php echo $patientDetail['id']; ?></td>
			<td><?php echo $patientDetail['patient_id']; ?></td>
			<td><?php echo $patientDetail['name']; ?></td>
			<td><?php echo $patientDetail['gender']; ?></td>
			<td><?php echo $patientDetail['dob_month']; ?></td>
			<td><?php echo $patientDetail['dob_day']; ?></td>
			<td><?php echo $patientDetail['dob_year']; ?></td>
			<td><?php echo $patientDetail['weight']; ?></td>
			<td><?php echo $patientDetail['height']; ?></td>
			<td><?php echo $patientDetail['city']; ?></td>
			<td><?php echo $patientDetail['state']; ?></td>
			<td><?php echo $patientDetail['country_id']; ?></td>
			<td><?php echo $patientDetail['performance']; ?></td>
			<td><?php echo $patientDetail['performance_comment']; ?></td>
			<td><?php echo $patientDetail['isactive']; ?></td>
			<td><?php echo $patientDetail['isdeleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'patient_details', 'action' => 'view', $patientDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'patient_details', 'action' => 'edit', $patientDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'patient_details', 'action' => 'delete', $patientDetail['id']), array('confirm' => __('Are you sure you want to delete # %s?', $patientDetail['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
