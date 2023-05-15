<?php
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
include('../connection.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM assets WHERE assets_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo '
<script>
    setTimeout(function() {
    swal({
            title: "Success",
            text: "Users has been deleted ",
            type: "success",
            timer: 1000,
            showConfirmButton: false
        }, function() {
            window.location = " index.php ";
    });
    }, 200);
</script>
';
    } else {
        echo '
    <script>
        setTimeout(function() {
        swal({
                title: "Error!",
                text: "Something wrong , please try again.",
                type: "danger",
                timer: 1000,
                showConfirmButton: false
            }, function() {
                window.location = " index.php ";
        });
        }, 200);
    </script>
    ';
    }
}
$conn->close();
?>