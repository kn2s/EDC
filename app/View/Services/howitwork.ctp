<?php
echo $this->Html->css('jquery.bxslider.css');
echo $this->Html->script('jquery.bxslider.js');

?>
<section class="myDashBordCont">
<center>
    <div class="rightHIW" style="float:none!important;">
    	<ul class="bxslider">
          <li><?php echo $this->Html->image('slide1.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide2.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide3.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide4.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide5.jpg',array('alt'=>''));?></li>
          <li><?php echo $this->Html->image('slide6.jpg',array('alt'=>''));?></li>
        </ul>
    </div>
    <div class="clear"></div>
<center>
</section>