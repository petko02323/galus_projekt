<?php
include_once "class/db.php";
use portalove\DB;

global $notes, $db;

$db = new DB("localhost", "galus_projekt", "root", "", 3306);
$notes = $db->getItem();

//die();
?>