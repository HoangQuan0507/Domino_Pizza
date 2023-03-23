<?php
if (isset($_GET["id"])){
    $id =$_GET["id"];
    $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!isset($_SESSION["cart"][$id]["quantity"])){
    $_SESSION["cart"][$id]["id"] = $id;
    $_SESSION["cart"][$id]["quantity"] = 1;
    $_SESSION["cart"][$id]["name"] = $data["type"];
    $_SESSION["cart"][$id]["price"] = $data["price"];
    }else {
        $_SESSION["cart"][$id]["quantity"] += 1;
    }
    header("location:index.php?p=gio-hang");
    exit();
}
else {
    header("location:index.php?p=gio-hang");
    exit();
}

?>