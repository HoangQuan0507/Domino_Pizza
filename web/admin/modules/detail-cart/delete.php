<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    delete_id_cart ($conn,$id);
    
    
    header("location:index.php?p=list-detail-cart");
    exit();
} else {
    header("location:index.php?p=list-detail-cart");
    exit();
}
?>