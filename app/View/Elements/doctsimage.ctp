<?php 
	$doctsdetails = $this->requestAction('Doctors/basicdetails');
	$imagepath="images/docActive.jpg";
	
	if(isset($doctsdetails['Doctor']['image']) && $doctsdetails['Doctor']['image']!=''){
		//image found
		$imagepath = FULL_BASE_URL.$this->base."/doctorimage/".$doctsdetails['Doctor']['image'];
	}
?>


<h1 class="logo">
	<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' =>'EC')),
					array('controller'=>'Doctors','action'=>'dashboard','full_base'=>true),
					array('escape'=>false)
				);
	?>
</h1>
<nav class="inner">
<ul>
  <li class="pic"><img src="<?=$imagepath?>" alt="doct image"></li>
  <li>Dr. <?php echo $this->Session->read("loggeddocttname")?></li>
</ul>
</nav>