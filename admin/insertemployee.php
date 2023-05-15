<?php


include('../connection.php');

$assets_id = mysqli_real_escape_string($conn, $_POST['id']);
$assets_name = mysqli_real_escape_string($conn, $_POST['name']);
$assets_model = mysqli_real_escape_string($conn, $_POST['model']);
$assets_serial = mysqli_real_escape_string($conn, $_POST['serial']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$assets_warranty = mysqli_real_escape_string($conn, $_POST['warranty']);

$stmt = $conn->prepare("INSERT INTO assets (assets_id, assets_name, assets_model, assets_serial,date, assets_warranty) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("isssss", $assets_id, $assets_name, $assets_model, $assets_serial, $date, $assets_warranty);
$stmt->execute();
if (TRUE) {
    header("Location: button.php");
}
