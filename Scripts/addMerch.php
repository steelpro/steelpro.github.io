<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/16/2019	
	LAST MODIFIED: 3/25/2019
*/

	#IMPORT OBJECT
	require('merchClass.php');	

	session_start();	

	if (!isset($_SESSION['LOGGED_IN'])) {
		header("Location: ../login.php");	
		exit();
	}

	#CREATE CART ARRAYS IF EMPTY	
	if (empty($_SESSION['CART']))
		$_SESSION['CART'] = array();

	if (empty($_SESSION['MERCH_TEMP_CART']))
		$_SESSION['MERCH_TEMP_CART'] = array();	
		
	if (empty($_SESSION['TOTAL']))
		$_SESSION['TOTAL'] = 0.00;
	
	if (isset($_POST["order-shirt-btn"])) {
		$category = "Shirt";
		$edition = $_POST["edition-shirt"];

		$color = $_POST["color-shirt"];
		$color = str_replace('/', '', $color);
		$color = substr($color, 0, strpos($color, "."));

		$size = $_POST["size-shirt"];
		switch ($size) {
			case "S":
				$size = "Small";
				break;
			case "M":
				$size = "Medium";
				break;
			case "L":
				$size = "Large";
				break;
		}

		$price = 25.00;
		$amount = $_POST["quantity-shirt"];
		$_SESSION["temp"] = $edition;

		createMerch($category, $edition, $color, $size, $price, $amount);		
	}
	else if (isset($_POST["order-hoodie-btn"])) {
		$category = "Hoodie";
		$edition = $_POST["edition-hoodie"];

		$color = $_POST["color-hoodie"];
		$color = str_replace('/', '', $color);
		$color = substr($color, 0, strpos($color, "."));

		$size = $_POST["size-hoodie"];
		switch ($size) {
			case "S":
				$size = "Small";
				break;
			case "M":
				$size = "Medium";
				break;
			case "L":
				$size = "Large";
				break;
		}

		$price = 40.00;
		$amount = $_POST["quantity-hoodie"];

		createMerch($category, $edition, $color, $size, $price, $amount);		
	}
	else if (isset($_POST["order-hat-btn"])) {
		$category = "Hat";

		$color = $_POST["color-hat"];
		$color = str_replace('/', '', $color);
		$color = substr($color, 0, strpos($color, "."));
		
		$price = 18.00;
		$amount = $_POST["quantity-hat"];

		createMerch($category, "N/A", $color, "N/A", $price, $amount);	
	}		
	
	$_SESSION['CART'] = array_merge($_SESSION['CART'], $_SESSION['MERCH_TEMP_CART']);

	header("Location: ../store.php#site-nav");	
	exit();	



	function createMerch($category, $edition, $color, $size, $price, $amount) {
		
		#LOOP ON NUMBER OF ITEMS
		for ($i = 0; $i < $amount; $i++) {

			#CREATE ITEM OBJECT BASED ON PASSED VARIABLES 
			$newItem = new Merch($category, $edition, $color, $size, $price);
			
			#PUSH TO TEMP CART AND ADD TO TOTAL
			array_push($_SESSION['MERCH_TEMP_CART'], $newItem);
			$_SESSION['TOTAL'] += $price;
		}
	}	
?>