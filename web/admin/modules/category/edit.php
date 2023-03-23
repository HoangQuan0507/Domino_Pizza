<?php
if (!isset($_GET["id"])) {
    header("location:index.php?p=list-category");
    exit();
} else {
    $id = $_GET["id"];
    $errors = array();
    $old = show_old_data_category ($conn,$id);
    if (isset($_POST["edit"])) {
        if (empty($_POST["name"])) {
            $errors[] = "please enter your name.";
        }

        if (check_category_exists ($conn,$_POST["name"]) == false) {
            $errors[] = "categody exists";
        }
        if(empty($errors)) {
            $data["name"] = $_POST["name"];
            $data["parent"] = $_POST["parent"];
            $data["id"] = $id;
            edit_category ($conn,$data);

            header("location:index.php?p=list-category");
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
                <label>Parent</label>
                <input type="text" class="form-control" name="parent" placeholder="Enter name category"
                <?php
                    if (isset($_POST["parent"])) {
                        echo 'value="'.$_POST["parent"].'"';
                    }else {
                        echo 'value="'.$old["parent"]. '"';
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