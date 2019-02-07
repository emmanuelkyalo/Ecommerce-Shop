<?php


function getResolution(){

    session_start();
    if(isset($_POST['width'])){
    
   $_SESSION['screen_size'] = array();
   $_SESSION['screen_size']['width'] = intval($_POST['width']);
   $_SESSION['screen_size']['height'] = intval($_POST['height']);
}


if(!isset($_SESSION['screen_size'])){
?>
<html>
<head>
<script>
function getSize(){
document.getElementById('inp_width').value=screen.width;
document.getElementById('inp_height').value=screen.height;
document.getElementById('form_size').submit();

}
</script>
</head>
<body onload='getSize()'>
<form method='post' id='form_size'>
<input type='hidden' name='width' id='inp_width'/>
<input type='hidden' name='height' id='inp_height'/>
</form>
</body>
</html>


<?php

}else{


    
}



}

getResolution();
