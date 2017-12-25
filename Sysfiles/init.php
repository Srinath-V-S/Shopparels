<?php

$db = mysqli_connect('127.0.0.1','root','','Shopparels');
if(mysqli_connect_errno()){
    echo "Database connection failed witb following errors ".mysqli_connect_error();
    die();
}


define('BASEURL',"/Shopparels/includes/detailsmodal.php");

?>