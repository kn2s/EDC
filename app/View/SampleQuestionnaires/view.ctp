<div class="sampleQuestionnaires view">
<h2><?php echo __('Sample Questionnaire'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Detail'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['patient_detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social History'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['social_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('About The Illness'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['about_the_illness']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Past History'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['past_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test Report'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['test_report']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createtime'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['createtime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($sampleQuestionnaire['SampleQuestionnaire']['is_deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sample Questionnaire'), array('action' => 'edit', $sampleQuestionnaire['SampleQuestionnaire']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sample Questionnaire'), array('action' => 'delete', $sampleQuestionnaire['SampleQuestionnaire']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sampleQuestionnaire['SampleQuestionnaire']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Sample Questionnaires'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sample Questionnaire'), array('action' => 'add')); ?> </li>
	</ul>
</div>
