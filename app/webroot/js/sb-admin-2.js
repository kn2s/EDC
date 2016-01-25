$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

//work schedult holiday setActive
$(document).on('click','.js-holidaychange',function(e){
	//alert(baseUrl);
	e.preventDefault();
	var partw=$(e.currentTarget);
	var dayid = $(e.currentTarget).attr('scdlid');
	var curstatus = $(e.currentTarget).attr('cursts');
	var partr = $(e.currentTarget).parents("tr");
	var dt = $($(partr).children("td")[0]).html();
	//now cal ajax
	$.ajax({
		url:baseUrl+"/WorkSchedules/makeholidayornot",
		method:"post",
		dataType:"json",
		data:{dayid:dayid,curstatus:curstatus,dt:dt},
		success:function(response){
			console.log(response);
			if(parseInt(response.status)==1){
				if(parseInt(curstatus)==1){
					curstatus='0';
					$(partw).html("No");
				}
				else{
					curstatus='1';
					$(partw).html("Yes");
				}
				
				$(partw).attr("cursts",curstatus);
			}
		},
		error:function(response){
			console.log(response);
		}
	});
});

//doctor hiliday sections

//doctor schedule day filter
$(document).on('change','.js_daychange',function(e){
	window.location =baseUrl+"/ScheduleDoctors/index/"+$(e.currentTarget).val();
});

//doctor case filter doctor wise
$(document).on('change','.js_doctchange',function(e){
	var ids = $(e.currentTarget).val();
	if(ids>0){
		window.location =baseUrl+"/DoctorCases/index/"+ids;
	}
	else{
		window.location =baseUrl+"/DoctorCases";
	}
});

//doctore add secction
var totalReqFields=0;
var totalEntered=0;
//questionaries form field fillup sections
function isAlRequiredFieldEntered(formObj){
	totalReqFields = formObj.find('input,textarea,select').filter('[required]:visible').length;
	totalEntered = formObj.find('input,textarea,select').filter('[required]:visible').filter(function() {return this.value;}).length;
	formObj.find('input,textarea,select').filter('[required]:visible').filter(function() {return (!this.value);}).css("border", "1px solid red");
	console.log("Total entarable field : "+totalReqFields);
	console.log("Total entered field : "+totalEntered);
	return (totalEntered == totalReqFields) ? true : false;
	
}

$(document).on('click','.js-doctadd',function(e){
	e.preventDefault();
	var frmstatue = isAlRequiredFieldEntered($("#crtdoctfrm"));
	if(frmstatue){
		var fls = $("#doctimage").val();
		fls="not mendatory";
		if(fls!=''){
			$("#crtdoctfrm").submit();
		}
		else{
			$("#doctimage").css("border", "1px solid red");
			alert("Doctor Image mendatory");
		}
	}
	else{
		alert("All fields are mendatory");
	}
});
$(document).on('click','.js-doctedit',function(e){
	e.preventDefault();
	var frmstatue = isAlRequiredFieldEntered($("#docteditfrm"));
	if(frmstatue){
		$("#docteditfrm").submit();
	}
	else{
		alert("All fields are mendatory");
	}
});

$(document).on('click','.js-doctpasswordchange',function(e){
	e.preventDefault();
	var frmstatue = isAlRequiredFieldEntered($("#passchange"));
	if(frmstatue){
		$("#passchange").submit();
	}
	else{
		alert("Password fields are mendatory");
	}
});

$(document).on('click','.btn-back',function(e){
	e.preventDefault();
	window.location=window.history.back("-1");
});