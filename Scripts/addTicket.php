<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/16/2019	
	LAST MODIFIED: 3/25/2019
*/

	#IMPORT OBJECT
	require('ticketClass.php');	

	session_start();	

	#CREATE CART ARRAYS IF EMPTY	
	if (empty($_SESSION['CART']))
		$_SESSION['CART'] = array();

	if (empty($_SESSION['TICKET_TEMP_CART']))
		$_SESSION['TICKET_TEMP_CART'] = array();
	
	if (empty($_SESSION['TOTAL']))
		$_SESSION['TOTAL'] = 0.00;		
	
	#STORE EVENT DATA
	$eventid = $_SESSION['EVENT_ID'];	
	$type = $_POST['ticket-type'];
	$price = $_POST['ticket-price'];
	$price = floatval(ltrim($price, '$'));
	$amount = $_POST['ticket-amount'];

	createTicket($eventid, $type, $price, $amount);

	$_SESSION['CART'] = array_merge($_SESSION['CART'], $_SESSION['TICKET_TEMP_CART']);
	
	unset($_SESSION['EVENT_ID']);

	header("Location: ../cart.php");	
	exit();	



	function createTicket($eventid, $type, $price, $amount) {
		
		#LOOP ON NUMBER OF TICKETS
		for ($i = 0; $i < $amount; $i++) {

			$total = $_SESSION['TOTAL'];

			#CREATE ITEM OBJECT BASED ON PASSED VARIABLES 
			$newTicket = new Ticket($eventid, $type, $price);
			
			#PUSH TO TEMP CART AND ADD TO TOTAL
			array_push($_SESSION['TICKET_TEMP_CART'], $newTicket);
			$total += $price;
			$_SESSION['TOTAL'] = $total;
		}
	}	
?>