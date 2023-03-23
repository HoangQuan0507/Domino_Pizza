


<?php
session_start();
ob_start();
include 'library/config.php';
include 'library/connect.php';
include 'admin/model/model.php';

if (isset($_POST["update_cart"])) {

    foreach ($_POST["id"] as $key => $id) {
        $_SESSION["cart"][$id]["quantity"] = $_POST["quantity"][$key];
    }
}
if (isset($_POST["check"])) {
	header("location:getcart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'blocks/head.php'; ?>
</head>
	<body>
	<form method="POST" action="">
	<div class="loader_wrapper">
		<?php include 'blocks/loader_wrapper.php' ?>
	</div> <!--// loader_wrapper -->

		<div id="wrapper">
	
		<header class="new-block main-header">
			<?php include 'blocks/header.php' ?>
		</header> <!-- header -->

		<section class="shopping-cart new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
						
							<table class="table cart-tbl">
							<thead>
								<tr>
									<th class="p_dtl">Product Details</th>
									<th class="p_btn"></th>
									<th class="p_price">Price</th>
									<th class="p_quantity">Quantity</th>
									<th class="p_ttl">Total</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$tongtien = 0;
		
								if(!isset($_SESSION["cart"])){
									echo "<h3 style='color:blue'>>>YOUR CART EMPTY</h3>";
								}else{
						   		foreach ($_SESSION["cart"] as $item) {
							?>
							<tr>
								<td class="p_dtl">
									<div class="block-stl9">
										<div class="img-holder">
											<img src="admin/public/<?php 
											$id = $item["id"] ;
											$product = show_old_data_product ($conn,$id);
											echo $product["image"];
											?>" alt="" class="img-responsive">
										</div>
										<div class="info-block">
											<h5><?php  echo $item["name"] ?></h5>
											<p class="txt-cat">Regular</p>
											<p class="ab-txt-block"><?php 
                                echo $product["intro"];
                                ?></p></p>
										</div>
									</div>
								</td>
								<td class="p_btn">
									<a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn1 stl3">About more</a>
									<a href="delete.php?id=<?php echo $item["id"] ?>" class="btn1 stl3">Remove</a>
								</td>
								<td class="p_price">
								<?php echo number_format($item["price"]) ?>
								</td>
								<td class="p_quantity">
									<div class="quantity">
										<input type="number" class="form-control text-center"name="quantity[]" value="<?php echo $item["quantity"] ?>" min="0">
								
            							
									</div>
									<input type="hidden" name="id[]" value="<?php echo $item["id"] ?>">
								</td>
								<td class="p_ttl">
								<?php echo number_format($item["price"] * $item["quantity"]) ?>
								</td>
							</tr>
							<?php
           					$tongtien += $item["price"] * $item["quantity"];
        					}}?>

							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>

		<section class="loc-cop-sum  new-block">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="block-stl10">
							<h3>discount coupons :</h3>
							<p>Enter your code</p>
							<p ><?php if (isset($_POST["apply"])) {
								$code = $_POST["code"];
								if (check_code ($conn,$code) == true){
									$codes = show_code ($conn,$code);
									if (date("l") != "Sunday"&& $code == "123456"){
										echo '<p style="color:red" >Code not correct</p>';
										$codes["saleoff"]=0;
									}else{
									echo $codes["intro"];
									}
								}else {
									echo '<p style="color:red" >Code not correct</p>';
								}
							}?></p>
							<form action="#">
								<div class="form-group">
									<input type="text" class="form-control" name="code" placeholder="code type here..">
								</div>
								<button class="btn btn5" name="apply">Apply</button>
							</form>
						</div>
					</div>
					<div class="col-lg-8 col-md-8 col-xs-12">
						<div class="block-stl10 odr-summary">
							<h3>order summary :</h3>
							<ul class="list-unstyled">
								<li><span class="ttl">Subtotal</span> <span class="stts"><?php echo number_format($tongtien) ?></span></li>
								<!-- <li><span class="ttl">Shipping</span> <span class="stts">Free Shipping</span></li> -->
								<li><span class="ttl">Vat Tax (20%)</span> <span class="stts"></span></li>
								<li><span class="ttl">Apply Discount Coupon</span> <span class="stts"><?php
								if (isset($_POST["apply"])) {
								 echo number_format($codes["saleoff"]);
								 $down = ($codes["saleoff"]);
								}else { echo 0;
									$down = 0;
								}?>%</span></li>
							</ul>
							<div class="ttl-all">
								<span class="ttlnm">Total</span>
								<span class="odr-stts"><?php 
								$tongtien = $tongtien - ($tongtien*$down/100);
								echo number_format($tongtien) ;
								?></span>
							</div>
						</div>
						<button class="btn btn1 stl2" type="submit" name="update_cart">Update</button>
						<button class="btn btn1 stl2" type="submit" name="check">Check out</button>
					</div>
				</div>
			</div>
		</section>

		<div class="copy-right">
				<?php include 'blocks/container.php' ?>
			</div>

			<?php include 'blocks/arrow.php' ?>

		</div><!-- #wrapper -->

	<?php include 'blocks/jquery.php' ?>
	</form>
</body>
</html>