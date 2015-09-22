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
		
		echo $this->Html->css(array('bootstrap.min.css','metisMenu.min.css','sb-admin-2.css','font-awesome.min.css'));
		echo $this->Html->script(array('jquery.min.js','bootstrap.min.js','metisMenu.min.js','sb-admin-2.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		$(document).ready(function(){
			$("#sqlsection").hide();
		});
	</script>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
</body>
<div id="sqlsection">
	<?php echo $this->element('sql_dump'); ?>
</div>
</html>