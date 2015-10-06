
<h2>Patients Details</h2>
<?php echo $this->Form->create('PatientDetail',array('action'=>'add'));?>
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
							'class'=>'oneThird'
						));
						echo $this->Form->input('dob_day',array(
							'div'=>false,
							'label'=>false,
							'options'=>$days,
							'default'=>'0',
							'class'=>'oneThird'
						));
						echo $this->Form->input('dob_year',array(
							'div'=>false,
							'label'=>false,
							'options'=>$years,
							'default'=>'0',
							'class'=>'oneThird'
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
							'placeholder'=>'City'
						));
						
					echo $this->Form->input('state',array(
							'div'=>false,
							'label'=>false,
							'class'=>'ml14',
							'type'=>'text',
							'placeholder'=>'State / Province'
						));
					//$countries=array('1'=>'India');
					echo $this->Form->input('country_id',array(
						'div'=>false,
						'label'=>false,
						'options'=>$countries,
						'default'=>'0',
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
						'type'=>'text'
					));
					echo $this->Form->input('height',array(
						'div'=>'gender ml20',
						'label'=>array('text'=>'* Height','class'=>'blue'),
						'placeholder'=>'00',
						'class'=>'height',
						'type'=>'text'
					));
				?>
                <div class="clear"></div>
            </div>
            <div class="dragDetails">
            	<h3>Drug Allergy</h3>
                <p class="mb20">Please provide the following details if the patient has drug allergy</p>
                <div class="clear"></div>
                <div class="drag">
                	<label class="blue">Drug</label>
                    <input type="text">
                </div>
                <div class="name ml20">
                	<label class="blue">Reaction</label>
                    <input type="text">
                </div>
                <div class="clear10"></div>
				
                <div class="drag">
                    <input type="text">
                </div>
                <div class="name ml20">
                    <input type="text">
                </div>
                <a href="#" class="greenText ml20">+ Add More</a>
                <div class="clear"></div>
            </div>
			
            <div class="performance">
           	  <h3 class="mb20">Performance</h3>
              <label class="blue">* Current performance status:</label>
              <div class="clear10"></div>
              <div class="w540">
				
				<label><input type="radio" name="RadioGroup1" value="radio" >Patient is fully active, able to carry on all pre-disease performance without restriction.</label>
				<label><input type="radio" name="RadioGroup1" value="radio" >Patient is restricted in physically strenuous activity but ambulatory and able to carry out work of a light or sedentary nature, e.g., light house work, office work</label>
                <label><input type="radio" name="RadioGroup1" value="radio" >Patient is ambulatory and capable of all self-care but unable to carry out any work activities. Up and about more than 50% of waking hours (excluding the normal sleeping time).</label>
				<label><input type="radio" name="RadioGroup1" value="radio" >Patient is capable of only limited self-care, confined to bed or chair more than 50% of waking hours (excluding the normal sleeping time).
</label>
                <label><input type="radio" name="RadioGroup1" value="radio" >Patient is completely disabled. Cannot carry on any self-care. Totally confined to bed or chair.</label>
                <label class="blue">Comments about performance status</label>
                <textarea></textarea>
              </div>
            </div>
            <div class="clear35"></div>
            <a href="javascript:void(0)" class="backBtn disable">Back</a>
            <input type="submit" class="nextBtn" value="Next">
			<input type="submit" class="saveBtn" value="Save" name="save" id="pdsaved">
			
</form>

<!-- script section for this page become one page -- >