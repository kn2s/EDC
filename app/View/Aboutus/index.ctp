<?php 
	//pr($doctors);
?>
  <section class="ourPhician">
  	<div class="container">
        <h2>Our Physicians</h2>
        <h5>Select the type of Cancer</h5>
        <ul>
			<?php 
				if(count($specializations)>0){
					foreach($specializations as $key=>$val){
						$actvcls="";
						if($curspecialist==$key)
							$actvcls="active";
				?>
				<li><?=$this->Html->link($val,array('controller'=>'aboutus','action'=>'index',$key),array('escape'=>false,'class'=>'js-catdoct '.$actvcls))?></li>
				<?php
					}
				}
			?>
        </ul>
    </div>
  </section>
  <!-- doctor list and details sections-->
  <div class="doctListwithdeatils">
  <section class="doctorLoist">
  	<div class="container">
    	<?php 
			$dtlstarind=0;
			$dtlendind=0;
			if(count($doctors)>0){
				$i=0;
				
				foreach($doctors as $doctor){
				
					if($i!=0 && $i%4==0){
						$dtlendind = $i;
					?>
						<div class="clear"></div>
						</div>
					  </section>
					<?php
						for($dtlstarind;$dtlstarind<$dtlendind;$dtlstarind++){
							$dctdtls = $doctors[$dtlstarind];
							?>
								<section class="doctorDetails" id="<?=$dctdtls['Doctor']['id']?>">
										<div class="container posi_global">
										<a href="javascript:void(0)" class="crossButton"></a>
										<h2>About <?=$dctdtls['Patient']['name']?> </h2>
										<div class="box">
											<h5>Medical School</h5>
											<h4><?=$dctdtls['Doctor']['medical_school']?></h4>
											<h5>Residency in <?=$dctdtls['Doctor']['residency']?></h5>
											<h4><?=$dctdtls['Doctor']['residency_from']?></h4>
											<h5>Fellowship in <?=$dctdtls['Doctor']['fellowship']?></h5>
											<h4><?=$dctdtls['Doctor']['fellowship_from']?></h4>
											<div class="clear10"></div>
											<h4>Follow</h4>
											<a href="http://twitter.com/@<?=$dctdtls['Doctor']['twitter']?>" class="tweeter" target="_blank">Twitter: @<?=$dctdtls['Doctor']['twitter']?></a>
											<a href="//http://facebook.com/<?=$dctdtls['Doctor']['facebook']?>" class="facebook" target="_blank">Facebook/<?=$dctdtls['Doctor']['facebook']?></a>
										</div>
										<div class="box">
											<p><?=$dctdtls['Doctor']['description_one']?></p>
										</div>
										<div class="box">
											<p><?=$dctdtls['Doctor']['description_two']?></p>
										</div>
										<div class="clear"></div>
									</div>
								</section>
							<?php
						}
						?>
						<section class="doctorLoist">
							<div class="container">
						<?php
					}
			?>
		<div class="doctor" data-href="#<?=$doctor['Doctor']['id']?>">
        	<div class="picCont">
            	<img src="<?=FULL_BASE_URL.$this->base.'/doctorimage/'.$doctor['Doctor']['image']?>" class="normalPic" alt="" width="190" height="190">
          
				<img src="<?=FULL_BASE_URL.$this->base.'/doctorimage/'.$doctor['Doctor']['image']?>" class="activePic" alt="" width="190" height="190">
				<div class="js-imagehov normalPic" style="background-color:#b86647; opacity:0.5; width:inherit; height:inherit; position:absolute; top:0px; display:none; border-radius:50%;"></div>
			</div>
            <h3>Dr.<?=$doctor['Patient']['name']?></h3>
            <h5><?=$doctor['Doctor']['designation']?></h5>
        </div>
			<?php
				$i++;
				}
			}
		?>
		
        <div class="clear"></div>
    </div>
  </section>
  
  <?php 
		$dtlendind = (count($doctors)>$dtlendind)?count($doctors):$dtlendind;
		
		for($dtlstarind;$dtlstarind<$dtlendind;$dtlstarind++){
			$dctdtls = $doctors[$dtlstarind];
			?>
			<section class="doctorDetails" id="<?=$dctdtls['Doctor']['id']?>">
					<div class="container posi_global">
					<a href="javascript:void(0)" class="crossButton"></a>
					<h2>About <?=$dctdtls['Patient']['name']?> </h2>
					<div class="box">
						<h5>Medical School</h5>
						<h4><?=$dctdtls['Doctor']['medical_school']?></h4>
						<h5>Residency in <?=$dctdtls['Doctor']['residency']?></h5>
						<h4><?=$dctdtls['Doctor']['residency_from']?></h4>
						<h5>Fellowship in <?=$dctdtls['Doctor']['fellowship']?></h5>
						<h4><?=$dctdtls['Doctor']['fellowship_from']?></h4>
						<div class="clear10"></div>
						<h4>Follow</h4>
						<a href="//http://twitter.com/@<?=$dctdtls['Doctor']['twitter']?>" target="_blank" class="tweeter">Twitter: @<?=$dctdtls['Doctor']['twitter']?></a>
						<a href="//http://facebook.com/<?=$dctdtls['Doctor']['facebook']?>" target="_blank" class="facebook">Facebook/<?=$dctdtls['Doctor']['facebook']?></a>
					</div>
					<div class="box">
						<p><?=$dctdtls['Doctor']['description_one']?></p>
					</div>
					<div class="box">
						<p><?=$dctdtls['Doctor']['description_two']?></p>
					</div>
					<div class="clear"></div>
				</div>
			</section>
			<?php
		}
  ?>
  
  </div>