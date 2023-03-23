
<?php
$errors = array();
$product = list_product ($conn);
$size = list_size ($conn);
if (!isset($_GET["id"])) {
    header("location:index.php?p=list-product-size");
    exit();
} else {
    $id = $_GET["id"];
    $errors = array();
    $old = show_old_data_product_size ($conn,$id);

    if (isset($_POST["edit"])) {
        if (!check_id_product_exists_for_edit ($conn,$_POST["id_product"],$_POST["size_id"],$id)) {
            $errors[] = "type exists";
         }
         
        if(empty($errors)) {
            $data["size_id"] = $_POST["size_id"];
            $data["id_product"] = $_POST["id_product"];
            $data["price"] = $_POST["price"];
            $data["type"] = $_POST["type"];
            $data["id"] = $id;
            edit_id_product($conn,$data);
    
            header("location:index.php?p=list-product-size");
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
            <h3 class="card-title">Them Product-size</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                    <label>product</label>
                    <select name="id_product" class="form-control">
                            <option value="">Please choose product</option>

                            <?php foreach ($product as $c) { ?>
                            <option value="<?php echo $c["id"] ?>"
                                <?php
                                    if (isset($_POST["id_product"]) && $_POST["id_product"] == $c["id"]) {
                                        echo 'selected';
                                    } else {
                                        if ($old["id_product"] == $c["id"]){
                                            echo 'selected';
                                        }
                                    }
                                ?>     
                            ><?php echo $c["name"] ?></option>-
                            <?php }?>
                    </select>
            </div>
            <div class="form-group">
                    <label>size</label>
                    <select name="size_id" class="form-control">
                            <option value="">Please choose size</option>

                            <?php foreach ($size as $c) { ?>
                            <option value="<?php echo $c["id"] ?>"
                                <?php
                                    if (isset($_POST["size_id"]) && $_POST["size_id"] == $c["id"]) {
                                        echo 'selected';
                                    }else {
                                        if ($old["size_id"] == $c["id"]){
                                            echo 'selected';
                                        }
                                    }
                                ?>     
                            ><?php echo $c["size"] ?></option>-
                            <?php }?>
                    </select>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" placeholder="Enter price category"
                <?php
                    if (isset($_POST["price"])) {
                        echo 'value="'.$_POST["price"].'"';
                    }else {
                        echo 'value="'.$old["price"]. '"';
                     }
                ?>
                >
            </div>
            <div class="form-group">
                <label>name</label>
                <input type="text" class="form-control" name="type" placeholder="Enter name"
                <?php
                    if (isset($_POST["type"])) {
                        echo 'value="'.$_POST["type"].'"';
                    }else {
                        echo 'value="'.$old["type"]. '"';
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