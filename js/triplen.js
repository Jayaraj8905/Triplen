$(document).ready(function(){
	//navigation functionality
	$('.navToggler').click(function(){
		$('.nav').slideToggle();
	})
	$('.nav ul li a').click(function(){
		$('.nav ul ul:visible').not($(this).siblings('ul')).slideToggle();
		$(this).siblings('ul').slideToggle();
	})

	setInterval(function(){ 
		var currItem = $('.pageBanner img.active');
		var nextItem = $('.pageBanner img.active').next();
		if(nextItem.length == 0)
			nextItem = $('.pageBanner img').first();
		currItem.fadeOut(function(){
			$(this).removeClass('active');
			nextItem.fadeIn(function(){
				nextItem.addClass('active');
			})
		})
	}, 3000);

	//validation on change
	$('#enquiryForm [data-validityType]').blur(function(){
		validateEle($(this));
	});

	//validation on submission
	$('#enquiryForm').submit(function(e){
		var validityType;
		var isValid = true;
		$(this).find('[data-validityType]').each(function(){
			isValid = validateEle($(this)) && isValid;
		});
		if(!isValid)
			e.preventDefault();
	})
});

//validate the element based on the attribute an add necessary ui changes
function validateEle(obj){
	var isValidEle = true;
	var val = '';
	var pattern;
	if(obj.is('input') || obj.is('textarea')){
		validityType = obj.attr('data-validityType');
		var compulsory = obj.attr('data-noncompulsory') == undefined;//check if it is a non compulsory element
		val = $.trim(obj.val());
		if(val == '' && compulsory) isValidEle = false;
		else if(val == '' && !compulsory) isValidEle = true;
		else if(validityType == 'email'){
			pattern = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;//validation pattern for email
			isValidEle = checkPattern(pattern, val);
		}
		else if(validityType == 'alphabet'){
			pattern = /^[A-Za-z .'-]+$/;//validation pattern for alphabet
			isValidEle = checkPattern(pattern, val);
		}
		else if(validityType == 'mobile'){
			pattern = /^[0]?[789]\d{9}$/;//validation pattern for phone number
			if(val.substr(0,3) == '+91') val = val.substr(3);//if it has +91 just validate the remaining field
			isValidEle = checkPattern(pattern, val);
		}
	}
	if(isValidEle){
		obj.closest('.form-group').removeClass('has-error');
	}
	else
		obj.closest('.form-group').addClass('has-error');
	return isValidEle;
}

function checkPattern(pattern, val){
	return pattern.test(val);
}