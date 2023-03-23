
<?php
session_start();

include 'library/config.php';
include 'library/connect.php';
include 'admin/model/model.php';


if (isset($_GET["id"])) {
    $id = $_GET["id"];
	$detail = show_old_data_product ($conn,$id);
	if (isset($_POST["add"])){
		$qty = $_POST["quantity"];
		if (!isset($_SESSION["cart"][$id]["quantity"])){
			$_SESSION["cart"][$id]["id"] = $id;
			$_SESSION["cart"][$id]["quantity"] = $qty;
			$_SESSION["cart"][$id]["name"] = $detail["name"];
			$_SESSION["cart"][$id]["price"] = $detail["price"];
		}else 
		{
			$_SESSION["cart"][$id]["quantity"] += $qty;
		}		
	}
	if (isset($_POST["buy"])){
		$qty = $_POST["quantity"];
		if (!isset($_SESSION["cart"][$id]["quantity"])){
			$_SESSION["cart"][$id]["id"] = $id;
			$_SESSION["cart"][$id]["quantity"] = $qty;
			$_SESSION["cart"][$id]["name"] = $detail["name"];
			$_SESSION["cart"][$id]["price"] = $detail["price"];
		}else 
		{
			$_SESSION["cart"][$id]["quantity"] += $qty;
		}	
		header("location:shopping_cart.php");
		exit();
	}				
?>





<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'blocks/head.php'; ?>
</head>
	<body>

	<div class="loader_wrapper">
		<?php include 'blocks/loader_wrapper.php' ?>
	</div> <!--// loader_wrapper -->

		<div id="wrapper">
	
		<header class="new-block main-header">
			<?php include 'blocks/header.php' ?>
		</header> <!-- header -->
		<form method="POST" action="">
		<section class="about-product new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="img-holder">
							<img src="admin/public/<?php echo $detail["image"] ?>"	 alt="" class="img-responsive">
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="block-stl6">
							<h2><?php echo $detail["name"] ?> <span class="veg veg-nonveg"></span></h2>
							<p class="price"><span><?php echo number_format($detail["price"],0,"",".") ?>VND</span> <small></small> </p>
							<p class="rating-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <span>( 245 Ratings & 355 Reviews )</span> </p>
							<p class="ab-txt"><?php echo $detail["intro"] ?></p>
							<br></br>
							<form action="#">
								<div class="form-block">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												<label>Size :<?php 
															$id= $detail["size_id"] ;
															$size = show_old_data_size ($conn,$id);
															echo $size["size"];
															?></label>
											</div>
										</div>
										
										
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												<label>Qty : <div class="p_quantity">
																<div class="quantity">
																	<input type="number" class="form-control text-center" name="quantity" value="1" min="0">
	
																</div>
																</div>
												</label>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group btn-block">
											<button class="btn1 stl2" type="submit" name="buy">buy now</button>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group btn-block">
											<button class="btn1 stl2" type="submit" name="add">Add to Cart</button>
											</div>
										</div>
									</div>
								</div>

						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>
		</form>

		<div class="copy-right">
				<?php include 'blocks/container.php' ?>
			</div>
			<?php include 'blocks/choose_color.php' ?>
			<?php include 'blocks/arrow.php' ?>

		</div><!-- #wrapper -->

	<?php include 'blocks/jquery.php' ?>
</body>
</html>



<?php }?>