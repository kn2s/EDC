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
	console.log(classes+" "+selcat);
	if(classes.length>1 && classes[1]=='active'){
		alert("sameclass call");
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
