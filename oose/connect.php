<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "login1";
$conn=new mysqli($host,$user,$password,$db);
if($conn->connect_error){
echo "erooro".$conn->connect_error;
}

?>