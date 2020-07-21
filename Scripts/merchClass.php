<?php 	
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/16/2019	
	LAST MODIFIED: 3/25/2019
*/

	class Merch {
		
		#VARIABLES CREATED TO STORE ITEM VALUES
		public $name;
		public $category;
		public $edition;
		public $color;
		public $size;
		public $price;
		
		#CONSTRUCTOR FUNCTION CALLED AUTOMATICALLY 
		public function __construct($category, $edition, $color, $size, $price) {
			$this->name = "Store";
			$this->category = $category;
			$this->edition = $edition;	
			$this->color = $color;			
			$this->size = $size;
			$this->price = $price;
		}		
	}
?>