<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$id = '';

if(!empty($_GET['id_restorana'])){
	$id = $_GET['id_restorana'];
}
if (empty($id)){
	throw new Exception("ID is blank!");
}

deleteRecord($db, $id);

header("Location: /select.php");
die;

