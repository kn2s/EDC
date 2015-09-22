<!--
<div class="patients index">
	<h2><?php echo __('Patients'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('createtime'); ?></th>
			<th><?php echo $this->Paginator->sort('browserdetails'); ?></th>
			<th><?php echo $this->Paginator->sort('isactive'); ?></th>
			<th><?php echo $this->Paginator->sort('isdeleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($patients as $patient): ?>
	<tr>
		<td><?php echo h($patient['Patient']['id']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['name']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['email']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['password']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['createtime']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['browserdetails']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['isactive']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['isdeleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $patient['Patient']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $patient['Patient']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $patient['Patient']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $patient['Patient']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Patient'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Patient Details'), array('controller' => 'patient_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient Detail'), array('controller' => 'patient_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->

  <section class="bodyBannerSlider appear">
  	<a href="javascript:void(0)" class="banner1">
    	<div class="container">
    		<h3 class="smooth2">Fighiting Cancer?</h3>
        	<h4 class="smooth2">Consult with the <span>specialists</span> across the globe</h4>
        </div>
    </a>
    <a href="javascript:void(0)" class="banner2">
    	<div class="container">
    		<h3 class="smooth2">Collaborate Globally</h3>
        	<h4 class="smooth2">To <span>eradicate cancer</span></h4>
        </div>
    </a> 
  </section>
  <section class="facility" data-appear-top-offset="-150">
    <div class="container">
      <div class="box icon1 smooth">
        <p>Connect with physicians trained in top most American institutions</p>
      </div>
      <div class="box icon2 smooth">
        <p>Get cure at your door step</p>
      </div>
      <div class="box icon3 smooth">
        <p>Stay informed with latest advancements of treatment</p>
      </div>
      <div class="clear"></div>
    </div>
  </section>
  
  <section class="secondOption" data-appear-top-offset="-300">
    <div class="container">
      <h3>Get Second Opinion in <span>3 Stapes</span></h3>
      <div class="clear"></div>
      <div class="box1 smooth"><a href="<?php echo FULL_BASE_URL.$this->base."/patients/account"; ?>">
	  <?php echo $this->Html->image('icon4.png',array('alt'=>'','class'=>'icon'));?>
        <h2>Create Account</h2>
        <p>Create account with your basic information</p>
        <span class="link">Register</span></a> </div>
		
      <div class="box2 smooth"><a href="#"> <img src="images/icon5.png" class="icon2">
        <h2>Tell Us about the disease</h2>
        <p>Fill up the online questioner and upload <br>
          the required documents</p>
        <span class="link">View Sample Questioner</span></a> </div>
		
      <div class="box1 smooth"> <img src="images/icon6.png" class="icon2">
        <h2>Get Opinion</h2>
        <p>Receive opinion from the apropriate physician <br>
          within scheduled time frame</p>
        <span class="link">View Sample Opinion</span></a> </div>
      <div class="clear"></div>
    </div>
  </section>
  
  
  <section class="knowTheSpecialists" data-appear-top-offset="-450">
    <div class="container">
      <h3>Know The <span>Specialists</span></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nisi lectus, viverra in placerat non, pellentesque <br>
        nec metus. Vivamus sed enim sit amet urna</p>
      <div class="clear"></div>
      <div class="box"><?php echo $this->Html->image('doc1.jpg',array('alt'=>'','class'=>'smooth'));?></div>
      <div class="box"><?php echo $this->Html->image('doc1.jpg',array('alt'=>'','class'=>'smooth'));?></div>
      <div class="box"><?php echo $this->Html->image('doc1.jpg',array('alt'=>'','class'=>'smooth'));?></div>
      <div class="box"><?php echo $this->Html->image('doc1.jpg',array('alt'=>'','class'=>'smooth'));?></div>
      <div class="box"><?php echo $this->Html->image('doc1.jpg',array('alt'=>'','class'=>'smooth'));?></div>
      <div class="box"><?php echo $this->Html->image('doc1.jpg',array('alt'=>'','class'=>'smooth'));?></div>
	  
      <div class="clear"></div>
    </div>
  </section>
  