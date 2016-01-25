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
<button type="reset" class="btn btn-back">Back</button>
