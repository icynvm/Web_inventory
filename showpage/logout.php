<?php
                session_start();
                require_once("../connection.php");
                session_destroy();
                echo ("<script> window.location='../index.php';</script>");
?>