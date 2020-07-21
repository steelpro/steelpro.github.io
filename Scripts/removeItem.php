<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/17/2019	
	LAST MODIFIED: 3/25/2019
*/

	require('ticketClass.php');	
	require('merchClass.php');	
	
	session_start();
	
	#STORE DESIRED ITEM TO REMOVE
    $selectedItem = $_POST["item-selection"];

    #DECREASE TOTAL
    $_SESSION['TOTAL'] -= $_SESSION['CART'][$selectedItem]->price;
    
	#REMOVE FROM CART
	unset($_SESSION['CART'][$selectedItem]);
    $_SESSION['CART'] = array_values($_SESSION['CART']);

	if (empty($_SESSION['CART'])) {
		$_SESSION['ERROR_MSG'] = "Your cart is now empty.";
		header("Location: ../index.php#site-nav");
		exit();
	}
	else {	
        header("Location: ../editCart.php");
        exit();
    }
        
	exit();
?>