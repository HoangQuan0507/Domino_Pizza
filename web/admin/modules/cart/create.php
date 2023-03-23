<?php
$errors = array();

if (isset($_POST["create"])) {
    if (empty($_POST["name"])) {
        $errors[] = "please enter product name.";
    }

    if (empty($_POST["email"])) {
        $errors[] = "please enter your email.";
    }

    if (empty($_POST["address"])) {
        $errors[] = "please enter address.";
    }

    // if (!check_cart_exists ($conn,$_POST["name"])) {
    //    $errors[] = "cart exists";
    // }

    if(empty($errors)) {
        $data["name"] = $_POST["name"];
        $data["address"] = $_POST["address"];
        $data["email"] = $_POST["email"];
        $data["note"] = $_POST["note"];
        create_cart ($conn,$data);

        header("location:index.php?p=list-cart");
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
            <h3 class="card-title">Them cart</h3>
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
                <label>address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter price category"
                <?php
                    if (isset($_POST["address"])) {
                        echo 'value="'.$_POST["address"].'"';
                    }
                ?>
                >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email"
                <?php
                    if (isset($_POST["email"])) {
                        echo 'value="'.$_POST["email"].'"';
                    }
                ?>
                >
            </div>    
            <div class="form-group">
                <label>note</label>
                <textarea class="form-control" name="note"><?php
                        if (isset($_POST["note"])) {
                            echo $_POST["note"];
                        }
                    ?></textarea>
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