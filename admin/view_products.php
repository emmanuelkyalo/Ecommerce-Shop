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
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include 'navbar.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Product List</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>

                                <th>Category</th>
                                <th>Price</th>
                                <th>Colour</th> 
                                <th>Size</th> 
                                <th>Description</th>
                                <th>Availability</th>
                            </tr>
                        </thead>  
                        <tbody>
                            <?php
                            include("pagination/function.php");
                            $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                            $limit = 10; //if you want to dispaly 10 records per page then you have to change here
                            $startpoint = ($page * $limit) - $limit;
                            $statement = "products"; //you have to pass your query over here

                            $res = mysqli_query($conn, "select * from {$statement} LIMIT {$startpoint} , {$limit}");


                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?> <br> <br><a href="edit.php?id=<?php echo $row["id"] ?>"> Edit</a>
                                        <br><a href="delete_product.php?id=<?php echo $row["id"] ?>" style="color: red"> Delete</a>
                                        <br><a href="outstock.php?product=<?php echo $row["id"] ?>" style="color: blue"> Outstock</a>
                                        <br><a href="restock.php?product=<?php echo $row["id"] ?>" style="color: blue"> Restock</a>
                                          <br><a href="trend.php?product=<?php echo $row["id"] ?>" style="color: blue"> Trend</a>
                                            <br><a href="untrend.php?product=<?php echo $row["id"] ?>" style="color: blue"> Untrend</a>
                                    </td>
                                    <td> <img src="../admin/<?php echo $row["image"] ?> " height="150" width="100"></td>
                                    <td><?php echo $row["category"] ?></td>
                                    <td><?php echo $row["price"] ?></td>
                                    <td><?php echo $row["colour"] ?></td>
                                    <td><?php echo $row["size"] ?></td>
                                    <td><?php echo $row["description"] ?></td>
                                    <td><?php echo $row["availability"] ?></td>
                                </tr>


                            <?php } ?>

                        </tbody>
                    </table>
                    <div class="pagination pagination-small pagination-centered">
                        <ul>
                            <?php echo pagination($statement, $limit, $page); ?>
                        </ul>
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


