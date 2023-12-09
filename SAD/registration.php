<?php

   

	require "connect.php";
	$usern = $_POST["usern"];
	$pass = $_POST["pass"];
	$email = $_POST["email"];
     

	try {	
		$query = "INSERT INTO register (usern,email,pass) 
				               VALUES ('$usern','$email','$pass')";
				   
		if(mysqli_query($con,$query)){
			echo ("<script>alert('Account registered.')</script>");
			header("refresh: 0; url=index.php");
		}
	} 
	catch (Exception $e) {
		echo ("<script>alert('Registration failed.')</script>");
		header("refresh: 0; url=index.php");
	}
	mysqli_close($con);
?>


