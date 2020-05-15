$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Molimo Vas unesite Vase ime'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Molimo Vas unesite Vase prezime'
                    }
                }
            },
			 
			user_password: {
                validators: {
                     stringLength: {
                        min: 1,
                    },
                    notEmpty: {
                        message: 'Molimo Vas izaberite broj mesta'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Molimo Vas unesite Vasu email adresu'
                    },
                    emailAddress: {
                        message: 'Molimo Vas unesite validnu e-mail adresu'
                    }
                }
            },
            contact_no: {
                validators: {
                  stringLength: {
                        min: 0, 
                        max: 12,
                    notEmpty: {
                        message: 'Molimo Vas unesite Vas kontakt telefon'
                     }
                }
            },
			 department: {
                validators: {
                    notEmpty: {
                        message: 'Molimo Vas izaberite Vas resotran'
                    }
                }
            },
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            
             // Use Ajax to submit form data
             $.post($form.attr('action'), $form.serialize(), function(result) {
             console.log(result);
            }, 'json');
           
        });
        let def = window.location.href;
        let separator = '='
        $('#department option:first-child').text(
            def.substr(def.lastIndexOf(separator)+1,def.length-def.lastIndexOf(separator)+1)
            );
});
