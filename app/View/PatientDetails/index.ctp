<!-- script sections -->
<script type="text/javascript">
var baseurl = "<?=FULL_BASE_URL.$this->base?>";
var animateduration=3000;
var comeaniduration=1000;
$(document).ready(function(){
	$("#addmoredrug").bind('click',addmoredrugtextarea);
	$("#pdsaved").bind('click',formValidationpd);
	$("#pdnextview").bind('click',gotoSocialHistory);
	$(".backBtn").bind('click',comebackinprevsection);
	$("#saalcoholmore").bind('click',addmoreAlcoholsa);
	$("#sadrugmore").bind('click',addmoredrugsdivsa);
	$("#sasaved").bind('click',formvalidationsa); 
	$("#sanextview").bind('click',gotoxxx);
	
	setalldivblockinonseposition();
});
function setalldivblockinonseposition(){
	var pdtop = $("#pddetailss").offset().top;
	
	$("#socialActivity").attr('style','top:'+pdtop+'px; position: absolute;').hide();
	
}

function addmoredrugtextarea(e){
	var fld = '<div class="drag"><input type="text" name="pddralergyname[]"></div>\
	<div class="name ml20"><input type="text" name="pddralergyrection[]"></div><div class="clear10"></div>';		
	$("#pddrgalergy").append(fld);
}
function formValidationpd(e){
	e.preventDefault();
	$("#preloaderdv").show();
	$.ajax({
		url:baseurl+"/PatientDetails/add",
		method:'post',
		dataType:'json',
		data:$("#pddetailsfrm").serialize(),
		error:function(response){
			console.log(response);
			$("#preloaderdv").hide();
		},
		success:function(response){
			console.log(response);
			$("#preloaderdv").hide();
			alert(response.message);
			alert(response.status);
			if(response.status=='1'){
				$("#pdid").val(response.id);
			}
			else{
			}
		}
	});
}
//animation sections
function gotoSocialHistory(e){
	var divlft = $("#pddetailss").offset().left;
	var dicwidth = $("#pddetailss").width();
	var animatel =parseInt(divlft)+parseInt(dicwidth); 
	console.log("left : "+divlft+" width : "+dicwidth+" total l : "+animatel);
	$("#pddetailss").animate({opacity:0,'z-index':9},animateduration,function(){
		
		$("#socialActivity").animate({opacity:1,'z-index':99999},comeaniduration,function(){
			$("#socialActivity").show();
		});
	});
	
	/*$("#pddetailss").hide(animateduration,function(){
		$("#socialActivity").show(comeaniduration);
	});*/
}
function comebackinprevsection(e){
	var btnid = $(e.currentTarget).attr('id');
	if(btnid=="sabackbtn"){
		
		$("#socialActivity").animate({opacity:0,'z-index':9},animateduration,function(){
			$("#socialActivity").hide();
			$("#pddetailss").animate({opacity:1,'z-index':999},comeaniduration,function(){
				//$("#pddetailss").show();
			});
		});
		
		/*$("#socialActivity").hide(animateduration,function(){
			$("#pddetailss").show(comeaniduration);
		});*/
	}
}

function addmoreAlcoholsa(){
	var fld ='<div class="gender"><input type="text" name="samorealcoholtype[]"></div>\
	<div class="quantity ml20"><input type="text" name="samorealcoholquantity[]" placeholder="0" class="ml">\
	<select name="saalcoholunit"><option value="1">In a Day</option></select></div><div class="clear10"></div>';
	$("#morealcoholdiv").append(fld);
}
function addmoredrugsdivsa(){
	var flds= '<div class="gender"><input type="text" name="samoredrugtype[]"></div>\
	<div class="quantity ml20">\
	<input type="text" name="samoredrugquantity" placeholder="0" class="ml">\
	<select name="samoredrugunit"><option value="1">In a Day</option></select>\
	</div><div class="clear10"></div>';
	
	$("#moredrugdiv").append(flds); //sadrugmore moredrugdiv
}
function formvalidationsa(e){
	e.preventDefault();
	alert("form post pending working");
}
function gotoxxx(e){
	alert("pending working");
}
</script>
<!-- end of script -->
<?php 
//pr($patientDetail);
?>
<div id="pddetailss">
<h2>Patients Details</h2>
<?php echo $this->Form->create('PatientDetail',array('action'=>'add','id'=>'pddetailsfrm'));
	echo $this->Form->hidden('id',array("id"=>"pdid"));
?>
            
			<div class="pertionalDetails">
            	
				<?php echo $this->Form->input('name',array(
					'div'=>'name',
					'label'=>array(
						'class'=>'blue',
						'text'=>'* Full Name'
					)
				));  
					echo $this->Form->input('gender',array(
					'options'=>array('male'=>'Male','female'=>'Female'),
					'default'=>'male',
					'div'=>'gender ml20',
					'label'=>array('class'=>'blue','text'=>'* Gender')
					));
				?>
                <div class="clear"></div>
                <div class="name">
                	<label class="blue">* Date of Birth</label>
                    
					<?php 
						$months=array('Month');
						$days=array('Day');
						$years=array('Year');
						for($i=1;$i<13;$i++){
							array_push($months,$i);
						}
						for($j=1;$j<32;$j++){
							array_push($days,$j);
						}
						for($k=(date('Y')-90);$k<date('Y');$k++){
							array_push($years,$k);
						}
						echo $this->Form->input('dob_month',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'oneThird',
							'id'=>'pdmonth'
						));
						echo $this->Form->input('dob_day',array(
							'div'=>false,
							'label'=>false,
							'options'=>$days,
							'default'=>'0',
							'class'=>'oneThird',
							'id'=>'pdday'
						));
						echo $this->Form->input('dob_year',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'oneThird',
							'id'=>'pdyear'
						));
					?>
					
                </div>
                <div class="clear"></div>
                <div class="place">
                	<label class="blue">Place</label>
                    
					<?php
					echo $this->Form->input('city',array(
							'div'=>false,
							'label'=>false,
							'type'=>'text',
							'placeholder'=>'City',
							'id'=>'pdcity'
						));
						
					echo $this->Form->input('state',array(
							'div'=>false,
							'label'=>false,
							'class'=>'ml14',
							'type'=>'text',
							'placeholder'=>'State / Province',
							'id'=>'pdstate'
						));
					//$countries=array('1'=>'India');
					echo $this->Form->input('country_id',array(
						'div'=>false,
						'label'=>false,
						'options'=>$countries,
						'default'=>'0',
						'id'=>'pdcountry'
					));
					?>
                </div>
                <div class="clear"></div>
                
				<?php 
					echo $this->Form->input('weight',array(
						'div'=>'gender',
						'label'=>array('text'=>'* Weight','class'=>'blue'),
						'placeholder'=>'0.0',
						'class'=>'weight',
						'type'=>'text',
						'id'=>'pdweight'
					));
					echo $this->Form->input('height',array(
						'div'=>'gender ml20',
						'label'=>array('text'=>'* Height','class'=>'blue'),
						'placeholder'=>'00',
						'class'=>'height',
						'type'=>'text',
						'id'=>'pdheight'
					));
				?>
                <div class="clear"></div>
            </div>
            <div class="dragDetails" >
            	<h3>Drug Allergy</h3>
                <p class="mb20">Please provide the following details if the patient has drug allergy</p>
                <div class="clear"></div>
                <div class="drag">
                	<label class="blue">Drug</label>
                    <input type="text" name='pddralergyname[]'>
                </div>
                <div class="name ml20">
                	<label class="blue">Reaction</label>
                    <input type="text" name='pddralergyrection[]'>
                </div>
                <div class="clear10"></div>
				<div id="pddrgalergy">
				</div>
                
                <a href="javascript:void(0)" class="greenText ml20" id='addmoredrug'>+ Add More</a>
                <div class="clear"></div>
            </div>
			
            <div class="performance">
           	  <h3 class="mb20">Performance</h3>
              <label class="blue">* Current performance status:</label>
              <div class="clear10"></div>
              <div class="w540">
				<label><input type="radio" name="RadioGroup1" value="0" checked/>Patient is fully active, able to carry on all pre-disease performance without restriction.</label>
				<label><input type="radio" name="RadioGroup1" value="1" />Patient is restricted in physically strenuous activity but ambulatory and able to carry out work of a light or sedentary nature, e.g., light house work, office work</label>
                <label><input type="radio" name="RadioGroup1" value="2" />Patient is ambulatory and capable of all self-care but unable to carry out any work activities. Up and about more than 50% of waking hours (excluding the normal sleeping time).</label>
				<label><input type="radio" name="RadioGroup1" value="3" />Patient is capable of only limited self-care, confined to bed or chair more than 50% of waking hours (excluding the normal sleeping time).
</label>
                <label><input type="radio" name="RadioGroup1" value="4" />Patient is completely disabled. Cannot carry on any self-care. Totally confined to bed or chair.</label>
                <label class="blue">Comments about performance status</label>
                <!--<textarea ></textarea>-->
				<?php 
					echo $this->Form->input('performance_comment',array("type"=>"textarea"));
				?>
              </div>
            </div>
            <div class="clear35"></div>
            <a href="javascript:void(0)" class="backBtn disable">Back</a>
            <input type="button" class="nextBtn" value="Next" id="pdnextview">
			<input type="submit" class="saveBtn" value="Save" name="save" id="pdsaved">
			
</form>
</div>

<!-- social activity html part -->

<div id="socialActivity">
	<?php 
		echo $this->Form->create('Socialactivity',array("id"=>"safrms"));
		echo $this->Form->hidden('id');
	?>
	<h2>Social History</h2>
            <div class="Smoking">
            	<h3>Smoking</h3>
                <p class="mb10">Please provide the following details if the patient has or had smoking habits.</p>
                <div class="clear"></div>
                <div class="quantity">
                	<label class="blue">Quantity</label>
                    <input type="text" placeholder="0">
                    <select>
                    	<option>In a Day</option>
                    </select>
                </div>
                <div class="period ml20">
                	<label class="blue">Period</label>
                    <!--<select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>
                    <p class="dash">-</p>
                    <select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>-->
					
					<?php 
						echo $this->Form->input('dob_month',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month',
							'id'=>'samonth'
						));
						
						echo $this->Form->input('dob_year',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year',
							'id'=>'sayear'
						));
					
					?>
					<p class="dash">-</p>
					<?php 
						echo $this->Form->input('dob_month',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month',
							'id'=>'samonth'
						));
						
						echo $this->Form->input('dob_year',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year',
							'id'=>'sayear'
						));
					
					?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="alcohal">
            	<h3>Alcohol</h3>
                <p class="mb10">Please provide the following details if the patient consumes or used to consume alcohol.</p>
                <div class="gender">
                	<label class="blue">Alcohol Type</label>
                    <input type="text" name="samorealcoholtype[]">
                </div>
                <div class="quantity ml20">
                	<label class="blue">Quantity</label>
                    <input type="text" name="samorealcoholquantity[]" placeholder="0" class="ml">
                    <select name="saalcoholunit">
                    	<option value="1">In a Day</option>
                    </select>
                </div>
                <div class="clear10"></div>
               
			   <div id="morealcoholdiv">
			   
			   </div>
			   <div class="clear10"></div>
                <a href="javascript:void(0)" class="greenText ml20" id="saalcoholmore">+ Add More</a>
                <div class="clear15"></div>
                <div class="period">
                	<label class="blue">Period</label>
                   
				   <!--<select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>
                    <p class="dash">-</p>
                    <select class="month"><option>Month</option></select>
                    <select class="year"><option>Year</option></select>-->
					
					<?php 
						echo $this->Form->input('dob_month',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month',
							'id'=>'samonth'
						));
						
						echo $this->Form->input('dob_year',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year',
							'id'=>'sayear'
						));
					
					?>
					<p class="dash">-</p>
					<?php 
						echo $this->Form->input('dob_month',array(
							'div'=>false,
							'label'=>false,
							'options'=>$months,
							'default'=>'0',
							'class'=>'month',
							'id'=>'samonth'
						));
						
						echo $this->Form->input('dob_year',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'year',
							'id'=>'sayear'
						));
					
					?>
					
                </div>
                <div class="clear"></div>
            </div>
            <div class="drug">
            	<h3>Drugs</h3>
                <p class="mb10">Please provide the following details if the patient consumes drugs</p>
                <div class="gender">
                	<label class="blue">Drug Type</label>
                    <input type="text" name="samoredrugtype[]">
                </div>
                <div class="quantity ml20">
                	<label class="blue">Quantity</label>
                    <input type="text" name="samoredrugquantity[]" placeholder="0" class="ml">
                    <select name="samoredrugunit[]">
                    	<option value="1">In a Day</option>
                    </select>
                </div>
                <div class="clear10"></div>
                 
				<div id="moredrugdiv">
				
				</div>
				
                <a href="javascript:void(0)" class="greenText ml20" id="sadrugmore">+ Add More</a>
                <div class="clear"></div>
            </div>
            <div class="additional">
            	<div class="w540">
                	<label class="blue">Additional Comments</label>
                	<p>Do you want to tell us anyhing about the addiction</p>
                	<textarea></textarea>
                </div>
            </div>
            <div class="clear35"></div>
			
            <a href="javascript:void(0)" class="backBtn" id="sabackbtn">Back</a>
            <input type="button" class="nextBtn" value="Next" id="sanextview">
			<input type="submit" class="saveBtn" value="Save" name="save" id="sasaved">
			
	</form>
</div>

<!-- script section for this page become one page -- >