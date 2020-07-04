<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);


$id = '';

if(!empty($_GET['id']) ){
	$id = $_GET['id'];
} else {
	echo $_GET['id'];
	throw new Exception("Bad _GET request, ID is not set!".$_GET['id']. "");
}

echo $id;

deleteRecordFromRestoran($db, $id);

header("Location: restoran.php" );
die;

