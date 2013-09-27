var FormValidation = function () {

    // Validate editor
     var handleValidation3 = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation


            var form3 = $('#form_sample_3');
            var error2 = $('.alert-error', form3);
           // var success2 = $('.alert-success', form3);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit
            form3.on('submit', function() {
                for(var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    category: {
                        required: true
                    },
                    subcategory: {
                        required: true
                    },
                    codename: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    occupation: {
                        minlength: 5,
                    },
                    education: {
                        required: true
                    },
                    amount: {
                        required: true
                    },
                    prices : {
						digits: true
					},
                    experience: {
                        required: true
                    },
                    date_end: {
                        required: true
                    },
                    ability: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    service: {
                        required: true,
                        minlength: 2
                    },
                    service: {
                        required: true,
                        minlength: 2
                    },
                    detail: {
                        required: true
                    },
                    editor2: {
                        required: true
                    },
                     userfile: {
	                    required: true
	                },
	                file: {
	                    required: true
	                }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    membership: {
                        required: "Please select a Membership type"
                    },
                    service: {
                        required: "Please select  at least 2 types of Service",
                        minlength: jQuery.format("Please select  at least {0} types of Service")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "education") { // for chosen elements, need to insert the error after the chosen container
                        error.insertAfter("#form_2_education_chzn");
                    } else if (element.attr("name") == "type") { // for uniform radio buttons, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_membership_error");
                    } else if (element.attr("name") == "detail" || element.attr("name") == "editor2") { // for wysiwyg editors
                        error.insertAfter($(element.attr('data-error-container')));
	                } else if (element.attr("name") == "ability") { // for wysiwyg editors
                    error.insertAfter($(element.attr('data-error-container2')));
                    } else if (element.attr("name") == "service") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_service_error");
                    } else if (element.attr("name") == "userfile") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#img_error");
                    } else if (element.attr("name") == "file") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#file_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    //success2.hide();
                    error2.show();
                    App.scrollTo(error2, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.help-inline').removeClass('ok'); // display OK icon
                    $(element)
                        .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "service" || label.attr("for") == "membership") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.control-group').removeClass('error').addClass('success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                        .addClass('valid').addClass('help-inline ') // mark the current input as valid and display OK icon
                        .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success2.show();
                    error2.hide();
                }

            });

            $('#form_2_select2').select2({
                placeholder: "Select an Option",
                allowClear: true
            });

            //apply validation on wysiwyg editors change, this only needed for chosen dropdown integration.
            $('.wysihtml5, .ckeditor', form3).change(function () {
                alert(1);
                form3.validate().element($(this)); //revalidate the wysiwyg editors and show error or success message for the input
            });

            //apply validation on chosen dropdown value change, this only needed for chosen dropdown integration.
            $('.chosen, .chosen-with-diselect', form3).change(function () {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2', form3).change(function () {
                form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
    }

    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {

            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }


    return {
        //main function to initiate the module
        init: function () {

            handleWysihtml5();
            handleValidation3();

        }

    };

}();