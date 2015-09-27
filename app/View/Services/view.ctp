<div class="services view">
<h2><?php echo __('Service'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($service['Service']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doct Service Brif'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doct_service_brif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doct Service Detail'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doct_service_detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Collabration Title'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doc_collabration_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Colla Option One'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doc_colla_option_one']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Colla Option Two'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doc_colla_option_two']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Colla Option Three'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doc_colla_option_three']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Colla Option Four'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doc_colla_option_four']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Colla Email'); ?></dt>
		<dd>
			<?php echo h($service['Service']['doc_colla_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Service Brif'); ?></dt>
		<dd>
			<?php echo h($service['Service']['patient_service_brif']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Service Detail'); ?></dt>
		<dd>
			<?php echo h($service['Service']['patient_service_detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Hepling Title'); ?></dt>
		<dd>
			<?php echo h($service['Service']['patient_hepling_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Helping Way'); ?></dt>
		<dd>
			<?php echo h($service['Service']['patient_helping_way']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consulting Charge'); ?></dt>
		<dd>
			<?php echo h($service['Service']['consulting_charge']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Service'), array('action' => 'edit', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Service'), array('action' => 'delete', $service['Service']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $service['Service']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('action' => 'add')); ?> </li>
	</ul>
</div>
