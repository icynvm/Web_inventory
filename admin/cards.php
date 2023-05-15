<?php
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
session_start();
include('../connection.php');

if (isset($_POST['submit'])) {
    $assets_id = $_POST['assets_id'];
    $assets_name = $_POST['assets_name'];
    $assets_type = $_POST['assets_type'];
    $assets_model = $_POST['assets_model'];
    $assets_serial = $_POST['assets_serial'];
    $date = $_POST['date'];
    $assets_warranty = $_POST['assets_warranty'];


    $check_sql = "SELECT * FROM assets WHERE assets_id='$assets_id' LIMIT 1";
    $result = mysqli_query($conn, $check_sql);
    $assets = mysqli_fetch_assoc($result);

    if ($assets && $assets['assets_id'] === $assets_id) {
        echo '
        <script>
            setTimeout(function() {
            swal({
                    title: "Errors ",
                    text: "User has already added",
                    type: "error",
                    timer: 1000,
                    showConfirmButton: false
                }, function() {
                window.location = "' . $_SERVER['PHP_SELF'] . '";
            });
            }, 100);
        </script>
        ';
    } else {
        $sql = "INSERT INTO assets (assets_id, assets_name, assets_model, assets_serial,date, assets_warranty, assets_type) 
        VALUES ( '$assets_id', '$assets_name', '$assets_model', '$assets_serial', '$date', '$assets_warranty', '$assets_type')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '
            <script>
                setTimeout(function() {
                swal({
                        title: "Successfully ",
                        text: "User has been successfully added",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                    }, function() {
                    window.location = "' . $_SERVER['PHP_SELF'] . '";
                });
                }, 100);
            </script>
            ';
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
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

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

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center" >Add New Assets</h1>
                    <a href="index.php" class="btn btn-danger btn-sm">Back</a>
                    <div style="padding: 20px;"></div>
                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Assets Info </h6>
                        </div>
                        <div class="container">
                            <h2>Insert Assets</h2>
                            <form method="post" action="">
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;"> Assets ID :</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="assets_id" id="assets_id" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;"> Assets Name :</label>
                                    <input type="text" class="form-control" placeholder="Enter ID" name="assets_name" id="assets_name" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Assets Type :</label>
                                    <select name="assets_type" id="assets_type" class="form-control">
                                        <option value="Hardware">Hardware</option>
                                        <option value="Software">Software</option>
                                        <option value="Other">other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Model :</label>
                                    <input type="text" class="form-control" placeholder="Enter model" name="assets_model" id="assets_model" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Serial Number : </label>
                                    <input type="text" class="form-control" placeholder="Enter serial " name="assets_serial" id="assets_serial" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Date of Buying : </label>
                                    <input type="date" class="form-control" placeholder="..." name="date" id="date" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Waranty : </label>
                                    <select name="assets_warranty" id="assets_warranty" class="form-control">
                                        <option value="1 years">1 Years</option>
                                        <option value="2 years">2 Years</option>
                                        <option value="3 years">3 Years</option>
                                        <option value="4 years">4 Years</option>
                                    </select>

                                </div>

                                <div class="container">
                                    <input type="submit" class="btn btn-primary" value="submit" name="submit">
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>
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