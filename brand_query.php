<?php
session_start();
$search_parameter=$_GET['keyword'];

$_SESSION["brand_search_parameter"]=$search_parameter;


?>
<script type="text/javascript">
    window.location='brand_result.php'
    </script>