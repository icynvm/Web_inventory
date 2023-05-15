<?php
include '../connection.php';
// get the selected asset ID from the AJAX request
$a_id = mysqli_real_escape_string($conn, $_POST['a_id']);
$sql = "SELECT assets_name, assets_serial FROM assets WHERE a_id = $a_id";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if ($result) {
    // Fetch assets data and return as a JSON object
    $row = mysqli_fetch_assoc($result);
    $assets_data = array(
        'assets_name' => $row['assets_name'],
        'assets_serial' => $row['assets_serial']
    );
    echo json_encode($assets_data);
} else {
    // Query failed, return error message
    echo json_encode(array('error' => 'Failed to retrieve assets data.'));
}

// Close database connection
mysqli_close($conn);
?>