<?php
session_start();

include 'databaseconnect.php';

$id = $_GET["id"];

//Checking whether any cookies are set


$query = "select * from products where id=$id";
$res3 = mysqli_query($conn, $query);

while ($row3 = mysqli_fetch_array($res3)) {
    $identity = $row3["id"];
    $nm = $row3["name"];
    $image = $row3["image"];
    $price = $row3["price"];
    $colour = $row3["colour"];
    $size = $row3["size"];

}


if (isset($_COOKIE['item'])) {


    foreach ($_COOKIE['item'] as $name1 => $value) {
        $values1 = explode("____", $value);

        if ($identity == $values1[5]) {

         
            $qty = $values1[1] + 1;
            $total = $qty * $price;
 




            setcookie("item[$name1]", $nm . "____" . $qty . "____" . $image . "____" . $price . "____" . $total . "____" . $identity . "____" . $colour . "____" . $size, time() + 3600);
            $_SESSION['itemsincart'] = 1 +  $_SESSION['itemsincart'];
            
        }
    }


}
?>

<script type="text/javascript">


    window.location='cart.php';



</script>  