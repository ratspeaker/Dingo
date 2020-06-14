  $(document).ready(function() {


     $('#framework').multiselect({
         nonSelectedText: 'Izaberite više opcija',
         enableFiltering: true,
         enableCaseInsensitiveFiltering: true,
         buttonWidth: '400px',
     });

     $('#framework').on("change", function() {
         document.getElementById("nothing_found").hidden = true;
         document.getElementById("not_selected").hidden = true;
     });

     $('#framework_form').on('submit', function(e) {
         var sendingData = $("#framework").val();

         if (sendingData.length == 0) {
             alert("Niste odabrali opcije za pretragu");
             var para = document.getElementById('not_selected');
             para.hidden = false;
             para.innerText = "Kliknite na listu da izaberete opcije";
         } else {
             $.ajax({
                 dataType: 'text',
                 crossDomain: true,
                 data: {
                     data: sendingData.map(x => "'" + x.toString() + "'").join(', ')
                 },
                 type: 'GET',
                 url: '2.php'
             }).done(function(data) {

                 var received = data.split('\n');
                 if (received[0] != "0 results") {
                     var totalRows = received.length;

                     var div1 = document.getElementById('prikazi_dobijene_podatke');
                     div1.innerHTML = "";

                     var tbl = document.createElement("table");

                     for (var r = 0; r < totalRows - 1; r++) {
                         var row = document.createElement("tr");

                         var cell2 = document.createElement("td");

                         var UrlParameter = received[r].split(' ').join('-');

                         cell2.innerHTML = '<a href="./index.html?name=' + UrlParameter + '" class="nav-link" target="blank"><ion-icon name="book" class="margin-right" size="large"></ion-icon> Rezerviši odmah ' + received[r] + '</a>';

                         row.appendChild(cell2);

                         tbl.appendChild(row);

                     }

                     div1.appendChild(tbl);
                 } else {
                     alert("Na žalost na raspolaganju nema takvih restorana. Da li želite nesto drugo u  ponudi?");
                     var error = document.getElementById("nothing_found");
                     error.hidden = false;
                     error.innerText = "Da li želite nesto drugo u  ponudi?";

                 }

             }).fail(function() {
                 alert("Žao nam je, nismo mogli da se konektujemo sa serverom. Pokušajte malo kasnije.");

             });
         }
         e.preventDefault();
     });

 });