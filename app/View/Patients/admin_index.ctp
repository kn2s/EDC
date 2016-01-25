<div class="row">
	<center><?php echo $this->Session->flash(); ?></center>
	<div class="col-lg-12">
		<h1 class="page-header">Patients</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
<!-- main container sections -->

<div class="col-lg-12">
	<div class="panel panel-default">
		
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
							<th><?php echo $this->Paginator->sort('isactive'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
				<?php
					if(count($patients)>0){
						foreach($patients as $patient){
					?>
						<tr class="odd gradeX">
							
							<td><?php echo h($patient['Patient']['id']); ?>&nbsp;</td>
							<td><?php echo h($patient['Patient']['name']); ?>&nbsp;</td>
							<td><?php echo h($patient['Patient']['email']); ?>&nbsp;</td>
							<td><?php echo (h($patient['Patient']['isactive'])==1)?"Active":"In Active"; ?>&nbsp;</td>
							
							<td class="actions">
								
								<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $patient['Patient']['id']),array('class'=>'btn btn-default')); ?>
								<?php echo $this->Html->link(__('Questionary'), array('action' => 'quetionary', $patient['Patient']['id']),array('class'=>'btn btn-default')); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $patient['Patient']['id']), array('class'=>'btn btn-default','confirm' => __('Are you sure you want to delete patient # %s?', $patient['Patient']['id']))); ?>
							</td>
						</tr>
					<?php
						}
					}
					else{
				?>
						<tr class="odd gradeX">
							<td colspan='5'>No country added yet </td>
						</tr>
				<?php
					}
				?>
					</tbody>
		 
				</table>
			</div>
			<button type="reset" class="btn btn-back">Back</button>
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>

</div>