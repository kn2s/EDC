<!--<div class="scheduleDoctors index">
	<h2><?php echo __('Schedule Doctors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('work_schedule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('doct_id'); ?></th>
			<th><?php echo $this->Paginator->sort('isonholiday'); ?></th>
			<th><?php echo $this->Paginator->sort('assignment'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($scheduleDoctors as $scheduleDoctor): ?>
	<tr>
		<td><?php echo h($scheduleDoctor['ScheduleDoctor']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($scheduleDoctor['WorkSchedule']['id'], array('controller' => 'work_schedules', 'action' => 'view', $scheduleDoctor['WorkSchedule']['id'])); ?>
		</td>
		<td><?php echo h($scheduleDoctor['ScheduleDoctor']['doct_id']); ?>&nbsp;</td>
		<td><?php echo h($scheduleDoctor['ScheduleDoctor']['isonholiday']); ?>&nbsp;</td>
		<td><?php echo h($scheduleDoctor['ScheduleDoctor']['assignment']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $scheduleDoctor['ScheduleDoctor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $scheduleDoctor['ScheduleDoctor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $scheduleDoctor['ScheduleDoctor']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $scheduleDoctor['ScheduleDoctor']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Schedule Doctor'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Work Schedules'), array('controller' => 'work_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Schedule'), array('controller' => 'work_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

<?php //pr($allassigndocts); ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Schedules</h1>
	</div>
	<?php 
		echo $this->Form->input("daychoose",array("options"=>$workSchedules));
	?>
</div>
<div class="row">			
	<div class="col-lg-12">
		<div class="panel panel-default">
			
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<!--<th><?php echo $this->Paginator->sort('doct_id','Doctor Id'); ?></th>
								<th><?php echo $this->Paginator->sort('isonholiday','On Holiday'); ?></th>
								<th><?php echo $this->Paginator->sort('assignment','Case assign'); ?></th>-->
								
								<th>Doctor Id</th>
								<th>On Holiday</th>
								<th>Case assign</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
					<?php
						if(count($scheduleDoctors)>0){
							foreach($scheduleDoctors as $scheduleDoctor){
						?>
							<tr class="odd gradeX">
								<!--<td><?php echo h($scheduleDoctor['ScheduleDoctor']['doct_id']); ?>&nbsp;</td>
								<td><?php echo (h($scheduleDoctor['ScheduleDoctor']['isonholiday']))?"Yes":"No"; ?>&nbsp;</td>
								<td><?php echo h($scheduleDoctor['ScheduleDoctor']['assignment']); ?>&nbsp;</td>-->
								
								<td><?php echo h($scheduleDoctor['doct_id']); ?>&nbsp;</td>
								<td><?php echo (h($scheduleDoctor['isonholiday']))?"Yes":"No"; ?>&nbsp;</td>
								<td><?php echo h($scheduleDoctor['assignment']); ?>&nbsp;</td>
								<td></td>
							</tr>
						<?php
							}
						}
						else{
					?>
							<tr class="odd gradeX">
								<td colspan='5'>No doctor schedule created </td>
							</tr>
					<?php
						}
					?>
						</tbody>
			 
					</table>
					<!--<div class="workSchedules index">
						<p>
							<?php
							echo $this->Paginator->counter(array(
								'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
							));
							?>	
						</p>
						<div class="paging">
						<?php
							echo $this->Paginator->prev('< ' . __('previous  '), array(), null, array('class' => 'prev disabled'));
							echo $this->Paginator->numbers(array('separator' => '  '));
							echo $this->Paginator->next(__('  next') . ' >', array(), null, array('class' => 'next disabled'));
						?>
						</div>
					</div>-->
				</div>
				<!-- /.table-responsive -->
		  
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	
</div>