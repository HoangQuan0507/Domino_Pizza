<?php
session_start();
ob_start();
include '../library/config.php';
include '../library/connect.php';
include 'model/model.php';
if (!isset($_SESSION["login"]["name"])){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'blocks/head.php' ?>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'blocks/navbar.php' ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php include 'blocks/aside.php' ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include 'blocks/content-header.php' ?>
            <!-- Main content -->
            <section class="content">
            <?php
                    if (isset($_GET["p"])) {
                        $p = $_GET["p"];

                        switch ($p) {
                            case 'create-category':
                                include 'modules/category/create.php';
                            break;
                            case 'edit-category':
                                include 'modules/category/edit.php';
                            break;
                            case 'delete-category':
                                include 'modules/category/delete.php';
                            break;
                            case 'list-category':
                                include 'modules/category/list.php';
                            break;
                            case 'create-user':
                                include 'modules/user/create.php';
                            break;
                            case 'edit-user':
                                include 'modules/user/edit.php';
                            break;
                            case 'delete-user':
                                include 'modules/user/delete.php';
                            break;
                            case 'list-user':
                                include 'modules/user/list.php';
                            break;
                            case 'create-product':
                                include 'modules/product/create.php';
                            break;
                            case 'edit-product':
                                include 'modules/product/edit.php';
                            break;
                            case 'delete-product':
                                include 'modules/product/delete.php';
                            break;
                            case 'list-product':
                                include 'modules/product/list.php';
                            break;
                            case 'create-size':
                                include 'modules/size/create.php';
                            break;
                            case 'delete-size':
                                include 'modules/size/delete.php';
                            break;
                            case 'list-size':
                                include 'modules/size/list.php';
                            break;
                            case 'edit-size':
                                include 'modules/size/edit.php';
                            break;
                            case 'create-product-size':
                                include 'modules/product-size/create.php';
                            break;
                            case 'list-product-size':
                                include 'modules/product-size/list.php';
                            break;
                            case 'delete-product-size':
                                include 'modules/product-size/delete.php';
                            break;
                            case 'edit-product-size':
                                include 'modules/product-size/edit.php';
                            break;
                            case 'create-saleoff':
                                include 'modules/saleoff/create.php';
                            break;
                            case 'list-saleoff':
                                include 'modules/saleoff/list.php';
                            break;
                            case 'delete-saleoff':
                                include 'modules/saleoff/delete.php';
                            break;
                            case 'edit-saleoff':
                                include 'modules/saleoff/edit.php';
                            break;
                            case 'create-cart':
                                include 'modules/cart/create.php';
                            break;
                            case 'delete-cart':
                                include 'modules/cart/delete.php';
                            break;
                            case 'list-cart':
                                include 'modules/cart/list.php';
                            break;
                            case 'edit-cart':
                                include 'modules/cart/edit.php';
                            break;
                            case 'create-detail-cart':
                                include 'modules/detail-cart/create.php';
                            break;
                            case 'edit-detail-cart':
                                include 'modules/detail-cart/edit.php';
                            break;
                            case 'delete-detail-cart':
                                include 'modules/detail-cart/delete.php';
                            break;
                            case 'list-detail-cart':
                                include 'modules/detail-cart/list.php';
                            break;
                            case 'trang-chu':
                                include 'modules/home.php';
                            break;
                            case 'gio-hang':
                                include 'modules/giohang.php';
                            break;
                            case 'mua':
                                include 'modules/buy.php';
                            break;
                            case 'xoa':
                                include 'modules/delete.php';
                            break;
                            case 'thanh-toan':
                                include 'modules/thanhtoan.php';
                            break;
                            default:
                            include 'modules/dashboard/index.php';
                        }
                    } else {
                        include 'modules/dashboard/index.php';
                    }
                ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'blocks/footer.php' ?>
        <!-- Control Sidebar -->
        <?php include 'blocks/control-sidebar.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include 'blocks/foot.php' ?>
</body>
</html>