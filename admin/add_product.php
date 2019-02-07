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
    <?php include 'navbar.php';?>
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

                                <td> <select id="select"  name="cat">
                                        <?php
$query = "select * from categories";
$res = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($res)) {
    ?>



                                            <option value="<?php echo $row["category_name"] ?>"> <?php echo $row["category_name"] ?> </option>



                                        <?php
}?>

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

                                        Poster 1 </label>

                                </td>

                                <td>

                                    <input type="file" name="fileToUpload" required="" />

                                </td>

                            </tr>

                            <tr>

                                <td>

                                    <label>

                                        Poster 2 </label>

                                </td>

                                <td>

                                    <input type="file" name="fileToUpload1"  />

                                </td>

                            </tr>

                           <tr>

                                <td>

                                    <label>

                                        Poster 3 </label>

                                </td>

                                <td>

                                    <input type="file" name="fileToUpload2"  />

                                </td>

                            </tr>
                            <tr>

                                <td>

                                    <label>

                                        Quantity</label>

                                </td>

                                <td>

                                    <input type="text" class="medium" name="quantity" required=""/>

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

    //First Poster
    $v1 = rand(1000, 9999);
    $v2 = rand(1111, 9999);
    $v3 = $v1 . $v2;
    $v3 = md5($v3);
    $fnm = $_FILES["fileToUpload"]["name"];
    $dst1 = "./posters/" . $v3 . $fnm;
    $dst2 = "posters/" . $v3 . $fnm;
    $maxDimW = 400;
    $maxDimH = 400;
    list($width, $height, $type, $attr) = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if ($width != $maxDimW || $height != $maxDimH) {
        $target_filename = $_FILES['fileToUpload']['tmp_name'];
        $fn = $_FILES['fileToUpload']['tmp_name'];
        $size = getimagesize($fn);

        $ratio = $size[0] / $size[1]; // width/height
        if ($ratio > 1) {
            $width = $maxDimW;
            $height = $maxDimH;
        } else {
            $width = $maxDimW;
            $height = $maxDimH;
        }
        $src = imagecreatefromstring(file_get_contents($fn));
        $dst = imagecreatetruecolor($width, $height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);

        imagejpeg($dst, $target_filename); // adjust format as needed
    }
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dst1);

//Second Poster

if($_POST['fileToUpload1']){

    $v5 = rand(1000, 9999);
    $v6 = rand(1111, 9999);
    $v7 = $v5 . $v6;
    $v7 = md5($v7);
    $fnm1 = $_FILES["fileToUpload1"]["name"];
    $dst5 = "./posters/" . $v7 . $fnm1;
    $dst6 = "posters/" . $v7 . $fnm1;
    $maxDimW = 400;
    $maxDimH = 400;
    list($width, $height, $type, $attr) = getimagesize($_FILES['fileToUpload1']['tmp_name']);
    if ($width != $maxDimW || $height != $maxDimH) {
        $target_filename = $_FILES['fileToUpload1']['tmp_name'];
        $fn = $_FILES['fileToUpload1']['tmp_name'];
        $size = getimagesize($fn);

        $ratio = $size[0] / $size[1]; // width/height
        if ($ratio > 1) {
            $width = $maxDimW;
            $height = $maxDimH;
        } else {
            $width = $maxDimW;
            $height = $maxDimH;
        }
        $src = imagecreatefromstring(file_get_contents($fn));
        $dst = imagecreatetruecolor($width, $height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);

        imagejpeg($dst, $target_filename); // adjust format as needed
    }
    move_uploaded_file($_FILES['fileToUpload1']['tmp_name'], $dst5);
}else{
    $dst6='noImage';

}

if($_POST['fileToUpload2']){

    $v5 = rand(1000, 9999);
    $v6 = rand(1111, 9999);
    $v7 = $v5 . $v6;
    $v7 = md5($v7);
    $fnm1 = $_FILES["fileToUpload2"]["name"];
    $dst10 = "./posters/" . $v7 . $fnm1;
    $dst11 = "posters/" . $v7 . $fnm1;
    $maxDimW = 400;
    $maxDimH = 400;
    list($width, $height, $type, $attr) = getimagesize($_FILES['fileToUpload2']['tmp_name']);
    if ($width != $maxDimW || $height != $maxDimH) {
        $target_filename = $_FILES['fileToUpload2']['tmp_name'];
        $fn = $_FILES['fileToUpload2']['tmp_name'];
        $size = getimagesize($fn);

        $ratio = $size[0] / $size[1]; // width/height
        if ($ratio > 1) {
            $width = $maxDimW;
            $height = $maxDimH;
        } else {
            $width = $maxDimW;
            $height = $maxDimH;
        }
        $src = imagecreatefromstring(file_get_contents($fn));
        $dst = imagecreatetruecolor($width, $height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);

        imagejpeg($dst, $target_filename);
    }
    move_uploaded_file($_FILES['fileToUpload2']['tmp_name'], $dst10);
}else{
    $dst11='noImage';

}

    $name = ucwords($_POST["name1"]);
    $quantity = $_POST["quantity"];

    $user = $_SESSION["user_id"];

    //Discounts
    $setPrice = $_POST['price'];
    $percentageDiscount = random_int(10, 55);
    $discount = ($percentageDiscount / 100) * $setPrice;
    $formerPrice = $setPrice + $discount;
    $formerPrice = ceil($formerPrice);
    //$formerPrice = number_format($formerPrice);

    $colour = ucfirst($_POST["colour"]);

    //Final SQL Query
    $query = "insert into products(name,image,category,price,former_price,colour,size,description,quantity,image1,user,image2) "
        . "values('$name','$dst2','$_POST[cat]','$_POST[price]','$formerPrice','$colour','$_POST[size]','$_POST[description]','$quantity','$dst6','$user','$dst11')";
    $res = mysqli_query($conn, $query);

    //Check Upload Success
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
                                history.back();



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
