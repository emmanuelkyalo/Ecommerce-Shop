<?php
session_start();

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
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
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
                        <h3 class="breadcrumb-header">Checkout</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Checkout</li>
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

                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Customer Details</h3>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    Name: <input class="input" type="text" name="name" placeholder="Name" required="">
                                </div>

                                <div class="form-group">
                                    Email: <input class="input" type="email" name="email" placeholder="Email" required="">
                                </div>


                                <div class="form-group">
                                    Phone Number: <input class="input"  type="tel" name="phonenumber" required="" placeholder="Phone Number">
                                </div>

                        </div>
                        <!-- /Billing Details -->

                        <!-- Shiping Details -->

                        <!-- /Shiping Details -->

                        <!-- Order notes -->

                        <!-- /Order notes -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Your Order</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCT</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>
                            <div class="order-products">

                                <?php
                                foreach ($_COOKIE['item'] as $name1 => $value) {
                                    $values1 = explode("____", $value);
                                    if ($values1[1] > 0) {
                                        ?> 
                                        <div class="order-col">
                                            <div><?php echo $values1[1]; ?> x <?php echo ($values1[0]) ?></div>
                                            <div>Kshs <?php echo number_format($values1[4]); ?></div>
                                        </div>
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

                            <div class="order-col">
                                <div><strong>TOTAL</strong></div>
                                <div><strong class="">Kshs <?php echo $totals; ?></strong></div>
                            </div>
                        </div>
                        <div class="center-block" style="text-align: center; align-content: center">

                            <button class="btn btn-default" type="submit" name="order" >Place Order</button>
                        </div>


                        </form>
                    </div>
                    <!-- /Order Details -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->


        <?php include 'footer.php'; ?>
        <?php
        if (isset($_POST["order"])) {
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $phonenumber = mysqli_real_escape_string($conn, $_POST["phonenumber"]);
            $identity = rand(111111, 999999);
            if (empty($name)) {
                ?>
                <script type="text/javascript">
                    alert("Please enter in all your details");
                    history.back();
                </script>
                <?php
            } else {
                if (empty($email)) {
                    ?>
                    <script type="text/javascript">
                        alert("Please enter in all your details");
                        history.back();
                    </script>
                    <?php
                } else {
                    if (empty($phonenumber)) {
                        ?>
                        <script type="text/javascript">
                            alert("Please enter in all your details");
                            history.back();
                        </script>
                        <?php
                    } else {
                        if (strlen($phonenumber) != 10) {
                            ?>
                            <script type="text/javascript">
                                alert("Please enter a valid phone number");
                                history.back();
                            </script>
                            <?php
                        } 
                             else {
                                if (strpos($email, '@') == FALSE) {
                                    ?>
                                    <script type="text/javascript">
                                        alert("Please enter  a valid email");
                                        history.back();
                                    </script>
                                    <?php
                                } else {
                                    if (strpos($email, '.') == FALSE) {
                                        ?>
                                        <script type="text/javascript">
                                            alert("Please enter  a valid email");
                                            history.back();
                                        </script>
                                        <?php
                                    } else {
                                        $d = 0;

                                        if (isset($_COOKIE['item'])) {

                                            $d = $d + 1;
                                        }
                                        if ($d == 0) {

                                            echo 'No items in the cart';
                                        } else {

                                            $query = "insert into orders(Name,Phone_Number,email,id) values('$name','$phonenumber','$email','$identity')";
                                            $res = mysqli_query($conn, $query);


                                            $query = "select Order_Number from orders where id=$identity";
                                            $res = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_array($res);
                                            $ordernumber = $row["Order_Number"];



                                            foreach ($_COOKIE['item'] as $name1 => $value) {
                                                $values1 = explode("____", $value);

                                                $productname = $values1[0];
                                                $productquantity = $values1[1];

                                                $productprice = $values1[3];
                                                $producttotal = $values1[4];
                                                $productidentity = $values1[5];
                                                $productcolour = $values1[6];
                                                $productsize = $values1[7];

                                                $query = "insert into orderdetails values($ordernumber,'$productname',$productquantity,$productprice,$producttotal,$productidentity,'$productcolour ','$productsize')";
                                                $result = mysqli_query($conn, $query);



// $avail="UPDATE products SET availability=0 where id=$productidentity";
//$results= mysqli_query($conn, $avail);
                                            }

                                            $query = "insert into ordercost values($ordernumber,$tot)";
                                            $result = mysqli_query($conn, $query);

                                            $query = "insert into pendingorders(Order_Number,Name,email,Phone_Number) values($ordernumber,'$name','$email','$phonenumber')";
                                            $res = mysqli_query($conn, $query);
                                            ?>
                                            <script type="text/javascript">
                                                alert("Thank you <?php echo $name; ?> for shopping with us.Your order number is <?php echo $ordernumber; ?>. We will contact you on how to get the items");
                                                window.location = 'index.php';
                                            </script>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        
        