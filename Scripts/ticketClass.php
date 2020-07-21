<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/16/2019	
	LAST MODIFIED: 3/25/2019
*/

	class Ticket {
		
		#VARIABLES CREATED TO STORE ITEM VALUES
		public $name;
		public $eventid;
		public $type;
		public $price;
		
		#CONSTRUCTOR FUNCTION CALLED AUTOMATICALLY 
		public function __construct($ticketEventid, $ticketType, $ticketPrice) {
			$this->name = "Tour";
			$this->eventid = $ticketEventid;
			$this->type = $ticketType;
			$this->price = $ticketPrice;
		}		
	}
?>