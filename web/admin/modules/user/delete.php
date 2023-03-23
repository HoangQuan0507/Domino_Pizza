<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    delete_user ($conn,$id);

    header("location:index.php?p=list-user");
    exit();

} else {
    header("location:index.php?p=list-user");
    exit();
}
?>