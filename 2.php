<?php

$servername="localhost";
$username="default";
$password="default";
$dbname="Dingo";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die("connection failed ". $conn->connect_error);
}

$p = $_GET['data'];

if(!$conn->set_charset("utf8")){
	printf("Error loading character set utf8: %s\n", $conn->error);
	exit();
}

if(strpos($p, "'sve'") === false){
	$sql = "SELECT DISTINCT r.naziv_restorana FROM restoran r JOIN restoran_vrsta_hrane v ON r.id_restorana = v.id_restorana WHERE v.vrsta_hrane in (".$p.")";
} else{
	$sql = "SELECT naziv_restorana FROM restoran";
}


$result = $conn->query($sql);

if($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo $row["naziv_restorana"] . "\n";
    }
} else{
	echo "0 results";
} 
 

$conn->close();

?>
