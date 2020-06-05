<?php
/*
Podaci koji vam stizu sa stranice za rezervaciju su u JSON formatu
Imena polja su (imena nekih polja su van konteksta) : 
first_name, 
last_name, 
department (ovo je ime restorana), 
user_password (broj mesta),
email,
contact_no(broj telefona),
time,
date
*/


//TEST

/*$myfile = fopen("logger.txt", "a");
fwrite($myfile, "Ime: ".$_REQUEST['first_name']."\r\n");
fwrite($myfile, "Prezime: ".$_REQUEST['last_name']."\r\n");
fwrite($myfile, "Restoran: ".$_REQUEST['department']."\r\n");
fwrite($myfile, "Broj Mesta: ".$_REQUEST['user_password']."\r\n");
fwrite($myfile, "Email: ".$_REQUEST['email']."\r\n");
fwrite($myfile, "Kontakt Tel.: ".$_REQUEST['contact_no']."\r\n");
fwrite($myfile, "Datum: ".$_REQUEST['date']."\r\n");
fwrite($myfile, "Vreme: ".$_REQUEST['time']."\r\n");
fwrite($myfile, "________________"."\r\n");
fclose($myfile);
*/

//Povratak na stranicu za rezervaciju (ovaj deo ne dirati)
header("Refresh:0; url=index.html");
?>