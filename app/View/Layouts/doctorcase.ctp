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
<style>
	.maximize{
		float: right;
		width: 30px;
		height: 20px;
		/*background: url(../images/minimize.png) center bottom no-repeat;*/
		opacity: 0.3;
	}
</style>

<body>
<div class="Wrapper">
  <header class="sticky">
    <div class="container">
      <?php echo $this->element('doctsimage')?>
    </div>
  </header>
  
  <div class="sendOpinionBox" style="display:none;">
  <?php 
	echo $this->Form->create('CaseOpinion',array('action'=>'add','id'=>'caseopinionfrm'));
	echo $this->Form->hidden('doctor_case_id',array('value'=>$doctcaseid,'id'=>'opinioncaseid'));
  ?>
  	<h2>Send Opinion</h2>
    <a href="javascript:void(0)" class="close js-opinionpanel"></a>
    <!--<a href="javascript:void(0)" class="minimize js-opinionpanel"></a>-->
    <a href="javascript:void(0)" class="maximize js-opinionpanellarger" ind="0">M</a>
    <div class="clear"></div>
    <div class="block">
    	<label>Assessment &amp; Explanation</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][assessment]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][assessment]" ></textarea>
    </div>
    <div class="block">
    	<label>Prognosis</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][prognosis]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][prognosis]" ></textarea>
    </div>
    <div class="block">
    	<label>Best Treatment Strategy</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][treatmentstrategy]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][treatmentstrategy]" ></textarea>
    </div>
    <div class="block">
    	<label>Alternative Strategy</label>
        <!--<input type="text" placeholder="Type Something" name="data[CaseOpinion][alternativestrategy]" >-->
		<textarea placeholder="Type Something" name="data[CaseOpinion][alternativestrategy]" ></textarea>
    </div>
    <div class="block">
    	<label>Comment</label>
        <textarea name="data[CaseOpinion][comment]" class="js-opinioncomments" >Type Something</textarea>
    </div>
	<div class="block">
    	<label id="flsattaach"></label>
    </div>
	<input type="file" name="opiniondoct" class="js-opiniondoc" style="display:none;">
	<input type="hidden" name="data[CaseOpinion][attachementname]" id="attachementname">
	
    <input type="submit" class="blueButton js-caseopinionpost" value="SEND">
    <a href="javascript:void(0)" class="attachButton js-attachedopinionfile">Attach</a>
	</form>
  </div>
  
  
  <div class="questionnaireBody doctorsCase">
  	<div class="container">
    	<div class="statusPart">
        	<ul>
				<?php 
					switch($parientviewinfo){
						case 2:
						?>
						<li><a href="javascript:void(0)" class="js-doctoptions" vals="1">Questionnaire</a></li>
						<li><a href="javascript:void(0)" class="current" vals="2">Communication</a></li>
						<li><a href="javascript:void(0)" class="" vals="3">Refer</a></li>
						<?php
							break;
						case 3:
						?>
						<li><a href="javascript:void(0)" class="" vals="1">Questionnaire</a></li>
						<li><a href="javascript:void(0)" class="" vals="2">Communication</a></li>
						<li><a href="javascript:void(0)" class="" vals="3">Refer</a></li>
						<?php	
							break;
						default:
						?>
						<li><a href="javascript:void(0)" class="current" vals="1">Questionnaire</a></li>
						<li><a href="javascript:void(0)" class="js-doctoptions" vals="2">Communication</a></li>
						<li><a href="javascript:void(0)" class="" vals="3">Refer</a></li>
						<?php	
							break;
					}
				?>
				<li class="opinion">
            	<?php 
					if(isset($doctorCases['CaseOpinion']) && count($doctorCases['CaseOpinion'])>0){
					echo $this->Html->link("View Opinion",array('controller'=>'CaseOpinions','action'=>'doctorview',$doctorCases['DoctorCase']['id'],'full_base'=>true),array('escape'=>false));
					}
					else{
				?>
				<a href="javascript:void(0)" class="js-doctoptions" vals="4">Send Opinion</a>
				<?php
					}
				?>
				</li>
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