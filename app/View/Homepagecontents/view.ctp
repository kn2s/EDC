<div class="homepagecontents view">
<h2><?php echo __('Homepagecontent'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specialisttag'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['specialisttag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['twitter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Youtube'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['youtube']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag One'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['tag_one']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag Two'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['tag_two']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag Three'); ?></dt>
		<dd>
			<?php echo h($homepagecontent['Homepagecontent']['tag_three']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Homepagecontent'), array('action' => 'edit', $homepagecontent['Homepagecontent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Homepagecontent'), array('action' => 'delete', $homepagecontent['Homepagecontent']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $homepagecontent['Homepagecontent']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Homepagecontents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Homepagecontent'), array('action' => 'add')); ?> </li>
	</ul>
</div>
