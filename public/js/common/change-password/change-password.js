$( function() {
	$.validator.addMethod("pwcheckallowedchars", function (value) {
        return /^(?=\D*\d)(?=[^a-z]*[a-z])[0-9a-z]+$/i.test(value)
    }, "The password must contain at least one character");

    jQuery.validator.addMethod("pwcheckallowedchars",
    function(value, element, param) {
        if (this.optional(element)) {
            return true;
        }else if (!/[a-zA-Z]/.test(value)) {
            return false;
        } else if (!/[0-9]/.test(value)) {
            return false;
        }

        return true;
    },
    "The password must contain at least one character and digit");
	
	$('#ChangePasswordForm').validate({
		rules: {
			'current_password':{
				required:true,
				minlength:8,
			},
			'new_password':{
				required:true,
				minlength:8,
				pwcheckallowedchars: true
			},
			'new_confirm_password':{
				required:true,
				minlength:8,
				equalTo:"#NewPassword"
			}
	    }
    });
});