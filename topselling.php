<div class="row">

    <!-- section title -->
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title">Top selling</h3>
            <div class="section-nav">
                <ul class="section-tab-nav tab-nav">
                  
                </ul>
            </div>
        </div>
    </div>
    <!-- /section title -->

    <!-- Products tab & slick -->
    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                    <div class="products-slick" data-nav="#slick-nav-2">
                        <?php
                            include 'databaseconnect.php';
                            $queryy = "select * from top_seller";
                            $ress = mysqli_query($conn, $queryy);
                            $roww = mysqli_fetch_array($ress);
                            include("pagination/function.php");

                            $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);





                            while ($roww = mysqli_fetch_array($ress)) {

                                $product_id = $roww["item_id"];

                                $limit = 10; //if you want to dispaly 10 records per page then you have to change here
                                $startpoint = ($page * $limit) - $limit;
                                $statement = "products where id=$product_id"; //you have to pass your query over here

                                $res = mysqli_query($conn, "select * from {$statement} LIMIT {$startpoint} , {$limit}");
                                while ($row10 = mysqli_fetch_array($res)) {
                                    ?>
                        <!-- product -->
                        <div class="product">
                                <div class="product-img">
                                    <a href="product.php?id=<?php echo $row10["id"]; ?>"> <img class="img-responsive center-block" src="admin/<?php echo $row10["image"] ?>" alt="" height="270" width="250"</a>
                                    <div class="product-label">
                                       
                                        
                                    </div>
                                </div>
                                <div class="product-body">

                                    <h3 class="product-name"> <a href="product.php?id=<?php echo $row10["id"]; ?>"><?php echo $row10["name"] ?></a></h3>
                                    <h4 class="product-price">Kshs <?php echo number_format($row10["price"]) ?> </h4>


                                </div>
                                <div class="add-to-cart">
										<a href="addtocart.php?id=<?php echo $row10["id"]; ?>"> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                   
									</div>
                            </div>
                        <!-- /product -->

                            <?php }}?>
                    </div>
                    <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
            </div>
        </div>
    </div>
    <!-- /Products tab & slick -->
</div>