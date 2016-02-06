<div class="sampleOpinions view">
<h2><?php echo __('Sample Opinion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Name'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['doctor_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Create Date'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['create_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Refferences'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['refferences']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assesment'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['assesment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prognosis'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['prognosis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Best Tritment Strategy'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['best_tritment_strategy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alternative Strategy'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['alternative_strategy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Qualification'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['doctor_qualification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Create Time'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['create_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($sampleOpinion['SampleOpinion']['is_deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sample Opinion'), array('action' => 'edit', $sampleOpinion['SampleOpinion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sample Opinion'), array('action' => 'delete', $sampleOpinion['SampleOpinion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sampleOpinion['SampleOpinion']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Sample Opinions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sample Opinion'), array('action' => 'add')); ?> </li>
	</ul>
</div>
