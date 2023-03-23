<?php
function checkLogin ($conn,$data) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE name = :name AND password = :password AND level = 1 ");
    $stmt->bindParam(":name", $data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":password", $data["password"],PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->rowCount();

    if ($row <= 0) {
        return false;
    } else {
        return true;
    }

}
?>