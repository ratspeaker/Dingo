<?php
require_once 'config.php';
require_once 'db.php';
 
$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$ime=$_GET['ime'];
$lozinka=$_GET['lozinka'];

$result = checkPassword($db, $ime, $lozinka);
echo $result;

?>