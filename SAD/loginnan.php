<?php
	session_start();
	require "connect.php";
	if(isset($_SESSION["usern"]) && isset($_SESSION["pass"])){
		header("Location: home.php");
		exit();
	}	
	$usern = $_POST["usern"];
	$pass = $_POST["pass"];
	$query = "SELECT * FROM register WHERE usern='$usern'and pass='$pass'";
	$result = mysqli_query($con,$query);
	$count =  mysqli_num_rows($result);
	if($count==1){
		$_SESSION["usern"] = $usern;
		$_SESSION["pass"] = $pass;
		header("Location: home.php");
	}
	else{
		echo ("<script>alert('Login failed.')</script>");
		header("refresh: 0; url=index.php");
	}
	mysqli_close($con);
?>