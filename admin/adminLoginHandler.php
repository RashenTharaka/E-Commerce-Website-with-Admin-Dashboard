<?php
require_once __DIR__ . '/../config/db.php';
session_start();
   if(isset($_POST["btnSubmit"])){
		$email = $_POST["email"]; 
		$password=md5($_POST["password"]);
	   
	   $con = db_connect();
	   
	   if(!$con){
		   die("Sorry , you can't connect to the database.");
	   }
	   
	   $sql = "SELECT * FROM `tbl_admin` WHERE `email` = '$email' AND `password` = '$password'";
	   
	   $result = mysqli_query($con,$sql);
	   
	   if(mysqli_num_rows($result)>0){
			$_SESSION["email"] = $email;
		   
			header("Location:Dashboard.php");

	   }else{
		   header("Location:AdminDashboard.php");
	   }
   }

?>