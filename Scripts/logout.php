<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/16/2019	
	LAST MODIFIED: 3/16/2019
*/


	session_start();        
    session_destroy();
    header("Location: ../login.php");
	exit();
?>