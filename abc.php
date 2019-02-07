
<?php 
include 'screen.php';
sleep(1);
 $width= $_SESSION['screen_size']['width'];

if($width>700){

echo 'big screen';

}else{

    echo 'small';
}


?>