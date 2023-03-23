
<?php
session_start();
ob_start();
include 'library/config.php';
include 'library/connect.php';
include 'admin/model/model.php';
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

		<div class="banner slider1 new-block">
			<?php include 'blocks/banner.php' ?>
		</div><!-- banner -->
        <section class="domnoo-menu-filter list-grid-sec new-block">

            <div class="fixed-bg parallax" style="background-image: url(images/ptrn1.jpg);"></div>
            <div class="overlay"></div>

            <?php include 'blocks/filters.php' ?>
            
            <div class="container text-center">
                <?php include 'blocks/pagination.php' ?>
            </div>
            <div class="clearfix"></div>
           
            <div class="grid" id="grid">
                   <?php
                    $stmt = $conn->prepare("SELECT id FROM category WHERE name = 'Pizza'");
                    $stmt->execute();
                    $id = $stmt->fetch(PDO::FETCH_ASSOC);
                    $p = $id["id"];
                    $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $p and status = '1' ORDER BY id DESC LIMIT $start,$oneperpage");
                    $stmt->execute();
                    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach ($data as $item) {
                    ?>
                <div class="items-for-flr pizza" data-newest="<?php echo $item["id"] ?>" data-popularity="1" data-price="<?php echo $item["price"] ?>">
                    <div class="block-stl2">
                        <div class="img-holder">
                            <img src="admin/public/<?php echo $item["image"] ?>" alt="" class="img-responsive">
                        </div>
                        <div class="text-block">
                            <h3><?php echo $item["name"] ?></h3>
                            <p class="sz">Size : <?php 
                                $id= $item["size_id"] ;
                                $size = show_old_data_size ($conn,$id);
                                echo $size["size"];
                                ?></p>
                            <p class="ab-it"><?php echo $item["intro"] ?></p>
                            <p class="price"><span><?php echo number_format($item["price"],0,"",".") ?>VND</span> </p>
                        </div>
                        <div class="btn-sec">
                            <a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn4">About More</a>
                            <a href="buy.php?id=<?php echo $item["id"] ?>" class="btn4">Add to Cart</a>
                        </div>
                        <span class="nonveg veg-nonveg"></span>
                    </div>

                    <div class="block-stl2_dsn2 md2">
                        <div class="img-holder">
                            <img src="admin/public/<?php echo $item["image"] ?>" alt="" class="img-responsive">
                        </div>
                        <div class="text-block">
                            <h3><?php echo $item["name"] ?></h3>
                            <p class="sz">Size : <?php 
                                $id= $item["size_id"] ;
                                $size = show_old_data_size ($conn,$id);
                                echo $size["size"];
                                ?></p>
                            <p class="ab-it"><?php echo $item["intro"] ?></p>
                            <p class="price"><span><?php echo number_format($item["price"],0,"",".") ?>VND</span> </p>
                            <div class="btn-sec">
                                <a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn4">About More</a>
                                <a  href="buy.php?id=<?php echo $item["id"] ?>" class="btn4">Add to Cart</a>
                            </div>
                        </div>
                        <span class="nonveg veg-nonveg"></span>
                    </div>
                </div>
            
                    <?php } ?>

                    <?php
                        $stmt = $conn->prepare("SELECT id FROM category WHERE name = 'Drinks'");
                        $stmt->execute();
                        $id = $stmt->fetch(PDO::FETCH_ASSOC);
                        $p = $id["id"];
                        $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $p ORDER BY id DESC LIMIT $start,$oneperpage");
                        $stmt->execute();
                        $data = $stmt->fetchall(PDO::FETCH_ASSOC);
                        foreach ($data as $item) {
                    ?>
                <div class="items-for-flr drinks" data-newest="<?php echo $item["id"] ?>" data-popularity="1" data-price="<?php echo $item["price"] ?>">
                    <div class="block-stl2">
                        <div class="img-holder">
                            <img src="admin/public/<?php echo $item["image"] ?>" alt="" class="img-responsive">
                        </div>
                        <div class="text-block">
                            <h3><?php echo $item["name"] ?></h3>
                            <p class="sz">Size : <?php 
                                $id= $item["size_id"] ;
                                $size = show_old_data_size ($conn,$id);
                                echo $size["size"];
                                ?></p>
                            <p class="ab-it"><?php echo $item["intro"] ?></p>
                            <p class="price"><span><?php echo number_format($item["price"],0,"",".") ?>VND</span> </p>
                        </div>
                        <div class="btn-sec">
                            <a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn4">About More</a>
                            <a href="buy.php?id=<?php echo $item["id"] ?>" class="btn4">Add to Cart</a>
                        </div>
                        <span class="nonveg veg-nonveg"></span>
                    </div>

                    <div class="block-stl2_dsn2 md2">
                        <div class="img-holder">
                            <img src="admin/public/<?php echo $item["image"] ?>" alt="" class="img-responsive">
                        </div>
                        <div class="text-block">
                            <h3><?php echo $item["name"] ?></h3>
                            <p class="sz">Size : <?php 
                                $id= $item["size_id"] ;
                                $size = show_old_data_size ($conn,$id);
                                echo $size["size"];
                                ?></p>
                            <p class="ab-it"><?php echo $item["intro"] ?></p>
                            <p class="price"><span><?php echo number_format($item["price"],0,"",".") ?>VND</span> </p>
                            <div class="btn-sec">
                                <a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn4">About More</a>
                                <a  href="buy.php?id=<?php echo $item["id"] ?>" class="btn4">Add to Cart</a>
                            </div>
                        </div>
                        <span class="nonveg veg-nonveg"></span>
                    </div>
                </div>
            
                <?php } ?>
                
                <?php
                        $stmt = $conn->prepare("SELECT id FROM category WHERE name = 'Combo'");
                        $stmt->execute();
                        $id = $stmt->fetch(PDO::FETCH_ASSOC);
                        $p = $id["id"];
                        $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $p ORDER BY id DESC LIMIT $start,$oneperpage");
                        $stmt->execute();
                        $data = $stmt->fetchall(PDO::FETCH_ASSOC);
                        foreach ($data as $item) {
                    ?>
                <div class="items-for-flr taco" data-newest="<?php echo $item["id"] ?>" data-popularity="1" data-price="<?php echo $item["price"] ?>">
                    <div class="block-stl2">
                        <div class="img-holder">
                            <img src="admin/public/<?php echo $item["image"] ?>" alt="" class="img-responsive">
                        </div>
                        <div class="text-block">
                            <h3><?php echo $item["name"] ?></h3>
                            <p class="sz">Size : <?php 
                                $id= $item["size_id"] ;
                                $size = show_old_data_size ($conn,$id);
                                echo $size["size"];
                                ?></p>
                            <p class="ab-it"><?php echo $item["intro"] ?></p>
                            <p class="price"><span><?php echo number_format($item["price"],0,"",".") ?>VND</span> </p>
                        </div>
                        <div class="btn-sec">
                            <a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn4">About More</a>
                            <a href="buy.php?id=<?php echo $item["id"] ?>" class="btn4">Add to Cart</a>
                        </div>
                        <span class="nonveg veg-nonveg"></span>
                    </div>

                    <div class="block-stl2_dsn2 md2">
                        <div class="img-holder">
                            <img src="admin/public/<?php echo $item["image"] ?>" alt="" class="img-responsive">
                        </div>
                        <div class="text-block">
                            <h3><?php echo $item["name"] ?></h3>
                            <p class="sz">Size : <?php 
                                $id= $item["size_id"] ;
                                $size = show_old_data_size ($conn,$id);
                                echo $size["size"];
                                ?></p>
                            <p class="ab-it"><?php echo $item["intro"] ?></p>
                            <p class="price"><span><?php echo number_format($item["price"],0,"",".") ?>VND</span> </p>
                            <div class="btn-sec">
                                <a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn4">About More</a>
                                <a  href="buy.php?id=<?php echo $item["id"] ?>" class="btn4">Add to Cart</a>
                            </div>
                        </div>
                        <span class="nonveg veg-nonveg"></span>
                    </div>
                </div>
            
                <?php } ?>
            <div class="clearfix"></div>
            </div>
            

            <div class="filter-tabnav">
        <div class="container"> 
            <div class="list-grid-btns">
                <button class="btn grid-btn"><i class="flaticon-menu"></i></button>
                <button class="btn active list-btn"><i class="flaticon-grid"></i></button>
            </div>
        </div>
    </div>
            <div class="copy-right">
				<?php include 'blocks/container.php' ?>
			</div>
            <?php include 'blocks/choose_color.php' ?>
			<?php include 'blocks/arrow.php' ?>
	    </section>  
		</div><!-- #wrapper -->

	<?php include 'blocks/jquery.php' ?>
</body>
</html>