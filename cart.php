<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'head.php'
    ?><?php
    $d = 0;

    if (isset($_COOKIE['item'])) {

        $d = $d + 1;
    }
    if ($d == 0) {
        ?>

        <script type="text/javascript">

            alert("You have not added any items to your cart.");

            window.location = "store.php";
        </script>  


        <?php
    }
    ?>
    <body>
        <!-- HEADER -->
      <?php include 'header.php';?>
        <!-- /HEADER -->

        <!-- NAVIGATION -->
        <?php include 'navigation.php';?>
        <!-- /NAVIGATION -->

        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="">
                        <h3 class="" style="text-align: center">ITEMS IN CART</h3>
                      
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
                    <!-- product -->
                    <?php
                    foreach ($_COOKIE['item'] as $name1 => $value) {
                        $values1 = explode("____", $value);
                        if($values1[1]>0){
                        ?> 
                    
                        <div class="col-md-3 col-xs-5">
                            <div class="product" style="text-align: centre;vertical-align: middle;position:relative">
                                <div class=" product-img center" >
                                    <img class="img-responsive center-block" style="position: initial;margin: inherit;top: 0;left: 0;right: 0;bottom: 0;" src="admin/<?php echo $values1[2] ?>"  alt="" height="250" width="200" >

                                </div>
                                <div class="product-body">
                                <p class="product-name">  <?php echo ($values1[0]) ?> </p>
                                    <p class="product-nam"> Unit Price: Kshs <?php echo number_format($values1[3]) ?> </p>
                                    <p class="product-nam"> Quantity: <?php echo $values1[1]; ?></p>
                                    <p class="product-nam"> Total Cost: Kshs <?php echo number_format($values1[4]); ?></p>
                                    <a href="deductquantity.php?id=<?php echo $values1[5] ?>" > <button class="btn btn-primary" style="height:35px;width:100px;"> <i class="fa fa-cart-arrow-down"></i> Deduct </button></a>
                                    <a href="addquantity.php?id=<?php echo $values1[5] ?>" > <button class="btn btn-primary" style="height:35px;width:100px;"><i class="fa fa-cart-plus"></i> Add   </button></a>
                                    
                                    <br><br>
                                    <a href="deletecookie.php?qt=<?php echo $values1[1] ?> &name=<?php echo $name1; ?>" > <button class="btn btn-primary" style="height:35px;width:100px;"><i class="fa fa-remove"></i> Remove</button></a>


                                </div>

                            </div>
                        </div>
                        <!-- /product -->


                        <?php
                    }
                    }
                    $tot = 0;
                    foreach ($_COOKIE['item'] as $name1 => $value) {
                        $values1 = explode("____", $value);

                        $tot = $tot + $values1[4];
                        $totals = number_format($tot);
                    }
                    ?>
                </div>
                <div class="">
                    <div class="product" style="text-align: centre;vertical-align: middle;position:relative">

                        <div class="product-body">

                            <h3 style="text-align: center"> Cart Totals: Kshs <?php echo $totals; ?> </h3>
                            <a href="checkout.php"><button class="btn btn-primary">Proceed to Place Order</button></a>
                        </div>

                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- NEWSLETTER -->
        
        <!-- /NEWSLETTER -->

        <!-- FOOTER -->
       <?php include 'footer.php';?>