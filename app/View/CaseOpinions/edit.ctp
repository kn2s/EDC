<div class="caseOpinions form">
<?php echo $this->Form->create('CaseOpinion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Case Opinion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('doctor_case_id');
		echo $this->Form->input('assessment');
		echo $this->Form->input('prognosis');
		echo $this->Form->input('treatmentstrategy');
		echo $this->Form->input('alternativestrategy');
		echo $this->Form->input('comment');
		echo $this->Form->input('cteratedatetime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CaseOpinion.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CaseOpinion.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Case Opinions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('controller' => 'doctor_cases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('controller' => 'doctor_cases', 'action' => 'add')); ?> </li>
	</ul>
</div>
