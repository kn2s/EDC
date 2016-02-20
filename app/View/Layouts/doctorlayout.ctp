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
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('reset.css','screen.css'));
		echo $this->Html->script(array('modernizr.js', 'jquery.js', 'jquery.appear.js','isotope.pkgd.min.js', 'ec.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script>
		$(document).ready(function(){
			$("#sqlsection").hide();
			$("#preloaderdv").hide();
		});
		var baseurl = "<?php echo FULL_BASE_URL.$this->base;?>";
	</script>
</head>

<body>
<div class="Wrapper">
  <header class="sticky">
    <div class="container">
      
	  <!--<h1 class="logo"><a href="index.html"><img src="images/logo.png" alt="EC"></a></h1>
      <nav class="inner">
        <ul>
          <li class="pic">
			<?php echo $this->element('doctsimage')?>
		  </li>
          <li class="logoutOption"><?php echo $this->Session->read("loggeddocttname")?>
			<ul><li><a href="#" class="signout">Sign out</a></li></ul>
		  </li>
        </ul>
      </nav>-->
	  
	  <?php echo $this->element('doctsimage')?>
    </div>
  </header>
  
  
  <div class="doctorsDashbord">
  	<div class="container">
    	<div class="rightPart">
        	<div class="search">
            	<h3>Search Case</h3>
                <div class="searcBox">
                	<input type="submit" class="searchBtn js-searchcases" value="">
                    <input type="text" id="doccasesearch" class="searchText" placeholder="Patient name, case #">
                </div>
            </div>
            <div class="filter">
            	<h3>SHOW</h3>
                <a href="javascript:void(0)" class="active">Current<span><?=$nwdoctorCases?></span></a>
                <a href="javascript:void(0)">Archived</a>
            </div>
            <div class="filter last">
            	<h3>Filter by status</h3>
                <a href="javascript:void(0)" class="js-casefilter" val="0">Un Read</a>
                <a href="javascript:void(0)" class="js-casefilter" val="1">Pending</a>          
				<a href="javascript:void(0)" class="js-casefilter" val="2">Awaiting input</a>
                <a href="javascript:void(0)" class="js-casefilter" val="4">Opinion Due</a>          
				<a href="javascript:void(0)" class="js-casefilter" val="5">Deleied</a>
            </div>
        </div>
		
        <div class="leftPart">
			<?php echo $this->fetch('content'); ?>
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