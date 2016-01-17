<style>
	.tdnotpresent{
		color:red;
	}
	.tdholiday{
		color:blue;
	}
</style>
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
										echo "<th class='doctor_name'>Doctor Name</th>";
										foreach($workSchedules as $workScheduleid=>$workday){
											?>
											<th class='rotate'><div><span><?=$workday?></span></div></th>
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
									//if the doctorSchule count is less then day count then add extra data
									$extday = $daycount - count($allschedule);
									if($extday>0){
										//now add extra obj
										$extarray = array();
										for($j=0;$j<$extday;$j++){
											array_push($extarray,array());
										}
										$allschedule = array_merge($extarray,$allschedule);
									}
									for($i=0;$i<$daycount;$i++){
										$tdcls='';
										$schlddata = isset($allschedule[$i])?$allschedule[$i]:array();
										$assignment=0;
										$isonholiday=0;
										if(is_array($schlddata) && count($schlddata)>0){
											$assignment = $schlddata['assignment'];
											$isonholiday = $schlddata['isonholiday'];
											if($isonholiday){
												$assignment="H";
												$tdcls="tdholiday";
											}
										}
										else{
											$assignment="X";
											$tdcls="tdnotpresent";
										}
										?>
										<td class="<?=$tdcls?>"><?=$assignment?></td>
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
<style>
th.rotate {
  /* Something you can count on */
	height: 140px;
    white-space: nowrap;
    vertical-align: inherit !important;
}

.table-bordered>thead>tr>th {
    border-left: 1px solid #fff !important;
	border-right: 1px solid #ddd !important;
	border-bottom: 1px solid #ddd !important;
	border-top: 1px solid #fff !important;
}
.table-bordered>thead{
	background-color: yellow !important;
}
	
	
.table-bordered>tbody>tr>td:first-child {
	text-align:left;
}
.table-bordered>tbody>tr>td {
   text-align:center;
}

th.rotate > div {
    transform: /* Magic Numbers */ translate(25px, 51px) /* 45 is really 360 - 45 */ rotate(270deg);
    width: 0px;
    margin: -10px;
}
th.rotate > div > span {
	font-size: 16px;
    font-family: cursive;
}
.table-bordered>thead>tr>th.doctor_name{
	border-right: 1px solid #ddd !important;
    text-align: center;
    width: 190px;
    font-size: 18px;
}
.table>thead>tr>th {
	padding:0px !important;
}
.table>tbody>tr>td  {
	padding:4px !important;
}
</style>