<div class="container">
	  <h1 class="logo smooth">
	  <?php /*echo $this->Html->link(
			$this->Html->image('logo.png', array('alt' =>'EC')),
			array('controller'=>'patients','action'=>'index','full_base'=>true),
			array('escape'=>false));*/
			
		if(!$this->Session->check('loggedpatientid')){
			echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' =>'EC')),
					array('controller'=>'patients','action'=>'index','full_base'=>true),
					array('escape'=>false)
				);
		}
		else{
			echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' =>'EC')),
					array('controller'=>'patients','action'=>'dashboard','full_base'=>true),
					array('escape'=>false)
				);
		}
		?></h1>
      <nav>
        <ul>
          <!--<li><?php echo $this->Html->link('Services',array('controller'=>'services','action'=>'index','full_base'=>false),
			array('class'=>($activecontrolleraction=='servicesindex')?'active':''));?></li>
          <li><?php echo $this->Html->link('About',array('controller'=>'aboutus','action'=>'index','full_base'=>false),
		  array('class'=>($activecontrolleraction=='aboutusindex')?'active':''));?></li>
          <li><a href="javascript:void(0)">References</a></li>
          <li><a href="javascript:void(0)">Recent Advances</a></li>
          <li><?php echo $this->Html->link('My Account',array('controller'=>'patients','action'=>'account','full_base'=>false),
		  array('class'=>($activecontrolleraction=='patientsaccount')?'active':''));?></li>-->
		  
		  <?php 
			if($this->Session->check('loggedpatientid')){
		?>
			<li><?php echo $this->Html->link('My Dashboard',array('controller'=>'patients','action'=>'dashboard','full_base'=>false),array('class'=>($activecontrolleraction=='patientsdashboard')?'active':''));?></li>
			<li><?php echo $this->Html->link('About',array('controller'=>'aboutus','action'=>'index','full_base'=>false),array('class'=>($activecontrolleraction=='aboutusindex')?'active':''));?></li>
			<li><a href="javascript:void(0)">References</a></li>
			<li><a href="javascript:void(0)">Recent Advances</a></li>
			<!--<li class="userMaleCircle"><?php echo $this->Session->read('loggedpatientname');?></li>-->
			<li class="logoutOption"><?php echo $this->Html->link($this->Session->read('loggedpatientname'),array('controller'=>'patients','action'=>'dashboard','full_base'=>false),array("class"=>"userMaleCircle"));?>
			<!-- <ul><li><a href="#" class="signout">Sign out</a></li></ul>-->
			<ul><li>
			<?php echo $this->Html->link("Sign out",array('controller'=>'Patients','action'=>'logout','full_base'=>false),array("class"=>"signout"));?>
			</li></ul>
			</li>
		<?php
			}
			else{
		?>
			<li><?php echo $this->Html->link('Services',array('controller'=>'services','action'=>'index','full_base'=>false),
			array('class'=>($activecontrolleraction=='servicesindex')?'active':''));?></li>
			<li><?php echo $this->Html->link('About',array('controller'=>'aboutus','action'=>'index','full_base'=>false),
			array('class'=>($activecontrolleraction=='aboutusindex')?'active':''));?></li>
			<li><a href="javascript:void(0)">References</a></li>
			<li><a href="javascript:void(0)">Recent Advances</a></li>
			<li><?php echo $this->Html->link('My Account',array('controller'=>'patients','action'=>'account','full_base'=>false),
			array('class'=>($activecontrolleraction=='patientsaccount')?'active':''));?></li>
		<?php
			}
		?>
		  
		  
        </ul>
      </nav>
    </div>