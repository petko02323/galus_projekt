<?php
include_once "../header.php";

$db = $GLOBALS['db'];
$menu = $db->getMenu();

echo '<ul>';
foreach($menu as $menuItem){
    echo "<li>". $menuItem['name']. "</li>";
}
echo "</ul>"
?>