<?php

echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
session_start();
include('../connection.php');

if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $SerialNumber = $_POST['SerialNumber'];
    $Key = $_POST['Key'];
    $Type = $_POST['Type'];
    $Key_from_office = $_POST['Key_from_office'];
    $version = $_POST['version'];


    $check_sql = "SELECT * FROM msoffice WHERE SerialNumber='$SerialNumber' LIMIT 1";
    $result = mysqli_query($conn, $check_sql);
    $asset = mysqli_fetch_array($result);
    if ($asset && $asset['SerialNumber'] === $SerialNumber) {
        echo '
        <script>
    setTimeout(function() {
        swal({
            title: "Errors ",
            text: "User has already added",
            type: "error",
            timer: 700,
            showConfirmButton: false
        }, function() {
            window.location = "' . $_SERVER['PHP_SELF'] . '";
        });
    }, 100);
</script>
        ';
    } else {
        $sql = "INSERT INTO msoffice (Email, `Password`, SerialNumber, `Key`, `Type`, Key_from_office,`version`)
        VALUES ('$Email', '$Password', '$SerialNumber', '$Key', '$Type', '$Key_from_office','$version');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '
            <script>
                setTimeout(function() {
                swal({
                        title: "Successfully ",
                        text: "User has been successfully added",
                        type: "success",
                        timer: 700,
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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Add MS Office</h1>
                    <a href="" class="btn btn-danger btn-sm" id="fire" onclick="fire()">Back</a>

                    <div style="padding: 20px;"></div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> MS Office Info </h6>
                        </div>
                        <div class="container">
                            <h2>Insert MS Office</h2>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;"> Email :</label>
                                    <input type="text" class="form-control" placeholder="Enter Email" name="Email" id="Email" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;"> Password :</label>
                                    <input type="text" class="form-control" placeholder="Enter Password" name="Password" id="Password" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;"> SerialNumber Or ServiceTag :</label>
                                    <input type="text" class="form-control" placeholder="Enter SerialNumber Or ServiceTag" name="SerialNumber" id="SerialNumber" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Key :</label>
                                    <input type="text" class="form-control" placeholder="Enter Key" name="Key" id="Key" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Type : </label>
                                    <input type="text" class="form-control" placeholder="Enter Type" name="Type" id="Type" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">Key from office : </label>
                                    <input type="text" class="form-control" placeholder="..." name="Key_from_office" id="Key_from_office" required>
                                </div>
                                <div class="form-group">
                                    <label style="color: black; font-weight:bold;">MS Office Version : </label>
                                    <select name="version" id="version" class="form-control" required>
                                        <option value="2013">2013</option>
                                        <option value="2016">2016</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2021">2021</option>

                                    </select>
                                </div>

                                <div class="container">
                                    <input type="submit" class="btn btn-primary" value="submit" name="submit">
                                </div>
                                <br>
                            </form>
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
                    <script type="text/javascript">
                        function toggleResign() {
                            var division = document.getElementById("division").value;
                            var resign = document.getElementById("resign");
                            if (division === "intern") {
                                resign.value = "no";
                                resign.disabled = true;
                            } else {
                                resign.disabled = false;
                            }
                        }
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
                        let dateInput = document.getElementById("date").value;
                        let date = new Date(dateInput);
                        let options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        let thaiDate = date.toLocaleDateString('th-TH', options);
                        document.getElementById("date").value = thaiDate;
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