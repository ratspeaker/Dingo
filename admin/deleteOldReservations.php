<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

deleteOldReservations($db);
header("Location: rezervacija.php");
die;