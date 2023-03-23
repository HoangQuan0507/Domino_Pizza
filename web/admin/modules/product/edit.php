

<?php
if (!isset($_GET["id"])) {
    header("location:index.php?p=list-product");
    exit();
} else {
    $id = $_GET["id"];
    $errors = array();
    $old = show_old_data_product ($conn,$id);
    $category = list_category ($conn);
    $size = list_size ($conn);
    if (isset($_POST["create"])) {
      
        if (empty($_POST["name"])) {
            $errors[] = "please enter your name.";
        }
        if (empty($_POST["intro"])) {
            $errors[] = "please enter your intro.";
        }
        if (!check_id_product_exists_for_edit ($conn,$_POST["name"],$_POST["size_id"],$id)) {
            $errors[] = "type exists";
         }
         
    
        // if (!check_product_exists_for_edit ($conn,$_POST["name"],$id)) {
        //    $errors[] = "product exists";
        // }
    
        if(empty($errors)) {
            $data["name"] = $_POST["name"];
            $data["size_id"] = $_POST["size_id"];
            $data["price"] = $_POST["price"];
            $data["type"] = $_POST["type"];
            $data["intro"] = $_POST["intro"];
            $data["status"] = $_POST["status"];
            $data["category_id"] = $_POST["category_id"];
            $data["id"] = $id;
            if (empty($_FILES["image"]["name"])){
                edit_product_no_image ($conn,$data);
            }else {
                delete_image ($conn,$id);
                $data["image"] = time()."-".$_FILES["image"]["name"];
                $data["tmp"] = $_FILES["image"]["tmp_name"];
                edit_product ($conn,$data);
                move_uploaded_file($data["tmp"],"public/".$data["image"]);
            }

            header("location:index.php?p=list-product");
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
                                    }else {
                                        if ($old["category_id"] == $c["id"]){
                                            echo 'selected';
                                        }
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
                    }else {
                        echo 'value="'.$old["name"]. '"';
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
           

            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" name="intro"><?php
                        if (isset($_POST["intro"])) {
                            echo $_POST["intro"];
                        }else{
                            echo $old["name"];
                         }
                    ?></textarea>
                    <script>
                        CKEDITOR.replace('intro');
                    </script>
            </div>   
            <div class="form-group">
                <label>Image current</label>
                <img src="public/<?php echo $old["image"]; ?>" width="100px" />
            </div>  
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                <option value="1"
                <?php 
                        if($old["status"]== 1){
                            echo 'selected';
                        }
                    ?>
                >Hien</option>
                <option value="0"
                <?php 
                        if($old["status"]== 0){
                            echo 'selected';
                        }
                    ?>
                >An</option>
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