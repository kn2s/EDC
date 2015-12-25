<?php 
//pr($specializations);
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Specializations</h1>
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
                                            <th>Name</th>
                                            
											<th>action</th>
                                        </tr>
                                    </thead>
									<tbody>
								<?php
									if(count($specializations)>0){
										foreach($specializations as $specialization){
									?>
										<tr class="odd gradeX">
                                            <td><?=$specialization['Specialization']['name']?></td>
                                            <td><?php
												if($specialization['Specialization']['isactive']){
													echo $this->Html->link(__('InActive'), array('action' => 'activeinactive', $specialization['Specialization']['id'],'0'),array("class"=>"btn btn-default"));
												}
												else{
													echo $this->Html->link(__('Active'), array('action' => 'activeinactive', $specialization['Specialization']['id'],'1'),array("class"=>"btn btn-default"));
												}
												echo "&nbsp;&nbsp";
												echo $this->Html->link(__('Edit'), array('action' => 'edit', $specialization['Specialization']['id']),array("class"=>"btn btn-default"));
												echo "&nbsp;&nbsp";
												echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $specialization['Specialization']['id']), array('confirm' => __('Are you sure you want to delete # %s? Specialization', $specialization['Specialization']['id']),"class"=>"btn btn-default"));
											?></td>
										</tr>
									<?php
										}
									}
									else{
								?>
										<tr class="odd gradeX">
                                            <td colspan='2'>No Specialization added yet </td>
                                        </tr>
								<?php
									}
								?>
									</tbody>
                         
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
            </div>