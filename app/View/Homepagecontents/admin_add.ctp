<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Home Page Content</h1>
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
							echo $this->Form->create('Homepagecontent');
							echo $this->Form->hidden('id');
							echo $this->Form->input('specialisttag',array('type'=>'textarea','div'=>'form-group','label'=>'Know Specialist Tag','class'=>'form-control', 'placeholder'=>'Know Specialist Tag'));
							echo $this->Form->input('tag_one',array('type'=>'text','div'=>'form-group','label'=>'Below Gallery Left Tag','class'=>'form-control', 'placeholder'=>'Below Gallery Left Tag'));
							echo $this->Form->input('tag_two',array('type'=>'text','div'=>'form-group','label'=>'Below Gallery Middle Tag','class'=>'form-control', 'placeholder'=>'Below Gallery Middle Tag'));
							echo $this->Form->input('tag_three',array('type'=>'text','div'=>'form-group','label'=>'Below Gallery Right Tag','class'=>'form-control', 'placeholder'=>'Below Gallery Right Tag'));
							
							echo $this->Form->input('twitter',array('type'=>'text','div'=>'form-group','label'=>'Twitter Page Link','class'=>'form-control', 'placeholder'=>'Twitter Page Link'));
							echo $this->Form->input('facebook',array('type'=>'text','div'=>'form-group','label'=>'Facebook Page Link','class'=>'form-control', 'placeholder'=>'Facebook Page Link'));
							echo $this->Form->input('youtube',array('type'=>'text','div'=>'form-group','label'=>'YouTube Link','class'=>'form-control', 'placeholder'=>'YouTube Link'));
							echo $this->Form->input('rss',array('type'=>'text','div'=>'form-group','label'=>'RSS Link','class'=>'form-control', 'placeholder'=>'RSS Link'));
							 
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