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
				signUpInErrorMsg($(".signIn"), response.message);
				$('html, body').animate({
					scrollTop: $(".signIn").offset().top
				}, 500);
			}
		}
	});	
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
$(document).on('click','.js-pdfrmsmt',function(e){
	e.preventDefault();
	//form validation
	var frmvalidate=true;
	$.each($(".frmMfields"),function(i,items){
		if($(items).val()=='' || $(items).val()=='0'){
			frmvalidate=false;
		}
	});
	if(frmvalidate){
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
			});
		});
	}
});
//
/* back the pre view sections*/
$(document).on('click','.js-prevdivview',function(e){
	var nxtbtnid=$(e.currentTarget).attr('id');
	if(nxtbtnid=='sabackbtn'){
		$('html, body').animate({
			scrollTop:0
		}, 0,function(){
			$(".pertionalcontainer").animate({opacity:1,'z-index':99},animateduration,function(){});
			$(".socialActivity").animate({left:devWidth,top:devTopPosition,'z-index':9,'position':'absolute'},comeaniduration,function(){
			});
		});
	}
});

/* social activity alcohal type mode add sections*/
$(document).on('click','.js-saalcoholmore',function(e){
	e.preventDefault();
	var fld ='<div class="gender"><input type="text" name="saalcohaltype[]"></div>\
	<div class="quantity ml20"><input type="text" name="saalcohalquantity[]" placeholder="0" class="ml">\
	<select name="saalcoholunit"><option value="0">In a Day</option></select></div><div class="clear10"></div>';
	$("#morealcoholdiv").append(fld);
});
/* drug info more add in social activity*/
$(document).on('click','.js-sadrugmore',function(e){
	e.preventDefault();
	var flds= '<div class="gender"><input type="text" name="samoredrugtype[]"></div>\
	<div class="quantity ml20">\
	<input type="text" name="samoredrugquantity[]" placeholder="0" class="ml">\
	<select name="samoredrugunit[]"><option value="0">In a Day</option></select>\
	</div><div class="clear10"></div>';
	
	$("#moredrugdiv").append(flds);
});
/* save the social activity*/
$(document).on('click','.js-sasaved',function(e){
	e.preventDefault();
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
			}
			else{
			}
		}
	});
});
/*
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
	}
}

function formvalidationsa(e){
	e.preventDefault();
	alert("form post pending working");
}
function gotoxxx(e){
	alert("pending working");
}*/