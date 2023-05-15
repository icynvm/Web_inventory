<?php

session_start();
if (!isset($_SESSION["id"])) {
	echo ("<script> alert('กรุณาล็อกอินก่อน');window.location='../login.php';</script>");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>BUS RENTAL</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
	<link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<style>
	table {
		border-collapse: collapse;
		width: 90%;
		border: 2px solid #ddd;
		margin-left: auto;
		margin-right: auto;
		font-size: 12px;
	}

	th,
	td {
		border: 1px solid #ddd;
		text-align: center;
		padding: 10px;

	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->

<body>

	<div class="container">
		<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/darkg.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">CAR RENTAL</h1>
								<h6 class="tm-site-description">NEW CAR RENT STYLE</h6>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home</a></li>
								<?php if (isset($_SESSION['username'])) { ?>
									<!-- <li class="tm-nav-li"><a href="about.php" class="tm-nav-link">Booking</a></li> -->
								<?php } else { ?>
								<?php } ?>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link ">Contact</a></li>
								<?php if (!isset($_SESSION['username'])) { ?>
									<li class="tm-nav-li"><a href="../index.php" class="tm-nav-link">Login</a></li>
								<?php } else { ?>
									<li class="tm-nav-li"><a href="userinfo.php" class="tm-nav-link">BOOKING Orders</a></li>
									<li class="tm-nav-li"><a href="#" class="tm-nav-link "><i class="fas fa-user"></i><?php echo $_SESSION['username']; ?></a></li>

									<li class="tm-nav-li"><a href="logout.php" class="tm-nav-link">Logout</a></li>
								<?php } ?>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<br>
			<br>

			<h2 class=" text-center ">-Orders-</h2>

			<div class="card-body">
				<div style="overflow-x:auto;">
					<p class="text-center">โปรดชำระเงินให้สำเร็จและแจ้งทางE-MAIL เพื่อทำการยืนยัน</p>
					<table>
						<tr>
							<th>NO</th>
							<th>car</th>
							<th>Rent from</th>
							<th>Return back</th>
							<th>Days</th>
							<th>Price</th>
							<th>Status</th>
							<th></th>

						</tr>
						<?php
						include('../connection.php');
						$i = 1;
						$strSQL = "SELECT * FROM `orders` WHERE `user_id` = '" . $_SESSION["id"] . "' order by `no` ASC";
						$objQuery = mysqli_query($conn, $strSQL);
						while ($objResult = mysqli_fetch_array($objQuery)) {
							$id =  $objResult["no"];
							$car_id =  $objResult["car"];
							$strSQL1 = "SELECT * FROM `cars` WHERE `car_id` = '" . $car_id . "'";
							$objQuery1 = mysqli_query($conn, $strSQL1);
							$objResult1 = mysqli_fetch_array($objQuery1);


						?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $objResult1["car_name"]; ?></td>
								<td><?php echo $objResult["date1"]; ?></td>
								<td><?php echo $objResult["date2"]; ?></td>
								<td><?php echo $objResult["days"]; ?></td>
								<td><?php echo $objResult["price"]; ?></td>
								<td><?php echo $objResult["status"]; ?></td>
								<?php if ($objResult["status"] == 'Progress') { ?>
									<td><button class="btn btn-danger" onclick="deleteFunc('<?php echo $id; ?>','<?php echo $car_id; ?>')">Cancel Orders</button></td>
								<?php } elseif ($objResult["status"] == 'Approved') { ?>
									<td><button class="btn btn-danger" onclick="ReturnCar('<?php echo $id; ?>','<?php echo $car_id; ?>')">Return</button></td>
								<?php } ?>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</main>
		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2020 car rental
				| Design: <a rel="nofollow" href="https://facebook.com/sittichai.supina">Icy</a></p>
		</footer>
	</div>
	<script>
		function ReturnCar(id, car_id) {
			if (confirm("Are you sure  to Return a car?")) {
				window.location.href = 'return.php?id=' + id + '&carid=' + car_id;
			}
		}

		function deleteFunc(id, car_id) {
			if (confirm('Are you sure to cancel ?')) {
				window.location.href = 'deleteorder.php?id=' + id + '&carid=' + car_id;
			}
		}
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function() {
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
				acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight) {
						panel.style.maxHeight = null;
					} else {
						panel.style.maxHeight = panel.scrollHeight + "px";
					}
				});
			}
		});
	</script>
</body>

</html>