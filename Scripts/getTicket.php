<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/16/2019	
	LAST MODIFIED: 3/16/2019
*/


	session_start();        
	$_SESSION['EVENT_ID'] = $_POST['order-ticket-btn'];
	
    header("Location: ../tickets.php");
	exit();
?>