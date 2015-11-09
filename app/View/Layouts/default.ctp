<?php
$cakeDescription = __d('cake_dev', 'EradicateCare');
$cakeVersion = __d('cake_dev', '');
$activecontrolleraction = $this->params->params['controller']."".$this->params->params['action'];

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
		echo $this->Html->css(array('reset.css','owl.carousel.css','screen.css'));
		echo $this->Html->script(array('modernizr.js','jquery.js','jquery.appear.js','owl.carousel.min.js','ec.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script>
		var baseurl = "<?php echo FULL_BASE_URL.$this->base;?>";
		$(document).ready(function(){
			$("#sqlsection").hide();
		});
	</script>
</head>
<body>
<div class="Wrapper">
  <header class="home smooth">
   
	<?php echo $this->element('navigations',array("activecontrolleraction"=>$activecontrolleraction))?>
  </header>
  
  <?php echo $this->fetch('content'); ?>
  
  <footer>
    <div class="container">
      
	  <?php echo $this->element('socialmedia')?>
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
<!-- preloader section add -->
	<div class="js-loader overlay">
		<img src="<?=FULL_BASE_URL.$this->base?>/images/preloader.gif" alt="preloader" style=""/>
	</div>
  <!-- preloader end 
</body>
</html>