<div class="sampleOpinions form">
<?php echo $this->Form->create('SampleOpinion'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Sample Opinion'); ?></legend>
	<?php
		echo $this->Form->input('patient_name');
		echo $this->Form->input('doctor_name');
		echo $this->Form->input('create_date');
		echo $this->Form->input('refferences');
		echo $this->Form->input('assesment');
		echo $this->Form->input('prognosis');
		echo $this->Form->input('best_tritment_strategy');
		echo $this->Form->input('alternative_strategy');
		echo $this->Form->input('doctor_qualification');
		echo $this->Form->input('create_time');
		echo $this->Form->input('is_deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sample Opinions'), array('action' => 'index')); ?></li>
	</ul>
</div>
