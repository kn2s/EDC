<script>
	var isdayschedulecrt="<?=$isenabledayschedule?>";
	var isdoctschedulecrt="<?=$isenabledoctschedule?>";
	$(document).ready(function(){
		if(isdayschedulecrt=='1' && isdoctschedulecrt=='1'){
			alert("You need to create both schedule for system work properly");
		}
		else{
			if(isdayschedulecrt=='1'){
				alert("You need to create Day schedule for system work properly");
			}
			else{
				if(isdoctschedulecrt=='1'){
					alert("You need to create Doctor schedule for system work properly");
				}
			}
		}
	});
</script>
<div style="text-align:center;">
<?php echo $this->Session->flash()?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Create Scheduler</h1>
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
							<th style="text-align:center;">
								<?php
									if($isenabledayschedule){
										echo $this->Html->link(__('Create Day Scheduler'),array('controller'=>'WorkSchedules','action'=>'add','full_base'=>true),array("class"=>"btn btn-default"));
									}
									else{
									?>
										<a href="javascript:void(0)" class="btn btn-default" style="background-color:#ccc;">Create Day Scheduler</a>
									<?php
									}
									?>
							</th>
							<th style="text-align:center;">
								<?php
									if($isenabledoctschedule){
										echo $this->Html->link(__('Create Doctor Scheduler'), array('controller'=>'ScheduleDoctors','action'=>'add','full_base'=>true), array("class"=>"btn btn-default")); 
									}
									else{
									?>
										<a href="javascript:void(0)" class="btn btn-default" style="background-color:#ccc;">Create Doctor Scheduler</a>
									<?php
									}
								?>
								
							</th>
						</thead>
						<tbody>
							<tr>
								<td style="text-align:center;">Day scheduler created for 1 year ( <?php echo $daytimeperiod; ?> )</td>
								<td style="text-align:center;">Doctor scheduler created for 3 month ( <?=$timefram?> ) </td>
							</tr>
							<tr>
								<td style="text-align:center;" colspan="2">NOTE - You will be getting notification to create both scheduler when time elapsed and button will be active for you</td>
							</tr>
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
