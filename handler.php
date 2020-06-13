
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


$servername="localhost";
$username="default";
$password="default";
$dbname="Dingo";
$ime = $_POST['first_name'];
$prezime = $_POST['last_name'];
$restoran = $_POST['department'];
$broj_mesta = $_POST['user_password'];
$email = $_POST['email'];
$broj_mobilnog = $_POST['contact_no'];
$sat = date('H', (strtotime($_POST['time'])));
$datum = $_POST['date'];


$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die("connection failed ". $conn->connect_error);
}

if(!$conn->set_charset("utf8")){
	printf("Error loading character set utf8: %s\n", $conn->error);
	exit();
}



$sql1 = "SELECT id_restorana FROM restoran WHERE naziv_restorana = '".$restoran."'";
$id_restorana = $conn->query($sql1);


$id = $id_restorana->fetch_assoc()['id_restorana'];
if($id_restorana === FALSE){
	echo "Error: " . $id . "<br>" . $conn->error;
}


$sql2 = "SELECT SUM(broj_stolova) AS 'Suma' FROM rezervacija WHERE sat = ".$sat." AND datum = '".$datum."' AND id_restorana = ".$id."";
$result = $conn->query($sql2) or die($conn->error);

if ($result->fetch_assoc()["Suma"] == NULL) {
     $broj_zauzetih_stolova = 0;
} else {
     $broj_zauzetih_stolova = $result->fetch_assoc()["Suma"];
}


$sql2_1 = "SELECT ukupan_broj_stolova FROM restoran WHERE id_restorana = ".$id."";
$result = $conn->query($sql2_1) or die($conn->error);
$ukupan_broj_stolova = $result->fetch_assoc()["ukupan_broj_stolova"];

$potreban_broj_stolova = ceil($broj_mesta/4);

if($broj_zauzetih_stolova <= $ukupan_broj_stolova && ($ukupan_broj_stolova - $broj_zauzetih_stolova) >= $potreban_broj_stolova){
	$sql3 = "INSERT INTO korisnik(ime, prezime, broj_mobilnog, email) values ('".$ime."', '".$prezime."', '".$broj_mobilnog."', '".$email."')";
	
	if ($conn->query($sql3) === TRUE){
            $result = $conn->query("SELECT id_korisnika FROM korisnik WHERE ime = '".$ime."' and prezime = '".$prezime."' and broj_mobilnog = '".$broj_mobilnog."' and email = '".$email."'") or die($conn->error);
            $id_korisnika = $result->fetch_assoc()["id_korisnika"];
            echo "ID KORISNIKA: ".$id_korisnika." je id korisnika\n";
           
            $sql4 = "INSERT INTO rezervacija(id_restorana, id_korisnika, sat, datum, broj_stolova) VALUES (".$id.", ".$id_korisnika.", ".$sat.", '".$datum."', ".$potreban_broj_stolova.")";
			if ($conn->query($sql4) === TRUE){
				echo "Uspesno rezervisano!";
			} else{
				echo "Error: " . $sql4 . "<br>" . $conn->error;
			}
	} else{
		echo "Error: " . $sql3 . "<br>" . $conn->error;
	}
} else{
	echo "Error: " . $conn->error;
}

$conn->close();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dingoteam370@gmail.com';                     // SMTP username
    $mail->Password   = 'matf_pzv_dingo2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    
    $mail->setFrom('dingoteam370@gmail.com', 'DinGO');
    $mail->addAddress($_POST['email']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

   
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'DinGO Rezervacija';
    $mail->Body    = '	<h1>Vasa DinGO rezervacija</h1>
						<body>
								Postovani/na , <br>
								Vasa rezervacija je uspesno prosla ! <br>
								Hvala na poverenju,<br>
								Vas DinGO Tim
								
						</body>';
    $mail->AltBody = 'Postovani/na ,
								Vasa rezervacija je uspesno prosla !
								Hvala na poverenju,
								Vas DinGO Tim';

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//Povratak na stranicu za rezervaciju (ovaj deo ne dirati)
header("Refresh:0; url=index.html");
?>
