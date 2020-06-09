<?php
require_once 'config.php';
require_once 'db.php';

?>
<html>
	<head>
    <meta charset="utf-8"/> 
    <link rel="stylesheet" type="text/css" href="style.css">
		<title> ADMIN PAGE </title>
    </head>
    <body>
    
        <h1> DINGO TABELE</h1>
        <hr>
      
      <div class="indexButtons">  
        <button class="button button1" onclick="window.location.href='restoran.php';">
            RESTORAN    
        </button><br/>
        <button class="button button2" onclick="window.location.href='korisnik.php';">
            KORISNIK    
        </button><br/>
        <button class="button button3" onclick="window.location.href='rezervacija.php';">
            REZERVACIJA    
        </button><br/>
      </div>
    
    </body>
</html>


