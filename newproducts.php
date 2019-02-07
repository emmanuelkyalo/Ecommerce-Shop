<div class="row">

    <!-- section title -->
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title">New Products</h3>
            
        </div>
    </div>
    <!-- /section title -->

    <!-- Products tab & slick -->
    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                    <div class="products-slick" data-nav="#slick-nav-1">
                        <?php
                        $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                        $limit = 4; //if you want to dispaly 10 records per page then you have to change here
                        $startpoint = ($page * $limit) - $limit;
                        $statement = "products where quantity>0 "; //you have to pass your query over here

                        $res10 = mysqli_query($conn, "select * from {$statement} LIMIT {$startpoint} , {$limit}");


                        while ($row10 = mysqli_fetch_array($res10)) {
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

<?php if ($row10["availability"] == 0) { ?>
                                            <span class="text-uppercase text-warning" style=""><b>OUT OF STOCK</b></span>
                                           <?php 
                                        } else {
                                           
                                    } ?>
                                </div>
                                <div class="add-to-cart">
										<a href="addtocart.php?id=<?php echo $row10["id"]; ?>"> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                   
									</div>
                            </div>
                            <!-- /product -->
                        <?php 
                    } ?>

                    </div>
                    <div id="slick-nav-1" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
            </div>
        </div>
    </div>
    <!-- Products tab & slick -->
</div>