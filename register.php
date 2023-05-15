<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Page</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/nav.js"></script>
    <link rel="icon" href="aa9501df489c885cce3f31b0fc6234ef.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function showSweetAlert(title, text, icon) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon
            });
        }
    </script>
</head>

<body class="rg">
    <?php
    echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
    session_start();

    include("connection.php");

    if (isset($_POST["submit"])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $userlevel = 'm';

        $user_check = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo '
            <script>
                setTimeout(function() {
                swal({
                        title: "User alredy Exist! ",
                        text: "User alredy Exist!",
                        type: "warning"
                    }, function() {
                    window.location = "register.php";
                });
                }, 100);
            </script>
            ';
        } else {
            $query = "INSERT INTO users ( username, password, firstname, lastname, email, userlevel)
                  VALUES ( '$username', '$password', '$firstname', '$lastname', '$email', '$userlevel')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo '
			<script>
				setTimeout(function() {
				swal({
						title: "Success",
						text: "Register Success",
						type: "success",
					}, function() {
					window.location = "index.php";
				});
				}, 100);
			</script>
			';
            } else{
                echo '
                <script>
                    setTimeout(function() {
                    swal({
                            title: "Error!",
                            text: "Username or Password is not correct, please try again.",
                            type: "danger"
                        }, function() {
                        window.location = "index.php";
                    });
                    }, 100);
                </script>
                ';
        }
    }
}

    ?>

    <video autoplay muted loop id="myVideo">
        <source src="video/Car bg.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="wrapper fadeInDown">
        <div id="formContentregister" style="width: 60%;">
            <!-- Tabs Titles -->
            <br>
            <!-- Icon -->
            <div class="fadeIn first">
                <!-- <img id="icon" src="buslogo.jpg"> -->
                <h3 style="font-size:20px; color:#93abd3;text-align:center;"> REGISTER </h3>
            </div>
            <br>
            <form method="POST" class="form-horizontal">
                <div class="form-group">
                    <label style="font-size:14px;">Username :</label>
                    <input type="text" name="username" placeholder="Enter your username" class="fadeIn second" required>
                </div>
                <br>
                <div class="form-group">
                    <label style="font-size:14px;">Password :</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="fadeIn third" required>
                </div>
                <br>
                <div class="form-group">
                    <label style="font-size:14px;">Firstname :</label>
                    <input type="text" name="firstname" placeholder="Enter your firstname" class="fadeIn fourth" required>
                </div>
                <br>
                <div class="form-group">
                    <label style="font-size:14px;">Lastname :</label>
                    <input type="text" name="lastname" placeholder="Enter your lastname" class="fadeIn five" required>
                </div>
                <br>
                <div class="form-group">
                    <label style="font-size:14px; margin-left:24px">Email :</label>
                    <input type="email" name="email" placeholder="Enter your email " class="fadeIn six" required>
                </div>
                <br>
                <br>
                <br>
                <br>
                <p class="text-danger fadeIn seven">*** Don't share your password ***</p>
                <div class="text-center">
                    <input type="submit" name="submit" class="fadeIn six tm-btn-success " value="Submit" onclick="test()">
                </div>
                <br>
                <a class="underlineHovercancel fadeIn seven a text-center" href="index.php"> cancel </a></p>
            </form>
        </div>
    </div>

</body>

</html>