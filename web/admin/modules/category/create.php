<?php
$errors = array();

if (isset($_POST["create"])) {
    if (empty($_POST["name"])) {
        $errors[] = "please enter your name.";
    }

    if (check_category_exists ($conn,$_POST["name"]) == false) {
        $errors[] = "categody exists";
    }

    if(empty($errors)) {
        $data["name"] = $_POST["name"];
        $data["parent"] = $_POST["parent"];
        create_category ($conn,$data);

        header("location:index.php?p=list-category");
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
                    }
                ?>
                >
            </div>
            <div class="form-group">
                <label>Parent</label>
                <input type="text" class="form-control" name="parent" placeholder="Enter name category"
                <?php
                    if (isset($_POST["name"])) {
                        echo 'value="'.$_POST["name"].'"';
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