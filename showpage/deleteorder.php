<?php
include('../connection.php');
session_start();
$id = $_GET["id"];
$strSQL1 = "DELETE FROM `orders` WHERE `no` = '".$id."'";
$objQuery1 = mysqli_query($conn, $strSQL1);

echo ("<script>window.location='userinfo.php';</script>");
?>