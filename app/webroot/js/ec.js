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


