function hide_error(idd){
	$('#'+idd+'_error').hide();
	$('#'+idd).removeClass('border_error');
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validate_login(){
	var email = $.trim($('#email').val());
	var pass = $.trim($('#pass').val());
	var error_flag = false;

	if(!validateEmail(email)){
		$('#email').addClass('border_error');
		$('#email_error').show();
		$('#email_error').html('Please enter a valid email id');
		error_flag = true; 
	}
	if(pass == ''){
		$('#pass').addClass('border_error');
		$('#pass_error').show();
		$('#pass_error').html('Please enter a password');
		error_flag = true; 
	}
	if(error_flag)
		return false;
	else{
			$('#login_button').hide();
			$('#loading').show();
			$.ajax({
			  method: "POST",
			  url: $('#current_url').val()+'/login/',
			  data: { n_email: email, n_pass: pass }
			})
			  .done(function( response ) {
			  	//alert(response);
			  		if(response == 'not_ok'){
					$('#status_msg').show();
			    	$('#status_msg').html('Provided email id and password dose not match.');
			    	$('#login_button').show();
					$('#loading').hide();
			    	return false;
			    }else if(response == 'ok'){
			    	window.location = $('#current_url').val()+'/login/login_success';
			    }else
			    	alert ('There is some issue with network please try after some time');
			  });
	}

}