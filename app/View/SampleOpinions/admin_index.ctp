<!--<div class="sampleOpinions index">
	<h2><?php echo __('Sample Opinions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_name'); ?></th>
			<th><?php echo $this->Paginator->sort('create_date'); ?></th>
			<th><?php echo $this->Paginator->sort('refferences'); ?></th>
			<th><?php echo $this->Paginator->sort('assesment'); ?></th>
			<th><?php echo $this->Paginator->sort('prognosis'); ?></th>
			<th><?php echo $this->Paginator->sort('best_tritment_strategy'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_strategy'); ?></th>
			<th><?php echo $this->Paginator->sort('doctor_qualification'); ?></th>
			<th><?php echo $this->Paginator->sort('create_time'); ?></th>
			<th><?php echo $this->Paginator->sort('is_deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sampleOpinions as $sampleOpinion): ?>
	<tr>
		<td><?php echo h($sampleOpinion['SampleOpinion']['id']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['doctor_name']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['create_date']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['refferences']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['assesment']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['prognosis']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['best_tritment_strategy']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['alternative_strategy']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['doctor_qualification']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['create_time']); ?>&nbsp;</td>
		<td><?php echo h($sampleOpinion['SampleOpinion']['is_deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sampleOpinion['SampleOpinion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sampleOpinion['SampleOpinion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sampleOpinion['SampleOpinion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sampleOpinion['SampleOpinion']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sample Opinion'), array('action' => 'add')); ?></li>
	</ul>
</div>
-->

<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sample Opinion</h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Sample Opinion Details
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
				 
					
						<!-- create by php form fields -->
						<?php
							echo $this->Form->create('SampleOpinion',array('action'=>'edit','id'=>'sampleopinion'));
							echo $this->Form->input('SampleOpinion.id',array('type'=>'hidden'));
							echo $this->Form->input('SampleOpinion.doctor_name',array('type'=>'text','div'=>'form-group','label'=>'*Doctor Name','class'=>'form-control', 'placeholder'=>'Doctor Name','required'=>'true'));
							echo $this->Form->input('SampleOpinion.doctor_qualification',array('type'=>'text','div'=>'form-group','label'=>'*Doctorate Qualification','class'=>'form-control', 'placeholder'=>'Doctorate Qualification','required'=>'true'));//,'required'=>'true'
							
							echo $this->Form->input('SampleOpinion.patient_name',array('type'=>'test','div'=>'form-group','label'=>'*Patient Name','class'=>'form-control', 'placeholder'=>'Patient Name','required'=>'true'));
							echo $this->Form->input('SampleOpinion.create_date',array('type'=>'text','div'=>'form-group','label'=>'*Opinion Date','class'=>'form-control', 'placeholder'=>'Opinion Date','required'=>'true'));
							echo $this->Form->input('SampleOpinion.refferences',array('div'=>'form-group','label'=>'Refference','class'=>'form-control','placeholder'=>'Refference','required'=>'true'));
							
							echo $this->Form->input('SampleOpinion.assesment',array('type'=>'textarea','div'=>'form-group','label'=>'*Assessment & Explanation','class'=>'form-control', 'placeholder'=>'Assessment & Explanation','required'=>'true'));//
							echo $this->Form->input('SampleOpinion.prognosis',array('type'=>'textarea','div'=>'form-group','label'=>'*Prognosis','class'=>'form-control', 'placeholder'=>'Prognosis','required'=>'true'));//
							echo $this->Form->input('SampleOpinion.best_tritment_strategy',array('type'=>'textarea','div'=>'form-group','label'=>'*Best Tritment Strategy','class'=>'form-control', 'placeholder'=>'Best Tritment Strategy','required'=>'true'));//
							echo $this->Form->input('SampleOpinion.alternative_strategy',array('type'=>'textarea','div'=>'form-group','label'=>'*Alternative Strategy','class'=>'form-control', 'placeholder'=>'Alternative Strategy','required'=>'true'));//
						?>
						<!-- end from field creations -->
						<button type="submit" class="btn btn-default js-sampleopinion">Update Opinion</button>
						<button type="reset" class="btn btn-default">Reset Opinion</button>
						<button type="reset" class="btn btn-back">Back</button>
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