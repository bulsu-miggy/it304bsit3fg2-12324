<?php 
  ob_start();
include "config.php";

  $email = $_POST['email'];

  $password = md5($_POST['password']);

  $sql = "SELECT * FROM `user` WHERE (`email` = '$email' and `password` = '$password')";

  $result = $conn->query($sql);

  $numRows = mysqli_num_rows($result);

  if($numRows  == 1){
    // die(json_encode(mysqli_fetch_array($result)));
    session_start();
    $userRecord = mysqli_fetch_array($result);
    $_SESSION['email'] = $email;
    $_SESSION['isAdmin'] = $userRecord['isAdmin'];
    $_SESSION['userID'] = $userRecord['userID'];

    if($userRecord['isAdmin'] == 1 ){
      header("location:admin.php");
    } else {
      header("location:home.php");
    }

  }
  else{
    header("location:/?loginerror=".$email);
  }

  $conn->close();

?>