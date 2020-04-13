<!-- <!DOCTYPE html>
<html>
    <body>


        </body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dingo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    
    
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", Arial, Helvetica, sans-serif
        }
        
        ion-icon {
            color: rgb(37, 130, 158)
        }
        
        body {
            position: relative;
        }
        
        ul.nav-pills {
            top: 600px;
            position: fixed;
        }
        
        div.col-8 div {
            height: 500px;
        }
    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-dark bg-dark large">
        <a href="#" class="nav-link"><img src="./dingog.jpg" height="50" width="50"> DinGo </a>
        <a href="#restaurants" class="nav-link">
            <ion-icon name="restaurant" class="margin-right" size="large"></ion-icon> Vrsta hrane</a>
        <a href="#about" class="nav-link">
            <ion-icon name="glasses" class="margin-right" size="large"></ion-icon> O nama</a>
        <a href="#contact" class="nav-link">
            <ion-icon name="call" class="margin-right" size="large"></ion-icon> Kontakt </a>
        <a href="./index.html" class="nav-link">
            <ion-icon name="book" class="margin-right" size="large"></ion-icon> Rezerviši odmah</a>
    </nav>
    <br>
    <header>
        <main role="main" class="container">
            <div class="jumbotron">
                <h1>Dobrodošli u Dingo</h1>
                <p class="lead">Dragi ljubitelji hrane, molimo Vas izaberite hranu po Vašem raspoloženju. Na listi ispod možete videti vrstu hrane koju restorani nude.
                 Ako ste već izabrali restoran onda kliknite na dugme "Rezerviši odmah" (u gornjem desnom uglu). Ako želite da informišete o vrstama hrane koje restorani nude
            , kliknite na "Vrsta hrane" koja se nalazi u navigaciji.
                </p>

                <div class="container" style="width:600px; height: 300px; align-self: center;">
                    <br /><br />
                    <form id="framework_form" name="framework_form">
                        <div class="form-group">

                        
                        <select id="framework"   name="framework" multiple="multiple" class="form-control" >
                        <?php
                                $servername="localhost";
                                $username="root";
                                $password="password";
                                $dbname="dingo";
                                
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if($conn->connect_error){
                                die("connection failed ". $conn->connect_error);
                                }
                                $sql = "SELECT DISTINCT vrsta_hrane FROM vrsta_hrane";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()){
                                        echo "<option value='".$row["vrsta_hrane"]."'>".$row["vrsta_hrane"]."</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                
                                ?>  
                           <!-- <option value="Italian">Italian</option>
                            <option value="Mexican">Mexican</option>
                            <option value="Serbian">Serbian</option>
                            <option value="Greek">Greek</option>
                            <option value="Vegetarian">Vegetarian</option>
                            <option value="Vegan">Vegan</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Indian">Indian</option>  
                          -->
                            </select> 
                        </div>
                        <br>
                            <input type="submit" class="btn btn-info" id="select_submit" name="select_submit" value="Search for me"/>
                    </form>
                </div>

        </main>

    </header>

    <div class="container" style=" align-self: center;" id="restaurants">
        <div class="jumbotron">
            <div class="accordion" id="accordionExample">

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Arapska
              </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                        Arapska tradicionalna kuhinja je pre svega kombinacija turske, bliskoistočne i indijske kuhinje. Na nju su uticale i razne seobe Arapa kroz vekove, pa je sada pod snažnim uticajem i tradicionalnih kuhinja zemalja poput Španije, Italije, Francuske i Grčke. Iako Arapi ne konzumiraju svinjsko meso i alkohol, u Iraku, Libanu, Egiptu i Siriji (gde je veliki procenat nemuslimanskog stanovništva) se tu i tamo mogu naći neki marketi sa alkoholnim napicima i jelima od svinjetine.
Čaj je nezaobilazno piće na trpezi svake arapske porodice, konzumira se čak duplo više nego kafa.</div>
                    </div>
                </div>

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Bez glutena
              </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                        Dijeta bez glutena ili bezglutenska ishrana je oblik ishrane koji isključuje unos glutena, koji je mešavina proteina koji se nalaze u pšenici (i svim njenim vrstama i hibridima, kao što su pir, kamut i tritikale), kao i u ječmu, raži i zobi.  </div>
                    </div>
                </div>

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Veganska
              </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                        Veganska ishrana može biti vrlo raznovrsna. Glavnih 5 grupa hrane jesu voće, povrće, žitarice, mahunarke i orašasti plodovi. Pored ovih 5 kategorija, treba uneti i B12, kalcijum kroz ojačanu hranu kao i masti iz voća.  </div>
                </div>

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Vegetarijanska
          </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                        Vegetarijanstvo je način ishrane koja se satoji od namirnica biljnog porekla (širok spektar žitarica, mahunarki, voća i povrća), eventualno mlečnih proizvoda i jaja ali bez životinjskog mesa. Prednosti ove vrste prehrane su mnogostruke. Nutricionisti tvrde da se smanjuje koncentracija masnoća u krvi koje uzrokuju povišenje srčanog pritiska, i slobodnih radikala koji su vrlo štetni.</div>
                    </div>
                </div>

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Vijetnamska
          </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                        U pogledu raznovrsnosti i kvaliteta, vijetnamska kuhinja nimalo ne zaostaje za kineskom, iako razliku zbog blizine i tesnih veza nije lako uočiti. Pirinač, povrće i riba čine i u Vijetnamu i u Kini osnovu, na koju se dodaju začini i kombinuje hiljadu i jedan način pripremanja finalnog proizvoda. </div>
                    </div>
                </div>

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            Italijanska
          </button>
                        </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                        Italijanska kuhinja ima veliki broj različitih sastojaka koji se standardno upotrebljavaju, od voća, povrća, sosova, mesa, itd.
Na severu Italije, riba (kao što je na primer bakalar ili baccala), krompir, pirinač, kukuruz, sosovi, svinjetina i različite vrste sireva su najuobičajeniji sastojci. 
Tradicionalna kuhinja centralne italije koristi sastojke kao što su paradajz, sve vrste mesa (osim konjskog), riba i sir pekorino. 
I na kraju, u južnoj Italiji, paradajz – svež ili kuvan u paradajz sosu – biber, masline i maslinovo ulje, beli luk, artičoke, pomorandže, rikota sir, patlidžan, tikvice, određene vrste ribe (sardine i tuna) i kapar su važni sastojci lokalne kuhinje.
  </div>
                    </div>
                </div>

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
    Japanska 
          </button>
                        </h5>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                        Japanska kuhinja obuhvata regionalnu i tradicionalnu hranu iz celog područja Japana.Tradicionalna kuhinja Japana je zasnovana na pirinču sa miso supom i drugim jelima sa dosta sezonskih sastojaka. Prilozi su često riba i kuvano povrće u supi. Plodovi mora su uobičajena i često se spremaju na žaru, ali se takođe mogu spremati kao sirovo u obliku sašimia ili suši. Plodovi mora i povrće su takođe mogu spremati u mekom testu kao tempura. Osim pirinča uobičajena su i rezanca kao što Soba i Udon. 
</div>
                    </div>
                </div>

                <!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingEight">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
             Libanska
          </button>
                        </h5>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                        <div class="card-body">
                        Libanska kuhinja kombinuje sofisticiranost evropske kuhinje s egzotičnim začinima Istoka. Zahvaljujući obilju voća, povrća, žitarica, sveže ribe i morskih plodova, libanska kuhinja je laka, niskokalorična i zdrava. Meso se koristi ređe, i to je najčešća piletina ili jagnjetina. Važno mesto zauzima meze, živopisni niz jela koja se služe u malim posudama pre glavnog obroka, prava izložba boja, ukusa, oblika, mirisa. Služi se sveže povrće i povrće u turšiji, ali i salate, meso, riba…

</div>
                    </div>
                </div>

<!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingNine">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
             Mediteranska
          </button>
                        </h5>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                        <div class="card-body">
                        Mediteranska kuhinja označava posebnu kulturu spravljanja i uživanja u jelima, koja se razvila i etablirala u krajevima uz obalu Mediterana. Uz određene regionalne posebnosti, mediteransku kuhinju krase i brojne zajedničke karakteristike. Mediteransku kuhinju odlikuje intenzivna aroma i njihova velika raznolikost, te bogatstvo boja. Iako je delimično odlikuje relativno visok procenat masnoće, ona je u osnovi veoma zdrava, jer se pri pripremanju jela mediteranske kuhinje uglavnom koriste biljna, a ne životinjska ulja.

                    </div>
                    </div>
                </div>

<!-- Card -->

                <div class="card">
                    <div class="card-header" id="headingTen">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                    Meksička
                        </button>
                        </h5>
                    </div>
                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                        <div class="card-body">
                        Meksička kuhinja poznata je po intenzivnim i raznolikim ukusima, šarenim dekoracijama i bogatstvu začina. Oslanjajući se na ponudu modernih restorana pomislili bismo da se ona sastoji isključivo od tacosa, quesadilla, enchilada i carnitasa, ali tu su još mnoga fenomenalna jela. Veoma su popularna i meksička pića, kao na primer meskal i popularna tequilla, koja se proizvodi od agave. Dosta je vrsta piva, a žedni neće ostati ni ljubitelji vina.
                    </div>
                    </div>
                </div>



<!-- Card -->

<div class="card">
                    <div class="card-header" id="headingEle">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEle" aria-expanded="false" aria-controls="collapseEle">
                            Srpska
                        </button>
                        </h5>
                    </div>
                    <div id="collapseEle" class="collapse" aria-labelledby="headingEle" data-parent="#accordionExample">
                        <div class="card-body">
                        Srpska tradicionalna kuhinja obuhvata riznicu ukusa i mirisa nastalu mešavinom uticaja raznih naroda koji su prolazili ovuda i živeli na ovim prostorima. Kao i u kulturi uopšte, ova fuzija različitih uticaja rezultirala je originalnošću, pa bogata srpska trpeza nudi nezaboravne ukuse koji se samo u Srbiji mogu osetiti.
Srpsku kuhinju karakteriše veoma raznovrsna, jaka i začinjena hrana, za koju bi se grubo moglo reći da je kombinacija grčke, bugarske, turske i mađarske kuhinje. U njoj preovladava upotreba mesa, testa, povrća i mlečnih proizvoda. Specijaliteti koje morate probati u Srbiji: burek, gibanica, meso sa roštilja, pečenje, Karađorđeva šnicla, sarma, gulaš, đuveč, musaka, mućkalica, čvarci, kajmak, pršuta, kiselo mleko.

                    </div>
                    </div>
                </div>

<!-- Card -->

<div class="card">
                    <div class="card-header" id="headingTwe">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwe" aria-expanded="false" aria-controls="collapseTwe">
                            Francuska
                        </button>
                        </h5>
                    </div>
                    <div id="collapseTwe" class="collapse" aria-labelledby="headingTwe" data-parent="#accordionExample">
                        <div class="card-body">
                        Jedna od karakteristika francuske kuhinje je ta da Francuzi pri pripremi jela retko koriste mast, zapršku nikad. Koriste ulje i puter i na kraju kuvanja skidaju višak masnoće. Tako su francuska jela vrlo lagana.
Druga karakteristika je raznovrsnost jela. Razlog za to je geografska šarenolikost Francuske – na  jugu imaju blagu sredozemnu klimu gde uspeva raznovrsno bilje i gde su žitorodne ravnice, brežuljci prekriveni vinogradima i voćnjacima, šume pune divljači i more. Sever Francuske poznat je po proizvodnji sireva vrhunskog kvaliteta zahvaljujući velikim pašnjacima. 

                    </div>
                    </div>
                </div>

<!-- Card -->

<div class="card">
                    <div class="card-header" id="headingThi">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThi" aria-expanded="false" aria-controls="collapseThi">
                            Halal
                        </button>
                        </h5>
                    </div>
                    <div id="collapseThi" class="collapse" aria-labelledby="headingThi" data-parent="#accordionExample">
                        <div class="card-body">
                        Reč Halal se najčešće koristi u odnosu na hranu i prehranu propisanu u Kuranu i sunnetu.
Kuran zabranjuje krv, meso svinje, meso bilo koje životinje, koja je bila posvećena Bogu, osim Alahu, meso životinje koja je ubijena davljenjem, smrt od gladi. Prema Kuranu zabranjeno je konzumiranje alkoholnih pića. 

                    </div>
                    </div>
                </div>

<!-- Card -->

<div class="card">
                    <div class="card-header" id="headingFor">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                            Španska
                        </button>
                        </h5>
                    </div>
                    <div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#accordionExample">
                        <div class="card-body">
                        Španska kuhinja delom potpada pod mediteransku kuhinju a delom se razlikuje od nje jer se u nekim, uglavnom unutrašnjim delovima Pirinejskog poluostrva, u većoj meri koriste meso i mesni proizvodi (šunke i kobasice). Jela se, uz ribu i morske delicije, piletinu ili neko drugo meso, mahom baziraju na pirinču, krompiru, paradajzu, paprici, leblebijama na jugu i pasulju na severu. I naravno, sve se priprema na maslinovom ulju a ukus najčešće poboljšavaju beli i crni luk, dimljena paprika ‘pimenton’, šafran i lorber.  

                    </div>
                    </div>
                </div>












            </div>
        </div>
    </div>

    <div class="container" id="about">

        <div class="jumbotron">
            <h1>We are Dingo</h1>
            <p>--TODO--</p>
            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Find More about us</a>
        </div>
    </div>
    <div class="container" id="contact">
        <section class="mb-4">

            <h2 class="h1-responsive font-weight-bold text-center my-4">Kontaktirajte nas</h2>

            <p class="text-center w-responsive mx-auto mb-5">Da li imate pitanja? Nemojte se ustručavati da nas pitate. 
            Naš tim će se potruditi da Vam odgovoriti u što kraćem roku.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Vaše ime i prezime</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Vaš email</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">O čemu se radi</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Vaša poruka</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="text-center text-md-left">
                        <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Pošalji</a>
                    </div>
                    <div class="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <ion-icon name="call" size="large"></ion-icon>
                            <p> 000 111 222 333</p>
                        </li>

                        <li>
                            <ion-icon name="mail" size="large"></ion-icon>
                            <p>foodie.modie@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#framework').multiselect({
            nonSelectedText: 'Select by multiple choices',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '400px',
        });
        $('#prikazi').on('click', function(){
            console.log($("#framework").val().toString());
            alert($('#framework').serialize());
        });
        $('#framework_form').on('submit', function(e){
            e.preventDefault();
            console.log('usao sam ovde');
            $.ajax({
                type: 'post',
                url: 'OdgovorOdServera.php',
                data: "podaciUnizu="+$('#framework').val().toString(),
                success: function(){
                    alert('uspelo je');
                },
                fail: function(){
                    alert('nije uspelo');
                }
            });
        });

    });

</script>