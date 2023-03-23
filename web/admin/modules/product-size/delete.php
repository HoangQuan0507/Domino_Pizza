<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    delete_id_product ($conn,$id);
    
    header("location:index.php?p=list-product-size");
    exit();
} else {
    header("location:index.php?p=list-product-size");
    exit();
}
?>