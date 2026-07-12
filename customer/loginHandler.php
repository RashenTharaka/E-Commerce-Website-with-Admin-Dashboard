<?php
require_once __DIR__ . '/../config/db.php';
session_start();
   if(isset($_POST["btnSubmit"])){
	   $email = $_POST["txtEmail"];
	   $password =  $_POST["txtPassword"];
	   
	   $con = db_connect();
	   
	   if(!$con){
		   die("Sorry , you can't connect to the database.");
	   }
	   
	   $sql = "SELECT * FROM `tbluser` WHERE `email` = '$email' AND `password` = '$password'";
	   
	   $result = mysqli_query($con,$sql);
	   
	   if(mysqli_num_rows($result) > 0){
		   $row = mysqli_fetch_assoc($result);
		   $_SESSION['id'] = $row['id'];
		   $_SESSION["email"] = $email;
		   
		   header("Location:../index.php");
		   exit();
	   }else{
		   header("Location:Login.php");
		   exit();
	   }
   }

?>
