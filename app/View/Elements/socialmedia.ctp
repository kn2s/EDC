<?php 
$sociallinks = $this->requestAction('app/socialmedialinks');
?>

<div class="followus">
        <p>Follow us on</p>
        <div class="clear"></div>
	 <?php 
		$jscv ="javascript:void(0)";
		
		$fblnk=(isset($sociallinks['Homepagecontent']['facebook']) && $sociallinks['Homepagecontent']['facebook']!='')?$sociallinks['Homepagecontent']['facebook']:$jscv;
		$twlnk=(isset($sociallinks['Homepagecontent']['twitter']) && $sociallinks['Homepagecontent']['twitter']!='')?$sociallinks['Homepagecontent']['twitter']:$jscv;;
		$utubelnk=(isset($sociallinks['Homepagecontent']['youtube']) && $sociallinks['Homepagecontent']['youtube']!='')?$sociallinks['Homepagecontent']['youtube']:$jscv;;
		$rss=(isset($sociallinks['Homepagecontent']['rss']) && $sociallinks['Homepagecontent']['rss']!='')?$sociallinks['Homepagecontent']['rss']:$jscv;; 
		
		
		echo $this->Html->link(
		$this->Html->image('s1.png', array('alt' => 'fb', 'border' => '0')),
		$fblnk,
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	  
		echo $this->Html->link(
		$this->Html->image('s2.png', array('alt' => 'fb', 'border' => '0')),
		$twlnk,
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	   
		echo $this->Html->link(
		$this->Html->image('s3.png', array('alt' => 'fb', 'border' => '0')),
		$utubelnk,
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	 
		echo $this->Html->link(
		$this->Html->image('s4.png', array('alt' => 'fb', 'border' => '0')),
		$rss,
		array('target'=>'_blank','escape'=>false,'class'=>'socialIcon')
		);
	  ?>
</div>