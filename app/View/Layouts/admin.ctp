<?php
$cakeDescription = __d('cake_dev', 'EradicateCare');
$cakeVersion = __d('cake_dev', '');
//pr($this->params);
$controllername = ucwords($this->params->params['controller']);
//pr($controllername);
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
		
		echo $this->Html->css(array('bootstrap.min.css','metisMenu.min.css','timeline.css','sb-admin-2.css','font-awesome.min.css'));
		echo $this->Html->script(array('jquery.min.js','bootstrap.min.js','metisMenu.min.js','sb-admin-2.js','raphael-min.js'));
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
	 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<?php echo $this->Html->link($cakeDescription.' Admin',array('controller'=>'doctors','action'=>'index','full_base'=>true),array('escape'=>false,'class'=>'navbar-brand')); ?>
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li><a href="<?=FULL_BASE_URL.$this->base?>/admin/admins/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
						<li>
                            <a href="javascript:void(0)"><i class="fa fa-users fa-fw"></i> Doctors <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
									<?php echo $this->Html->link('List',array('controller'=>'doctors','action'=>'index','full_base'=>true),array('escape'=>false));?>
                                </li>
								<li>
									<?php echo $this->Html->link('Add',array('controller'=>'doctors','action'=>'add','full_base'=>true),array('escape'=>false));?>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="<?=FULL_BASE_URL.$this->base?>/admin/specializations"><i class="fa fa-dashboard fa-fw"></i>Specializations <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
									<?php echo $this->Html->link('List',array('controller'=>'specializations','action'=>'index','full_base'=>true),array('escape'=>false));?>
                                </li>
								<li>
									<?php echo $this->Html->link('Add',array('controller'=>'specializations','action'=>'add','full_base'=>true),array('escape'=>false));?>
                                </li>
                            </ul>
						</li>
                        
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-table fa-fw"></i> Patients<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
									<?php echo $this->Html->link('All Patients',array('controller'=>'patients','action'=>'index','full_base'=>true),array('escape'=>false));?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-table fa-fw"></i> Allowed Country<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
									<?php echo $this->Html->link('List',array('controller'=>'countries','action'=>'index','full_base'=>true),array('escape'=>false));?>
                                </li>
								<li>
									<?php echo $this->Html->link('Add',array('controller'=>'countries','action'=>'add','full_base'=>true),array('escape'=>false));?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-files-o fa-fw"></i> Web Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<?php echo $this->Html->link('Home Page Contents',array('controller'=>'homepagecontents','action'=>'add','full_base'=>true),array('escape'=>false));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Service Page Contents',array('controller'=>'services','action'=>'add','full_base'=>true),array('escape'=>false));?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="javascript:void(0)"><i class="fa fa-table fa-fw"></i> Yearlly Schedules<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<?php echo $this->Html->link('Day Schedules',array('controller'=>'WorkSchedules','action'=>'index','full_base'=>true),array('escape'=>false));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Create Day Schedules',array('controller'=>'WorkSchedules','action'=>'add','full_base'=>true),array('escape'=>false));?>
                                </li>
								
								<li>
									<?php echo $this->Html->link('Doctor Schedules',array('controller'=>'ScheduleDoctors','action'=>'index','full_base'=>true),array('escape'=>false));?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Create Doctor Schedules',array('controller'=>'ScheduleDoctors','action'=>'add','full_base'=>true),array('escape'=>false));?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            
            <!-- /.row -->
          <?php echo $this->fetch('content'); ?>
            <!--/.row end -->
        </div>
        <!-- /#page-wrapper -->

    </div>
	
</body>
<div id="sqlsection">
	<?php echo $this->element('sql_dump'); ?>
</div>
</html>