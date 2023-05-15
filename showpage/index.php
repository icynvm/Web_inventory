<?php

session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>BUS RENTAL</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
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

<body>

	<div class="container">
		<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/darkgreen.jpg">
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
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link ">Home</a></li>
								<?php if (isset($_SESSION['username'])) { ?>
									<!-- <li class="tm-nav-li"><a href="about.php" class="tm-nav-link">Booking</a></li> -->

								<?php } else { ?>
								<?php } ?>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
								<?php if (!isset($_SESSION['username'])) { ?>
									<li class="tm-nav-li"><a href="../index.php" class="tm-nav-link">Login</a></li>
								<?php } else { ?>
									<li class="tm-nav-li"><a href="userinfo.php" class="tm-nav-link">BOOKING Orders</a></li>
									<li class="tm-nav-li"><a href="#" class="tm-nav-link "><i class="fas fa-user"></i><?php echo  $_SESSION['username']; ?></a></li>

									<li class="tm-nav-li"><a href="logout.php" class="tm-nav-link">Logout</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class=" tm-welcome-section">
				<h2 class=" text-center ">Welcome to Car rent</h2>
				<br>
				
				<p class="text-center">ทางเรามีรถหลากหลายรุ่นและหลากหลายแนวเลือกสรรค์ให้เหมาะกับคุณ</p>
			 <br>
			 <p class="text-center">รถของเรานั้นมี2ประเภทเชิญเลือกชมมทางด้านล่าง</p>
			</header>

			<div class="tm-paging-links font">
				<nav class="font">
					<ul>
						<li class="tm-paging-item "><a href="#" class="tm-paging-link active">4ที่นั่ง</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">7ที่นั่ง</a></li>
						<!-- <li class="tm-paging-item"><a href="#" class="tm-paging-link">Noodle</a></li> -->
						
					</ul>
				</nav class="font">
			</div>

			<!-- car 4 seat -->
			<div class="row tm-gallery">
				
				<div id="tm-gallery-page-4ที่นั่ง" class="tm-gallery-page font">
				<?php
									include('../connection.php');
									$i = 1;
                                    $sql = "SELECT *  FROM cars WHERE capacity = 4 ";
									$result = mysqli_query($conn, $sql);
                                        while ($row1 = mysqli_fetch_assoc($result)) {
									
									?>
					<article class='col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item'>
					<figure>
							<img src="<?php echo $row1['image'];?>" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title"> <?php echo$row1['car_name'];?> </h4>
								<?php if (isset($_SESSION['username'])) { ?>
								<p class="tm-gallery-description"><?php echo 'price per days :'.$row1['hire_cost'];?></p>
								<?php } else { ?>
								<?php } ?>
								<p class="tm-gallery-description"><?php echo $row1['description'];?> </p>
								<?php if (isset($_SESSION['username'])) { ?>
									<?php if ($row1['status'] == 'available') { ?>
								<a href="about.php?id=<?php echo $row1['car_id']; ?>&type=<?php echo $row1['car_type']; ?>&price=<?php echo $row1['hire_cost']; ?>&image=<?php echo $row1['image']; ?>&name=<?php echo $_SESSION['username']." ".$_SESSION['userlname']; ?>" class="btn btn-success">จอง</a>
								<?php } else { ?>
									<a href="#" class="btn btn-danger ">ไม่ว่าง</a>
								<?php }} ?>
							</figcaption>
						</figure>
					</article>
					<?php } ?>
				</div>


	
				
				<div id="tm-gallery-page-7ที่นั่ง" class="tm-gallery-page font hidden">
				<?php
									include('../connection.php');
									$i = 1;
                                    $sql = "SELECT *  FROM cars WHERE capacity = 7 ";
									$result = mysqli_query($conn, $sql);
                                        while ($row1 = mysqli_fetch_assoc($result)) {
									
									?>
					<article class='col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item'>
					<figure>
							<img src="<?php echo $row1['image'];?>" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title"> <?php echo$row1['car_name'];?> </h4>
								<?php if (isset($_SESSION['username'])) { ?>
								<p class="tm-gallery-description"><?php echo 'price per days :'.$row1['hire_cost'];?></p>
								<?php } else { ?>
								<?php } ?>
								<p class="tm-gallery-description"><?php echo $row1['description'];?> </p>
								<?php if (isset($_SESSION['username'])) { ?>
									<?php if ($row1['status'] == 'available') { ?>
								<a href="about.php?id=<?php echo $row1['car_id']; ?>&type=<?php echo $row1['car_type']; ?>&price=<?php echo $row1['hire_cost']; ?>&image=<?php echo $row1['image']; ?>&name=<?php echo $_SESSION['username']." ".$_SESSION['userlname']; ?>" class="btn btn-success">จอง</a>
								<?php } else { ?>
									<a href="#" class="btn btn-danger ">ไม่ว่าง</a>
								<?php }} ?>
							</figcaption>
						</figure>
					</article>
					<?php } ?>
				</div>

			</div>
	
	<br>
	<div class="tm-section tm-container-inner">
		<div class="row">
			<div class="col-md-6">
				<figure class="tm-description-figure">
					<img src="img/carrental.jpg" alt="Image" class="img-fluid" />
				</figure>
			</div>
			<div class="col-md-6">
				<div class="tm-description-box">
					<h4 class="tm-gallery-title">CAR RENTAL</h4>
					<p class="tm-mb-45">เรื่องรถไว้ใจเรา ให้เราพาคุณไปทุกๆที่ที่คุณอยากไป</p>
				</div>
			</div>
		</div>
	</div>
	</main>

	<footer class="tm-footer text-center">
		<p>Copyright &copy; 2020 Car rental

			| Design: <a rel="nofollow" href="https://templatemo.com">Icy</a></p>
	</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script>
		$(document).ready(function() {
			// Handle click on paging links
			$('.tm-paging-link').click(function(e) {
				e.preventDefault();

				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>
	<!-- php -- 	>
</body>

</html>