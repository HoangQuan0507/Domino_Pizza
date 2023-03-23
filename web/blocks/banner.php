
    <div class="fixed-bg" style="background: url('images/slider-bg1.jpg');"></div>
    <div class="slider owl-carousel owl-theme">
        
    <?php
                        $stmt = $conn->prepare("SELECT id FROM category WHERE name = 'Combo'");
                        $stmt->execute();
                        $id = $stmt->fetch(PDO::FETCH_ASSOC);
                        $p = $id["id"];
                        $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $p ORDER BY id DESC ");
                        $stmt->execute();
                        $data = $stmt->fetchall(PDO::FETCH_ASSOC);
                        foreach ($data as $item) {
                    ?>    
        <div class="item">
            <div class="slider-block slide1 new-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="text-block">
                                <div class="img-block ab1" data-animation-in="bounceInDown" data-animation-out="animate-out fadeOutRight">
                                    <img src="images/pizza.png" alt="" class="img-responsive">
                                </div>
                                <h1 class="text-stl1" data-animation-in="lightSpeedIn" data-animation-out="animate-out fadeOutRight"><?php echo $item["name"] ?></h1>
                                <div class="number-block" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight">
                                    
                                    <p class="text-stl2"><?php echo $item["intro"] ?></p>
                                    <h2 class="text-stl3"><span><?php echo number_format($item["price"],0,"",".") ?>VND</span></h2>
                                    <div class="text-center">
                                        <a href="product_single.php?id=<?php echo $item["id"] ?>" class="btn1 stl2">About More</a>
                                        <a href="buy.php?id=<?php echo $item["id"] ?>" class="btn1 stl1">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="img-block img2">
                                <div class="img-holder" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">
                                    <img src="images/pz.png" alt="" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .slider-block -->
        </div>
       
                 <?php } ?>
        <!-- <div class="item">
            <div class="slider-block slide1 new-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="text-block">
                                <div class="img-block ab1" data-animation-in="bounceInDown" data-animation-out="animate-out fadeOutRight">
                                    <img src="images/pizza.png" alt="" class="img-responsive">
                                </div>
                                <h1 class="text-stl1" data-animation-in="lightSpeedIn" data-animation-out="animate-out fadeOutRight">Mua 1 tặng 1</h1>
                                <div class="number-block" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight">
                                    <p class="text-stl2">HotLine</p>
                                    <h2 class="text-stl3">+84903748281</h2>
                                    <div class="text-center">
                                        <a href="#" class="btn1 stl2">About More</a>
                                        <a href="#" class="btn1 stl1">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="img-block img2">
                                <div class="img-holder" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">
                                    <img src="images/sldr.png" alt="" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
