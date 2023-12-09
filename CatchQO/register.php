<?php 
  ob_start();
include "config.php";

try{

    $username = $_POST['username'];

    $email = $_POST['email'];

    $password = md5($_POST['password']);

    $phone = $_POST['phone'];

    $sql = "INSERT INTO `user`(`username`, `email`, `password`, `contactNum`, `isAdmin`) 

          VALUES ('$username', '$email','$password', '$phone',0)";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    }

    $conn->close();
    header('Location: http://localhost/CatchQO/?registered=true');
    // http://localhost:8001/?registered=true

}
catch(Exception $e ) {
  die($e);
}
?> 