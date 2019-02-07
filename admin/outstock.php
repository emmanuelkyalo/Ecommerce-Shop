<?php
include 'databaseconnect.php';

$product_id=$_GET['product'];
$query="update products set availability=0 where id=$product_id";
$result= mysqli_query($conn, $query);

?>
<script type="text/javascript">
    
    alert("Successfully outstocked");
    window.location="view_products.php"
    
    </script>


