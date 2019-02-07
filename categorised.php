<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php';
    $keyword = $_SESSION["search_parameter"];
    $query1 = "SELECT COUNT(*) as 'prods' FROM products";
    $res1 = mysqli_query($conn, $query1);
    $row = mysqli_fetch_array($res1);

    $totalprod = $row['prods'];
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
                    <!-- ASIDE -->
<?php include 'leftbar.php'; ?>
                    <!-- /ASIDE -->

                    <!-- STORE -->
                    <div id="store" class="col-md-9">
                        <!-- store top filter -->
                        <div class="store-filter clearfix">
                            
                        </div>
                        <!-- /store top filter -->

                        <!-- store products -->
                        <div class="row">
                            <?php
                            include("pagination/function.php");
                            $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                            $limit = 15; //if you want to dispaly 10 records per page then you have to change here
                            $startpoint = ($page * $limit) - $limit;
                            $statement = "products where quantity>0 and category=$keyword"; //you have to pass your query over here

                            $res = mysqli_query($conn, "select * from {$statement} LIMIT {$startpoint} , {$limit}");


                            while ($row = mysqli_fetch_array($res)) {
                                $discount = rand(100, 10000000);

                              
                                ?>

                                <!-- product -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="product.php?hash=<?php echo $discount*3 ?>&level=<?php echo $discount ?>&id=<?php echo $row["id"]; ?>"> <img class="img-responsive center-block" src="admin/<?php echo $row["image"] ?>" alt="" height="270" width="250"</a>
                                            <div class="product-label">
                                             
                                               
                                            </div>
                                        </div>
                                        <div class="product-body">

                                            <h3 class="product-name"> <a href="product.php?hash=<?php echo $discount*3 ?>&level=<?php echo $discount ?>&id=<?php echo $row["id"]; ?>"><?php echo $row["name"] ?></a></h3>
                                            <h4 class="product-price">Kshs <?php echo number_format($row["price"]) ?> </h4>
<?php if($row["availability"]==0){?>
                                            <span class="text-uppercase text-warning" style=""><b>OUT OF STOCK</b></span>
                                           <?php } ?>

                                        </div>
                                        <div class="add-to-cart">
										<a href="addtocart.php?id=<?php echo $row["id"]; ?>"> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                   
									</div>
                                    </div>
                                </div>
                                <!-- /product -->
                            <?php } ?>


                            <div class="clearfix visible-sm visible-xs"></div>



                        </div>
                        <!-- /store products -->

                        <!-- store bottom filter -->
                        <div class="store-filter clearfix">
                           
                            <ul class="pagination">
                                <?php echo pagination($statement, $limit, $page); ?>
                            </ul>
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /STORE -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
        <?php include 'footer.php'; ?>
