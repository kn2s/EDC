<!--
<div class="socialactivities index">
	<h2><?php echo __('Socialactivities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('isdeleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($socialactivities as $socialactivity): ?>
	<tr>
		<td><?php echo h($socialactivity['Socialactivity']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($socialactivity['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $socialactivity['Patient']['id'])); ?>
		</td>
		<td><?php echo h($socialactivity['Socialactivity']['comment']); ?>&nbsp;</td>
		<td><?php echo h($socialactivity['Socialactivity']['isdeleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $socialactivity['Socialactivity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $socialactivity['Socialactivity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $socialactivity['Socialactivity']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $socialactivity['Socialactivity']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Socialactivity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alcohols'), array('controller' => 'alcohols', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alcohol'), array('controller' => 'alcohols', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Drugs'), array('controller' => 'drugs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Drug'), array('controller' => 'drugs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Smokings'), array('controller' => 'smokings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Smoking'), array('controller' => 'smokings', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

<div id="socialActivity">
	<?php 
		echo $this->Form->create('Socialactivity');
		echo $this->Form->hidden('id');
	?>
	<h2>Social History</h2>
            <div class="Smoking">
            	<h3>Smoking</h3>
                <p class="mb10">Please provide the following details if the patient has or had smoking habits.</p>
                <div class="clear"></div>
                <div class="quantity">
                	<label class="blue">Quantity</label>
                    <input type="text" placeholder="0">
                    <select>
                    	<option>In a Day</option>
                    </select>
                </div>
                <div class="period ml20">
                	<label class="blue">Quantity</label>
                    <select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>
                    <p class="dash">-</p>
                    <select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>
                </div>
                <div class="clear"></div>
            </div>
            <div class="alcohal">
            	<h3>Alcohol</h3>
                <p class="mb10">Please provide the following details if the patient consumes or used to consume alcohol.</p>
                <div class="gender">
                	<label class="blue">Alcohol Type</label>
                    <input type="text">
                </div>
                <div class="quantity ml20">
                	<label class="blue">Quantity</label>
                    <input type="text" placeholder="0" class="ml">
                    <select>
                    	<option>In a Day</option>
                    </select>
                </div>
                <div class="clear10"></div>
                <div class="gender">
                    <input type="text">
                </div>
                <div class="quantity ml20">
                    <input type="text" placeholder="0" class="ml">
                    <select>
                    	<option>In a Day</option>
                    </select>
                </div>
                <a href="#" class="greenText ml20">+ Add More</a>
                <div class="clear15"></div>
                <div class="period">
                	<label class="blue">Quantity</label>
                    <select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>
                    <p class="dash">-</p>
                    <select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>
                </div>
                <div class="clear"></div>
            </div>
            <div class="drug">
            	<h3>Drugs</h3>
                <p class="mb10">Please provide the following details if the patient consumes drugs</p>
                <div class="gender">
                	<label class="blue">Drug Type</label>
                    <input type="text">
                </div>
                <div class="quantity ml20">
                	<label class="blue">Quantity</label>
                    <input type="text" placeholder="0" class="ml">
                    <select>
                    	<option>In a Day</option>
                    </select>
                </div>
                <div class="clear10"></div>
                <div class="gender">
                    <input type="text">
                </div>
                <div class="quantity ml20">
                    <input type="text" placeholder="0" class="ml">
                    <select>
                    	<option>In a Day</option>
                    </select>
                </div>
                <a href="#" class="greenText ml20">+ Add More</a>
                <div class="clear"></div>
            </div>
            <div class="additional">
            	<div class="w540">
                	<label class="blue">Additional Comments</label>
                	<p>Do you want to tell us anyhing about the addiction</p>
                	<textarea></textarea>
                </div>
            </div>
            <div class="clear35"></div>
            <a href="javascript:void(0)" class="backBtn">Back</a>
            <input type="submit" class="nextBtn" value="Next">
            <a href="javascript:void(0)" class="saveBtn">Save</a>
	</form>
</div>