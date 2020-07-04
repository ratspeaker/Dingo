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

   $db->set_charset("utf8");

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

function selectRestoranbyId(mysqli $db, $id){
    $data = [];
    $sql = 'select * from restoran where id_restorana='.strval($id);
    $result = $db->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            return $row;
        }
    }
	return 0;
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

function deleteRecordFromRestoran(mysqli $db, $id){

	
	$sql1 = "DELETE FROM `rezervacija` WHERE id_restorana = ". $id ."";
    $sql2 = "DELETE FROM `korisnik` WHERE id_korisnika not in (SELECT id_korisnika FROM rezervacija)";
    $sql3 = "DELETE FROM `restoran_vrsta_hrane` WHERE id_restorana = ". $id . "";
	$sql4 = "DELETE FROM `restoran` WHERE id_restorana = ".$id."";
	$result =$db->query($sql1);
    

	if (!$result){
		throw new Exception("Cannot delete record from table Restoran in excecuting query: " . $sql1 . "");
	}

    $result = $db->query($sql2);


	if (!$result){
		throw new Exception("Cannot delete record from table Restoran in excecuting query: " . $sql2 . "");
	}

    $result = $db->query($sql3);
    
    
	if (!$result){
		throw new Exception("Cannot delete record from table Restoran in excecuting query: " . $sql3 . "");
	}
    
    $result = $db->query($sql4);
    
	if (!$result){
		throw new Exception("Cannot delete record from table Restoran in excecuting query: " . $sql4 . "");
	}
}


function deleteRecordFromRezervacija(mysqli $db, $id){


    $sql1 = "DELETE FROM `rezervacija` WHERE id_rezervacije = ".$id."";
    $sql2 = "DELETE FROM `korisnik` WHERE id_korisnika not in (SELECT id_korisnika FROM rezervacija)";
    $result = $db->query($sql1);
    
    if (!$result){
		throw new Exception("Cannot delete record from table Rezervacija in excecuting query: " . $sql1 . "");
	}
    
    $result = $db->query($sql2); 
    
    if (!$result){
		throw new Exception("Cannot delete record from table Rezervacija in excecuting query: " . $sql2 . "");
	}
}


function deleteRecordFromKorisnik(mysqli $db, $id){

    
    $sql1 = "DELETE FROM `korisnik` WHERE id_korisnika = ".$id."";
    $sql2 = "DELETE FROM `rezervacija` WHERE id_korisnika = ".$id."";

    $result = $db->query($sql2);

    if (!$result){
		throw new Exception("Cannot delete record from table Korisnik in excecuting query: " . $sql1 . "");
	}

    $result = $db->query($sql1);

    if (!$result){
		throw new Exception("Cannot delete record from table Korisnik in excecuting query: " . $sql2 . "");
	}

}
function checkPassword(mysqli $db, $name, $password) {
	$sql =  "SELECT * FROM `administrator` where `korisnicko_ime`='".$name."'";

	$result=false;

	$sql_result = $db->query($sql);

	if($sql_result->num_rows > 0){

		$row = $sql_result->fetch_assoc();

		$validPassword=password_verify($password, $row['lozinka']);

		if($validPassword)
			$result=true;
	}
	return $result;
}


function deleteOldReservations(mysqli $db){
	$sql1 = "DELETE FROM `rezervacija` WHERE datum < DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
	$sql2 = "DELETE FROM `korisnik` WHERE id_korisnika not in (SELECT id_korisnika FROM rezervacija)";
	$db->query($sql1);
	$db->query($sql2);
}


function insertRestoran(mysqli $db, $ime, $stolovi, $grad, $adresa, $slika, $sajt, $meni, $hrana){
  $sql1 = "INSERT INTO `restoran`(`naziv_restorana`, `ukupan_broj_stolova`, `grad`, `adresa`, `slika`, `sajt`, `meni`) VALUES('".$ime."', ".$stolovi.", '".$grad."', '".$adresa."', '".$slika."', '".$sajt."', '".$meni."')";
  $result = $db->query($sql1);
  if (!$result){
    throw new Exception("Cannot insert record");
  }

  $sql2 = "SELECT `naziv_restorana`, `id_restorana` FROM `restoran` WHERE `id_restorana` = (SELECT MAX(`id_restorana`) FROM `restoran`)";
  $restoran = $db->query($sql2);

  if(strcmp($restoran->fetch_assoc()['naziv_restorana'], $ime) !== 0){
      throw new Exception("Failed to insert new restaurant");
  }

  $sql2_1="SELECT MAX(`id_restorana`) as `id_restorana` from `restoran`";
  $res=$db->query($sql2_1);
  $id=$res->fetch_assoc();

  foreach ($hrana as $vrsta_hrane) {
    $sql3 = "INSERT INTO  `restoran_vrsta_hrane` (`id_restorana`, `vrsta_hrane`) VALUES (".strval($id["id_restorana"]).", '".$vrsta_hrane."')";
    $result = $db->query($sql3);
    if (!$result){
      throw new Exception("Cannot insert record");
    }
  }
}

function updateRestoran(mysqli $db, $id, $ime, $stolovi, $grad, $adresa, $slika, $sajt, $meni){
  $result = mysqli_query($db, "UPDATE restoran SET naziv_restorana='$ime', ukupan_broj_stolova=".strval($stolovi).",grad='".$grad."', adresa='".$adresa."', slika='".$slika."', sajt='".$sajt."', meni='".$meni."' WHERE id_restorana=".strval($id));
}

function  deleteFoodRecord(mysqli $db, $id, $food){
	$sql1 = "DELETE FROM `restoran_vrsta_hrane` WHERE vrsta_hrane='".$food."' and id_restorana=".strval($id);
	$db->query($sql1);
}

function addVrstaHrane(mysqli $db, $id, $hrana){
	$sql = "INSERT INTO `restoran_vrsta_hrane` (`id_restorana`, `vrsta_hrane`) VALUES (".strval($id).",'".$hrana."')";
	$db->query($sql);

}