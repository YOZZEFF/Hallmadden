<?php
define('HOSTNAME','localhost');
define('HOST_USER','jooks');
define('HOST_PASS','jooks');
define('DB_NAME',' hallmaddeen');

$connection=mysqli_connect(HOSTNAME,HOST_USER,HOST_PASS,DB_NAME);

if(!$connection){
    die("Connection failed:".mysqli_connect_error()."Error No:".mysqli_connect_errno());
}else{
   // echo "Connected";
}

?>