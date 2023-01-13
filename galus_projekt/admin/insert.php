<?php
include_once "../header.php";

$db = $GLOBALS['db'];
if(isset($_POST['submit'])){
    $insertMenuItem = $db->insertItem($_POST['text'], $_POST['author'], $_POST['position']);

    if($insertMenuItem){
        echo "SUCCESS!!!";
    } else {
        echo "ERROR!!!";
    }
} else {
    ?>
    <form action="" method="post">
        Description text: <br>
        <input name="text" type="text" placeholder="Some text"><br>
        Author's name: <br>
        <input name="author" type="text" placeholder="Author"><br>
        Author's position: <br>
        <input name="position" type="text" placeholder="Author's position"><br>
        <input type="submit" name="submit" value="insert"><br>
    </form>
    <?php
}

?>


