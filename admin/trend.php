<?php
include 'databaseconnect.php';

$product_id=$_GET['product'];
$query="insert into top_seller(item_id) values($product_id)";
$result= mysqli_query($conn, $query);

?>
<script type="text/javascript">
    
    alert("Added to trending list");
    window.location="view_products.php"
    
    </script>


