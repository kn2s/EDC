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
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('reset.css','screen.css'));
		echo $this->Html->script(array('modernizr.js','jquery.js','jquery.appear.js','ec.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		//get the name pf the page 
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
  <div class="questionnaireHeading">
  	<div class="container">
	<?php //echo $this->Html->link($this->Html->image('cross2.png',array('alt'=>'X')),array('controller'=>'patients','action'=>'dashboard','full_base'=>false),array('escape'=>false,'class'=>'crossButton')); ?>
	<?php echo $this->Html->link($this->Html->image('cross2.png',array('alt'=>'X')),array('controller'=>'patients','action'=>'index','full_base'=>false),array('escape'=>false,'class'=>'crossButton')); ?>
        <div class="clear"></div>
        <div class="TextPart">
		<?php 
			if($this->params->params['action']=="sampleopinion"){
			?>
			<h2>Sample Opinion</h2>
            <p>Thank you for using our services! At this point, these are our comments and recommendations.</p>
			<?php
			}
			else{
			?>
			<h2>Sample Questionnaire</h2>
            <p>The accurate information about the patient and the illness will help us to provide appropriate opinion for your treatment.</p>
       
			<?php
			}
		?>
        </div>
		<?php echo $this->Html->link($this->Html->image('questionnairLogo.png',array('alt'=>'')),array('controller'=>'patients','action'=>'index','full_base'=>true),array('escape'=>false,'class'=>'logo')); ?>
        <div class="clear"></div>
    </div>
  </div>
  <div class="opinionPatientBody">
  	<a href="javascript:void(0)" class="top"></a>
  	<div class="container">
  
        <div class="questionPart">
		
		<?php echo $this->fetch('content'); ?>
        </div>
        <div class="clear"></div>
    </div>
  </div>
  <?php
	$activecontrolleraction =strtolower( $this->params->params['controller']."".$this->params->params['action']);
	if($activecontrolleraction!="patientssamplequestioner"){
	?>
	<div class="disclaimer">
  	<div class="container">
  		<p><span>Disclaimer:</span> This second opinion is based on the information provided and should be strictly considered expert opinion, limited by lack of face-to-face contact and physical examination. We have no control over the investigation reports interpreted by other physicians or your accessibility or affordability of suggested treatment. You must discuss the report, suggested treatment and any side effects with your treating physician and it is up to his or her judgment and level of expertise to follow or alter our suggestions. Your physician is welcome to join hands with us in your care.</p>
    </div>
  </div>
	<?php
	}
  ?>
  
  
</div>

<div id="sqlsection"></div>
  
	<div class="js-loader overlay">
		<img src="<?=FULL_BASE_URL.$this->base?>/images/preloader.gif" alt="preloader" style=""/>
	</div>
</body>

</html>
