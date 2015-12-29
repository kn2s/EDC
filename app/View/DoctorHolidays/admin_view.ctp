<!--<div class="doctorHolidays view">
<h2><?php echo __('Doctor Holiday'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doctorHoliday['DoctorHoliday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doct Id'); ?></dt>
		<dd>
			<?php echo h($doctorHoliday['DoctorHoliday']['doct_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holidaydate'); ?></dt>
		<dd>
			<?php echo h($doctorHoliday['DoctorHoliday']['holidaydate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doctor Holiday'), array('action' => 'edit', $doctorHoliday['DoctorHoliday']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doctor Holiday'), array('action' => 'delete', $doctorHoliday['DoctorHoliday']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $doctorHoliday['DoctorHoliday']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Holidays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Holiday'), array('action' => 'add')); ?> </li>
	</ul>
</div>
-->

<!-- script section for date picker sections -->
<script>
	var alldates = [];
	var datesstr = "<?=$doctorHoliday?>";
	$(document).ready(function(){
		
		alldates = datesstr.split(",");
		$('.datepickerdiv').datepicker({
			dateFormat:'yy-mm-dd',
			minDate:'toDate',
			onSelect:function(date){
				//addRemoveDate(date);
			},
			beforeShowDay:function(date){
				var year = date.getFullYear();
				
				// months and days are inserted into the array in the form, e.g "01/01/2009", but here the format is "1/1/2009"
				var month = padNumber(date.getMonth() + 1);
				var day = padNumber(date.getDate());
				// This depends on the datepicker's date format
				var dateString =year+"-"+ month + "-" + day ;
				var gotDate = $.inArray(dateString, alldates);
				
				if (gotDate >= 0) {
					// Enable date so it can be deselected. Set style to be highlighted
					return [true, "ui-state-highlight"];
				}
				// Dates not in the array are left enabled, but with no extra style
				return [true, ""];
			}
		});
	});
	
	function addcommoneholidays(e){
		e.preventDefault();
		var alldatesstr = "";
		$("#datepicker").val(alldatesstr);
		if(alldates.length>0){
			alldatesstr = alldates.toString(",");
			console.log(alldatesstr);
			$("#datepicker").val(alldatesstr);
			$("#commonhldfrm").submit();
		}
		else{
			alert("Please choose holiday dates");
		}
	}
	
	function padNumber(number) {
		var ret = new String(number);
		if (ret.length == 1) 
			ret = "0" + ret;
		return ret;
	}
	function addRemoveDate(date){
		//console.log(date);
		var ind = $.inArray(date,alldates);
		if(ind>=0){
			//remove the date
			alldates.splice(ind,1);
		}
		else{
			//add the date
			alldates.push(date);
		}
		//console.log(alldates);
	}
	

</script>
<?php //pr($doctorHoliday);?>
<div class="row">
	<center><?php echo $this->Session->flash(); ?></center>
	<div class="col-lg-12">
		<h1 class="page-header">Doctor Holidays</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		
		<div class="panel-body">
			<div class="row">
				
				
				<div class="col-lg-6">
					<div class="datepickerdiv" style="padding-bottom:10px;"></div>
				</div>
				
				<!-- /.col-lg-6 (nested) -->
			   
				</div>
				<!-- /.col-lg-6 (nested) -->
			</div>
			<!-- /.row (nested) -->
			
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel -->
</div>
