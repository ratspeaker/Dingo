<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);



$id = '';

if(!empty($_GET['id']) ){
	$id = $_GET['id'];
} else {
	throw new Exception("Bad _GET request, ID is not set!");
}


deleteRecordFromKorisnik($db, $id);

header("Location: korisnik.php" );
die;

