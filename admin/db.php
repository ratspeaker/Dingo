<?php 
const BD_HOST = 'localhost';
const DB_NAME = 'Dingo';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'password';

function connect($dbHost, $dbName, $dbUsername, $dbPassword){
   $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
   if ($db->connect_error){
       die("Cannot connect to database\n" . $db->connect_error . "\n");
   }

   return $db;
}

function fetchAll(mysqli $db){
    $data = [];
    $sql = 'select * from restoran';
    $result = $db->query($sql);
    
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = $row;     
        }
    }
    return $data;
}

function insertRecord(mysqli $db,array $record){
	$sql = "INSERT INTO `korisnik` ";
	$sql.="(";
	$sql.="`ime`, `prezime`, `broj_mobilnog`, `email`";
	$sql.=") VALUES ";
	$sql.= "(";
	$sql.="'".$record['ime']."',";
	$sql.="'".$record['prezime']."',";
	$sql.="'".$record['broj_mobilnog']."',";
	$sql.="'".$record['email']."'";
	$sql.=")";

	$result = $db->query($sql);
	if (!$result){
		throw new Exception("Cannot insert record");
	}


	return $db;
}

function deleteRecord(mysqli $db, $id){
	$sql = "DELETE FROM `restoran` WHERE id_restorana = ".$id."";
	$result = $db->query($sql);

	if (!$result){
		throw new Exception("Cannot delete record");
	}
}




