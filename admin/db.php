<?php 
const BD_HOST = "localhost";
const DB_NAME = "Dingo";
const DB_USERNAME ="default";
const DB_PASSWORD ="default";

function connect($dbHost, $dbName, $dbUsername, $dbPassword){
   $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
   if ($db->connect_error){
       die("Cannot connect to database\n" . $db->connect_error . "\n");
   }

   return $db;
}

function selectRestoran(mysqli $db){
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

function selectKorisnik(mysqli $db){
    $data = [];
    $sql = 'select * from korisnik';
    $result = $db->query($sql);
    
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $data[] = $row;     
        }
    }
    return $data;
}

function selectRezervacija(mysqli $db){
    $data = [];
    $sql = 'select * from rezervacija';
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

function deleteRecord(mysqli $db, $id, $src){

	if($src == "restoran.php"){
		$sql1 = "DELETE FROM `rezervacija` WHERE id_restorana = ". $id ."";
		$sql2 = "DELETE FROM `korisnik` WHERE id_korisnika not in (SELECT id_korisnika FROM rezervacija)";
		$sql3 = "DELETE FROM `restoran` WHERE id_restorana = ".$id."";
		$db->query($sql1);
		$db->query($sql2);
		$result = $db->query($sql3);
	}
	else if ($src == "rezervacija.php"){
		$sql1 = "DELETE FROM `rezervacija` WHERE id_rezervacije = ".$id."";
		$sql2 = "DELETE FROM `korisnik` WHERE id_korisnika not in (SELECT id_korisnika FROM rezervacija)";
		$db->query($sql1);
		$result = $db->query($sql2);
	}
	else if ($src == "korisnik.php"){
		$sql1 = "DELETE FROM `korisnik` WHERE id_korisnika = ".$id."";
		$sql2 = "DELETE FROM `rezervacija` WHERE id_korisnika = ".$id."";
		$db->query($sql2);
		$result = $db->query($sql1);
	}
	else 
		throw new Exception("Cannot deduce a table from which to delete!");

	if (!$result){
		throw new Exception("Cannot delete record");
	}
}




