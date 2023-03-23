<?php
session_start();
ob_start();
include 'library/config.php';
include 'library/connect.php';
include 'admin/model/model.php';
?>

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


    if(empty($errors)) {
        $data["name"] = $_POST["name"];
        $data["address"] = $_POST["address"];
        $data["email"] = $_POST["email"];
        $data["note"] = $_POST["note"];
        $stmt = $conn->prepare("INSERT INTO cart (name,address,email,note) 
        VALUES (:name,:address,:email,:note)");
        $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
        $stmt->bindparam(":address",$data["address"],PDO::PARAM_STR);
        $stmt->bindparam(":email",$data["email"],PDO::PARAM_STR);
        $stmt->bindparam(":note",$data["note"],PDO::PARAM_STR);

        $stmt->execute();
        $id_cart = $conn->lastinsertid();

        foreach ( $_SESSION["cart"] as $tungsanphamtrongdonhang) {
        $stmt_detail = $conn->prepare("INSERT INTO detail_cart (id_product_size,quality,id_cart) VALUES(:id_product_size,:quality,:id_cart)");
        $stmt_detail->bindparam(":id_product_size",$tungsanphamtrongdonhang["id"],PDO::PARAM_INT);
        $stmt_detail->bindparam(":id_cart",$id_cart,PDO::PARAM_INT);
        $stmt_detail->bindparam(":quality",$tungsanphamtrongdonhang["quantity"],PDO::PARAM_INT);
        $stmt_detail->execute();
        }

        unset( $_SESSION["cart"]);
        header("location:home.php");
        exit();
    }
}
?>
<html>
<head>
    <?php include 'blocks1/head.php' ?>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include 'blocks1/content-header.php' ?>
            <!-- Main content -->
            <section class="content">
            <form action="" method="POST" enctype="multipart/form-data">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Them cart</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
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
</section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
   
        <!-- Control Sidebar -->
        <?php include 'blocks1/control-sidebar.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include 'blocks1/foot.php' ?>
</body>
</html>

