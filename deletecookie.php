<?php
session_start();
$name = $_GET["name"];
$quantitytodelete = intval($_GET["qt"])+0;
$quantityincart = intval( $_SESSION['itemsincart'])+0;

if (isset($_COOKIE['item'])) {


    foreach ($_COOKIE['item'] as $name1 => $value) {


        setcookie("item[$name]", "", time() - 1800);
    }

    $new = ($quantityincart) - ($quantitytodelete);


    $_SESSION['itemsincart'] = number_format($new, 0);
}
?> <script type="text/javascript">
    window.location = 'cart.php'
</script>