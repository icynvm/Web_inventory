<?php
session_start();
include('../connection.php');
$namer = $_SESSION["fullname"];
$num = $_GET["num"];
$car = $_GET["car"];
$date1 = $_GET["date1"];
$date2 = $_GET["date2"];
$days = $_GET["days"];
$price = $_GET["price"];
$idcard = $_GET["idcard"];

$query = "INSERT INTO orders(no,user_id,name,num, car, date1, date2, days,price,idcard,status) 
VALUES (NULL,'" . $_SESSION["id"] . "','$namer',' $num ',' $car ',' $date1 ',' $date2 ',' $days','$price','$idcard','Progress')";
$objQuery = mysqli_query($conn, $query);
echo $objQuery;
if($objQuery){
    echo ("<script> alert('Successfully completed!'); window.location='index.php';</script>");
}else{
    echo ("<script> alert('Unsuccesful record!');window.location='about.php';</script>"); 
}
?>