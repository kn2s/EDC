<div class="patients view">
<h2><?php echo __('Patient'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createtime'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['createtime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Browserdetails'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['browserdetails']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isdeleted'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['isdeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
