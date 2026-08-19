<?php
session_start();
include("connect.php");
  $password=$_POST['password'];
  $email=$_POST['uemail'];
    $insertQuery=$conn->prepare("SELECT name,password,course FROM user WHERE email=?");
     $insertQuery->bind_param("s",$email);
     $insertQuery->execute();
    $result=$insertQuery->get_result();
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        if(password_verify($password,($row['password']))){
            $_SESSION['user']=$row['name'];
          $_SESSION['course']=$row['course'];
          header("Location: ".$row['course'].".php");
          exit();
        }
        else{
            header("Location:fails.html");
        }

    }
    else{
        echo "user not found";
    }
    $insertQuery->close();
    $conn->close();
?>