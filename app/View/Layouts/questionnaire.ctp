<?php
$cakeDescription = __d('cake_dev', 'EradicateCare');
$cakeVersion = __d('cake_dev', '');
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		My Questionnaire
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
		var baseurl = "<?php echo FULL_BASE_URL.$this->base;?>";
		var devWidth='';
		var devleftPosition='';
		var devTopPosition='0';
		var pagefor="<?=$patientinfo?>";
		$(document).ready(function(){
			$("#sqlsection").hide();
			$("#preloaderdv").show();
			devWidth = $(window).width();
			questianariesformload();
		});
	</script>
</head>
<body>

<div class="Wrapper">
  <div class="questionnaireHeading">
  	<div class="container">
	<?php echo $this->Html->link($this->Html->image('cross2.png',array('alt'=>'X')),array('controller'=>'patients','action'=>'dashboard','full_base'=>false),array('escape'=>false,'class'=>'crossButton')); ?>
        <div class="clear"></div>
        <div class="TextPart">
        	<h2>My Questionnaire</h2>
            <p>Please fill the form carefully. The accurate information about the patient and the illness will help us to provide appropriate opinion for your treatment.</p>
        </div>
        <!--<a href="index.html" class="logo"><img src="images/questionnairLogo.png" alt=""></a>-->
		<?php echo $this->Html->link($this->Html->image('questionnairLogo.png',array('alt'=>'')),array('controller'=>'patients','action'=>'dashboard','full_base'=>true),array('escape'=>false,'class'=>'logo')); ?>
        <div class="clear"></div>
    </div>
  </div>
  <div class="questionnaireBody">
  	<a href="javascript:void(0)" class="top"></a>
  	<div class="container mmm">

		
		<?php echo $this->fetch('content'); ?>
		
        
        <div class="clear"></div>
    </div>
  </div>
</div>
<div id="sqlsection">
</div>

  <!-- preloader section add -->
  
	<div class="js-loader overlay" id="preloaderdv">
		<img src="<?=FULL_BASE_URL.$this->base?>/images/preloader.gif" alt="preloader" style=""/>
	</div>
  <!-- preloader end -->
</body>

</html>
