<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    delete_category ($conn,$id);
    
    header("location:index.php?p=list-category");
    exit();
} else {
    header("location:index.php?p=list-category");
    exit();
}
?>