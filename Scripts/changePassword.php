<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/15/2019	
	LAST MODIFIED: 4/8/2019
*/



	#IMPORT DB CLASS
	require('userDB.php');

	#NOT NEEDED FOR FINAL PRODUCT 
	session_start();

	$dbserver = "localhost";
	$dbusername = "u443538790_zachb";
	$dbpassword = "@PxPitt3#";
	$dbname = "u443538790_reach";
	
	#CONNECT TO DB WITH CREDENTIALS (CALL OBJECT)
	$conn = new DBConnect($dbserver, $dbusername, $dbpassword, $dbname, "../");

	#STORE FROM POST
	$passwordOld = $_POST['password-o'];
	$passwordNew = $_POST['password-n'];

	$username = $_SESSION['USERNAME'];
	
	#CALL insertUser METHOD FROM DB OBJECT
	$conn->updatePassword($username, $passwordOld, $passwordNew);		
		
	#USER MUST LOGIN AGAIN
	$_SESSION['ERROR_MSG'] = "Password has been updated! Please login again for security purposes.";	
	header("Location: ../login.php");
	exit();
?>