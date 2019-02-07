<?php
include 'header.php';
include 'databaseconnect.php';
$item_id=$_GET["id"];
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

                            <label>

                                Product Name</label>

                        </td>

                        <td>

                            <input type="text" class="medium" name="name1" required=""/>

                        </td>

                    </tr>




                    <tr>

                        <td>

                            <label>

                                Category </label>

                        </td>

                        <td>

                            <select id="select"  name="cat">

                                <option value="Shoes for Men">Shoes For Men</option>
                                <option value="Shoes for Kids">Shoes For Kids</option>
                                <option value="Shoes for Women">Shoes For Women</option>
                                <option value="Unisex Shoes">Unisex Shoes</option>




                            </select>

                        </td>

                    </tr>
                    <tr>

                        <td>

                            <label>

                                Colour</label>

                        </td>

                        <td>

                            <input type="text" class="medium" name="colour" required=""/>

                        </td>

                    </tr>
                    <tr>

                        <td>

                            <label>

                                Size</label>

                        </td>

                        <td>

                            <input type="text" class="medium" name="size" required=""/>

                        </td>

                    </tr>



                    <tr>

                        <td>

                            <label>

                                Price </label>

                        </td>

                        <td>

                            <input type="text" required="" name="price">

                        </td>

                    </tr>



                    <tr>

                        <td>

                            <label>

                                Poster </label>

                        </td>

                        <td>

                            <input type="file" name="wallpaper" required="" />

                        </td>

                    </tr>

                    <tr>

                        <td style="vertical-align: top; padding-top: 9px;">

                            <label>

                                Description</label>

                        </td>

                        <td>

                            <textarea rows="8" cols="80" name="description"class=" " required=""></textarea>

                        </td>

                    </tr>



                    <tr>

                        <td>

                            <label>

                            </label>

                        </td>

                        <td>

                            <input type="submit"  name="submit1" value="Upload"/>

                        </td>
                    

                    </tr>



                </table>

            </form>  <br><br>
                    <?php
            include 'databaseconnect.php';
            if (isset($_POST["submit1"])) {




                $v1 = rand(1000, 9999);
                $v2 = rand(1111, 9999);
                $v3 = $v1 . $v2;
                $v3 = md5($v3);






                $fnm = $_FILES["wallpaper"]["name"];
                $dst = "./posters/" . $v3 . $fnm;
                $dst1 = "posters/" . $v3 . $fnm;

                move_uploaded_file($_FILES["wallpaper"]["tmp_name"], $dst);
                $name = ucwords($_POST["name1"]);


                $colour = ucfirst($_POST["colour"]);


                $query = "insert into products(name,image,category,price,colour,size,description) "
                        . "values('$name','$dst1','$_POST[cat]','$_POST[price]','$colour','$_POST[size]','$_POST[description]')";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    ?>

                    <script type = "text/javascript">
                        alert("Succesfully added to record!");

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
                    <small>Copyright © Your Website 2018</small>
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
