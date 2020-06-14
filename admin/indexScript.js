$(document).ready(function() {

    $('#forma').on("submit", function(e) {

        $.ajax({
            dataType: 'json',
            crossDomain: true,
            data: {
                ime: document.getElementById("ime").value,
                lozinka: document.getElementById("lozinka").value
            },
            type: 'GET',
            url: 'check_password.php'
        }).done(function(data) {
            
            document.getElementById("form_div").hidden = true;
            document.getElementById("buttons_div").hidden = false;
            
        }).fail(function() {
             alert("Pogrešna šifra ili korisničko ime. Molimo Vas unesite ispravne podatke!");
        });
        e.preventDefault();

    });

    $("#otkazi_dugme").on('click', function(e) {
        e.preventDefault();
        document.getElementById("ime").value = "";
        document.getElementById("lozinka").value = "";
    });
});