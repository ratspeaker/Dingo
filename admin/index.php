<?php
require_once 'config.php';
require_once 'db.php';

?>
<html>
	<head>
    <meta charset="utf-8"/> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <link rel="apple-touch-icon" sizes="180x180" href="../slike/Dingo-apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../slike/Dingo-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../slike/Dingo-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <script src = "indexScript.js"></script>
		<title> ADMIN PAGE </title>
    </head>
    <body>
    <div class="container" id="form_div" >   
      <form id="forma" >
        <div class="imgcontainer">
          <img src="../slike/dingoClear.png" alt="DinGo" class="dingo_slika">
        </div>

        <div class="container">
          <label for="ime"><b>Korisničko ime</b></label>
          <input type="text" id = "ime" placeholder="Unesite korisničko ime" name="ime" required/>
      <br>
          <label for="lozinka"><b>Šifra</b></label>
          <input type="password" id="lozinka" placeholder="Unesite šifru" name="lozinka" required/>
          <br> 
          <br>
        </div>

        <div class="container" style="background-color:#f1f1f1">
        <div class="row">

          <div class="col-md-6">
              <div class="md-form mb-0">
              <button type="submit" class="btn btn-success" id="submit" name="submit"> Uloguj se </button>

              </div>
          </div>

        <div class="col-md-6">
            <div class="md-form mb-0">
            <button class="btn btn-danger" id="otkazi_dugme">Otkaži</button>
            </div>
        </div>

      </div>
  
        </div>
      </form> 
</div>


      <div class="indexButtons" id="buttons_div" hidden=true> 
      <h1> DINGO TABELE</h1>
        <hr> 
        <button class="button1" onclick="window.location.href='restoran.php';">
            RESTORAN    
        </button><br/>
        <button class="button2" onclick="window.location.href='korisnik.php';">
            KORISNIK    
        </button><br/>
        <button class="button3" onclick="window.location.href='rezervacija.php';">
            REZERVACIJA    
        </button><br/>
      </div>
    
    </body>
</html>


