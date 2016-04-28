<?php
		//echo $this->Html->meta('icon');
		//echo $this->Html->css(array('reset.css','screen.css'));
		echo $this->Html->script(array('jquery.js'));
		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		echo $this->fetch('script');
?>		
<?php echo $this->fetch('content'); ?>

<div class="clear"></div>