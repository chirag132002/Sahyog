<?php

$server="localhost";
$user="root";
$password="";
$database="SAHYOG";

$con = mysqli_connect($server,$user,$password,$database);
if(!$con){
    die("Could not connect to database".mysqli_connect_error());
}
?>