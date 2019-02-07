<?php
session_start();
$search_parameter=$_GET['keyword'];

$_SESSION["search_parameter"]=$search_parameter;


?>
<script type="text/javascript">
    window.location='categorised.php'
    </script>
