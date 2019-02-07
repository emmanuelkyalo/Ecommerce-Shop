<?php

$orderno = $_GET["order_no"];

include 'databaseconnect.php';

$query = "select * from orders where Order_Number=$orderno";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);


$name = $row["Name"];
$phone = $row["Phone_Number"];
$email = $row["email"];

$query = "select * from readyorders where Order_Number=$orderno";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);



$query = "select * from pickedorders where Order_Number=$orderno";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
if($row){
    ?>
    <script>

  
        history.back();

    </script>
    <?php

}else{
    if ($row) {
    ?>
    <script>

        alert("Order already marked as ready");
        history.back();

    </script>
    <?php

} else {
    $query = "insert into readyorders values('$orderno','$name','$email','$phone') ";
    $res = mysqli_query($conn, $query);
    $query = "delete from pendingorders where Order_Number=$orderno ";
    $res = mysqli_query($conn, $query);
    ?>
    <script type="text/javascript">
        alert("Success!");
        window.location = "pending_orders.php";

    </script>

<?php

}
    
}



