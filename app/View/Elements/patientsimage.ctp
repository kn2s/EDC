<h1 class="logo">
	<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' =>'EC')),
					array('controller'=>'Patients','action'=>'dashboard','full_base'=>true),
					array('escape'=>false)
				);
	?>
</h1>
<nav class="inner">
<ul>
  
  <li class="userMaleCircle"><?php echo $this->Session->read("loggedpatientname")?></li>
</ul>
</nav>