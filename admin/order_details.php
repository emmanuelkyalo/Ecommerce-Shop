<?php
session_start();
if ($_SESSION["admin"] == "") {
    ?>

    <script type = "text/javascript">
        window.location = "login.php";

    </script>
    <?php
}
include 'header.php';
include 'databaseconnect.php';
$order_no = $_GET["order"];
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include 'navbar.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="home.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Order <?php echo $order_no; ?></li>
            </ol>
            <div class="row">
                <div class="col-12">



                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Name</th>

                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Colour</th> 
                                <th>Size</th> 

                            </tr>
                        </thead>  
                        <tbody>
                            <?php
                            $query = "select * from orderdetails where Order_Number=$order_no ";
                            $res = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($res)) {
                                ?>



                                <tr>
                                    <td><?php echo $row["Identity"] ?></td>
                                    <td><?php echo $row["Name"] ?>  </td>


                                    <td><?php echo $row["Price"] ?></td>
                                    <td><?php echo $row["Quantity"] ?></td>
                                    <td><?php echo $row["colour"] ?></td>
                                    <td><?php echo $row["size"] ?></td>
                                </tr>


                            <?php } ?>

                            <tr> <td></td>  
                                <td></td>  
                                <td></td>  
                                <td></td>
                                <td> <a href="set_as_ready.php?order_no=<?php echo $order_no ?>">Mark as ready</a></td></tr>

                        </tbody>
                    </table>
                    <div style="text-align: center">
                        <?php
                        $query8 = "select * from ordercost where Order_Number=$order_no ";
                        $res8 = mysqli_query($conn, $query8);
                        $row8 = mysqli_fetch_array($res8);
                        ?>
                        <p>  Order Cost: Kshs <?php echo number_format($row8["Order_Cost"]); ?></p>

             

                    </div>


                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Urban Feet 2018</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
    </div>
</body>

</html>
