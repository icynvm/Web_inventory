<?php
include("../connection.php");
$id = $_GET['id'];
$car_id =  $_GET['carid'];
$query = "UPDATE orders SET status = 'Approved' WHERE `no` = '$id'";
$result = mysqli_query($conn, $query);

$query = "UPDATE cars SET status = 'Unavailable' WHERE `car_id` = '$car_id'";
$result = mysqli_query($conn, $query);

if ($result === TRUE) {
	echo ('<script>alert"Request has Successfully been Approved"</script>');
	echo ("<script>window.location='index.php';</script>");
?>
<?php
}
?>