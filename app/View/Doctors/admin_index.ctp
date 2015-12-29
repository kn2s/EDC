
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Doctors</h1>
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
                                            <th>Email</th>
                                            <th>Specialization</th>
                                            <th>Qualification</th>
                                            <th>Image</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
								<?php
									if(count($doctors)>0){
										foreach($doctors as $doctor){
									?>
										<tr class="odd gradeX">
                                            <td><?=$doctor['Patient']['name']?></td>
                                            <td><?=$doctor['Patient']['email']?></td>
                                            <td><?=$doctor['Specialization']['name']?></td>
                                            <td><?=$doctor['Doctor']['designation']?></td>
                                            <td><img src="<?=FULL_BASE_URL.$this->base.'/doctorimage/'.$doctor['Doctor']['image']?>" width="80" height="80" /></td>
											<td><?php
												if($doctor['Patient']['isactive']){
													echo $this->Html->link(__('InActive'), array('action' => 'activeinactive', $doctor['Patient']['id'],'0'),array("class"=>"btn btn-default"));
												}
												else{
													echo $this->Html->link(__('Active'), array('action' => 'activeinactive', $doctor['Patient']['id'],'1'),array("class"=>"btn btn-default"));
												}
												echo "&nbsp;&nbsp";
												echo $this->Html->link(__('Edit'), array('action' => 'edit', $doctor['Patient']['id']),array("class"=>"btn btn-default"));
												echo "&nbsp;&nbsp";
												echo $this->Html->link(__('Add Holiday'), array('controller'=>'DoctorHolidays','action' => 'add', $doctor['Patient']['id']),array("class"=>"btn btn-default"));
												echo "&nbsp;&nbsp";
												echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doctor['Patient']['id']), array('confirm' => __('Are you sure you want to delete # %s? Doctor', $doctor['Patient']['id']),"class"=>"btn btn-default"));
												echo "</br> </br>";
												echo $this->Html->link(__('All Holidays'), array('controller'=>'DoctorHolidays','action' => 'view', $doctor['Patient']['id']),array("class"=>"btn btn-default"));
												echo "&nbsp;&nbsp";
											?></td>
										</tr>
									<?php
										}
									}
									else{
								?>
										<tr class="odd gradeX">
                                            <td colspan='6'>No doctor added yet </td>
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