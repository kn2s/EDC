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
  <!--<li class="userMaleCircle"><?php echo $this->Session->read("loggedpatientname")?></li>-->
  <li class="logoutOption"><?php 
	echo $this->Html->link(__($this->Session->read("loggedpatientname")),array('controllers'=>'Patients','action'=>'dashboard'),array('class'=>'userMaleCircle'));
  ?>
	<ul> <!-- style="min-width: 123px; display: none;"-->
		<li>
			<a href="/EDC/Patients/logout" class="signout">Sign out</a>			
		</li>
	</ul>
  </li>
</ul>
</nav>