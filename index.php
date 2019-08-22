<?php
include 'dbconnector.php';
$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
?>