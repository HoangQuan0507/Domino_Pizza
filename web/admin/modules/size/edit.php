
<?php
if (!isset($_GET["id"])) {
    header("location:index.php?p=list-size");
    exit();
} else {
    $id = $_GET["id"];
    $errors = array();
    $old_data = show_old_data_size ($conn,$id);

    if (isset($_POST["create"])) {
        if (empty($_POST["size"])) {
            $errors[] = "please enter your size.";
        }
        if (check_size_exists ($conn,$_POST["size"]) == false) {
            $errors[] = "size exists";
        }
        if(empty($errors)) {
            $data["size"] = $_POST["size"];
            $data["id"] = $id;
            edit_size ($conn,$data);
            header("location:index.php?p=list-size");
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
            <h3 class="card-title">Them the loai</h3>
        </div>
        <div class="card-body">
            
            <div class="form-group">
                <label>Size</label>
                <input type="text" class="form-control" name="size" placeholder="Enter name category"
                <?php
                    if (isset($_POST["size"])) {
                        echo 'value="'.$_POST["size"].'"';
                    }else {
                       echo 'value="'.$old_data["size"]. '"';
                    }
                ?>
                >
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