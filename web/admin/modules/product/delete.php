<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $data = show_old_data_product($conn,$id);
    $data_image_path = "public/".$data["image"];

    if (file_exists($data_image_path)) {
        unlink($data_image_path);
    }

    delete_product ($conn,$id);

    header("location:index.php?p=list-product");
    exit();

} else {
    header("location:index.php?p=list-product");
    exit();
}

?>