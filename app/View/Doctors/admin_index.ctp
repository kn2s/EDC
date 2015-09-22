
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
											<th></th>
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
											<td></td>
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