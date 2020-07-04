$(document).ready(function() {
    let def = window.location.href;
    if (def.includes("?name=")) {
        let separator = '=';
        let rest_nameDash = def.substr(def.lastIndexOf(separator) + 1, def.length - def.lastIndexOf(separator) + 1);
        let nameComp = rest_nameDash.split('-');
        let trueName = nameComp.join(' ');
        //console.log(trueName);
        //$('#department option:first-child').text(decodeURI(trueName));
        var select = document.getElementById("department");
        var option = document.createElement("option");
        option.innerHTML = (decodeURI(trueName));
        option.value = (decodeURI(trueName));
        select.appendChild(option);
    } else {
      $.ajax({
          dataType: 'text',
          url: 'restaurants.php'
      }).done(function(data) {
          var received = data.split('\n');
          if (received[0] != "0 results") {
            var restorani = document.getElementById("department");
            var option = document.createElement("option");
            option.innerHTML = "-";
            option.value = "-";
            restorani.appendChild(option);
            var totalRows = received.length;
            for (var r = 0; r < totalRows - 1; r++) {
              var option = document.createElement("option");
              option.innerHTML = received[r];
              option.value = received[r];
              restorani.appendChild(option);
            }
          } else {
              alert("Na žalost na raspolaganju nema takvih restorana. Da li želite nesto drugo u  ponudi?");
              var error = document.getElementById("empty");
              error.hidden = false;
              error.innerText = "Da li želite nesto drugo u  ponudi?";
          }
      }).fail(function(data) {
          console.log("Greska");
      });
    }

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
            date:{
                validators: {
                    notEmpty:{
                        message: 'Molimo Vas izaberite datum'
                    }
                }
            },
            time:{
                validators:{
                    notEmpty:{
                        message: 'Molimo vas izaberite vreme'
                    }
                }
            },
            contact_no: {
                validators: {
                  stringLength: {
                        min: 10,
                        max: 15,
                        message:  'Molimo Vas unesite Vas kontakt telefon',
                    notEmpty: {
                        message: 'Molimo Vas unesite Vas kontakt telefon'
                     }
                }
            }
        },
			 department: {
                validators: {
                    stringLength:{
                        min: 2,
                        message: "Molimo Vas izaberite Vas restoran",
                    notEmpty: {
                        message: 'Molimo Vas izaberite Vas restoran'
                        }
                    }
                    }

            },

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
});
