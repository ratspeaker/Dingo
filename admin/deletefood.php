<?php
require_once 'config.php';
require_once 'db.php';

$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);


$id = '';
$food = "";

if(!empty($_GET['id']) && !empty($_GET['food'])){
    $id = $_GET['id'];
    $food = $_GET['food'];
} else {
	throw new Exception("Bad _GET request, ID  is not set!");
}


deleteFoodRecord($db, $id, $food);
header("Location: ". "edit.php?id=".strval($id));

die;

