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
