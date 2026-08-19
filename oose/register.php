<?php
include("connect.php");

  $name=$_POST['uname'];
  $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
  $email=$_POST['uemail'];
  $course=$_POST['course'];
  $insertQuery=$conn->prepare("INSERT INTO user(name,password,email,course) VALUES(?,?,?,?)");
  $insertQuery->bind_param("ssss",$name,$password,$email,$course);
  if($insertQuery->execute()){
    header("Location: login1.html");
     
  }
  else{
    echo "ERROR DETTECTED".$conn->error;
  }
  
$insertQuery->close();
$conn->close();
?>