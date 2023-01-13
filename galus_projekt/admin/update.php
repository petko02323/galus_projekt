<?php
include_once "../header.php";

$db = $GLOBALS['db'];
$notes = $GLOBALS['notes'];

if (isset($_POST['submit'])) {
    $updateMenuItem = $db->updateItem($_POST['id'] ,$_POST['text'], $_POST['author'], $_POST['position']);

    if($updateMenuItem){
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
            Description text: <br>
            <input name="text" type="text" placeholder="Some text"><br>
            Author's name: <br>
            <input name="author" type="text" placeholder="Author"><br>
            Author's position: <br>
            <input name="position" type="text" placeholder="Author's position"><br>
            <input type="submit" name="submit" value="update"><br>
        </form>
        <?php

}

?>


