<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Email Service Setting</h1>
	</div>
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
						<!-- create by php form fields -->
						
						<?php
							echo $this->Form->create('Service');
							echo $this->Form->hidden('id');
							echo $this->Form->input('sending_email',array('type'=>'text','div'=>'form-group','label'=>'Email Sending Id','class'=>'form-control', 'placeholder'=>'Email Sending Id'));
							echo $this->Form->input('receiving_email',array('type'=>'text','div'=>'form-group','label'=>'Email Receiving Id','class'=>'form-control', 'placeholder'=>'Email Receiving Id'));
						 
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default">Save</button>
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