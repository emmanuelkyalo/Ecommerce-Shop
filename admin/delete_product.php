<?php
include 'databaseconnect.php';

$id=$_GET["id"];


$query="select * from products where id=$id";
$res= mysqli_query($conn, $query);
$row= mysqli_fetch_array($res);

$poster=$row["image"];
unlink($poster);


$query = "delete from products where id=$id";
$res = mysqli_query($conn, $query);

if ($res) {
   ?>
   <script type="text/javascript">
         alert("Succesfully deleted record!");
         window.location = "view_products.php";
   </script>
      <?php } else {
      ?>

   <script type="text/javascript">

        window.location = "view_products.php";
         </script>
         
      <?php }
      ?>

        