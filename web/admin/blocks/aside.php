<?php
    if (isset($_POST["logout"])){
        unset($_SESSION["login"]);
    
    header("location:../home.php");
    exit();
    }
?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
    <img src="public/dist/img/logo.png"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Pizza</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="public/dist/img/img3.png" class="img-circle elevation-2" alt="User Image">
            </div>
        <form action="" method="POST">
        <div class="info">
                <a href="#" class="d-block"><?php if (isset($_SESSION["login"])){echo $_SESSION["login"]["name"];}else {echo "chua dang nhap";}?></a><br>
                <button name="logout" type="submit">Logout</button>
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
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create user</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List user</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-atlas"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-sellsy"></i>
                        <p>
                            Size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-size" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create size</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-size" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List size</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-redhat"></i>
                        <p>
                            Product size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-product-size" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create product size</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-product-size" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List product size</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Cart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-cart" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create cart</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-cart" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List cart</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Detail cart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?p=create-detail-cart" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create detail cart</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=list-detail-cart" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List detail cart</p>
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