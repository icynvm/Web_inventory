<?php

session_start();

?>
<html>

<head>
<title>LOGIN</title>
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="rg">
  <video autoplay muted loop id="myVideo">
    <source src="video/Car bg.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <br>
      <!-- Icon -->
      <div class="fadeIn first">
      <img src="img/logo-header.png" id="icon" alt="User Icon" />
      <!-- <img src="img/train2.jpg" id="icon" alt="User Icon" /> -->
<br>
<br>
        <!-- <h3 style="font-size:large;"> BPS Assets </h3> -->
        <!-- <img src="#" id="icon" alt="" /> -->
      </div>
      <br>
  
      <!-- Login Form -->
      <form method="post">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" required><br>
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required><br><br><br>
        <input type="submit" class="fadeIn fourth" value="Log In" name="submit"><br>
      </form>
      <span style="color:red;display:none;" id="chk"></span>


      <!-- Remind Passowrd -->

      <p class="p fadeIn seven "> Don't have account ? <a class="underlineHover fadeIn seven a" href="register.php"> Sign Up </a></p>


    </div>
  </div>

  <script>
    function test(title, text, icon) {
      if (icon) {
        swal({
          icon: icon,
          title: title,
          text: text,
          //icon: 'error';
        });
      } else {
        swal({
          title: title,
          text: text,
          //icon: 'error';
        });
      }

    }
  </script>
</body>

</html>
<?php
session_start();
include('connection.php');
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $FirstName = $_POST['firstName'];
$LastName = $_POST['lastName'];

  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  $objResult = mysqli_fetch_array($result);

  if ($objResult) {
    $_SESSION['username'] = $objResult['firstname'];
    $_SESSION['fullname'] = $objResult['firstname'].$objResult['lastname'];
    $_SESSION['userlname'] = $objResult['lastname'];
    $_SESSION['id'] = $objResult['id'];
    $_SESSION['userlevel'] = $objResult['userlevel'];
  
    if ($_SESSION['userlevel'] == "a") {
        header("Location: ./admin");
    }

    if ($_SESSION['userlevel'] == 'm') {
        header("Location: ./showpage");
    }
  } else {
    echo "<script>test('Fail !','USER OR PASSWORD INCORRECT !','error');</script>";
  }
}

?>