<!--<div class="sampleQuestionnaires index">
	<h2><?php echo __('Sample Questionnaires'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_detail'); ?></th>
			<th><?php echo $this->Paginator->sort('social_history'); ?></th>
			<th><?php echo $this->Paginator->sort('about_the_illness'); ?></th>
			<th><?php echo $this->Paginator->sort('past_history'); ?></th>
			<th><?php echo $this->Paginator->sort('test_report'); ?></th>
			<th><?php echo $this->Paginator->sort('createtime'); ?></th>
			<th><?php echo $this->Paginator->sort('is_deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sampleQuestionnaires as $sampleQuestionnaire): ?>
	<tr>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['id']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['patient_detail']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['social_history']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['about_the_illness']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['past_history']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['test_report']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['createtime']); ?>&nbsp;</td>
		<td><?php echo h($sampleQuestionnaire['SampleQuestionnaire']['is_deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sampleQuestionnaire['SampleQuestionnaire']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sampleQuestionnaire['SampleQuestionnaire']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sampleQuestionnaire['SampleQuestionnaire']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sampleQuestionnaire['SampleQuestionnaire']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Sample Questionnaire'), array('action' => 'add')); ?></li>
	</ul>
</div>
-->

<?php 
	//mahe the data array of the basic details of the patient_detail
	$patientdetails = array(
		'name'=>'',
		'gender'=>'',
		'dob_txt'=>'',
		'dob'=>array(
			'month'=>'',
			'day'=>'',
			'year'=>''
		),
		'place'=>'',
		'weight'=>'',
		'height'=>'',
		'drug_name'=>'',
		'reaction'=>'',
		'drug_allergy'=>array(
			'drug_name'=>'',
			'reaction'=>''
		),
		'performance_status'=>'',
		'performance_status_comment'=>''
	);
	$social_history = array(
		'smocking'=>array(
			'quantity'=>'',
			'period'=>'',
			'preriod_from'=>'',
			'preriod_to'=>'',
			'unit'=>''
		),
		'alcohol'=>array(
			'alcohol_type'=>'',
			'quantity'=>'',
			'unit'=>''
		),
		'alcohol_period'=>'',
		'alcohol_period_from'=>'',
		'alcohol_period_to'=>'',
		'comments'=>''
	);
	$about_the_illness = array(
		'principle_diagnosis'=>array(
			'id'=>'',
			'name'=>''
		),
		'date_of_diagnosis'=>array(
			'day'=>'',
			'month'=>'',
			'year'=>''
		),
		'diagnosis_history'=>'',
		'oncologist_recommendation'=>'',
		'last_examanation_date'=>array(
			'day'=>'',
			'month'=>'',
			'year'=>''
		),
		'have_tumor_marker'=>'',
		'tumor_marker'=>array(
			'tumor_type'=>'',
			'tumor_date'=>array(
				'day'=>'',
				'month'=>'',
				'year'=>''
			),
			'result'=>''
		)
	);
	
	//data pr
	pr($this->request->data);
?>


<div style="text-align:center;">
	<?php echo $this->Session->flash();?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sample Questionnaires</h1>
	</div>
<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
	<!-- form section start -->
<?php 
	echo $this->Form->create('SampleQuestionnaire',array('action'=>'edit','id'=>'samplequestionnaire'));
	echo $this->Form->input('SampleQuestionnaire.id',array('type'=>'hidden'));
?>
		<div class="panel panel-default" style="display:none;">
			<div class="panel-heading">
				Patient Details
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
					 <!-- create by php form fields -->
							<?php
								echo $this->Form->input('QPatientDetails.name',array('type'=>'text','div'=>'form-group','label'=>'*Full Name','class'=>'form-control', 'placeholder'=>'Full Name','required'=>'true'));
								echo $this->Form->input('QPatientDetails.gender',array('options'=>array('Male'=>'Male','Female'=>'Female'),'div'=>'form-group','label'=>'*Gender','class'=>'form-control','required'=>'true'));//,'required'=>'true'
								echo $this->Form->input('QPatientDetails.dob_txt',array('type'=>'text','label'=>'*Date Of Birth','class'=>'form-control','required'=>'true','placeholder'=>'mm-dd-yyyy'));//,'required'=>'true'
								
								echo $this->Form->input('QPatientDetails.place',array('type'=>'textarea','div'=>'form-group','label'=>'*Address','class'=>'form-control', 'placeholder'=>'Address','required'=>'true'));
								echo $this->Form->input('QPatientDetails.weight',array('type'=>'text','div'=>'form-group','label'=>'*Weight','class'=>'form-control', 'placeholder'=>'0 KG','required'=>'true'));
								echo $this->Form->input('QPatientDetails.height',array('type'=>'text','div'=>'form-group','label'=>'*Height','class'=>'form-control', 'placeholder'=>'0 CM','required'=>'true'));
								
								echo $this->Form->input('QPatientDetails.drug_name',array('type'=>'text','div'=>'form-group','label'=>'Drug Name','class'=>'form-control', 'placeholder'=>'Drug Name'));
								echo $this->Form->input('QPatientDetails.reaction',array('type'=>'text','div'=>'form-group','label'=>'Reaction','class'=>'form-control', 'placeholder'=>'Reaction'));
								echo $this->Form->input('QPatientDetails.performance_status',array('options'=>$performance_status,'div'=>'form-group','label'=>'*Performance Status','class'=>'form-control','placeholder'=>'Performance Status','required'=>'true'));
								echo $this->Form->input('QPatientDetails.performance_status_comment',array('type'=>'textarea','div'=>'form-group','label'=>'Performance Status Comment','class'=>'form-control','placeholder'=>'Performance Status Comment'));//
							?>
					</div>
					<!-- /.col-lg-6 (nested) -->
				   
				</div>
					
					<!-- /.col-lg-6 (nested) -->
			</div>
				<!-- /.row (nested) -->
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Social History
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
					 <!-- create by php form fields -->
					
							<?php
							 
		/*'alcohol'=>array(
			'alcohol_type'=>'',
			'quantity'=>'',
			'unit'=>''
		),
		'alcohol_period'=>'',
		'alcohol_period_from'=>'',
		'alcohol_period_to'=>'',
		'comments'=>''*/
								echo "<label>Smoking</label>";
								echo $this->Form->input('QSocialHistory.smocking.quantity',array('type'=>'text','div'=>'form-group','label'=>'Quantity','class'=>'form-control', 'placeholder'=>'0'));
								echo $this->Form->input('QSocialHistory.smocking.unit',array('options'=>$units,'div'=>'form-group','label'=>'*Unit','class'=>'form-control', 'placeholder'=>'Unit'));//,'required'=>'true'
								
								echo $this->Form->input('QSocialHistory.smocking.preriod_from',array('type'=>'test','div'=>'form-group','label'=>'Preriod From','class'=>'form-control', 'placeholder'=>'Preriod From'));
								echo $this->Form->input('QSocialHistory.smocking.preriod_to',array('type'=>'text','div'=>'form-group','label'=>'Preriod To','class'=>'form-control', 'placeholder'=>'Preriod To',))
								/*echo $this->Form->input('QSocialHistory.refferences',array('div'=>'form-group','label'=>'Refference','class'=>'form-control','placeholder'=>'Refference','required'=>'true'));
								
								echo $this->Form->input('QSocialHistory.assesment',array('type'=>'textarea','div'=>'form-group','label'=>'*Assessment & Explanation','class'=>'form-control', 'placeholder'=>'Assessment & Explanation','required'=>'true'));//
								echo $this->Form->input('QSocialHistory.prognosis',array('type'=>'textarea','div'=>'form-group','label'=>'*Prognosis','class'=>'form-control', 'placeholder'=>'Prognosis','required'=>'true'));//
								echo $this->Form->input('QSocialHistory.best_tritment_strategy',array('type'=>'textarea','div'=>'form-group','label'=>'*Best Tritment Strategy','class'=>'form-control', 'placeholder'=>'Best Tritment Strategy','required'=>'true'));//
								echo $this->Form->input('QSocialHistory.alternative_strategy',array('type'=>'textarea','div'=>'form-group','label'=>'*Alternative Strategy','class'=>'form-control', 'placeholder'=>'Alternative Strategy','required'=>'true'));*///*/
							?>
					</div>
					<!-- /.col-lg-6 (nested) -->
				   
				</div>
					
					<!-- /.col-lg-6 (nested) -->
			</div>
				<!-- /.row (nested) -->
		</div>
			<!-- /.panel-body -->
			<!-- foem end sections -->
	<button type="submit" class="btn btn-default js-samplequestionnaire">Update Opinion</button>
	<button type="reset" class="btn btn-default">Reset Opinion</button>
	<button type="reset" class="btn btn-back">Back</button>
	</form>
	</div>
	<!-- /.panel -->
</div>