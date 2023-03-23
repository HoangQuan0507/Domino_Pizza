<?php
session_start();
ob_start();
include 'library/config.php';
include 'library/connect.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    unset($_SESSION["cart"][$id]);
    
    header("location:shopping_cart.php");
    exit();
} else {
    header("location:shopping_cart.php");
    exit();
}
?>