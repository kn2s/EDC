<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Countries</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
<!-- main container sections -->

<div class="col-lg-12">
	<div class="panel panel-default">
		<?php echo $this->Session->flash(); ?>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('shortname'); ?></th>
							<th><?php echo $this->Paginator->sort('countrycode'); ?></th>
							<th><?php echo $this->Paginator->sort('countryflag'); ?></th>
							<th><?php echo $this->Paginator->sort('isactive'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
				<?php
					if(count($countries)>0){
						foreach($countries as $country){
					?>
						<tr class="odd gradeX">
							
							<td><?php echo h($country['Country']['id']); ?>&nbsp;</td>
							<td><?php echo h($country['Country']['name']); ?>&nbsp;</td>
							<td><?php echo h($country['Country']['shortname']); ?>&nbsp;</td>
							<td><?php echo h($country['Country']['countrycode']); ?>&nbsp;</td>
							<?php 
								if(h($country['Country']['countryflag'])!=''){
							?>
							<td><img src="<?=FULL_BASE_URL.$this->base.'/countryflags/'.h($country['Country']['countryflag'])?>" width="60" height="60"/></td>
							<?php
								}
								else{
									echo "<td></td>";
								}
							?>
							
							<td><?php echo (h($country['Country']['isactive'])==1)?"Active":"In Active"; ?>&nbsp;</td>
							
							<td class="actions">
								
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $country['Country']['id']),array('class'=>'btn btn-default')); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $country['Country']['id']), array('class'=>'btn btn-default','confirm' => __('Are you sure you want to delete country # %s?', $country['Country']['id']))); ?>
							</td>
						</tr>
					<?php
						}
					}
					else{
				?>
						<tr class="odd gradeX">
							<td colspan='7'>No country added yet </td>
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