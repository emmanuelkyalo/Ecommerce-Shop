<?php
include 'databaseconnect.php';


if (isset($_POST["submit"])) {
    $name=$_POST["new_category"];
    $query = "insert into categories(category_name) values('$name')";
    $res = mysqli_query($conn, $query);
}

?>


<script>

    window.location = 'create_category.php'
</Script>