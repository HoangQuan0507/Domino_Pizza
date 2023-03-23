<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    delete_cart ($conn,$id);
    
    header("location:index.php?p=list-cart");
    exit();
} else {
    header("location:index.php?p=list-cart");
    exit();
}
?>