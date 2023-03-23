<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    unset($_SESSION["cart"][$id]);
    
    header("location:index.php?p=gio-hang");
    exit();
} else {
    header("location:index.php?p=gio-hang");
    exit();
}
?>