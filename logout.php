<?php 
if(isset($_POST["login"])){
    session_start();
    session_destroy();
    header("Location: index.php");
}
else{

}

?>