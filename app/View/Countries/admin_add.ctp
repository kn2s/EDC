<!-- scripting validations -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#crtcountry").bind("click",formValidations);
	});
	function formValidations(e){
		var validates = true;
		if($("#name").val()==''){
			alert("Country Name required");
			validates=false;
		}
		
		if(!validates){
			return false;
		}
	}
</script>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Country</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<?php echo $this->Session->flash(); ?>
				<div class="row">
					<div class="col-lg-6">
					<!-- create by php form fields -->
							<?php
								echo $this->Form->create('Country',array('type'=>'file'));
								echo $this->Form->input('name',array('type'=>'text','div'=>'form-group','label'=>'Name','class'=>'form-control', 'placeholder'=>'Name','id'=>'name'));
								echo $this->Form->input('shortname',array('type'=>'text','div'=>'form-group','label'=>'Short Name Code','class'=>'form-control', 'placeholder'=>'Short Name Code','id'=>'shortname'));
								echo $this->Form->input('countrycode',array('type'=>'text','div'=>'form-group','label'=>'Code Number','class'=>'form-control', 'placeholder'=>'Code Number','id'=>'countrycode'));
								echo $this->Form->input('countryflag',array('type'=>'file','div'=>'form-group','label'=>'Flag'));
								echo $this->Form->hidden('isactive',array('type'=>'hidden','value'=>'1'));
								echo $this->Form->hidden('isdeleted',array('type'=>'hidden','value'=>'0'));
							?>
							<!-- end from field creations -->
							<button type="submit" class="btn btn-default" id="crtcountry">Add Country</button>
							<button type="reset" class="btn btn-default">Reset Country</button>
							<button type="reset" class="btn btn-back">Back</button>
						</form>
					</div>
					</div>
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
</div>