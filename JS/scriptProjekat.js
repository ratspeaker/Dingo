  $(document).ready(function() {
      $.ajax({
          dataType: 'text',
          url: '../getfood.php'
      }).done(function(data) {

          var received = data.split('\n');
          if (received[0] != "0 results") {
              //   console.log(received);
              var divP = document.getElementById('ispisi_hranu');

              var select = document.createElement("select");
              select.id = "framework";
              select.multiple = true;
              select.onchange = akoSeNeKlikne;
              select.nonSelectedText = 'Izaberite više opcija';
              select.enableFiltering = true;
              select.enableCaseInsensitiveFiltering = true;
              select.buttonWidth = '400px';
              select.className = 'form-control';

              var totalRows = received.length;
              for (var r = 0; r < totalRows - 1; r++) {
                  var option = document.createElement("option");
                  option.innerHTML = received[r];
                  option.value = received[r];
                  select.appendChild(option);
              }

              divP.appendChild(select);

          } else {
              alert("Nažalost nemamo išta da Vam ponudimo. Dođite malo kasnije.");
              var error = document.getElementById("nothing_found");
              error.hidden = false;
              error.innerText = "Da li želite nesto drugo u  ponudi?";

          }
      }).fail(function() {
          alert("Žao nam je, nismo mogli da se konektujemo sa serverom. Pokušajte malo kasnije.");

      });

      $.ajax({
          dataType: 'text',
          url: '../getInfos.php'
      }).done(function(data) {
          //    console.log(data);
          var received = data.split('\n');
          if (received[0] != "0 results") {
              var accordionDiv = document.getElementById("accordion");
              var tbl = document.createElement("table");
              var totalRows = received.length;
              for (var r = 0; r < totalRows - 1; r++) {
                  var row = document.createElement("tr");

                  var cell1 = document.createElement("td");
                  var cell2 = document.createElement("td");
                  var cell3 = document.createElement("td");

                  var elements = received[r].split('-');
                  cell1.innerHTML = '<a href=' + elements[4] + ' class="nav-link" target="blank"> <img src="' + elements[3] + '" alt="' + elements[0] + '"  width="70" height="70"> </a>';
                  cell2.innerHTML = '<h4>Adresa restorana:</h4> ' + ' Grad: ' + elements[1] + " Ulica: " + elements[2];
                  cell3.innerHTML = '<a href=' + elements[5] + ' class="nav-link" target="blank"> Meni </a>';


                  row.appendChild(cell1);

                  row.appendChild(cell2);

                  row.appendChild(cell3);

                  tbl.appendChild(row);

              }
              accordionDiv.appendChild(tbl);
          } else {
              alert("Nažalost nemamo išta da Vam ponudimo. Dođite malo kasnije.");

          }
      }).fail(function() {
          alert("Žao nam je, nismo mogli da se konektujemo sa serverom. Pokušajte malo kasnije.");

      });

      function akoSeNeKlikne() {
          document.getElementById("nothing_found").hidden = true;
          document.getElementById("not_selected").hidden = true;
      }

      $('#framework').multiselect({
          nonSelectedText: 'Izaberite više opcija',
          enableFiltering: true,
          enableCaseInsensitiveFiltering: true,
          buttonWidth: '400px',
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
                  url: '../getRestaurants.php'
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
