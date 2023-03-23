<?php
$errors = array();

$category = list_category ($conn);
$size = list_size ($conn);
if (isset($_POST["create"])) {
    if (empty($_POST["category_id"])) {
        $errors[] = "please choose category.";
    }

    if (empty($_POST["name"])) {
        $errors[] = "please enter product name.";
    }


    if (empty($_POST["intro"])) {
        $errors[] = "please enter product intro.";
    }
    if (empty($_FILES["image"]["name"])) {
        $errors[] = "please enter product image.";
    }

    // if (!check_product_exists ($conn,$_POST["name"])) {
    //    $errors[] = "product exists";
    // }
    if (empty($_POST["price"])) {
        $errors[] = "please enter product price.";
    }
    if (empty($_POST["size_id"])) {
        $errors[] = "please choose your size.";
    }
    if (!preg_match('/^\d+$/',$_POST['price'])) {
        $errors[] = "price must number.";
    }
    if (!check_id_size_exists ($conn,$_POST["name"],$_POST["size_id"])) {
        $errors[] = "product_size exists";
     }
    if (strlen($_POST["price"]) > 10) {
        $errors[] = "ko qua 10 ky tu.";
    }
    if (empty($_POST["type"])) {
        $errors[] = "please choose your type.";
    }
    if(empty($errors)) {
        $data["category_id"] = $_POST["category_id"];
        $data["name"] = $_POST["name"];
       
        $data["intro"] = $_POST["intro"];
        $data["image"] = time()."-".$_FILES["image"]["name"];
        $data["tmp"] = $_FILES["image"]["tmp_name"];
        $data["size_id"] = $_POST["size_id"];
        $data["price"] = $_POST["price"];
        $data["status"] = $_POST["status"];
        $data["type"] = $_POST["type"];


        create_product ($conn,$data);
        
        move_uploaded_file($data["tmp"],"public/".$data["image"]);

        header("location:index.php?p=list-product");
        exit();

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

<form action="" method="POST" enctype="multipart/form-data">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Them san pham</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                            <option value="">Please choose category</option>

                            <?php foreach ($category as $c) { ?>
                            <option value="<?php echo $c["id"] ?>"
                                <?php
                                    if (isset($_POST["category_id"]) && $_POST["category_id"] == $c["id"]) {
                                        echo 'selected';
                                    }
                                ?>     
                            ><?php echo $c["name"] ?></option>-
                            <?php }?>
                    </select>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name category"
                <?php
                    if (isset($_POST["name"])) {
                        echo 'value="'.$_POST["name"].'"';
                    }
                ?>
                >
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
                    }
                ?>
                >
            </div>
            <div class="form-group">
                <label>type</label>
                <input type="text" class="form-control" name="type" placeholder="Enter name"
                <?php
                    if (isset($_POST["type"])) {
                        echo 'value="'.$_POST["type"].'"';
                    }
                ?>
                >
            </div>

            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" name="intro"><?php
                        if (isset($_POST["intro"])) {
                            echo $_POST["intro"];
                        }
                    ?></textarea>
                    <script>
                        var editor = CKEDITOR.replace('intro');
                        CKFinder.setupCKEditor(editor);
                    </script>
            </div>     
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" >
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                <option value="1">Hien</option>
                <option value="0">An</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" name="create" class="btn btn-primary">Create</button>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</form>