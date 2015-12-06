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
		<?php echo $this->fetch('title'); ?>
	</title>
	<!--<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700' rel='stylesheet' type='text/css'>-->
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('reset.css','screen.css'));
		echo $this->Html->script(array('modernizr.js', 'jquery.js', 'jquery.appear.js','ec.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script>
		var viewfor="<?=$parientviewinfo?>";
		var baseurl = "<?php echo FULL_BASE_URL.$this->base;?>";
		var doctcaseid="<?=$doctcaseid?>";
		$(document).ready(function(){
			$("#sqlsection").hide();
			$("#preloaderdv").hide();
			doctorcaseviewload();
		});
		
	</script>
</head>


<body>
<div class="Wrapper">
  <header class="sticky">
    <div class="container">
      <?php echo $this->element('doctsimage')?>
    </div>
  </header>
  
  <div class="sendOpinionBox" style="display:none;">
  	<h2>Send Opinion</h2>
    <a href="javascript:void(0)" class="close js-opinionpanel"></a>
    <a href="javascript:void(0)" class="minimize js-opinionpanel"></a>
    <div class="clear"></div>
    <div class="block">
    	<label>Assessment &amp; Explanation</label>
        <input type="text" placeholder="Type Something">
    </div>
    <div class="block">
    	<label>Prognosis</label>
        <input type="text" placeholder="Type Something">
    </div>
    <div class="block">
    	<label>Best Treatment Strategy</label>
        <input type="text" placeholder="Type Something">
    </div>
    <div class="block">
    	<label>Alternative Strategy</label>
        <input type="text" placeholder="Type Something">
    </div>
    <div class="block">
    	<label>Comment</label>
        <textarea>Type Something</textarea>
    </div>
    <input type="submit" class="blueButton" value="SEND">
    <a href="javascript:void(0)" class="attachButton">Attach</a>
  </div>
  
  
  <div class="questionnaireBody doctorsCase">
  	<div class="container">
    	<div class="statusPart">
        	<ul>
            	<li><a href="javascript:void(0)" class="current" vals="1">Questionnaire</a></li>
                <li><a href="javascript:void(0)" class="js-doctoptions" vals="2">Communication</a></li>
                <li><a href="javascript:void(0)" class="" vals="3">Refer</a></li>
                <li class="opinion"><a href="javascript:void(0)" class="js-doctoptions" vals="4">Send Opinion</a></li>
            </ul>
        </div>
		
		
        <div class="questionPart">
        	
			<?php echo $this->fetch('content'); ?>
			
			<div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
  </div>
</div>


<div id="sqlsection">
	<?php echo $this->element('sql_dump'); ?>
</div>
<!-- preloader section add -->
<div class="js-loader overlay">
	<img src="<?=FULL_BASE_URL.$this->base?>/images/preloader.gif" alt="preloader" style=""/>
</div>
<!-- preloader end -->
</body>
</html>