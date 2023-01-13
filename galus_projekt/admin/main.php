<?php
include_once "../class/db.php";
use portalove\DB;

$db = new DB("localhost", "galus_projekt", "root", "", 3306);

global $menuItems;
$menuItems = $db->getItem();
var_dump($menuItems);
?>

<ul>
    <li><a href="menu.php">Menu</a></li>
</ul>
