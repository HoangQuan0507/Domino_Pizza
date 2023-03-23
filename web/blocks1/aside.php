<?php
    if (isset($_POST["logout"])){
        unset($_SESSION["login"]);
    
    header("location:index.php");
    exit();
    }
?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
    <img src="public/dist/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">quan</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
        <form action="" method="POST">
        <div class="info">
                <a href="#" class="d-block"><?php if (isset($_SESSION["login"])){echo $_SESSION["login"]["name"];}else {echo "chua dang nhap";}?></a>
                <button name="logout" type="submit">logout</button>
            </div>
        </form>
           
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            bang dieu khien
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           user
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>create user</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list user</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            the loai
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>them the loai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>danh sach the loai</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-atlas"></i>
                        <p>
                            product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>create product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list product</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>