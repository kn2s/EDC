<div class="caseOpinions view">
<h2><?php echo __('Case Opinion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Case'); ?></dt>
		<dd>
			<?php echo $this->Html->link($caseOpinion['DoctorCase']['id'], array('controller' => 'doctor_cases', 'action' => 'view', $caseOpinion['DoctorCase']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assessment'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['assessment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prognosis'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['prognosis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Treatmentstrategy'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['treatmentstrategy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alternativestrategy'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['alternativestrategy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cteratedatetime'); ?></dt>
		<dd>
			<?php echo h($caseOpinion['CaseOpinion']['cteratedatetime']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Case Opinion'), array('action' => 'edit', $caseOpinion['CaseOpinion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Case Opinion'), array('action' => 'delete', $caseOpinion['CaseOpinion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $caseOpinion['CaseOpinion']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Case Opinions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Opinion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Cases'), array('controller' => 'doctor_cases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('controller' => 'doctor_cases', 'action' => 'add')); ?> </li>
	</ul>
</div>
