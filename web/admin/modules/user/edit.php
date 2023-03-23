<?php
if (!isset($_GET["id"])) {
    header("location:index.php?p=list-user");
    exit();
} else {
    $id = $_GET["id"];
    $errors = array();
    $old_data = show_old_data_user ($conn,$id);

    if (isset($_POST["edit"])) {

        if(empty($errors)) {
            $data["level"] = $_POST["level"];
            $data["id"] = $id;

            if (!empty($_POST["password"])) {
                if ($_POST["password"] != $_POST["password_confim"]) {
                    $errors[] = "password and password confim don't match";
                } else {
                    $data["password"] = md5($_POST["password"]);
                    edit_user_have_pass ($conn,$data);

                    header("location:index.php?p=list-user");
                    exit();
                }
            } else {
                edit_user_no_pass ($conn,$data);
                
                header("location:index.php?p=list-user");
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
                <h3 class="card-title">Sua thanh vien</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $old_data["name"] ?>" disabled>
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
                    <option value="1"
                        <?php
                            if ($old_data["level"] == 1) {
                                echo "selected";
                            }
                        ?>
                    >Admin</option>
                    <option value="2"
                        <?php
                            if ($old_data["level"] == 2) {
                                echo "selected";
                            }
                        ?>
                    >Member</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </form>
<?php } ?>