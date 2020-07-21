<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/15/2019	
	LAST MODIFIED: 4/8/2019
*/



	#IMPORT DB CLASS
	require('userDB.php');
	
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
	$username = $_POST['username'];
	$password = $_POST['password'];	
	$sex = $_POST['sex'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	
	#CALL insertUser METHOD FROM DB OBJECT
	$conn->insertUser($username, $password, $firstname, $lastname, $sex, 
		$email, $address, $city, $state, $country);		
	
	#USER MUST LOGIN AGAIN
	header("Location: ../login.php");
	exit();
?>