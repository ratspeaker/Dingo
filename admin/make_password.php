<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$username = "dingo_team";
$password = "aracuan";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO administrator (korisnicko_ime, lozinka) values ('".$username."', '".$passwordHash."')";

$db->query($sql);
?>