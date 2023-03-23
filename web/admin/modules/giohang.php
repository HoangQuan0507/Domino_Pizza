<?php


if (isset($_POST["update_cart"])) {

    foreach ($_POST["id"] as $key => $id) {
        $_SESSION["cart"][$id]["quantity"] = $_POST["quantity"][$key];
    }
}
?>
<form method="POST" action="">
    <table border="1px">
        <tr>
            <td>stt</td>
            <td>ten sp</td>
            <td>gia sp</td>
            <td>so luong</td>
            <td>tong tien</td>
            <td>xoa</td>
        </tr>
        <?php 
            $tongtien = 0;
        foreach ($_SESSION["cart"] as $item) { ?>
        <tr>
            <td>stt</td>
            <td><?php echo $item["name"] ?></td>
            <td><?php echo number_format($item["price"]) ?></td>
            <td>
            
            
            <input type="text" name="quantity[]" value="<?php echo $item["quantity"] ?>">
            <input type="hidden" name="id[]" value="<?php echo $item["id"] ?>">
            
            
            </td>
            <td><?php echo number_format($item["price"] * $item["quantity"]) ?></td>
            <td><a href="index.php?p=xoa&id=<?php echo $item["id"] ?>">xoa</a></td>
        </tr>
        <?php
            $tongtien += $item["price"] * $item["quantity"];
        } 
        ?>

        <tr>
            <td>tong tien</td>
            <td colspan="4"><?php echo number_format($tongtien) ?></td>
            <td colspan="4"><button type="submit" name="update_cart">cap nhat</button></td>
        </tr>

        <tr>
            <td colspan="6"><a href="index.php?p=thanh-toan">thanh toan</a></td>
        </tr>
    </table>
</form>