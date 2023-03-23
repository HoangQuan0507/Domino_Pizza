
<?php
$errors = array();
$cart = list_cart ($conn);
$product_id = list_product ($conn);
if (!isset($_GET["id"])) {
    header("location:index.php?p=list-detail-cart");
    exit();
} else {
    $id = $_GET["id"];
    $errors = array();
    $old = show_old_data_id_cart ($conn,$id);

    if (isset($_POST["edit"])) {
        if (!preg_match('/^\d+$/',$_POST['quality'])) {
            $errors[] = "quality must number.";
        }
        if (strlen($_POST["quality"]) > 10) {
            $errors[] = "ko qua 3 ky tu.";
        }
        
        if(empty($errors)) {
            $data["id_product"] = $_POST["id_product"];
            $data["quality"] = $_POST["quality"];
            $data["cart"] = $_POST["cart"];
            $data["id"] = $id;
            edit_id_cart ($conn,$data);
    
            header("location:index.php?p=list-detail-cart");
            exit();
        }
    }
}
?>





<?php if (!empty($errors)) { ?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    <?php
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }

    ?>
</div>
<?php } ?>

<form action="" method="POST">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Them detail-cart</h3>
            <br></br>
        <div class="card-body">
            <div class="form-group">
                    <label>id_product</label>
                    <select name="id_product" class="form-control">
                            <option value="">Please choose id_product</option>

                            <?php foreach ($product_id as $c) { ?>
                            <option value="<?php echo $c["id"] ?>"
                                <?php
                                    if (isset($_POST["id_product"]) && $_POST["id_product"] == $c["id"]) {
                                        echo 'selected';
                                    }
                                ?>     
                            ><?php echo $c["type"] ?></option>-
                            <?php }?>
                    </select>
            </div>
            <div class="form-group">
                    <label>cart</label>
                    <select name="cart" class="form-control">
                            <option value="">Please choose cart</option>

                            <?php foreach ($cart as $c) { ?>
                            <option value="<?php echo $c["id"] ?>"
                                <?php
                                    if (isset($_POST["cart"]) && $_POST["cart"] == $c["id"]) {
                                        echo 'selected';
                                    }
                                ?>     
                            ><?php echo $c["name"] ?></option>-
                            <?php }?>
                    </select>
            </div>
            <div class="form-group">
                <label>Quality</label>
                <input type="text" class="form-control" name="quality" placeholder="Enter quality"
                <?php
                    if (isset($_POST["quality"])) {
                        echo 'value="'.$_POST["quality"].'"';
                    }
                ?>
                >
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" name="edit" class="btn btn-primary">Create</button>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</form>