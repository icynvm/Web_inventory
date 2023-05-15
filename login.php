<?php 
   
    session_start();

    if (isset($_POST['submit'])) {

        include('connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $query);
        $objResult = mysqli_fetch_array($result);


    if($objResult){
            $_SESSION['username'] = $objResult['name'];
           
            $_SESSION['userlevel'] = $objResult['userlevel'];
            
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
				}, 1000);
			</script>
			';
        }else{
            echo '
            <script>
                setTimeout(function() {
                swal({
                        title: "Wrong!",
                        text: "Username or Password is not correct, please try again.",
                        type: "warning"
                    }, function() {
                    window.location = "index.php";
                });
                }, 1000);
            </script>
            ';
        }


    } else {
        header("Location: index.php");
    }
