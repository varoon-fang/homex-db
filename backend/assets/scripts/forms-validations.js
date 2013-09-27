var Validations = function () {

	var handleForm = function() {

		var form2 = $('.validation-form');

		$('.validation-form').validate({

	            errorElement: 'label', //default input error message container
	            errorClass: 'help-inline', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                title: {
	                    required: true
	                },
	                category: {
	                    required: true
	                },
	                type: {
	                    required: true
	                },
	                education: {
	                    required: true
	                },
	                experience: {
	                    required: true
	                },
	                name: {
	                 	minlength: 2,
	                    required: true
					},
					email : {
	                 	minlength: 5,
	                 	email: true,
	                    required: true
					},
					price : {
						digits: true
					},
					amount: {
	                 	required: true
					},
					date_end: {
	                 	required: true
					},
					codename: {
	                 	minlength: 2,
	                    required: true
					},
					detail: {
	                 	minlength: 2,
	                    required: true
					},
					editor2: {
	                    required: true
					},
	                password: {
	                	minlength: 5,
	                    required: true
	                },
	                c_pass: {
	                	minlength: 5,
	                    required: true,
                        equalTo: "#submit_form_password"
	                },
	                remember: {
	                    required: false
	                },
	                userfile: {
	                    required: true
	                },
	                file: {
	                    required: true
	                }
	            },

	            messages: {
	                title: {
	                    required: "This is required."
	                },
	                category: {
	                    required: "This is required."
	                },
	                type: {
	                    required: "This is required."
	                },
	                userfile: {
	                    required: "This is required."
	                },
	                file: {
	                    required: "This is required."
	                },
	                education: {
	                    required: "This is required."
	                },
	                experience: {
		              	required: "This is reauired."
	                },
	                email: {
		              	required: "This is reauired."
	                },
	                amount: {
	                    required: "This is required."
	                },
	                date_end: {
	                    required: "This is required."
	                },
	                name: {
	                    required: "This is required.",
	                    minlength: jQuery.format("Please select  at least {0} types of Service")
	                },
	                codename: {
	                    required: "This is required.",
	                    minlength: jQuery.format("Please select  at least {0} types of Service")
	                },
	                detail: {
	                    required: "This is required.",
	                    minlength: jQuery.format("Please select  at least {0} types of Service")
	                },
	                password: {
	                    required: "This is required.",
	                    minlength: jQuery.format("Please select  at least {0} types of Service")
	                },
	                c_pass: {
	                    required: "This is required.",
	                    minlength: jQuery.format("Please select  at least {0} types of Service")
	                },

	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit
	                $('.alert-error', $('.validation-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.control-group').addClass('error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.control-group').removeClass('error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	            	if (element.attr("name") == "type") { // for uniform radio buttons, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_membership_error");
                    } else if (element.attr("name") == "editor1" || element.attr("name") == "editor2") { // for wysiwyg editors
                        error.addClass("no-left-padding").insertAfter($(element.attr('#editor2_error')));
                    } else if (element.attr("name") == "service") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_service_error");
                    } else if (element.attr("name") == "userfile") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#img_error");
                    } else if (element.attr("name") == "file") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#file_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }

	                //error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {

	                form.submit();
	                for(var instanceName in CKEDITOR.instances) {
	                    CKEDITOR.instances[instanceName].updateElement();
	                }
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.validation-form').validate().form()) {
	                    $('.validation-form').submit();
	                }
	                return false;
	            }
	        });

			 //apply validation on wysiwyg editors change, this only needed for chosen dropdown integration.
            $('.wysihtml5, .ckeditor', form2).change(function () {
                alert(1);
                form2.validate().element($(this)); //revalidate the wysiwyg editors and show error or success message for the input
            });
	}


    return {
        //main function to initiate the module
        init: function () {

            handleForm();

        }

    };

}();