<!-- script section for date picker sections -->
<script>
	var alldates = [];
	$(document).ready(function(){
		var curdate = new Date();
		
		var masdate = curdate.getFullYear()+"-12-31";
		$(".js-addcommoneholiday").bind('click',addcommoneholidays);
		$.datepicker.setDefaults(
			$.extend($.datepicker.regional[''])
		);
		$('.datepicker').datepicker({
			dateFormat:'yy-mm-dd',
			minDate:'toDate'
		});
		/*$('.datepickerdiv').datepicker({
			dateFormat:'yy-mm-dd',
			minDate:'toDate',
			maxDate:masdate,
			onSelect:function(date){
				addRemoveDate(date);
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
		});*/
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
<div class="row">
	<center><?php echo $this->Session->flash(); ?></center>
	<div class="col-lg-12">
		<h1 class="page-header">Add Commone Holiday</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		
		<div class="panel-body">
			<div class="row">
				<div class="datepickerdiv" style="padding-bottom:10px;">
				</div>
				
				<div class="col-lg-6">
						<!-- create by php form fields -->
						<?php
							echo $this->Form->create('DoctorHoliday',array('id'=>'commonhldfrm','action'=>'commoneholiday'));
							echo $this->Form->input('name',array('type'=>'text','div'=>'form-group','label'=>'Holiday Name','class'=>'form-control datepicker', 'placeholder'=>'Holiday Name'));
							echo $this->Form->input('holidaydate',array('id'=>'datepicker','type'=>'text','div'=>'form-group','label'=>'Holiday Date','class'=>'form-control datepicker', 'placeholder'=>'Holiday From'));
							
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default js-addcommoneholiday">Add Holiday</button>
					</form>
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
