<?php
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
session_start();
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #div1,
        #div2 {
            float: right !important;
        }
    </style>

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
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="text-lg">Dashboard</span></a>
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
                <a class="nav-link collapsed" href="actioninfo.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ACTION INFO</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ACTION INFO</span>
                </a>
                <!-- <div id="collapseInsert" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.php">Insert Employee</a>
                        <a class="collapse-item" href="cards.php">Insert Assets</a>
                        <a class="collapse-item" href="msoffice.php">Insert MS Office</a>
                    </div>
                </div> -->
            </li> -->
            <!--   <li class="nav-item">
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
            <!-- Nav Item - Tables -->
            <li class="nav-item">
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class=" mb-0 text-gray-800">Dashboard</h1>

                    </div>
                    <p class="mb-4 " style="font-family:'kanit' !important ;"></p>
                    <div class="row justify-content-end" style="margin-right: 50px;">
                        <div id="div1">
                            <button class="btn btn-danger btn-lg float-right" onclick="Switch()">Users</button>
                        </div>
                        <div style="padding: 10px;"></div>
                        <div id="div2">
                            <button class="btn btn-warning btn-lg float-right" onclick="Switch()">Assets</button>
                        </div>
                        <div style="padding: 10px;"></div>
                        <div id="div3">
                            <button class="btn  btn-lg float-right" style="background-color: #5B8FB9; color:aliceblue" onclick="Switch()">MS Office</button>
                        </div>
                    </div>
                    <br>
                    <div class="container-fluid">

                        <!-- Page Heading -->

                        <!-- DataTales Example -->

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="m-0 font-weight-bold text-primary">Orders Details</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="searchInput" placeholder="Search..." onkeyup="searchFunction()">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="searchButton">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-danger" type="button" id="clearBtn">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body" id="users">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>User ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>department</th>
                                                <th>division</th>
                                                <th>resign</th>
                                                <!-- <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Add assets</th> -->
                                                <th colspan="3"> Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include('../connection.php');
                                            $sql = "SELECT * FROM users_info";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['userid'] . "</td>";
                                                echo "<td>" . $row['firstname'] . "</td>";
                                                echo "<td>" . $row['lastname'] . "</td>";
                                                echo "<td>" . $row['depart'] . "</td>";
                                                echo "<td>" . $row['division'] . "</td>";
                                                echo "<td>" . $row['resign'] . "</td>";
                                                echo "<td><a href='editusers.php?id=" . $row['id'] . "'>Edit</a></td>";
                                                echo "<td><a href='#' onclick='confirmDelete(" . $row['id'] . ")'>delete</a></td>";
                                                // echo "<td><a href='addownassets.php?id=" . $row['id'] . "'>Add assets</a></td>";
                                                echo "</tr>";
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <div class="card-body" id="assets" style="display:none">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th>assets ID</th>
                                                <th>assets Name</th>
                                                <th>assets Type</th>
                                                <th>assets Model</th>
                                                <th>assets Serial</th>
                                                <th>assets Warranty</th>
                                                <th colspan="2"> Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include('../connection.php');
                                            $sql = "SELECT * FROM assets ";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['assets_id'] . "</td>";
                                                echo "<td>" . $row['assets_name'] . "</td>";
                                                echo "<td>" . $row['assets_type'] . "</td>";
                                                echo "<td>" . $row['assets_model'] . "</td>";
                                                echo "<td>" . $row['assets_serial'] . "</td>";
                                                echo "<td>" . $row['assets_warranty'] . "</td>";

                                                echo "<td><a href='editassets.php?id=" . $row['a_id'] . "'>Edit</a></td>";
                                                echo "<td><a href='#' onclick='confirmDelete(" . $row['a_id'] . ")'>delete</a></td>";
                                                // echo "<td><a href='#' onclick='confirmDelete(" . $row['id'] . ")'>ADD Assets</a></td>";
                                                echo "</tr>";
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <div class="card-body" id="msoffice" style="display:none">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th>MS office email</th>
                                                <th>MS office Password</th>
                                                <th>MS office SerialNumber</th>
                                                <th>MS office KEY</th>
                                                <th>User Type</th>
                                                <th>KEY From MS office</th>
                                                <th>Version</th>
                                                <th colspan="2"> Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include('../connection.php');
                                            $sql = "SELECT * FROM msoffice";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['Email'] . "</td>";
                                                echo "<td>" . $row['Password'] . "</td>";
                                                echo "<td>" . $row['SerialNumber'] . "</td>";
                                                echo "<td>" . $row['Key'] . "</td>";
                                                echo "<td>" . $row['Type'] . "</td>";
                                                echo "<td>" . $row['Key_from_office'] . "</td>";
                                                echo "<td>" . $row['version'] . "</td>";
                                                echo "<td><a href='editmsoffice.php?id=" . $row['ms_id'] . "'>Edit</a></td>";
                                                echo "<td><a href='#' onclick='confirmDelete(" . $row['ms_id'] . ")'>delete</a></td>";
                                                // echo "<td><a href='#' onclick='confirmDelete(" . $row['id'] . ")'>ADD Assets</a></td>";
                                                echo "</tr>";
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>


                        <!-- <script>
                            function searchFunction() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("searchInput");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("dataTable");
                                tr = table.getElementsByTagName("tr");
                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[1];
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                        </script> -->
                        <script>
                            document.getElementById("clearBtn").addEventListener("click", function() {
                                location.reload();
                            });
                        </script>
                        <script>
                            document.getElementById("searchInput").addEventListener("keyup", function(event) {
                                if (event.keyCode === 13) {
                                    document.getElementById("searchButton").click();
                                }
                            });

                            document.getElementById("clearBtn").addEventListener("click", function() {
                                document.getElementById("searchInput").value = "";
                            });
                        </script>
                        <script>
                            // Event listener for search button
                            document.getElementById("searchButton").addEventListener("click", function() {
                                // Get the input value
                                let inputValue = document.getElementById("searchInput").value.toLowerCase();

                                // Get all the rows from the table
                                let tableRows = document.querySelectorAll("#dataTable tbody tr");

                                // Loop through all the rows
                                for (let i = 0; i < tableRows.length; i++) {
                                    let row = tableRows[i];

                                    // Get all the cells in the row
                                    let cells = row.querySelectorAll("td");

                                    // Concatenate all the cell values to form a single string
                                    let rowValue = "";
                                    for (let j = 0; j < cells.length; j++) {
                                        rowValue += cells[j].innerHTML.toLowerCase() + " ";
                                    }

                                    // Show or hide the row based on whether the input value is found in the row value
                                    if (rowValue.indexOf(inputValue) > -1) {
                                        row.style.display = "";
                                    } else {
                                        row.style.display = "none";
                                    }
                                }
                            });
                        </script>
                        <script>
                            function confirmDelete(id) {
                                if (confirm("Are you sure you want to delete this user?")) {
                                    window.location.href = "deleteusers.php?id=" + id;
                                }
                            }

                            function confirmDeleteA(a_id) {
                                if (confirm("Are you sure you want to delete this Assets ?")) {
                                    window.location.href = "deleteassets.php?id=" + a_id;
                                }
                            }

                            function confirmDeleteMS(id) {
                                if (confirm("Are you sure you want to delete this user?")) {
                                    window.location.href = "deletemsoffice.php?id=" + id;
                                }
                            }
                        </script>
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->

                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

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

                function sureToApprove(id, car_id) {
                    if (confirm("Are you sure you want to Approve this request?")) {
                        window.location.href = 'approve.php?id=' + id + '&carid=' + car_id;
                    }
                }

                function deleteFunc(id) {
                    if (confirm('Are you sure to cancel ?')) {
                        window.location.href = 'deleteorder.php?id=' + id;
                    }
                }

                function Switch() {
                    var users = document.getElementById("div1");
                    var assets = document.getElementById("div2");
                    document.getElementById("div1").addEventListener("click", function() {
                        document.getElementById("users").style.display = "block";
                        document.getElementById("assets").style.display = "none";
                        document.getElementById("msoffice").style.display = "none";
                    });

                    document.getElementById("div2").addEventListener("click", function() {
                        document.getElementById("assets").style.display = "block";
                        document.getElementById("users").style.display = "none";
                        document.getElementById("msoffice").style.display = "none";
                    });
                    document.getElementById("div3").addEventListener("click", function() {
                        document.getElementById("assets").style.display = "none";
                        document.getElementById("users").style.display = "none";
                        document.getElementById("msoffice").style.display = "block";
                    });
                }
            </script>


            <script>
                document.getElementById("search-button").addEventListener("click", function() {
                    // Get the input value
                    var inputValue = document.getElementById("search-input").value.toLowerCase();

                    // Get all table rows
                    var rows = document.getElementById("dataTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

                    // Loop through all table rows and hide those that don't match the input value
                    for (var i = 0; i < rows.length; i++) {
                        var cells = rows[i].getElementsByTagName("td");
                        var match = false;

                        for (var j = 0; j < cells.length; j++) {
                            if (cells[j].innerHTML.toLowerCase().indexOf(inputValue) > -1) {
                                match = true;
                                break;
                            }
                        }

                        if (match) {
                            rows[i].style.display = "";
                        } else {
                            rows[i].style.display = "none";
                        }
                    }
                });
            </script>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>