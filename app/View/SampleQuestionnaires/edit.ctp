<div class="sampleQuestionnaires form">
<?php echo $this->Form->create('SampleQuestionnaire'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sample Questionnaire'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_detail');
		echo $this->Form->input('social_history');
		echo $this->Form->input('about_the_illness');
		echo $this->Form->input('past_history');
		echo $this->Form->input('test_report');
		echo $this->Form->input('createtime');
		echo $this->Form->input('is_deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SampleQuestionnaire.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('SampleQuestionnaire.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Sample Questionnaires'), array('action' => 'index')); ?></li>
	</ul>
</div>
