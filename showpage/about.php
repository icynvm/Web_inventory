<?php
session_start();

?>
<?php
include('../connection.php');
if (isset($_POST["save"])) {
	$namer = $_GET["namer"];
	$num = $_GET["num"];
	$car = $_GET["car"];
	$date1 = $_GET["date1"];
	$date2 = $_GET["date2"];
	$days = $_GET["days"];
	$price = $_GET["price"];
	$idcard = $_GET["idcard"];

	$query = "INSERT INTO orders(no,user_id,name,num, car, date1, date2, days,price,idcard) VALUES (NULL,'" . $_SESSION["id"] . "','$namer',' $num ',' $car ',' $date1 ',' $date2 ',' $price','$days','$idcard')";
	$objQuery = mysqli_query($conn, $query);
	echo $objQuery;
	if ($objQuery) {
		echo ("<script> alert('Successfully completed!'); window.location='index.php';</script>");
	} else {
		echo ("<script> alert('Unsuccesful record!');window.location='about.php';</script>");
	}
}
?>
<?php
include('../connection.php');
$sql = "SELECT *  FROM cars WHERE car_id = '$_GET[id]'";
$result = mysqli_query($conn, $sql);
$objResult = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>BUS RENTAL</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
	<!-- <link href="css/all.min.css" rel="stylesheet" /> -->
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<style>
	table {
		border-collapse: collapse;
		width: 80%;
		border: 1px solid #ddd;
		margin-left: auto;
		margin-right: auto;
	}

	th,
	td {
		text-align: center;
		padding: 18px;

	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>

<body>

	<div class="container">
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/original.jpg">
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
									<li class="tm-nav-li"><a href="#" class="tm-nav-link">Booking</a></li>
								<?php } else { ?>
								<?php } ?>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
								<?php if (!isset($_SESSION['username'])) { ?>
									<li class="tm-nav-li"><a href="../index.php" class="tm-nav-link">Login</a></li>
								<?php } else { ?>
									<li class="tm-nav-li"><a href="userinfo.php" class="tm-nav-link">BOOKING Orders</a></li>
									<li class="tm-nav-li"><a href="#" class="tm-nav-link "><i class="fas fa-user"></i><?php echo $_SESSION['username']; ?></a></li>

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
				<h2 class=" text-center tm-section-title"> Online Booking tickets </h2>
				<p class=" text-center">Fill out the form to make your reservation.</p>
			</header>
			<div class="container">
				<div style="border: 2px;border-style:inset;border-width:5px;">
					<h2 class="text-center">Booking</h2>
				</div>
				<br>
				<br>
				<div class="text-center">
					<div class="form-group">
						<label>Your select Cars :</label>
						<p id="cartype"><?php echo $_GET['type'] ?></p>
					</div>
					<div class="form-group">
						<label>Pricing PER Days :</label>
						<p><?php echo $_GET['price'] ?></p>
						<!-- <article class='col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item text-center'> -->
						<!-- <figure class="text-center"> -->
						<img src="<?php echo $_GET['image']; ?>" alt="Image" class="img tm-gallery-item text-center" />
						<!-- </figure>
					</article> -->
					</div>
				</div>
				<div class="form-group">
					<label>Name :</label>
					<p name="name" id="name"><?php echo $_GET['name'] ?></p>
				</div>
				<div class="form-group">
					<label>Phone number:</label>
					<input type="number" class="form-control" placeholder="Enter Phone number" name="number" id="number" required>
				</div>
				<div class="form-group">
					<label>ID Card :</label>
					<input type="number" class="form-control" placeholder="Enter ID Card..." name="idcard" id="idcard" required>
				</div>
				<div class="form-group">
					<label>driver's license :</label>
					<input type="number" class="form-control" placeholder="Enter license..." name="license" id="license" required>
				</div>

				<div class="form-group">
					<label> Rent Days Form : </label>
					<input type="date" class="form-control" name="day" id="day" placeholder="Enter Days ..." required>
				</div>
				<div class="form-group">
					<label> TO : </label>
					<input type="date" class="form-control" name="dayt" id="day2" placeholder="Enter Days ..." required>
				</div>
				<br>

				<div style=" text-align: right;">
					<button class="btn" style="background-color:#dad300;margin-left: auto;margin-right: auto;;" onclick="shows()">BOOKING</button>
				</div>
				<div style="padding-top:10px;display:none;" id="divshow">

					<p class="text-center">=== SCRIPT === </p>
					<p id="random" class="text-center"></p>
					<p id="showname" class="text-center"><?php echo 'Your name is :' . "" . $_GET['name']; ?></p>
					<p id="shownumber" class="text-center"></p>
					<p id="showcar" class="text-center"> <?php echo 'Your select Cars is :' . "" . $_GET['type'] ?></p>
					<p id="showdate1" class="text-center"></p>
					<p id="time1" class="text-center"></p>
					<p id="showdate2" class="text-center"></p>
					<p id="time2" class="text-center"></p>
					<p id="date" class="text-center"></p>

					<br>
					<div class="text-center">
						<button type="submit" class="btn " name="save" style="background-color:#41584b;color:white;" onclick="cal()">CALCULATOR PRICE</button>
					</div>
					<div style="padding-top:10px;display:none;" id="divcal">
						<br>
						<br>
						<p id="show" class="text-center"></p>
						<br>
						<br>
						<div class="text-center">

							<button type="submit" class="btn " name="save" style="background-color:#41584b;color:white;" onclick="Insertorder()">Confirm</button>
						</div>
					</div>

				</div>

		</main>
		<br>
		<br>
		<br>
		<br>
		<!-- <p class="text-center" style="color: black !important;">User current in Web :<p id="math" style="color: red;" class="text-center"></p> -->
		</p>
		<div>
			<script type="text/javascript">
				let price = '';

				function cal() {

					var date1 = document.getElementById("day").value;
					var date2 = document.getElementById("day2").value;
					date1 = new Date(date1);
					date2 = new Date(date2);
					const diffTime = Math.abs(date2 - date1);
					var sec_num = parseInt(diffTime / 1000);
					let days = Math.floor(sec_num / 86400);
					let price = <?php echo $_GET['price']; ?>;
					let total = price * days;
					document.getElementById('divcal').style.display = 'block';
					document.getElementById("show").innerHTML = "You need to pay :" + total + "Baht";
				}

				function formatDate(d) {
					let date = new Date(d);
					let dd = date.getDate();
					let mmm = date.getMonth() + 1;
					let yy = date.getFullYear();
					let result = dd + "/" + mmm + "/" + yy;
					return result;
				}


				function formatTime(d) {
					let date = new Date(d);
					let hh = date.getHours();
					let mm = date.getMinutes();
					let ss = date.getSeconds();
					if (hh < 10) {
						hh = '0' + hh;
					}
					if (mm < 10) {
						mm = '0' + mm;
					}
					if (ss < 10) {
						ss = '0' + ss;
					}
					let result = hh + ":" + mm + ":" + ss;
					return result;
				}

				function Insertorder() {
					// let name = <?php echo ($_SESSION['username'] . '' . $_SESSION['userlname']); ?>;
					//  let carname = <?php echo $_GET['type']; ?>;
					var num = document.getElementById("number").value;
					var car = <?php echo $_GET['id']; ?>;
					var date1 = document.getElementById("day").value;
					var date2 = document.getElementById("day2").value;
					var idcard = document.getElementById("idcard").value;
					date1 = new Date(date1);
					date2 = new Date(date2);
					const diffTime = Math.abs(date2 - date1);
					var sec_num = parseInt(diffTime / 1000);
					let days = Math.floor(sec_num / 86400);
					let price = <?php echo $_GET['price']; ?>;
					let total = price * days;
					window.location.href = 'Insertorder.php?car=' + car + '&date1=' + document.getElementById("day").value + '&date2=' +
						document.getElementById("day2").value + '&price=' + total + '&days=' + days + '&idcard=' + idcard + '&num=' + num;
				}

				function shows() {

					var num = document.getElementById("number").value;
					var license = document.getElementById("license").value;
					var date1 = document.getElementById("day").value;
					var date2 = document.getElementById("day2").value;
					var idcard = document.getElementById("idcard").value;
					date1 = new Date(date1);
					date2 = new Date(date2);
					const diffTime = Math.abs(date2 - date1);
					var sec_num = parseInt(diffTime / 1000);
					let days = Math.floor(sec_num / 86400);
					document.getElementById('divshow').style.display = 'block';
					// document.getElementById("showname").innerHTML = "You name is :" + "      " + namer;
					document.getElementById("shownumber").innerHTML = "You phonenumber is  :" + num;
					document.getElementById("shownumber").innerHTML = "You Driver's license is  :" + license;
					document.getElementById("showdate1").innerHTML = "Rent form :" + formatDate(date1);
					document.getElementById("showdate2").innerHTML = "To :" + formatDate(date2);
					document.getElementById("date").innerHTML = "You rent day is :" + days + "days";
					document.getElementById("random").innerHTML = "-------PAYMENT SESSION-------- ";
				}
			</script>

			<footer class="tm-footer text-center">
				<p>Copyright &copy; 2020 car rental
					| Design: <a rel="nofollow" href="https://facebook.com/sittichai.supina">Icy</a></p>
			</footer>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/parallax.min.js"></script>
</body>

</html>