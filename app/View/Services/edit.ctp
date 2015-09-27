<div class="services form">
<?php echo $this->Form->create('Service'); ?>
	<fieldset>
		<legend><?php echo __('Edit Service'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('doct_service_brif');
		echo $this->Form->input('doct_service_detail');
		echo $this->Form->input('doc_collabration_title');
		echo $this->Form->input('doc_colla_option_one');
		echo $this->Form->input('doc_colla_option_two');
		echo $this->Form->input('doc_colla_option_three');
		echo $this->Form->input('doc_colla_option_four');
		echo $this->Form->input('doc_colla_email');
		echo $this->Form->input('patient_service_brif');
		echo $this->Form->input('patient_service_detail');
		echo $this->Form->input('patient_hepling_title');
		echo $this->Form->input('patient_helping_way');
		echo $this->Form->input('consulting_charge');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Service.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Service.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Services'), array('action' => 'index')); ?></li>
	</ul>
</div>
