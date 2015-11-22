<div class="aboutIllnesses view">
<h2><?php echo __('About Illness'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aboutIllness['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $aboutIllness['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Principle Diagonisises'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aboutIllness['PrincipleDiagonisises']['name'], array('controller' => 'principle_diagonisises', 'action' => 'view', $aboutIllness['PrincipleDiagonisises']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startdiagomonth'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['startdiagomonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startdiagoday'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['startdiagoday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startdiagoyear'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['startdiagoyear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enddiagomonth'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['enddiagomonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enddiagoyear'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['enddiagoyear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enddiagoday'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['enddiagoday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagodetails'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['diagodetails']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagorecomandation'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['diagorecomandation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Istumarmarker'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['istumarmarker']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tumartype'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['tumartype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tumarmonth'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['tumarmonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tumoryear'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['tumoryear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tumarresult'); ?></dt>
		<dd>
			<?php echo h($aboutIllness['AboutIllness']['tumarresult']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit About Illness'), array('action' => 'edit', $aboutIllness['AboutIllness']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete About Illness'), array('action' => 'delete', $aboutIllness['AboutIllness']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $aboutIllness['AboutIllness']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List About Illnesses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New About Illness'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Principle Diagonisises'), array('controller' => 'principle_diagonisises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Principle Diagonisises'), array('controller' => 'principle_diagonisises', 'action' => 'add')); ?> </li>
	</ul>
</div>
