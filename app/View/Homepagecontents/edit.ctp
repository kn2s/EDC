<div class="homepagecontents form">
<?php echo $this->Form->create('Homepagecontent'); ?>
	<fieldset>
		<legend><?php echo __('Edit Homepagecontent'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('specialisttag');
		echo $this->Form->input('facebook');
		echo $this->Form->input('twitter');
		echo $this->Form->input('youtube');
		echo $this->Form->input('tag_one');
		echo $this->Form->input('tag_two');
		echo $this->Form->input('tag_three');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Homepagecontent.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Homepagecontent.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Homepagecontents'), array('action' => 'index')); ?></li>
	</ul>
</div>
