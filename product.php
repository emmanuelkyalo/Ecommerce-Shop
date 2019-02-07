<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';


    $id = $_GET["id"];


    $query = "select * from products where id=$id";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
    $availability = $row["availability"];
    ?>
    <body>
        <!-- HEADER -->
        <?php include 'header.php'; ?>
        <!-- /HEADER -->

        <!-- NAVIGATION -->
        <?php include 'navigation.php'; ?>
        <!-- /NAVIGATION -->

        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb-tree">

                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- Product main img -->
                    <div class=" col-md-5 col-md-push-2" style="text-align: centre;vertical-align: middle;position:relative">
                        <div id="product-main-img">
                           <div class="product-preiew">
                                <img class="img-responsive center-block" src="admin/<?php echo $row["image"] ?>" alt="">
                            </div>
                            <div class="product-preiew">
                                <img class="img-responsive center-block" src="admin/<?php echo $row["image1"] ?>" alt="">
                            </div>
                             <div class="product-preiew">
                                <img class="img-responsive center-block" src="admin/<?php echo $row["image2"] ?>" alt="">
                            </div>


                        </div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs">
                           <div class="product-preview">
                                <img class="img-responsive center-block" src="admin/<?php echo $row["image"] ?>" alt="">
                            </div>
                            <div class="product-preview">
                                <img class="img-responsive center-block" src="admin/<?php echo $row["image1"] ?>" alt="">
                            </div>
 <div class="product-preview">
                                <img class="img-responsive center-block" src="admin/<?php echo $row["image2"] ?>" alt="">
                            </div>

                        </div>
                    </div>
                    <!-- /Product thumb imgs -->

                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row["name"] ?></h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>

                            </div>
                            <div style="">
                                <h3 class="product-price">Kshs <?php echo number_format($row["price"]) ?> </h3>
                                <?php if ($availability == 1) { ?>
                                    <span class="product-available">In Stock</span>
                                <?php } else { ?>

                                    <span class="product-available">Out of Stock</span>
                                <?php } ?>
                            </div>
                            <p><?php echo $row["description"] ?></p>

                            <div class="product-options">
                                <label>
                                    <b>Size : </b> <?php echo $row["size"] ?>

                                </label>
                                <label>
                                    <b>Color : </b> <?php echo $row["colour"] ?>

                                </label>

                            </div>

                            <div class="add-to-cart center-block" style="text-align: center; align-content: center">
                                <?php if ($availability == 1) { ?>
                                    <a href="addtocart.php?id=<?php echo $row["id"]; ?>" > <button class="add-to-cart-btn center "><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
                                <?php } else { ?>

                                    <button class="add-to-cart-btn center "><i class="fa fa-shopping-cart"></i> Disabled</button>
                                <?php } ?>

                            </div>



                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a href="filter_query.php?keyword='<?php echo $row["category"]; ?>'"><?php echo strtoupper($row["category"]) ?></a></li>

                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product details -->


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- Related Products -->
        <?php include 'related_products.php'; ?>
        <!-- /Related Products-->

        <?php include 'footer.php'; ?>