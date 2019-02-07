<?php
include 'databaseconnect.php';

$product_id=$_GET['product'];
$query="delete from top_seller where item_id='$product_id'";
$result= mysqli_query($conn, $query);

?>
<script type="text/javascript">
    
    alert("Removed from trending list");
    window.location="view_products.php"
    
    </script>

