<?php


$orderno = $_GET["order_no"];
include 'databaseconnect.php';


  


    $query = "select * from readyorders where Order_Number=$orderno ";
    $result = mysqli_query($conn, $query);

    $row6 = mysqli_fetch_array($result);


    $name = $row6["Customer_Name"];
    $phone = $row6["Phone_Number"];
    $email=$row6["email"];



    $query = "insert into pickedorders(Order_Number,Customer_Name,Phone_Number,email) values($orderno,'$name','$phone','$email') ";
    $res = mysqli_query($conn, $query);

    $query = "delete from readyorders where Order_Number=$orderno ";
    $res = mysqli_query($conn, $query);


?>
<script type="text/javascript">
    
    window.location="ready_orders.php"
    
</script>
