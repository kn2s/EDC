
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Doctor's Schedule Chart</h1>
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
								<?php 
									if(count($workSchedules)>0){
										echo "<th>Doctor Name</th>";
										foreach($workSchedules as $workScheduleid=>$workday){
											?>
											<th><?=$workday?></th>
											<?php
										}
									}
								?>
							</tr>
						</thead>
						<tbody>
					<?php
					//pr($doctoreSceduls);
						if(count($doctoreSceduls)>0){
							$daycount = count($workSchedules);
							foreach($doctoreSceduls as $doctoreScedul){
							?>
							<tr>
								<td><?php echo h($doctoreScedul['Patient']['name']);?></td>
								<?php
									$allschedule = $doctoreScedul['ScheduleDoctor'];
									for($i=0;$i<$daycount;$i++){
										$schlddata = isset($allschedule[$i])?$allschedule[$i]:array();
										$assignment=0;
										$isonholiday=0;
										if(is_array($schlddata) && count($schlddata)>0){
											$assignment = $schlddata['assignment'];
											$isonholiday = $schlddata['isonholiday'];
											if($isonholiday){
												$assignment='H';
											}
										}
										?>
										<td><?=$assignment?></td>
										<?php
									}
								?>
							</tr>
							<?php
							}
						}
						else{
					?>
							<tr class="odd gradeX">
								<td colspan='<?=count($workSchedules)?>'>No case found for the doctors</td>
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