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
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$username = $_SESSION['USERNAME'];
	
	#CALL insertUser METHOD FROM DB OBJECT
	$conn->updateUser($username, $firstname, $lastname, $email, 
		$address, $city, $state, $country);	
		
	$_SESSION['NAME'] = $firstname;
		
	#USER MUST LOGIN AGAIN
	header("Location: ../account.php");
	exit();
?>