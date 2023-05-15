<?php
include("../connection.php");
$id = $_GET['id'];
$car_id =  $_GET['carid'];

$query = "UPDATE cars SET status = 'available' WHERE `car_id` = '$car_id'";
$result = mysqli_query($conn, $query);

if ($result == 1) {
    $strSQL1 = "DELETE FROM `orders` WHERE `no` = '".$id."'";
    $objQuery1 = mysqli_query($conn, $strSQL1);
    echo ("<script>window.location='index.php';</script>");
?>
<?php
}
?>