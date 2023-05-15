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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
	<link href="css/all.min.css" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
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
									<!-- 		 -->
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
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Contact Page</h2>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="" method="POST" class="tm-contact-form">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Name" required="" />
							</div>

							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email" required="" />
							</div>

							<div class="form-group">
								<textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
							</div>

							<div class="form-group tm-d-flex">
								<button type="submit" class="tm-btn tm-btn-success tm-btn-right">
									Send
								</button>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Our Address</h4>
							<address>
								333 Moo 1, Thasud Subdistrict, Muang District, Chiang Rai 57100, Thailand
								Tel. (053) 916020-1; Fax. (053) 916019;
							</address>
							<div class="tm-contact-social">
								<a href="https://www.facebook.com/sittichai.supina" class="tm-social-link" target="_blank"><i class="fab fa-facebook tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"target="_blank"><i class="fab fa-twitter tm-social-icon"></i></a>
								<a href="https://www.instagram.com/ic.xy/" class="tm-social-link"target="_blank"><i class="fab fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
			<div class="tm-container-inner-2 tm-map-section">
				<div class="row">
					<div class="col-12">
						<div class="tm-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.13499221516!2d99.89207991491637!3d20.044787686539536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d700048c69def1%3A0xa20592e502bc20c9!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmB4Lih4LmI4Lif4LmJ4Liy4Lir4Lil4Lin4LiH!5e0!3m2!1sth!2sth!4v1607766880425!5m2!1sth!2sth" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
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