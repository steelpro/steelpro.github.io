<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/17/2019	
	LAST MODIFIED: 3/17/2019
*/


	session_start();        
	
	unset($_SESSION['CART']);
	unset($_SESSION['TOTAL']);

    header("Location: ../index.php");
	exit();
?>