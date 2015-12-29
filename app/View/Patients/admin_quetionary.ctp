<!--<div class="patients form">
<?php echo $this->Form->create('Patient'); ?>
	<fieldset>
		<legend><?php echo __('Edit Patient'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('createtime');
		echo $this->Form->input('browserdetails');
		echo $this->Form->input('isactive');
		echo $this->Form->input('isdeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Patient.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Patient.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Questionary</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
<!-- main container sections -->

<div class="col-lg-12">
	<div class="panel panel-default">
		<!-- /.panel-heading -->
		<div class="panel-heading">
			Patient Basic Details
		</div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>Field Name</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
				<?php
					if(count($patients)>0){
						foreach($patients as $patient){
					?>
						<tr class="odd gradeX">
							
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					<?php
						}
					}
					else{
				?>
						<tr class="odd gradeX">
							<td colspan='2'>Questionary not added </td>
						</tr>
				<?php
					}
				?>
					</tbody>
		 
				</table>
			</div>
			
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>

</div>