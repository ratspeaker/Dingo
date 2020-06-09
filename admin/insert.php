<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);


$record = [
	'ime' => 'Test',
	'prezime' => 'Test',
	'broj_mobilnog' => '1111',
	'email' => 'test@gmail.com' 
 ];

 insertRecord($db, $record);

?>