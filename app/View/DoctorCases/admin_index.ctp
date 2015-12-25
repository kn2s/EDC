<!--<div class="doctorCases index">
	<h2><?php echo __('Doctor Cases'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('casecode'); ?></th>
			<th><?php echo $this->Paginator->sort('opinion_due_date'); ?></th>
			<th><?php echo $this->Paginator->sort('available_date'); ?></th>
			<th><?php echo $this->Paginator->sort('consultant_fee'); ?></th>
			<th><?php echo $this->Paginator->sort('satatus'); ?></th>
			<th><?php echo $this->Paginator->sort('diagonisis'); ?></th>
			<th><?php echo $this->Paginator->sort('ispaymentdone'); ?></th>
			<th><?php echo $this->Paginator->sort('createdate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($doctorCases as $doctorCase): ?>
	<tr>
		<td><?php echo h($doctorCase['DoctorCase']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($doctorCase['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $doctorCase['Patient']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($doctorCase['Doctor']['id'], array('controller' => 'doctors', 'action' => 'view', $doctorCase['Doctor']['id'])); ?>
		</td>
		<td><?php echo h($doctorCase['DoctorCase']['casecode']); ?>&nbsp;</td>
		<td><?php echo h($doctorCase['DoctorCase']['opinion_due_date']); ?>&nbsp;</td>
		<td><?php echo h($doctorCase['DoctorCase']['available_date']); ?>&nbsp;</td>
		<td><?php echo h($doctorCase['DoctorCase']['consultant_fee']); ?>&nbsp;</td>
		<td><?php echo h($doctorCase['DoctorCase']['satatus']); ?>&nbsp;</td>
		<td><?php echo h($doctorCase['DoctorCase']['diagonisis']); ?>&nbsp;</td>
		<td><?php echo h($doctorCase['DoctorCase']['ispaymentdone']); ?>&nbsp;</td>
		<td><?php echo h($doctorCase['DoctorCase']['createdate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $doctorCase['DoctorCase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doctorCase['DoctorCase']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doctorCase['DoctorCase']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctorCase['DoctorCase']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Doctor Case'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctors'), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor'), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->


<?php //pr($doctorCases);// die();?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Doctor Cases</h1>
	</div>
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
								<th><?php echo $this->Paginator->sort('id'); ?></th>
								<th><?php echo $this->Paginator->sort('patient_id'); ?></th>
								<th><?php echo $this->Paginator->sort('doctor_id'); ?></th>
								<!--<th><?php echo $this->Paginator->sort('casecode'); ?></th>-->
								<th><?php echo $this->Paginator->sort('opinion_due_date'); ?></th>
								<th><?php echo $this->Paginator->sort('available_date'); ?></th>
								<th><?php echo $this->Paginator->sort('consultant_fee'); ?></th>
								<th><?php echo $this->Paginator->sort('satatus'); ?></th>
								<th><?php echo $this->Paginator->sort('diagonisis'); ?></th>
								<th><?php echo $this->Paginator->sort('ispaymentdone'); ?></th>
								<th><?php echo $this->Paginator->sort('createdate'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
					<?php
						if(count($doctorCases)>0){
							foreach($doctorCases as $doctorCase){
						?>
							<tr class="odd gradeX">
								<td><?php echo h($doctorCase['DoctorCase']['id']); ?>&nbsp;</td>
								<td>
									<?php 
										echo h($doctorCase['Patient']['PatientDetail']['name']);
									//echo $this->Html->link($doctorCase['Patient']['name'], array('controller' => 'patients', 'action' => 'view', $doctorCase['Patient']['id'])); ?>
								</td>
								<td>
									<?php 
									echo "Dr.". h($doctorCase['Doctor']['name']);
									//echo $this->Html->link($doctorCase['Doctor']['id'], array('controller' => 'doctors', 'action' => 'view', $doctorCase['Doctor']['id'])); ?>
								</td>
								<!--<td><?php echo h($doctorCase['DoctorCase']['casecode']); ?>&nbsp;</td>-->
								<td><?php echo h($doctorCase['DoctorCase']['opinion_due_date']); ?>&nbsp;</td>
								<td><?php echo h($doctorCase['DoctorCase']['available_date']); ?>&nbsp;</td>
								<td><?php echo h($doctorCase['DoctorCase']['consultant_fee']); ?>&nbsp;</td>
								<td><?php echo h($doctorCase['DoctorCase']['satatus']); ?>&nbsp;</td>
								<td><?php echo h($doctorCase['DoctorCase']['diagonisis']); ?>&nbsp;</td>
								<td><?php echo h($doctorCase['DoctorCase']['ispaymentdone']); ?>&nbsp;</td>
								<td><?php echo h($doctorCase['DoctorCase']['createdate']); ?>&nbsp;</td>
								<td class="actions">
									<?php echo $this->Html->link(__('Details'), array('action' => 'view', $doctorCase['DoctorCase']['id']),array("class"=>"btn btn-default")); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doctorCase['DoctorCase']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctorCase['DoctorCase']['id']),"class"=>"btn btn-default")); ?>
								</td>
							</tr>
						<?php
							}
						}
						else{
					?>
							<tr class="odd gradeX">
								<td colspan='5'>No schedule created </td>
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