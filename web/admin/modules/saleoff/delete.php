<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

 

    delete_code ($conn,$id);

    header("location:index.php?p=list-saleoff");
    exit();

} else {
    header("location:index.php?p=list-saleoff");
    exit();
}

?>