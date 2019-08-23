<?php

$host= 'localhost';
$user= 'root';
$pass= '';
$db='atn';

$con=mysql_connect($host,$user,$pass,$db);
if($con)
   echo 'connected to my db database successfully';

$sql='insert into user (username,password,email) value ('Toan','2412','buikhanhnagetoan@gmail.com'";
$query=mysqli_query($con,$sql);
if($query)
   echo 'data insert successfully';
?>