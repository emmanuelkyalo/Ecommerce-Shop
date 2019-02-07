<?php
session_start();

include 'databaseconnect.php';

$id = $_GET["id"];

//Checking whether any cookies are set



$d = 0;
if (isset($_COOKIE['item'])) {

    foreach ($_COOKIE['item'] as $name => $value) {

        $d = $d + 1;
    }
    $d = $d + 1;
} else {

    $d = $d + 1;
}
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

    $found = 0;
    $qty = 1;
    $total = $qty * $price;
}


if (isset($_COOKIE['item'])) {


    foreach ($_COOKIE['item'] as $name1 => $value) {
        $values1 = explode("____", $value);

        if ($identity == $values1[5]) {

            $found = $found + 1;
            $qty = $values1[1] + 1;
            $total = $qty * $price;
 




            setcookie("item[$name1]", $nm . "____" . $qty . "____" . $image . "____" . $price . "____" . $total . "____" . $identity . "____" . $colour . "____" . $size, time() + 3600);
            $_SESSION['itemsincart'] = 1 +  $_SESSION['itemsincart'];
            
        }
    }


    if ($found == 0) {

        setcookie("item[$d]", $nm . "____" . $qty . "____" . $image . "____" . $price . "____" . $total . "____" . $identity . "____" . $colour . "____" . $size, time() + 3600);
    $_SESSION['itemsincart'] = $qty+  $_SESSION['itemsincart'];
    }
} else {

    setcookie("item[$d]", $nm . "____" . $qty . "____" . $image . "____" . $price . "____" . $total . "____" . $identity . "____" . $colour . "____" . $size, time() + 3600);

    $_SESSION['itemsincart'] = $qty+  $_SESSION['itemsincart'];
}
?>

<script type="text/javascript">


    history.back();



</script>  