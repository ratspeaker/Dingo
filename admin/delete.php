<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);


$id = '';
$src = '';

if(!empty($_GET['id']) && !empty($_GET['location'])){
	$id = $_GET['id'];
	$src = $_GET['location'];
} else {
	throw new Exception("Bad _GET request, ID or LOCATION is not set!");
}


deleteRecord($db, $id, $src);

header("Location: ". $src );
die;

