<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Mass Emailling </h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
	<!-- form section start -->
<?php 
	echo $this->Form->create('EmailText');
?>
<div class="parentsection">
	<div class="panel panel-default">
		
		<div class="panel-body" style="width:70%; float:left;">
			<div class="row">
				<div class="col-lg-6" style="width:100%;">
				 <!-- create by php form fields -->
						<?php
							echo $this->Form->input('email_sub',array('type'=>'textarea','div'=>'form-group','label'=>'Email subject','class'=>'form-control', 'placeholder'=>'Email subject','required'=>'true'));
							echo $this->Form->input('email_body',array('type'=>'textarea','div'=>'form-group','label'=>'Email Body','class'=>'form-control', 'placeholder'=>'Email body','required'=>'true'));
						?>
				</div>
				<!-- /.col-lg-6 (nested) -->
			</div>	
				<!-- /.col-lg-6 (nested) -->
		</div>
			<!-- /.row (nested) -->
		<div class="usersection" style="float:right; width:30%;padding:10px 10px 10px 10px;">
			<label>Choose user's</label>
			<?php
				if(is_array($patients) && count($patients)>0){
					foreach($patients as $patient_id=>$email){
						?>
						<div><input type="checkbox" class="pss" name="data[EmailText][emails][]" value="<?=$email?>" patient_id="<?=$patient_id?>"><?=$email?></div>
						<?php
					}
				}
			?>
			<!--
			<div><input type="checkbox" name="chk">chk 3</div>
			<div><input type="checkbox" name="chk">chk 4</div>
			-->
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
	
	<!-- foem end sections -->
	<button type="submit" class="btn btn-default">Send</button>
	<button type="reset" class="btn btn-back">Back</button>
	<button type="button" id="getmore" class="btn" style="float:right;">Next</button>
	</form>
</div>
	<!-- /.panel -->
</div>

<!-- script section for get the other users -->
<script type="text/javascript">
	var baseurl="<?=FULL_BASE_URL.$this->base?>";
	$(document).ready(function(){
		$("#getmore").bind('click',getmorepatients);
	});
	function getmorepatients(e){
		e.preventDefault();
		var lasrpatient = $(".pss:last");
		var patient_id=$(lasrpatient).attr('patient_id');
		console.log(patient_id);
		var url=baseurl+"/EmailTexts/morepatients";
		console.log(url);
		$.ajax({
			url:url,
			type:'post',
			//dataType:'json',
			data:{patient_id:patient_id},
			success:function(response){
				console.log(response);
				console.log(response.patients);
				var lens = response.patients.length;
				console.log(lens);
				if(lens>0){
					var div="";
					for(var i=0;i<lens;i++){
						var pstion=response.patients[i];
						console.log(pstion);
						div+='<div><input type="checkbox" class="pss" name="data[EmailText][emails][]" value="'+pstion.email+'" patient_id="'+pstion.id+'">'+pstion.email+'</div>'
					}
					$(".usersection").append(div);
				}
				else{
					console.log("no rec");
				}
			},
			error:function(response){
				console.log(response);
			}
		});
	}
</script>
