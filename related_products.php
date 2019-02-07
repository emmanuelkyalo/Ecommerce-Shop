<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>
            <?php
            $cat=$row["category"];
            $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
            $limit = 4; //if you want to dispaly 10 records per page then you have to change here
            $startpoint = ($page * $limit) - $limit;
            $statement = "products where category='$cat'"; //you have to pass your query over here

            $res10 = mysqli_query($conn, "select * from {$statement} LIMIT {$startpoint} , {$limit}");


            while ($row10 = mysqli_fetch_array($res10)) {
               
                ?>
            <!-- product -->
            <div class="col-md-3 col-xs-6">
                          <div class="product">
                                    <div class="product-img">
                                        <a href="product.php?id=<?php echo $row10["id"]; ?>"> <img class="img-responsive center-block" src="admin/<?php echo $row10["image"] ?>" alt="" height="200" width="250"</a>
                                        <div class="product-label">
                                           
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        
                                        <h3 class="product-name"> <a href="product.php?id=<?php echo $row10["id"]; ?>"><?php echo $row10["name"] ?></a></h3>
                                        <h4 class="product-price">Kshs <?php echo number_format($row10["price"]) ?> </h4>
                                      
                                       <?php if($row10["availability"]==0){?>
                                            <span class="text-uppercase text-warning" style=""><b>OUT OF STOCK</b></span>
                                           <?php } ?>
                                    </div>


                                    <?php 
                                        if ($row["availability"] == 1) { ?>
                                            <div class="add-to-cart">
                                            <a href="addtocart.php?id=<?php echo $row["id"]; ?>"> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                       
                                        </div>
<?php

} else { ?>


<div class="add-to-cart">
										<a href=""]; ?> <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Disabled</button></a>
                                   
									</div>
<?php

}


?>                                    
                                   
                                </div>
            </div>
            <!-- /product -->
            <?php } ?>


           
           

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>