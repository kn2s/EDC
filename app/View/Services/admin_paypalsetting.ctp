<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Paypal Service Setting</h1>
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
							echo $this->Form->input('payment_mode',array('options'=>array('0'=>'Test Mode','1'=>'Live Mode'),'div'=>'form-group','label'=>'Paypal Payment Mode','class'=>'form-control'));
							echo $this->Form->input('payment_account',array('type'=>'text','div'=>'form-group','label'=>'Paypal Marchant Account','class'=>'form-control', 'placeholder'=>'Paypal Marchant Account'));
						 
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