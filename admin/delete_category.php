<?php   
$id=$_GET["category_id"];
include 'databaseconnect.php';

         
      
         $query="delete from categories where category_id=$id";
         $res= mysqli_query($conn, $query);
     
?>
<script>
    
    window.location='create_category.php'
    </Script>