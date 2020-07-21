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
	$username = $_POST['username'];
	$password = $_POST['password'];	

	#CALL checkLogin METHOD FROM DB OBJECT
	$conn->checkLogin($username, $password);

	#IF rememberMe IS CHECKED, CREATE COOKIE LASTING TWO DAYS
	if (isset($_POST['remember-me'])) { 
		$twoDays = 60 * 60 * 24 * 2 + time();
		setcookie('USERNAME', $_POST['username'], $twoDays, "/");
		setcookie('PASSWORD', $_POST['password'], $twoDays, "/");
	} 
	else { 
		$twoDaysBack = time() - 60 * 60 * 24 * 2;
		setcookie('USERNAME', '', $twoDaysBack, "/");
		setcookie('PASSWORD', '', $twoDaysBack, "/");
	}
	
	#STORE LOGGIN_IN SESSION FOR FUTURE REFERENCE
	$_SESSION['LOGGED_IN'] = true;
	$_SESSION['NAME'] = $conn->getName($username, $password);
	$_SESSION['USERNAME'] = $username;
	
	exit();
?>