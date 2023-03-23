<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    delete_size ($conn,$id);
    
    header("location:index.php?p=list-size");
    exit();
} else {
    header("location:index.php?p=list-size");
    exit();
}
?>