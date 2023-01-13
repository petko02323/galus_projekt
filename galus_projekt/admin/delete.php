<?php
include_once "../header.php";

$db = $GLOBALS['db'];
$notes = $GLOBALS['notes'];

if(isset($_POST['submit'])){
    $deleteMenuItem = $db->deleteItemById($_POST['id']);

    if($deleteMenuItem){
        echo "SUCCESS!!!";
    } else {
        echo "ERROR!!!";
    }
} else {
    ?>
    <form action="" method="post">
        <label for="notes">Choose id of the note:</label><br>
        <select id="id" name="id">
        <?php
        forEach($notes as $note){
            echo '<option value="'.$note["id"].'">'.$note["id"].'</option>';
        }
        ?>
        </select><br>
        <input type="submit" name="submit" value="Delete"><br>
    </form>
    <?php
}

?>


