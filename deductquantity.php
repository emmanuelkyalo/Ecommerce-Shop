<?php
session_start();
$quantityincart = intval($_SESSION['itemsincart']) + 0;

include 'databaseconnect.php';

$id = $_GET["id"];



//To get item description


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
        if ($values1[1] == 0) {
            $name = $values1[0];
            setcookie("item[$name1]","", time() - 1800);
        }

        if ($identity == $values1[5]) {


            $qty = $values1[1] - 1;
            $total = $qty * $price;
            $new = ($quantityincart) - 1;

            setcookie("item[$name1]", $nm . "____" . $qty . "____" . $image . "____" . $price . "____" . $total . "____" . $identity . "____" . $colour . "____" . $size, time() + 3600);
            $_SESSION['itemsincart'] = number_format($new, 0);
        }
    }
}
?>

<script type="text/javascript">

    window.location = 'cart.php';



</script>  