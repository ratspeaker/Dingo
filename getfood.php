<?php

const BD_HOST = "localhost";
const DB_NAME = "Dingo";
const DB_USERNAME ="default";
const DB_PASSWORD ="default";

$db = new mysqli(BD_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($db->connect_error){
    die("Cannot connect to database\n" . $db->connect_error . "\n");
}

$db->set_charset("utf8");


$sql = "SELECT vrsta_hrane FROM vrsta_hrane";

$result = $db->query($sql);

if($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo $row["vrsta_hrane"] . "\n";
    }
} else{
	echo "0 results";
} 

?>