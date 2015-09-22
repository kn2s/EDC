<?php
$cakeDescription = __d('cake_dev', 'EradicateCare');
$cakeVersion = __d('cake_dev', '');
$footercls="inner";
$wappercls="";
if($this->Session->check('loggedpatientid')){
	$footercls="";
	$wappercls="myDashBord";
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<!--<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700' rel='stylesheet' type='text/css'>-->
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('reset.css','screen.css'));
		echo $this->Html->script(array('modernizr.js','jquery.js','jquery.appear.js','ec.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script>
		$(document).ready(function(){
			$("#sqlsection").hide();
		});
	</script>
</head>
<body>
<div class="Wrapper <?php echo $wappercls;?>">
  <header class="sticky">
    <div class="container">
	  <h1 class="logo smooth"><?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' =>'EC')),
					array('controller'=>'patients','action'=>'index','full_base'=>true),
					array('escape'=>false)
				);
			?></h1>
      <nav class="inner">
        <ul>
		<?php 
			if($this->Session->check('loggedpatientid')){
		?>
			<li><?php echo $this->Html->link('My Dashboard',array('controller'=>'patients','action'=>'dashboard','full_base'=>false),array('class'=>'active'));?></li>
			<li><?php echo $this->Html->link('About',array('controller'=>'aboutus','action'=>'index','full_base'=>false));?></li>
			<li><a href="javascript:void(0)">References</a></li>
			<li><a href="javascript:void(0)">Recent Advances</a></li>
			<li class="userMaleCircle"><?php echo $this->Session->read('loggedpatientname');?></li>
		<?php
			}
			else{
		?>
			<li><a href="services.html">Services</a></li>
			<li><?php echo $this->Html->link('About',array('controller'=>'aboutus','action'=>'index','full_base'=>false));?></li>
			<li><a href="javascript:void(0)">References</a></li>
			<li><a href="javascript:void(0)">Recent Advances</a></li>
			<li><?php echo $this->Html->link('My Account',array('controller'=>'patients','action'=>'account','full_base'=>false));?></li>
		<?php
			}
		?>
          
        </ul>
      </nav>
    </div>
  </header>
  
  <?php echo $this->fetch('content'); ?>
  
  <footer class="<?php echo $footercls;?>">
    <div class="container">
      <div class="followus">
        <p>Follow us on</p>
        <div class="clear"></div>
	 <?php 
		echo $this->Html->link(
		$this->Html->image('s1.png', array('alt' => 'fb', 'border' => '0')),
		'https://www.facebook.com/',
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	  ?>
	  <?php 
		echo $this->Html->link(
		$this->Html->image('s2.png', array('alt' => 'fb', 'border' => '0')),
		'https://www.twitter.com/',
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	  ?>
	  <?php 
		echo $this->Html->link(
		$this->Html->image('s3.png', array('alt' => 'fb', 'border' => '0')),
		'https://www.youtube.com/',
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	  ?>
	  <?php 
		echo $this->Html->link(
		$this->Html->image('s4.png', array('alt' => 'fb', 'border' => '0')),
		'https://www.rss.com/',
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	  ?>
	  </div>
	  <ul>
        <li><?php echo $this->Html->link('Contact Us',array('controller'=>'contactus','action'=>'index','full_base'=>true)); ?></li>
        <li><?php echo $this->Html->link('Privacy Police',array('controller'=>'praivacypolicy','action'=>'index','full_base'=>true)); ?></li>
      </ul>
      <p class="copy">Copyright &copy; Eradicate Cancer  2015 - 2020</p>
      <div class="clear"></div>
    </div>
  </footer>
</div>
<div class="clear"></div>
<div id="sqlsection">
	<?php echo $this->element('sql_dump'); ?>
</div>
</body>
</html>

