<?php
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
session_start();

include("../connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users_info WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "d", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $resign = $_POST['resign'];
    $original_firstname = $row['firstname'];
    $original_lastname = $row['lastname'];
    $original_resign = $row['resign'];
    if ($firstname !== $original_firstname || $lastname !== $original_lastname || $resign !== $original_resign) {
        $query = "UPDATE users_info SET firstname='$firstname', lastname='$lastname', resign='$resign' WHERE id=$id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Update successful
            echo '
        <script>
            setTimeout(function() {
            swal({
                    title: "Success",
                    text: "edited successfully",
                    type: "success",
                    timer: 1000,
                    showConfirmButton: false
                }, function() {
                    window.location = " index.php ";
            });
            }, 100);
        </script>
        ';
        } else {
            // Update failed
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="../img/logo-header.png" id="icon" alt="User Icon" />
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInsert" aria-expanded="true" aria-controls="collapseInsert">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>INSERT INFO</span>
                </a>
                <div id="collapseInsert" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.php">Insert Employee</a>
                        <a class="collapse-item" href="cards.php">Insert Assets</a>
                        <a class="collapse-item" href="msoffice.php">Insert MS Office</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="actioninfo.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ACTION INFO</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEdit" aria-expanded="false" aria-controls="collapseEdit">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>EDIT INFO</span>
                </a>
                <div id="collapseEdit" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="editusers.php">EDIT Employee</a>
                        <a class="collapse-item" href="editassets.php">EDIT Assets</a>
                    </div>
                </div>
            </li> -->


            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['username'])) { ?>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'Hello, ' . $_SESSION['username']; ?></span>
                                <?php } else { ?>
                                <?php } ?>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->


                <!-- Page Heading -->


                <!-- DataTales Example -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="first_name">USER ID:</label>
                                    <input type="text" name="id" class="form-control" value="<?php echo $row['userid']; ?>" disabled>
                                    <input type="hidden" name="id" value="<?php echo $row['userid']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" disabled>
                                </div>
                                <div class="form-group ">
                                    <label for="email">Department:</label>
                                    <input type="text" class="form-control disable" name="depart" value="<?php echo $row['depart']; ?>" disabled>
                                </div>
                                <div class="form-group ">
                                    <label for="email">Division:</label>
                                    <input type="text" class="form-control disable" name="division" value="<?php echo $row['division']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="resign">Resign:</label>
                                    <select class="form-control" name="resign" id="resign" disabled>

                                        <option value="no" <?php if ($row['resign'] === 'no') echo 'selected'; ?>>no</option>
                                        <option value="yes" <?php if ($row['resign'] === 'yes') echo 'selected'; ?>>yes</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="assets_id">Asset ID:</label>
                                    <select name="assets_id" id="assets_id" class="form-control" required>
                                        <option value="">-- Select an asset --</option>
                                        <?php
                                        // Fetch assets from database
                                        $sql = "SELECT a_id, assets_id FROM assets";
                                        $result = mysqli_query($conn, $sql);

                                        // Output options for each asset
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option value="' . $row['a_id'] . '">' . $row['assets_id'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="resign">Assets Name:</label>
                                    <select name="assets_name" class="form-control" id="assets_name">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="resign">Assets Serial:</label>
                                    <select name="assets_serial" class="form-control" id="assets_serial">
                                    </select>
                                </div>

                            </form>


                        </table>


                    </div>
                    <input type="submit" class="btn btn-primary" value="update" name="update">
                </div>


                <!-- Logout Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" type="submit" data-dismiss="modal" name="submit" onclick="logout()">Logout</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#assets_id').on('change', function() {
                        var a_id = $(this).val();
                        if (a_id !== '') {
                            // Trigger AJAX request to get assets data
                            $.ajax({
                                url: 'get_assets_details.php',
                                method: 'POST',
                                dataType: 'json',
                                data: {
                                    a_id: a_id
                                },
                                success: function(response) {
                                    // Populate assets name and serial fields with data from response
                                    $('#assets_name').val(response.assets_name);
                                    $('#assets_serial').val(response.assets_serial);
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }
                    });
                </script>
                <script>
                    function logout() {
                        window.location.href = 'logout.php';
                    }

                    function deleteFunc(id) {
                        if (confirm('Are you sure to cancel ?')) {
                            window.location.href = 'deletecar.php?id=' + id;
                        }
                    }
                </script>
                <!-- <script>
                    function Insertorder() {
                        var id = document.getElementById("id").value;
                        var warranty = <?php echo $_GET['warranty']; ?>;
                        var name = document.getElementById("name").value;
                        var date = document.getElementById("date").value;
                        var model = document.getElementById("model").value;
                        var serial = document.getElementById("serial").value;
                        window.location.href = 'insertassets.php?id=' + id + '&date=' + document.getElementById("date").value + '&warranty=' +
                            warranty + '&model=' + model + '&serial=' + serial ;
                    }
                </script> -->
                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/datatables-demo.js"></script>

</body>

</html>