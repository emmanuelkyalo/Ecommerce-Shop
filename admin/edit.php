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
$id = $_GET["id"];

$query = "select * from products where id=$id";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
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
                <li class="breadcrumb-item active">Add Product</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <form action="" method="post" enctype="multipart/form-data">

                        <table class="form">

                            <tr>

                                <td>



                                </td>

                                <td>

                                    <img src="../admin/<?php echo $row["image"]; ?>">

                                </td>

                            </tr>
                            <tr>

                                <td>

                                    <label>

                                        Product Name</label>

                                </td>

                                <td>

                                    <input type="text" class="medium" name="name1" value=" <?php echo $row["name"]; ?> "/>

                                </td>

                            </tr>





                            <tr>

                                <td>

                                    <label>

                                        Colour</label>

                                </td>

                                <td>

                                    <input type="text" class="medium" name="colour" value="<?php echo $row["colour"]; ?>"/>

                                </td>

                            </tr>
                            <tr>

                                <td>

                                    <label>

                                        Size</label>

                                </td>

                                <td>

                                    <input type="text" class="medium" name="size" value="<?php echo $row["size"]; ?>"/>

                                </td>

                            </tr>



                            <tr>

                                <td>

                                    <label>

                                        Price </label>

                                </td>

                                <td>

                                    <input type="text" required="" name="price" value="<?php echo $row["price"]; ?>">

                                </td>

                            </tr>
                            <tr>
                                    <td>

                                    <label>

                                       Category </label>

                                </td>
   <td>

                                    <select id="select"  name="cat">
<?php
                                        $query = "select * from categories";
                                        $res = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?>



                                            <option value="<?php echo $row["category_name"] ?>"> <?php echo $row["category_name"] ?> </option>



                                        <?php } ?>


                                    </select>

                                </td>
</tr>
<tr>
                                    <td>

                                    <label>

                                       Brands</label>

                                </td>
   <td>

                                    <select id="select"  name="cat">
<?php
                                        $query = "select * from brands";
                                        $res = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?>



                                            <option value="<?php echo $row["brand_name"] ?>"> <?php echo $row["brand_name"] ?> </option>



                                        <?php } ?>


                                    </select>

                                </td>
</tr>
                            <tr>

                                <td style="vertical-align: top; padding-top: 9px;">

                                    <label>

                                        Description</label>

                                </td>

                                <td>

                                    <textarea rows="8" cols="80" name="description"class=" " required=""><?php echo $row["description"]; ?></textarea>

                                </td>

                            </tr>



                            <tr>

                                <td>

                                    <label>

                                    </label>

                                </td>

                                <td>

                                    <input type="submit"  name="submit1" value="Update"/>

                                </td>


                            </tr>



                        </table>

                    </form>  <br><br>
                    <?php
                    include 'databaseconnect.php';
                    if (isset($_POST["submit1"])) {




                        $name = $_POST['name1'];
                        $price = $_POST['price'];
                        $colour = $_POST['colour'];
                        $size = $_POST['size'];
                        $description = $_POST['description'];







                        $query = "update products SET name='$name',price='$price',category='$_POST[cat]',colour='$colour',size='$size',description='$description' where id=$id ";

                        $res = mysqli_query($conn, $query);
                        if ($res) {
                            ?>

                            <script type = "text/javascript">
                                alert("Update Successful");

                            </script>

                            <?php
                        } else {
                            ?>


                            <script type = "text/javascript">
                                alert("Error! <?php echo mysqli_error($conn) ?>");



                            </script>
                            <?php
                        }
                    }
                    ?>


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
