<?php

$servername="localhost";
$username="default";
$password="default";
$dbname="Dingo";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die("Connection failed ". $conn->connect_error);
}

if(!$conn->set_charset("utf8")){
	printf("Error loading character set utf8: %s\n", $conn->error);
	exit();
}

$sql = "SELECT naziv_restorana FROM restoran";

$result = $conn->query($sql);

if($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo $row["naziv_restorana"]."\n";
  }
} else{
	echo "0 results";
}


$conn->close();

?>
