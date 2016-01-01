$(document).ready(function(e) {
	$(window).scroll(function () {
		if( $(window).scrollTop() > 250){
		  $('header.home').addClass('sticky');
		} else {
		  $('header.home').removeClass('sticky');
		};
		if(screen.width > 1025){
			var margin = -(($(window).scrollTop())/6);
			$(".secondOption, .patientText").css('margin-top',margin);
			$(".knowTheSpecialists, .myAccountLogin").css('margin-top', (margin*1.3));
			$(".facility").css('margin-top', (margin*3));
		}
		if($(window).scrollTop() > 250){
			$('.questionnaireBody:not(.doctorsCase)').addClass('sticky');
			if($(window).scrollTop() > 400){
				$('.questionnaireBody').addClass('goToTop');
			} else{
				$('.questionnaireBody').removeClass('goToTop');
			};
		} else{
			$('.questionnaireBody:not(.doctorsCase)').removeClass('sticky');
			$('.questionnaireBody').removeClass('goToTop');
		}
		if($(window).scrollTop() > 95){
			$('.questionnaireBody.doctorsCase').addClass('sticky');
		} else{
			$('.questionnaireBody.doctorsCase').removeClass('sticky');
		}
	});
	$('.facility .box:not(.appear)').each(function(i) {
		var $li = $(this);
		setTimeout(function() {
		  $li.addClass('appear');
		}, i*300); // delay 100 ms
	});
	$('.doctorLoist .doctor:not(.appear)').each(function(i) {
		var $li = $(this);
		setTimeout(function() {
		  $li.addClass('appear');
		}, i*300); // delay 100 ms
	});
	if(window.location.hash) {
		if(window.location.hash.substring(1) == "patient") {
		  setTimeout(function() {$('.patient.tabSwitch').trigger('click');}, 100);
		  //alert('aa');
		} else{
			 if(window.location.hash.substring(1) == "doctor") {
		  		setTimeout(function() {$('.doctor.tabSwitch').trigger('click');}, 100);
		  		//alert('bb');
			 }
		};
	};
	if($('.bodyBannerSlider').length) {
		var $owl = $('.bodyBannerSlider')
		$owl.owlCarousel({
		    loop:true,
		    nav:true,
		    dots:true,
		    autoplay:true,
		    autoplayHoverPause:true,
		    items: 1,
		    autoplaySpeed:500,
		    navSpeed:500
		});
	};
	if($('.bxslider').length) {
		$('.bxslider').bxSlider({
		  mode: 'vertical',
		  slideMargin: 0
		});
	};
	
	$(".doctorLoist .doctor").click(function(e) {
        e.preventDefault();
		if($(this).hasClass('active')){
			$(".doctorLoist .doctor").removeClass('active');
			$(".doctorDetails").slideUp(500);
		} else {
			$(".doctorLoist .doctor").removeClass('active');
			$(this).addClass('active');
			var tab = $(this).attr("data-href");
			$(".doctorDetails").not(tab).css("display", "none");
			$(tab).slideDown(500);
		}
    });
	$('.doctorDetails a.crossButton').click(function(e) {
        e.preventDefault();
		$(".doctorLoist .doctor").removeClass('active');
		$(".doctorDetails").slideUp(500);
    });
	$('#patientService .facility').addClass('appear');
	$(".tabSwitch").click(function(e) {
        e.preventDefault();
        $(this).siblings('a').find('.active').fadeOut(500);
        $(this).find('.active').fadeIn(500);
        var tab = $(this).attr("href");
		//$('.appear').removeClass('appear');
        $(".tabContent").not(tab).css("display", "none");
        $(tab).slideDown(500);
		//$('#patientService .facility').addClass('appear');
    });
	$('.secondOption, .knowTheSpecialists, .twoCircle').appear();
	$(document.body).on('appear','.secondOption', function(e) {
		$('.secondOption .smooth:not(.appear)').each(function(i) {
			var $li = $(this);
			setTimeout(function() {
			  $li.addClass('appear');
			}, i*300); // delay 100 ms
		});
	});
	$(document.body).on('appear','.knowTheSpecialists', function(e) {
		$('.knowTheSpecialists:not(.appear) .box').each(function(i) {
			var $li = $(this);
			setTimeout(function() {
			  $li.addClass('appear');
			}, i*150); // delay 100 ms
		});
	});
	$(document.body).on('appear','.twoCircle', function(e) {
		$('.twoCircle:not(.appear)').addClass('appear');
	});
	if($('.doctorsDashbord .leftPart').length) {
		$('.doctorsDashbord .leftPart').isotope({
		  // options
		  itemSelector: '.patientBox'
		});
	};
	$('.questionnaireBody a.top').click(function(e) {
        e.preventDefault();
		$('html, body').animate({scrollTop: '0px'}, 500, 'linear');
    });
});


//about us page 
$(document).on('mouseover','.picCont img',function(e){
	var par = $(e.currentTarget).parents(".picCont");
	if($(par).find(".js-imagehov").length){
		$($(par).find(".js-imagehov")).show();
	}
});
$(document).on('mouseout','.js-imagehov',function(e){
	$(e.currentTarget).hide();
	//alert("out");
	/*var par = $(e.currentTarget);
	if($(par).find(".js-imagehov").length){
		$($(par).find(".js-imagehov")).hide();
	}*/
});
/* 
* Account Page
*/
		
var activeAjaxCount = 0;
$(document).ajaxSend(function(event, xhr, options) {
	activeAjaxCount++;
	$(".js-loader").show();
	$('.js-loader').height($('.Wrapper ').height());
	$('.js-loader').css('display','block');

}).ajaxComplete(function(event, xhr, options) {
	activeAjaxCount--;
	$('.js-loader').height($('.Wrapper').height()); 
	$('.js-loader').css('display','none');		

/* Error handling - starts */
}).ajaxError(function(event, xhr, options, thrownError ) {			
	
});
		


$(document).on('click', '.js-signup', function(){
	var signupForm = $(this).closest("form"),
	isUsernameLengthCorrect = $.trim(signupForm.find("#name").val().length);
	isEmpty = signupForm.find('input[type=text], input[type=password]').filter(function () {
					return $(this).val().length === 0;
				}).length,
	errorMsg = "";
	if(isEmpty  != 0){
		errorMsg = msg.signup.errorMsg.errEmty;
	}else if(isUsernameLengthCorrect<5){
		errorMsg = msg.signup.errorMsg.errMinUsernameLength;
	}else if(!validateEmail(signupForm.find("#email").val())){
		errorMsg = msg.global.invaliEmail;
	}else if($.trim(signupForm.find("#spass").val()) != $.trim(signupForm.find("#cpass").val())){
		errorMsg = msg.signup.errorMsg.matchPass;
	}else if(!signupForm.find("#chkbtn").is(":checked")){
		errorMsg = msg.signup.errorMsg.acceptTerm;
	}
	if(errorMsg == ""){
		//make the ajax call here
		
		$.ajax({
			url:baseurl+'/patients/ajaxsignup',
			method:'post',
			dataType:'json',
			data:$("#signupform").serialize(),
			success:function(response){
				if(response.status === "succ"){
					errorMsg = msg.signup.succMsg;
				}else if(response.status === "exist"){	
					errorMsg = msg.signup.userExist;
				}
				signUpInErrorMsg($(".signUp"), errorMsg);
				$('html, body').animate({
					scrollTop: $(".signUp").offset().top
				}, 500);
			}
		});
	}else{
		signUpInErrorMsg($(".signUp"), errorMsg);
	}
});

function signUpInErrorMsg(obj, errorMsg){
	var errTemplate =$("<div class='err-msg'><div>");
	(obj.find(".err-msg").length == 0)?
		obj.find("h2").after(errTemplate.html(errorMsg)):
		obj.find(".err-msg").html(errorMsg);
}

function validateEmail(email) {
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return expr.test(email);
};

$(document).on('click', '.js-signin', function(){
	$.ajax({
		url:baseurl+'/patients/ajaxlogin',
		method:'post',
		dataType:'json',
		data:$("#loginform").serialize(),
		success:function(response){
			if(parseInt(response.status) === 1){
				window.location=baseurl+'/patients/dashboard';
			}else{	
				if(parseInt(response.status) === 2){
					//doctor log in
					window.location=baseurl+'/doctors/dashboard';
				}
				else{
					signUpInErrorMsg($(".signIn"), response.message);
					$('html, body').animate({
						scrollTop: $(".signIn").offset().top
					}, 500);
				}
			}
		}
	});	
});	

//ditect key press on acount page
$(document).on('keyup','html body',function(e){
	var keycode = e.keyCode;
	if(keycode==13){
		if($(document).find("#loginform").length>0){
			//console.log("login found");
			//sign up and login page open
			var isLginfrmPost=true;
			var issignUpfrmPost=false;
			
			//checked the login form has value or not 
			$.each($(".lginfld"),function(i,item){
				if($(item).val()==''){
					isLginfrmPost=false;
				}
			});
			
			//if login false then checked sign up form
			if(isLginfrmPost){
				$('.js-signin').trigger('click');
			}
			else{
				$.each($(".sgnufld"),function(i,item){
					if($(item).val()!=''){
						issignUpfrmPost=true;
					}
				});
				
				if(issignUpfrmPost){
					$('.js-signup').trigger('click');
				}
			}
			
		}
	}
});

//about us doctore results
$(document).on('click','.js-catdoct',function(e){
	//alert("ff");
	e.preventDefault();
	$crtagt = $(e.currentTarget);
	var classes=$(e.currentTarget).attr("class").split(' ');
	var selcat=$(e.currentTarget).attr('href').split("/");
	if($.isArray(selcat) && selcat.length>1){
		selcat=selcat[selcat.length-1];
	}
	//console.log(classes+" "+selcat);
	if(classes.length>1 && classes[1]=='active'){
		//alert("sameclass call");
	}
	else{
		//alert("differ class call");
		// now call the ajax for get the doc with this cat
		$.ajax({
		url:baseurl+'/aboutus/index',
		method:'post',
		dataType:'json',
		data:{catid:selcat},
		success:function(response){
			//remove old selected section with the doc list details
			//doctListwithdeatils
			$($crtagt.parents('ul')).find('.active').removeClass("active");
			$(".doctListwithdeatils").empty();
			//now add the class here 
			$crtagt.addClass("active");
			//now generat the doct div sections
			$doclisthtml='';
			var doctlenth = response.doctors.length;
			
			var dtlstarind=dtlendind=0;
			
			if(doctlenth>0){
				$doclisthtml='<section class="doctorLoist"><div class="container">';
				$.each(response.doctors,function(i,docdetails){
					if(i!=0 && i%4==0){
						dtlendind=i;
						$doclisthtml+='<div class="clear"></div></div></section>';
						for(dtlstarind;dtlstarind<dtlendind;dtlstarind++){
							var dctdtls = response.doctors[dtlstarind];
							var doct=dctdtls.Doctor;
							$doclisthtml+='<section class="doctorDetails" id="'+dctdtls.Doctor.id+'"><div class="container posi_global">\
								<a href="javascript:void(0)" class="crossButton"></a><h2>About '+dctdtls.Patient.name+'</h2>\
								<div class="box"><h5>Medical School</h5>\
								<h4>'+dctdtls.Doctor.medical_school+'</h4><h5>Residency in '+dctdtls.Doctor.residency+'</h5>\
								<h4>'+dctdtls.Doctor.residency_from+'</h4><h5>Fellowship in '+dctdtls.Doctor.fellowship+'</h5>\
								<h4>'+dctdtls.Doctor.fellowship_from+'</h4><div class="clear10"></div><h4>Follow</h4>\
								<a href="http://twitter.com/@'+dctdtls.Doctor.twitter+'" class="tweeter" target="_blank">Twitter: @'+dctdtls.Doctor.twitter+'</a>\
								<a href="//http://facebook.com/'+dctdtls.Doctor.facebook+'" class="facebook" target="_blank">Facebook/'+dctdtls.Doctor.facebook+'</a>\
								</div><div class="box"><p>'+dctdtls.Doctor.description_one+'</p></div><div class="box"><p>'+dctdtls.Doctor.description_two+'</p></div><div class="clear"></div></div></section>';
						}
						$doclisthtml+='<section class="doctorLoist"><div class="container">';
					}
					
					$doclisthtml+='<div class="doctor" data-href="#'+docdetails.Doctor.id+'"><div class="picCont">\
					<img src="'+baseurl+'/doctorimage/'+docdetails.Doctor.image+'" class="normalPic" alt="">\
					<img src="'+baseurl+'/doctorimage/'+docdetails.Doctor.image+'" class="activePic" alt=""></div>\
					<h3>Dr.'+docdetails.Patient.name+'</h3><h5>'+docdetails.Doctor.designation+'</h5></div>';
					
				});
				$doclisthtml+='<div class="clear"></div></div></section>';
				
				//dtlendind = (doctlenth>dtlendind)doctlenth:dtlendind;
				if(doctlenth>dtlendind){
					dtlendind=doctlenth;
				}
				else{
					dtlendind=dtlendind;
				}
		
				for(dtlstarind;dtlstarind<dtlendind;dtlstarind++){
					var dctdtls = response.doctors[dtlstarind];
					var doct=dctdtls.Doctor;
					$doclisthtml+='<section class="doctorDetails" id="'+dctdtls.Doctor.id+'"><div class="container posi_global">\
						<a href="javascript:void(0)" class="crossButton"></a><h2>About '+dctdtls.Patient.name+'</h2>\
						<div class="box"><h5>Medical School</h5>\
						<h4>'+dctdtls.Doctor.medical_school+'</h4><h5>Residency in '+dctdtls.Doctor.residency+'</h5>\
						<h4>'+dctdtls.Doctor.residency_from+'</h4><h5>Fellowship in '+dctdtls.Doctor.fellowship+'</h5>\
						<h4>'+dctdtls.Doctor.fellowship_from+'</h4><div class="clear10"></div><h4>Follow</h4>\
						<a href="http://twitter.com/@'+dctdtls.Doctor.twitter+'" class="tweeter" target="_blank">Twitter: @'+dctdtls.Doctor.twitter+'</a>\
						<a href="//http://facebook.com/'+dctdtls.Doctor.facebook+'" class="facebook" target="_blank">Facebook/'+dctdtls.Doctor.facebook+'</a>\
						</div><div class="box"><p>'+dctdtls.Doctor.description_one+'</p></div><div class="box"><p>'+dctdtls.Doctor.description_two+'</p></div><div class="clear"></div></div></section>';
				}
			}
			else{
				$doclisthtml='<section class="doctorLoist"><div class="container"></div><div class="clear"></section>';
			}
			
			//console.log(doclisthtml);
			$(".doctListwithdeatils").html($doclisthtml);
			//animation sections
			$('.doctorLoist .doctor:not(.appear)').each(function(i) {
				var $li = $(this);
				setTimeout(function() {
				  $li.addClass('appear');
				}, i*300); // delay 100 ms
			});
			
			$(".doctorLoist .doctor").click(function(e) {
				e.preventDefault();
				if($(this).hasClass('active')){
					$(".doctorLoist .doctor").removeClass('active');
					$(".doctorDetails").slideUp(500);
				} else {
					$(".doctorLoist .doctor").removeClass('active');
					$(this).addClass('active');
					var tab = $(this).attr("data-href");
					$(".doctorDetails").not(tab).css("display", "none");
					$(tab).slideDown(500);
				}
			});
			$('.doctorDetails a.crossButton').click(function(e) {
				e.preventDefault();
				$(".doctorLoist .doctor").removeClass('active');
				$(".doctorDetails").slideUp(500);
			});
			
		}
	});
	}
});

/*
patient details section
*/

var animateduration=3000;
var comeaniduration=3000;
/*$(document).ready(function(){
	$("#addmoredrug").bind('click',addmoredrugtextarea);
	//$("#pdsaved").bind('click',formValidationpd);
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
	
}*/

/*questianaries form load sections*/

function questianariesformload(){
	var fucurl='';
	var isreload=false;
	switch(parseInt(pagefor)){
		case 0:
			//alert("0");
			fucurl=baseurl+'/patientDetails/basicdetails';
		break;
		case 1:
			//alert("1");
			fucurl=baseurl+'/patientDetails/socialdetails';
		break;
		case 2:
			//alert("2");
			fucurl=baseurl+'/patientDetails/illness';
		break;
		case 3:
			//alert("3");
			fucurl=baseurl+'/patientDetails/pasthistory';
		break;
		case 4:
			//alert("4");
			fucurl=baseurl+'/patientDetails/document';
		break;
		case 5:
			//alert("5");
			fucurl=baseurl+'/patientDetails/patientsummery';
		break;
		case 6:
			//alert("5");
			fucurl=baseurl+'/patientDetails/patientconsultant ';
			window.location=fucurl;
			isreload=true;
		break;
		default:
			alert("amni");
		break;
	}
	//console.log(fucurl);
	if(isreload){
		return false;
	}
	$.ajax({
		url:fucurl,
		method:'post',
		dataType:'text',
		data:{},
		success:function(response){
			console.log(response);
			$(".mmm").html(response);
		},
		error:function(response){
			console.log(response);
			
		}
	});
}

//scroll goto top 
function scrollgototop(){
	$('html, body').animate({
			scrollTop:0
		}, 0,function(){
		});
}
var totalReqFields=0;
var totalEntered=0;
//questionaries form field fillup sections
function isAlRequiredFieldEntered(formObj){
	totalReqFields = formObj.find('input,textarea,select').filter('[required]:visible').length;
	totalEntered = formObj.find('input,textarea,select').filter('[required]:visible').filter(function() {return this.value;}).length;
	formObj.find('input,textarea,select').filter('[required]:visible').filter(function() {return (!this.value);}).css("border", "1px solid red");
	console.log("Total entarable field : "+totalReqFields);
	console.log("Total entered field : "+totalEntered);
	frmFieldFillPer();
	return (totalEntered == totalReqFields) ? true : false;
	
}
$(document).on('click','.js-addmoredrug',function(e){
	e.preventDefault();
	var fld = '<div class="drag"><input type="text" name="pddralergyname[]"></div>\
	<div class="name ml20"><input type="text" name="pddralergyrection[]"></div><div class="clear10"></div>';		
	$("#pddrgalergy").append(fld);
});
$(document).on('change','.js-patientdb',function(e){
	var day=$("#pdday").val();
	var month=$("#pdmonth").val();
	var year=$("#pdyear").val();
	var curid = $(e.currentTarget).attr('id');
	if(curid=='pdmonth'){
		//moth
		var totalday=30;
		if($.inArray([1,3,5,7,8,10,12],month)!=-1){
			totalday=31;
		}
		else{
			if(month==2){
				if(isleepyear(year)){
					totalday=29;
				}
				else{
					totalday=28;
				}
			}
			else{
				totalday=30;
			}
		}
		var options='<option value="0">Day</option>';
		for(var i=1;i<=totalday;i++){
			options+='<option value="'+i+'">'+i+'</option>';
		}
		$("#pdday").html(options).val(0);
		//$(e.currentTarget).val(0);
	}
	else{
		if(curid=='pdday'){
			//day
		}
		else{
			//year
			if(month==2){
				var totalday=28;
				if(isleepyear(year)){
					totalday=29;
				}
				
				var options='<option value="0">Day</option>';
				for(var i=1;i<=totalday;i++){
					options+='<option value="'+i+'">'+i+'</option>';
				}
				$("#pdday").html(options).val(0);
			}
		}
	}
	
});
function isleepyear(year){
	if(year!='' && year>0){
		if(year%1000==0){
			if(year%400==0){
				return true;
			}
		}
		else{
			if(year%4==0){
				return true;
			}
		}
	}
	return false;
}

//total field fill up percent
function frmFieldFillPer(){
	var pers=0;
	if(totalReqFields>0){
		pers = ((totalEntered/totalReqFields)*100);
	}
	else{
		if(totalReqFields==totalReqFields){
			pers=100;
		}
	}
	
	$("#completed_per").val(pers);
	//return pers;
}

$(document).on('click','.js-pdfrmsmt',function(e){
	e.preventDefault();
	//form validation
	var frmvalidate=true;
	$.each($(".frmMfields"),function(i,items){
		if($(items).val()=='' || $(items).val()=='0'){
			frmvalidate=false;
		}
	});
	var callfrom = $(e.currentTarget).attr('id');
	// checked all fields are field or not
	var isAllFieldsField = isAlRequiredFieldEntered($("#pddetailsfrm"));
	
	if(!isAllFieldsField){
		return false;
	}
	
	if(frmvalidate){
		scrollgototop();
		
		$.ajax({
			url:baseurl+"/PatientDetails/add",
			method:'post',
			dataType:'json',
			data:$("#pddetailsfrm").serialize(),
			error:function(response){
				console.log(response);
			},
			success:function(response){
				console.log(response);
				if(response.status=='1'){
					$("#pdid").val(response.id);
					if(callfrom=='nextviewsa'){
						if(isAllFieldsField){
							pagefor=parseInt(pagefor)+1;
							questianariesformload();
						}
						else{
							alert("Need to fill all fields");
						}
					}
				}
				else{
				}
			}
		});
	}
	else{
		signUpInErrorMsg($(".pertionalcontainer"),"All * fields are mendatory");
		$('html, body').animate({
			scrollTop: $(".pertionalcontainer").offset().top
		}, 500);
	}
	
});

/* next view coming sections*/
$(document).on('click','.js-nextview',function(e){
	var nxtbtnid=$(e.currentTarget).attr('id');
	console.log(nxtbtnid);
	if(nxtbtnid=='nextviewsa'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".pertionalcontainer").animate({opacity:0,'z-index':9},animateduration,function(){});
			$(".socialActivity").animate({left:devleftPosition,top:devTopPosition,'z-index':99,'position':'absolute'},comeaniduration,function(){
			}).show();
		});
	}
	
	if(nxtbtnid=='nextviewill'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".socialActivity").animate({opacity:0,'z-index':9},animateduration,function(){});
			$(".aboutillness").animate({left:devleftPosition,top:devTopPosition,'z-index':99,'position':'absolute'},comeaniduration,function(){
			}).show();
		});
	}
	
	//pasthistory
	if(nxtbtnid=='nextviewpsthis'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".aboutillness").animate({opacity:0,'z-index':9},animateduration,function(){});
			$(".pasthistory").animate({left:devleftPosition,top:devTopPosition,'z-index':99,'position':'absolute'},comeaniduration,function(){
			}).show();
		});
	}
	//nextviewupddoc
	if(nxtbtnid=='nextviewupddoc'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".pasthistory").animate({opacity:0,'z-index':9},animateduration,function(){});
			$(".doccumentupload").animate({left:devleftPosition,top:devTopPosition,'z-index':99,'position':'absolute'},comeaniduration,function(){
			}).show();
		});
	}
});
//
/* back the pre view sections*/
$(document).on('click','.js-preview',function(e){
	var bcksec = parseInt($(e.currentTarget).attr('sec'));
	
	bcksec=bcksec-1;
	if(bcksec>0){
		pagefor = bcksec;
	}
	else{
		pagefor=0;
	}
	questianariesformload();
	
	/*var bckbtnid=$(e.currentTarget).attr('id');
	if(bckbtnid=='sabackbtn'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".pertionalcontainer").animate({opacity:1,'z-index':99},animateduration,function(){});
			$(".socialActivity").animate({left:devWidth,top:devTopPosition,'z-index':9,'position':'absolute'},comeaniduration,function(){
				$(".socialActivity").hide();
			});
		});
	}
	if(bckbtnid=='illbackbtn'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".socialActivity").animate({opacity:1,'z-index':99},animateduration,function(){});
			$(".aboutillness").animate({left:devWidth,top:devTopPosition,'z-index':9,'position':'absolute',display:'none'},comeaniduration,function(){
				$(".aboutillness").hide();
			});
		});
	}
	//pasthistory
	if(bckbtnid=='psthisbackbtn'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".aboutillness").animate({opacity:1,'z-index':99},animateduration,function(){});
			$(".pasthistory").animate({left:devWidth,top:devTopPosition,'z-index':9,'position':'absolute',display:'none'},comeaniduration,function(){
				$(".pasthistory").hide();
			});
		});
	}
	//docupbackbtn
	if(bckbtnid=='docupbackbtn'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".pasthistory").animate({opacity:1,'z-index':99},animateduration,function(){});
			$(".doccumentupload").animate({left:devWidth,top:devTopPosition,'z-index':9,'position':'absolute',display:'none'},comeaniduration,function(){
				$(".doccumentupload").hide();
			});
		});
	}*/
	
});

/* social activity alcohal type mode add sections*/
$(document).on('click','.js-saalcoholmore',function(e){
	e.preventDefault();
	var fld ='<div class="gender"><input type="text" name="saalcohaltype[]"></div>\
	<div class="quantity ml20"><input type="text" name="saalcohalquantity[]" placeholder="0" class="ml">\
	<select name="saalcoholunit"><option value="in a day">In a Day</option><option value="in a week">In a Week</option>\
	<option value="in a month">In a Month</option><option value="in a year">In a Year</option></select></div><div class="clear10"></div>';
	$("#morealcoholdiv").append(fld);
});
/* drug info more add in social activity*/
$(document).on('click','.js-sadrugmore',function(e){
	e.preventDefault();
	var flds= '<div class="gender"><input type="text" name="samoredrugtype[]"></div>\
	<div class="quantity ml20">\
	<input type="text" name="samoredrugquantity[]" placeholder="0" class="">\
	<select name="samoredrugunit[]"><option value="in a day">In a Day</option><option value="in a week">In a Week</option>\
	<option value="in a month">In a Month</option><option value="in a year">In a Year</option></select>\
	</div><div class="clear10"></div>';
	
	$("#moredrugdiv").append(flds);
});

/* save the social activity*/
$(document).on('click','.js-sasaved',function(e){
	e.preventDefault();
	var callFrom=$(e.currentTarget).attr('id');
	
	// checked all fields are field or not
	var isAllFieldsField = isAlRequiredFieldEntered($("#safrms"));
	
	if(!isAllFieldsField){
		return false;
	}
	scrollgototop();
	
	$.ajax({
		url:baseurl+"/Socialactivities/add",
		method:'post',
		dataType:'json',
		data:$("#safrms").serialize(),
		error:function(response){
			console.log(response);
		},
		success:function(response){
			console.log(response);
			if(response.status=='1'){
				$("#said").val(response.id);
				if(callFrom =='nextviewill'){
					if(isAllFieldsField){
						pagefor=parseInt(pagefor)+1;
						questianariesformload();
					}
				}
			}
			else{
			}
		}
	});
});

/*about the illness section*/
$(document).on('click','.js-illsaved',function(e){
	e.preventDefault();
	//$(".js-loader").css({height:$(window).height,"z-index":9999});
	var clkid = $(e.currentTarget).attr('id');
	
	// checked all fields are field or not
	var isAllFieldsField = isAlRequiredFieldEntered($("#aisfrms"));
	
	if(!isAllFieldsField){
		return false;
	}
	
	scrollgototop();
	
	$.ajax({
		url:baseurl+"/AboutIllnesses/add",
		method:'post',
		dataType:'json',
		data:$("#aisfrms").serialize(),
		error:function(response){
			console.log(response);
		},
		success:function(response){
			console.log(response);
			if(response.status=='1'){
				$("#aisid").val(response.id);
				if(clkid=='nextviewpsthis'){
					//for go to the next form
					if(isAllFieldsField){
						pagefor = parseInt(pagefor)+1;
						questianariesformload();
					}
				}
			}
			else{
			}
		}
	});
});

/* saved past history section*/

$(document).on('click','.js-psthissaved',function(e){
	e.preventDefault();
	var clkid = $(e.currentTarget).attr('id');
	
	// checked all fields are field or not
	var isAllFieldsField = isAlRequiredFieldEntered($("#psthisfrms"));
	
	if(!isAllFieldsField){
		return false;
	}
	
	scrollgototop();
	
	$.ajax({
		url:baseurl+"/PatientPastHistories/add",
		method:'post',
		dataType:'json',
		data:$("#psthisfrms").serialize(),
		error:function(response){
			console.log(response);
		},
		success:function(response){
			console.log(response);
			if(response.status=='1'){
				$("#psthisid").val(response.id);
				if(clkid=='nextviewupddoc'){
					if(isAllFieldsField){
						//for go to the next form
						pagefor = parseInt(pagefor)+1;
						//console.log(pagefor);
						questianariesformload();
					}
				}
			}
			else{
			}
		}
	});
});

/* saved uploaded doc section*/

$(document).on('click','.js-docupssaved',function(e){
	e.preventDefault();
	var clkid = $(e.currentTarget).attr('id');
	
	// checked all fields are field or not
	var isAllFieldsField = isAlRequiredFieldEntered($("#docupfrms"));
	
	if(!isAllFieldsField){
		return false;
	}
	
	scrollgototop();
	
	$.ajax({
		url:baseurl+"/PatientDocuments/add",
		method:'post',
		dataType:'json',
		data:$("#docupfrms").serialize(),
		error:function(response){
			console.log(response);
		},
		success:function(response){
			console.log(response);
			if(response.status=='1'){
				$("#docupid").val(response.id);
				if(clkid=='nextviewxx'){
					//for go to the next form
					if(isAllFieldsField){
						pagefor = parseInt(pagefor)+1;
						questianariesformload();
					}
				}
			}
			else{
			}
		}
	});
});

/*
about illness page script here 
*/
$(document).on('change','.js-illnessdate',function(e){
	var day=$("#startdiagoday").val();
	var month=$("#startdiagomonth").val();
	var year=$("#startdiagoyear").val();
	var curid = $(e.currentTarget).attr('id');
	if(curid=='startdiagomonth'){
		//moth
		var totalday=30;
		if($.inArray([1,3,5,7,8,10,12],month)!=-1){
			totalday=31;
		}
		else{
			if(month==2){
				if(isleepyear(year)){
					totalday=29;
				}
				else{
					totalday=28;
				}
			}
			else{
				totalday=30;
			}
		}
		var options='<option value="0">Day</option>';
		for(var i=1;i<=totalday;i++){
			options+='<option value="'+i+'">'+i+'</option>';
		}
		$("#startdiagoday").html(options).val(0);
		//$(e.currentTarget).val(0);
	}
	else{
		if(curid=='pdday'){
			//day
		}
		else{
			//year
			if(month==2){
				var totalday=28;
				if(isleepyear(year)){
					totalday=29;
				}
				
				var options='<option value="0">Day</option>';
				for(var i=1;i<=totalday;i++){
					options+='<option value="'+i+'">'+i+'</option>';
				}
				$("#startdiagoday").html(options).val(0);
			}
		}
	}
	
});
//js-illnessenddate

$(document).on('change','.js-illnessenddate',function(e){
	var day=$("#enddiagoday").val();
	var month=$("#enddiagomonth").val();
	var year=$("#enddiagoyear").val();
	var curid = $(e.currentTarget).attr('id');
	if(curid=='startdiagomonth'){
		//moth
		var totalday=30;
		if($.inArray([1,3,5,7,8,10,12],month)!=-1){
			totalday=31;
		}
		else{
			if(month==2){
				if(isleepyear(year)){
					totalday=29;
				}
				else{
					totalday=28;
				}
			}
			else{
				totalday=30;
			}
		}
		var options='<option value="0">Day</option>';
		for(var i=1;i<=totalday;i++){
			options+='<option value="'+i+'">'+i+'</option>';
		}
		$("#enddiagoday").html(options).val(0);
		//$(e.currentTarget).val(0);
	}
	else{
		if(curid=='pdday'){
			//day
		}
		else{
			//year
			if(month==2){
				var totalday=28;
				if(isleepyear(year)){
					totalday=29;
				}
				
				var options='<option value="0">Day</option>';
				for(var i=1;i<=totalday;i++){
					options+='<option value="'+i+'">'+i+'</option>';
				}
				$("#enddiagoday").html(options).val(0);
			}
		}
	}
	
});
//more tumor details add section 
$(document).on('click','.js-addtumore',function(e){
	e.preventDefault();
	var mothhtml = $(".month").html();
	var yearhtml = $(".year").html();
	//console.log(mothhtml);
	var fld = '<div class="diagnosis"><input type="text" placeholder="PSA, AFP, CEA, CA19-9, etc " name="data[TumarMarker][name][]"></div>\
	<div class="datesTwo ml20">\
		<select class="month" name="data[TumarMarker][tumormonth][]">'+mothhtml+'</select>\
		<select class="year" name="data[TumarMarker][tumoryear][]">'+yearhtml+'</select></div>\
		<div class="result ml20"><input type="text" placeholder="" name="data[TumarMarker][tumorresult][]"></div><div class="clear10"></div>';
			
	$("#moretumorecontainer").append(fld);
});

//past history of the patient
$(document).on('click','.js-morepastdetails',function(e){
	e.preventDefault();
	var ids = $(e.currentTarget).attr('id');
	var mothhtml = $(".month").html();
	var yearhtml = $(".year").html();
	var htmls ='';
	if(ids=='cancer'){
		htmls = '<div class="clear10">\
		</div><div class="diagnosis">\
		<input type="text" placeholder="Blood Cancer" name="data[CancerDetails][diagnosis_name][]">\
		</div><div class="datesTwo ml20"><select class="month" name="data[CancerDetails][diagnosis_month][]">'+mothhtml+'</select>\
		<select class="year" name="data[CancerDetails][diagnosis_year][]">'+yearhtml+'</select></div>';
		$("#cancermore").append(htmls);
	}
	
	if(ids=="surgeries"){
		//surgeries surgerymorediv
		htmls = '<div class="clear10"></div>\<div class="diagnosis">\
		<input type="text" name="data[SurgeryDetail][surgery_name][]"></div>\
		<div class="datesTwo ml20">\
		<select class="month" name="data[SurgeryDetail][surgery_month][]">'+mothhtml+'</select>\
		<select class="year" name="data[SurgeryDetail][surgery_year][]">'+yearhtml+'</select></div>';
		
		$("#surgerymorediv").append(htmls);
	}
	if(ids == 'hostmoreanc'){
		htmls = '<div class="clear10"></div><div class="diagnosis">\
		<input type="text" name="data[HostpitalDetails][hospitaliz_resone][]"></div><div class="datesTwo ml20">\
		<select class="month" name="data[HostpitalDetails][hospitaliz_month][]">'+mothhtml+'</select>\
		<select class="year" name="data[HostpitalDetails][hospitaliz_year][]">'+yearhtml+'</select></div>\
		<div class="diagnosis ml20">\
		<input type="text" placeholder="0" class="days" name="data[HostpitalDetails][hospitaliz_days]"></div>';
		$("#hostMore").append(htmls);
	}
	if(ids == 'cancerfmanc'){
		htmls = '<div class="clear10"></div><div class="diagnosis">\
		<input type="text" name="data[FamilyCancer][relation_with][]">\
		</div><div class="diagnosis ml20">\
		<input type="text" name="data[FamilyCancer][cancer_type][]"></div>\
		<div class="diagnosis ml20">\
		<input type="text" placeholder="0" class="year" name="data[FamilyCancer][age_of_diagonisis][]"></div>';
		
		$("#familycancermore").append(htmls);
	}
	
});

// patient docunemt
$(document).on('click','.js-addmorebloodtest',function(e){
	//alert("jj");
	var mothhtml = $(".month").html();
	var yearhtml = $(".year").html();
	var htmls = '<div class="gender"><input type="text" placeholder="Hint Text" name="data[BloodTest][test][]"></div>\
	<div class="datesTwo ml20">\
	<select class="month" name="data[BloodTest][month][]">'+mothhtml+'</select>\
	<select class="year" name="data[BloodTest][year][]">'+yearhtml+'</select>\
	</div>\
	<div class="report ml20">\
	<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>\
	<input class="flnamecontain" type="hidden" name="data[BloodTest][flname][]"/>\
	<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" >Not available</label>\
	<input type="hidden" class="chkvalue" name="data[BloodTest][flispresent][]" value="0" />\
	</div><div class="clear10"></div>';
	//<div class="w300 ml20"><input type="text" placeholder="What was the result?"></div>
	$(".blodtestingmore").append(htmls);
});
//image upload parend 
var imageuploadParent='';
//doc uploading sections
$(document).on('click','.js-imageupload',function(e){
	//
	$("#docfile").trigger('click');
	imageuploadParent = $(e.currentTarget).parent(".report");
});
$(document).on('change','#docfile',function(e){
	//alert("kk");
	//now upload the selected image 
	var frmData = new FormData();
	frmData.append('docfile',$(e.currentTarget).prop('files')[0]);
	$.ajax({
		url:baseurl+"/PatientDocuments/imageupload",
		method:'post',
		dataType:'json',
		data:frmData,
		processData: false, // important
		contentType: false, // important
		error:function(response){
			console.log(response);
		},
		success:function(response){
			console.log(response);
			if(response.status=='1'){
				$(e.currentTarget).val("");
				$($(imageuploadParent).find(".js-imageupload")).remove();
				$($(imageuploadParent).find(".noreport")).remove();
				
				$($(imageuploadParent).find(".flnamecontain")).val(response.filename);
				var htn ='<span class="reportCard">'+response.filename+'</span><a href="javascript:void(0)" class="reportCardDel js-removeDoct" value="'+response.filename+'">X</a>';
				$(imageuploadParent).prepend(htn);
				if($(imageuploadParent).find(".blue").length>0){
					$($(imageuploadParent).find(".blue")).remove();
					$(imageuploadParent).prepend('<label class="blue">Report</label>');
				}
				if($(imageuploadParent).find(".chkvalue").length>0){
					$($(imageuploadParent).find(".chkvalue")).val(0);
				}
				imageuploadParent='';
			}
			else{
			}
		}
	});
});

//remove the uploaded file 
$(document).on('click','.js-removeDoct',function(e){
	var filename = $(e.currentTarget).attr('value');
	imageuploadParent = $(e.currentTarget).parent(".report");
	if(filename!=''){
		var frmData = new FormData();
		frmData.append('docfile',filename);
		$.ajax({
			url:baseurl+"/PatientDocuments/imageuploadremove",
			method:'post',
			dataType:'json',
			data:frmData,
			processData: false, // important
			contentType: false, // important
			error:function(response){
				console.log(response);
			},
			success:function(response){
				console.log(response);
				if(response.status=='1'){
					$(e.currentTarget).remove();
					$($(imageuploadParent).find(".reportCard")).remove();
					$($(imageuploadParent).find(".flnamecontain")).val("");
					
					var html = '<a href="javascript:void(0)" class="uploadReport js-imageupload">Upload report</a>\
					<label class="noreport ml14"><input type="checkbox" class="js-docchk" name="checkbos" >Not available</label>\
					</div>';
					$(imageuploadParent).prepend(html);
					if($(imageuploadParent).find(".blue").length>0){
						$($(imageuploadParent).find(".blue")).remove();
						$(imageuploadParent).prepend('<label class="blue">Report</label>');
					}
					if($(imageuploadParent).find(".chkvalue").length>0){
						$($(imageuploadParent).find(".chkvalue")).val(0);
					}
					imageuploadParent='';
				}
				else{
					//NOTHING DONE FOR HERE
				}
			}
		});
	}
	else{
		
	}
});

//document not present chk click
$(document).on('click','.js-docchk',function(e){
	imageuploadParent =  $(e.currentTarget).parents(".report");
	if($(e.currentTarget).is(":checked")){
		if($(imageuploadParent).find(".chkvalue").length>0){
			$($(imageuploadParent).find(".chkvalue")).val("1");
		}
	}
	else{
		if($(imageuploadParent).find(".chkvalue").length>0){
			$($(imageuploadParent).find(".chkvalue")).val("0");
		}
	}
	imageuploadParent='';
});

//print the patient all data 
$(document).on('click','.js-printdocs',function(e){
	//alert("kk");
	var restorepage = document.body.innerHTML;
	var printcontent = $(".questionPart").html();
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
});

$(document).on('click','.js-patientsummetybtn',function(e){
	
	$.ajax({
		url:baseurl+"/PatientDetails/detailsdone",
		method:'post',
		dataType:'json',
		data:'',
		error:function(response){
			console.log(response);
		},
		success:function(response){
			console.log(response);
			if(response.status=='1'){
				//for go to the next form
				pagefor = parseInt(pagefor)+1;
				questianariesformload();
			}
			else{
			}
		}
	});
});

//doctore section scripting
$(document).on('click','.js-doccasedetail',function(e){
	e.preventDefault();
	var caseid = $(e.currentTarget).attr('vals');
	window.location=baseurl+"/doctors/casedetail/"+caseid;
});

$(document).on('click','.js-opinionpanel',function(e){
	var immparent  = $(e.currentTarget).parent(".sendOpinionBox");
	$(immparent).hide();
});


$(document).on('click','.js-doctoptions',function(e){
	var vals = $(e.currentTarget).attr('vals');
	var immparent = $(e.currentTarget).parents("ul");
	if(parseInt(vals)==4){
		//opinion click
		$(".sendOpinionBox").show();
	}
	else{
		if($(immparent).find(".current").length>0){
			$($(immparent).find(".current")).addClass("js-doctoptions").removeClass("current");
		}
		$(e.currentTarget).removeClass("js-doctoptions").addClass("current");
		viewfor=parseInt(vals);
		doctorcaseviewload();
	}
});

function doctorcaseviewload(){
	//console.log(viewfor);
	var fucurl='';
	var isreload=false;
	switch(parseInt(viewfor)){
		case 1:
			//alert("1");
			fucurl=baseurl+'/doctors/patientsummery';
		break;
		case 2:
			//alert("2");
			fucurl=baseurl+'/doctors/communication';
		break;
		case 3:
			//alert("3");
			fucurl=baseurl+'/doctors/refer';
		break;
		default:
			alert("amni doct");
		break;
	}
	
	if(isreload){
		return false;
	}
	console.log(fucurl);
	//make a form data 
	var frmdata = new FormData();
	frmdata.append('caseid',doctcaseid);	
	
	$.ajax({
		url:fucurl,
		method:'post',
		dataType:'text',
		data:frmdata,
		processData: false, // important
		contentType: false, // important
		success:function(response){
			console.log(response);
			$(".dymamichtmldata").html(response);
		},
		error:function(response){
			console.log(response);
		}
	});
}

//doctore communication 
$(document).on('focus','.js-communicationcomment',function(e){
	var txtval = $(e.currentTarget).val();
	//alert(txtval);
	if(txtval=="Type your comment"){
		$(e.currentTarget).val('');
	}
	
});
$(document).on('focusout','.js-communicationcomment',function(e){
	var txtval = $(e.currentTarget).val();
	//alert(txtval);
	if(txtval==""){
		$(e.currentTarget).val('Type your comment');
	}
	
});

//doctore post comment
$(document).on('click','.js-doctCommentPost',function(e){
	e.preventDefault();
	var comm = $("#communicationcomment").val();
	var posteddiv = $(e.currentTarget).parents('.comentpostsection');
	
	var postedname='';
	var posterimage='';
	if($(posteddiv).find(".picCont").length>0){
		posterimage = $($(posteddiv).find(".picCont")).html();
	}
	/*if($(posteddiv).find(".textCont h3").length>0){
		postedname = $($(posteddiv).find(".textCont h3")).html();
	}*/
	postedname=$("#dctnameid").html();
	//alert(comm);
	if(comm=="Type your comment" || comm==""){
		return false;
	}
	else{
		$.ajax({
		url:baseurl+"/CaseCommunications/add",
		method:'post',
		dataType:'json',
		data:$("#doctcomment").serialize(),
		//processData: false, // important
		//contentType: false, // important
		success:function(response){
			console.log(response);
			if(parseInt(response.status)==1){
				$(".last").removeClass("last");
				
				var hmlt = '<div class="talk last"><div class="picCont">'+posterimage+'</div>\
				<div class="textCont"><h3>'+postedname+'<span>'+response.postdate+'</span></h3>\
				<p>'+comm+'</p></div><div class="clear"></div></div>';
				
				$(".comentpostsection").before(hmlt);
				posteddiv='';
				$("#communicationcomment").val('Type your comment');
			}
			else{
				console.log('not saved the data');
			}
		},
		error:function(response){
			console.log(response);
		}
	});
	}
});
//patient post comments
$(document).on('click','.js-doctCommentPost',function(e){
	e.preventDefault();
	var comm = $("#pcommunicationcomment").val();
	var posteddiv = $(e.currentTarget).parents('.comentpostsection');
	
	var postedname='';
	var posterimage='';
	if($(posteddiv).find(".picCont").length>0){
		posterimage = $($(posteddiv).find(".picCont")).html();
	}
	
	postedname=$("#ptnnameid").html();
	//alert(comm);
	if(comm=="Type your comment" || comm==""){
		return false;
	}
	else{
		$.ajax({
		url:baseurl+"/CaseCommunications/add",
		method:'post',
		dataType:'json',
		data:$("#patientcomment").serialize(),
		//processData: false, // important
		//contentType: false, // important
		success:function(response){
			console.log(response);
			if(parseInt(response.status)==1){
				$(".last").removeClass("last");
				
				var hmlt = '<div class="talk last"><div class="picCont">'+posterimage+'</div>\
				<div class="textCont"><h3>'+postedname+'<span>'+response.postdate+'</span></h3>\
				<p>'+comm+'</p></div><div class="clear"></div></div>';
				
				$(".comentpostsection").before(hmlt);
				posteddiv='';
				$("#pcommunicationcomment").val('Type your comment');
			}
			else{
				console.log('not saved the data');
			}
		},
		error:function(response){
			console.log(response);
		}
	});
	}
});
//case opinion post sections

$(document).on('focus','.js-opinioncomments',function(e){
	var txtval = $(e.currentTarget).val();
	//alert(txtval);
	if(txtval=="Type Something"){
		$(e.currentTarget).val('');
	}
	
});
$(document).on('focusout','.js-opinioncomments',function(e){
	var txtval = $(e.currentTarget).val();
	//alert(txtval);
	if(txtval==""){
		$(e.currentTarget).val('Type Something');
	}
	
});

//document attached
$(document).on('click','.js-attachedopinionfile',function(e){
	e.preventDefault();
	alert("hh");
	$(".js-opiniondoc").trigger("click");
});

$(document).on('change','.js-opiniondoc',function(e){
	var frmData = new FormData();
	frmData.append('docfile',$(e.currentTarget).prop('files')[0]);
	$.ajax({
		url:baseurl+"/CaseOpinions/imageupload",
		method:'post',
		dataType:'json',
		data:frmData,
		processData: false, // important
		contentType: false, // important
		error:function(response){
			console.log(response);
		},
		success:function(response){
			console.log(response);
			if(parseInt(response.status)==1){
				$("#attachementname").val(response.attachementname);
			}
			else{
			}
		}
	});
});

$(document).on('click','.js-caseopinionpost',function(e){
	e.preventDefault();
	$.ajax({
		url:baseurl+"/CaseOpinions/add",
		method:'post',
		dataType:'json',
		data:$("#caseopinionfrm").serialize(),
		//processData: false, // important
		//contentType: false, // important
		success:function(response){
			console.log(response);
			if(parseInt(response.status)==1){
				
				$(".js-opinionpanel").trigger("click");
			}
			else{
				console.log('not saved the data');
			}
		},
		error:function(response){
			console.log(response);
		}
	});
});

//filter doctor case with status 
$(document).on('click','.js-casefilter',function(e){
	e.preventDefault();
	var fltfor = $(e.currentTarget).attr("val");
	//call ajax section
	$.ajax({
		url:baseurl+"/Doctors/dashboardfilter",
		method:'post',
		dataType:'json',
		data:{filterfor:fltfor},
		success:function(response){
			console.log(response);
			var gencalss = "man";
			$(".leftPart").empty();
			
			if(parseInt(response.status)==1){
				for(var i=0; i<response.doctcases.length;i++){
					var doccase = response.doctcases[i];
					if(doccase.gender=="femail"){
						gencalss="woman";
					}
					var fhhl = '<div class="patientBox"><a href="javascript:void(0)" class="js-doccasedetail" vals="'+doccase.caseid+'">\
					<div class="whitePart">\
					<h2 class="'+gencalss+'">'+doccase.name+'</h2>\
					<p class="status"><span class="awatingGreen">'+doccase.status+'</span></p>\
					<p class="blueText fleft">'+doccase.diagonisis+'</p>\
					<p class="blueText fright">Case #'+doccase.caseid+'</p>\
					<div class="clear"></div>\
					<p class="dueDate">Due Date</p>\
					<h3>'+doccase.duedate+'</h3>\
					</div>\
					</a></div>';
					
					$(".leftPart").append(fhhl);
				}
			}
		},
		error:function(response){
			console.log(response);
		}
	});
});

//doctor case search sections
$(document).on('click','.js-searchcases',function(e){
	e.preventDefault();
	var serachtxt = $("#doccasesearch").val();
	if(serachtxt!=''){
		//call ajax section
		$.ajax({
			url:baseurl+"/Doctors/dashboardsearch",
			method:'post',
			dataType:'json',
			data:{serachtxt:serachtxt},
			success:function(response){
				console.log(response);
				var gencalss = "man";
				$(".leftPart").empty();
				
				if(parseInt(response.status)==1){
					for(var i=0; i<response.doctcases.length;i++){
						var doccase = response.doctcases[i];
						if(doccase.gender=="femail"){
							gencalss="woman";
						}
						var fhhl = '<div class="patientBox"><a href="javascript:void(0)" class="js-doccasedetail" vals="'+doccase.caseid+'">\
						<div class="whitePart">\
						<h2 class="'+gencalss+'">'+doccase.name+'</h2>\
						<p class="status"><span class="awatingGreen">'+doccase.status+'</span></p>\
						<p class="blueText fleft">'+doccase.diagonisis+'</p>\
						<p class="blueText fright">Case #'+doccase.caseid+'</p>\
						<div class="clear"></div>\
						<p class="dueDate">Due Date</p>\
						<h3>'+doccase.duedate+'</h3>\
						</div>\
						</a></div>';
						
						$(".leftPart").append(fhhl);
					}
				}
			},
			error:function(response){
				console.log(response);
			}
		});
	}
});