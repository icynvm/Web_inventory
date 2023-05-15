<?php
$link = mysqli_connect("localhost","root");
mysqli_set_charset($link,'utf8');
$sql = "Create database loginadminuser1"."charater set utf8"."collate utf8_unicode_ci;";
$sql = "Create Database loginadminuser1;";
$result = mysqli_query($link,$sql);
if($result){
    echo "DB has been created successfully<br>";
    }else{
    echo "DB cannot be created <br>";
    }
    $sql = "Use loginadminuser1;";
$result = mysqli_query($link, $sql);

$sql = "Create Table users(id Varchar(5),

email Varchar(100), firstname Varchar(100), lastname Varchar(100), password int(100),userlevel int(1),Primary Key (id));";

$result = mysqli_query($link, $sql);
if($result){
echo "Table has been created";
}else{
echo "Table cannot be created";
}
mysqli_close($link);
    ?>