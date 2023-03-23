<?php
$errors = array();

if (isset($_POST["create"])) {
    if (empty($_POST["name"])) {
        $errors[] = "please enter your name.";
    }
    if (!check_user_exists ($conn,$_POST["name"])) {
        $errors[] = "Name exists";
    }
    if (empty($_POST["password"])) {
        $errors[] = "please enter password.";
    }

    if ($_POST["password"] != $_POST["password_confim"]) {
        $errors[] = "password and password confim don't match";
    }
    if(empty($errors)) {
        $data["name"] = $_POST["name"];
        $data["password"] = md5($_POST["password"]);
        $data["level"] = $_POST["level"];
        create_user ($conn,$data);

        header("location:index.php?p=list-user");
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
            <h3 class="card-title">Them thanh vien</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter name"
                <?php
                    if (isset($_POST["name"])) {
                        echo 'value="'.$_POST["name"].'"';
                    }
                ?>
                >
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>

            <div class="form-group">
                <label>Password Confim</label>
                <input type="password" class="form-control" name="password_confim" placeholder="Enter password confim">
            </div>

            <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level">
                <option value="1">Admin</option>
                <option value="2">Member</option>
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