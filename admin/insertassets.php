<?php


include('../connection.php');

$assets_id = mysqli_real_escape_string($conn, $_POST['id']);
$assets_name = mysqli_real_escape_string($conn, $_POST['name']);
$assets_type = mysqli_real_escape_string($conn, $_POST['type']);
$assets_model = mysqli_real_escape_string($conn, $_POST['model']);
$assets_serial = mysqli_real_escape_string($conn, $_POST['serial']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$assets_warranty = mysqli_real_escape_string($conn, $_POST['warranty']);

$sql = "INSERT INTO assets (id,assets_id, assets_name, assets_model, assets_serial,date, assets_warranty, assets_type) 
        VALUES (null, '$assets_id', '$assets_name', '$assets_model', '$assets_serial', '$date', '$assets_warranty', '$assets_type')";
$stmt = $conn->prepare($sql);
if (TRUE) {
    echo ("<script> alert('Successfully completed!'); window.location='index.php';</script>");
}
?>