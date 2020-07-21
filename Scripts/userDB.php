<?php 
/*
	REACH WORSHIP WEBSITE
	AUTHOR: ZACHARY BETTERS
	CREATED: 3/15/2019	
	LAST MODIFIED: 4/6/2019
*/



	#CLASS TO CONNECT TO DATABASE AND HANDLE DATABASE
	class DBConnect {
		
		private $_Tconn;
		
		public function __construct($dbHost, $dbUsername, $dbPassword, $dbName, $path) {
			
			#IF NOT CONNECTED
			if (!@$this->_TConnect($dbHost, $dbUsername, $dbPassword, $dbName)) {
				$_SESSION['ERROR_MSG'] = "Cannot connect to local database!" .
					" Please try again later.";
					header("Location: " . $path . "index.php#site-nav");
				exit();	
			}	
		}	
		private function _TConnect($dbHost, $dbUsername, $dbPassword, $dbName) {
			
			$this->_Tconn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
			
			if ($this->_Tconn) 
				return true;			
			else
				return false;	
		}	

		public function insertUser($username, $password, 
		$firstname, $lastname, $sex, $email, 
		$address, $city, $state, $country) {
			
			#IF CONNECTED
			if ($this->_Tconn) {	
				
				#ASK IF USERNAME ALREADY EXISTS IN DB
				$result = $this->_TcheckUser($username);
				
				#USERNAME EXISTS
				if (!$result) {
					$_SESSION['ERROR_MSG'] = "Username already exists!";
					header("Location: ../signup.php");
					exit();
				}			
				else {		
					#PREPARE INSERTION AND VALIDATE
					if (!$sql = $this->_Tconn->prepare('INSERT INTO users 
					(username, password, firstname, lastname, sex, 
						email, address, city, state, country) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {

						$_SESSION['ERROR_MSG'] = "Create new user has failed!" . 
						" Please try again later.";
						header("Location: ../signup.php");
						exit();
					}

					$sql->bind_param('ssssssssss', $username, $password, 
						$firstname, $lastname, $sex, $email, 
						$address, $city, $state, $country);		
					
					if (!$sql->execute()) {
						$_SESSION['ERROR_MSG'] = "Create new user has failed!" . 
							" Please try again later.";
						header("Location: ../signup.php");
						exit();
					}

					$sql->close();
				}
			}
			else {
				$_SESSION['ERROR_MSG'] = "Create new user has failed!" . 
					" Please try again later.";
				header("Location: ../signup.php");
				exit();
			}
		}		
		private function _TcheckUser($username) {
			
			#PREPARE SELECTION AND VALIDATE
			if (!$sql = $this->_Tconn->prepare('SELECT username 
			FROM users WHERE username = (?)')) {

				$_SESSION['ERROR_MSG'] = "Create new user has failed!" . 
					" Please try again later.";
				header("Location: ../signup.php");
				exit();
			}

			$sql->bind_param('s', $username);		
			
			if (!$sql->execute()) {
				$_SESSION['ERROR_MSG'] = "Create new user has failed!" . 
					" Please try again later.";
				header("Location: ../signup.php");
				exit();
			}

			$sql->bind_result($found);
			$sql->fetch();
			$sql->close();

			#IF USERNAME EXISTS IN DB
			if ($found)
				return false;	
			else  
				return true;	
		}
		
		public function checkLogin($username, $password) {

			#PREPARE SELECTION AND VALIDATE
			if (!$sql = $this->_Tconn->prepare('SELECT username, password 
			FROM users WHERE username = ? and password = ?')) {

				$_SESSION['ERROR_MSG'] = "Error! Cannot perform login! Please try again later.";				
				header("Location: ../login.php");
				exit();
			}

			$sql->bind_param('ss', $username, $password);	

			#VALIDATE EXECUTION
			$sql->execute();
			$result = $sql->get_result();
			$sql->close();
			
			#IF USER DOES NOT EXIST IN DB
			if (!($result && mysqli_num_rows($result) > 0)) {

				#DO NOT SPECIFIY WHICH IS INVALID FOR SECURITY	
				$_SESSION['ERROR_MSG'] = "Invalid username or password!";				
				header("Location: ../login.php");
				exit();
			}
						
			#SUCCESFUL
			header("Location: ../cart.php");
		}
		public function getName($username, $password) {

			#PREPARE SELECTION AND VALIDATE
			$sql = $this->_Tconn->prepare('SELECT firstname 
				FROM users WHERE username = ? and password = ?');

			$sql->bind_param('ss', $username, $password);				
			$sql->execute();
			
			$result = $sql->get_result();
			$sql->close();	
			$row = mysqli_fetch_array($result);

			return($row[0]);			
		}

		public function updateUser($username, $firstname, $lastname, $email, 
		$address, $city, $state, $country) {

			#IF CONNECTED
			if ($this->_Tconn) {	
				
				#ASK IF USERNAME EXISTS IN DB
				$result = $this->_TcheckUser($username);
				
				#USER DOES NOT EXIST
				if ($result) {
					$_SESSION['ERROR_MSG'] = "User does not exist!";					
					header("Location: ../account.php");
					exit();
				}		   	
				else {		

					#PREPARE INSERTION AND VALIDATE
					if (!$sql = $this->_Tconn->prepare("UPDATE users 
					SET firstname=?, lastname=?, email=?, 
					address=?, city=?, state=?, country=?
					WHERE username=?")) {

						$_SESSION['ERROR_MSG'] = "Error! Update request has failed!" .  
						" Please try again later.";
						header("Location: ../account.php");
						exit();
					}

					#GIVE VALUES
					$sql->bind_param('ssssssss', $firstname, $lastname, $email, 
						$address, $city, $state, $country, $username);	

					#VALIDATE EXECUTION
					if (!$sql->execute()) {
						$_SESSION['ERROR_MSG'] = "Error! Update request has failed!" .  
						" Please try again later.";
						header("Location: ../account.php");
						exit();
					}

					$sql->close();
				}
			}
			else {
				#IF FAILED
				$_SESSION['ERROR_MSG'] = "Error! Update request has failed!" .  
					" Please try again later.";
				header("Location: ../account.php");
				exit();
			}
		}	
		public function updatePassword($username, $passwordOld, $passwordNew) {

			#IF CONNECTED
			if ($this->_Tconn) {	
				
				#ASK IF USERNAME EXISTS IN DB
				$result = $this->_TcheckCred($username, $passwordOld);
				
				#USER AND PASS EXIST
				if (!$result) {
					$_SESSION['ERROR_MSG'] = "The current password you entered is invalid!";					
					header("Location: ../passwords.php");
					exit();
				}		   	
				else {		
					#PREPARE INSERTION
					if (!$sql = $this->_Tconn->prepare("UPDATE users 
					SET password=? WHERE username=?")) {

						$_SESSION['ERROR_MSG'] = "Update password has failed!" .
							" Please try again later.";
						header("Location: ../passwords.php");
						exit();
					}

					#GIVE VALUES
					$sql->bind_param('ss', $passwordNew, $username);	

					if (!$sql->execute()) {
						$_SESSION['ERROR_MSG'] = "Update password has failed!" .
							" Please try again later.";
						header("Location: ../passwords.php");
						exit();
					}

					$sql->close();
				}
			}
			else {			
				$_SESSION['ERROR_MSG'] = "Update password has failed!" .
					" Please try again later.";
				header("Location: ../passwords.php");
				exit();
			}
		}
		private function _TcheckCred($username, $password) {

			#PREPARE SELECTION
			if (!$sql = $this->_Tconn->prepare('SELECT username, password 
			FROM users WHERE username = ? and password = ?')) {

				$_SESSION['ERROR_MSG'] = "Update password has failed!" .
					" Please try again later.";
				header("Location: ../passwords.php");
				exit();
			}

			$sql->bind_param('ss', $username, $password);	
			
			if (!$sql->execute()) {
				$_SESSION['ERROR_MSG'] = "Update password has failed!" .
					" Please try again later.";
				header("Location: ../passwords.php");
				exit();
			}
			
			$result = $sql->get_result();
			$sql->close();
			
			#IF USER EXISTS IN DB
			if ($result && mysqli_num_rows($result) > 0) 
				return true;			
			else
				return false;
		}

		public function getEvent($eventid) {

			#PREPARE
			$sql = $this->_Tconn->prepare("SELECT * FROM events WHERE eventid=?");

			#GIVE VALUES
			$sql->bind_param('s', $eventid);	
			$sql->execute();
			$result = $sql->get_result();
			$sql->close();

			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {

					$datetime = $row["time"];
					$phpdate = strtotime( $datetime );
					$datetime = date( 'F j, Y - g:i A', $phpdate );
					
					$city = $row["city"];
					$state = $row["state"];
					$country = $row["country"];
					$venue = $row["venue"];
					
					$event = [
						"date" => $datetime,
						"city" => $city,
						"state" => $state,
						"country" => $country,
						"venue" => $venue											
					];

					return $event;
				}
			}
			else {
				$_SESSION['ERROR_MSG'] = "Error! Cannot retrieve concert infromation!";	
				header("Location: index.php#site-nav");
				exit();
			}
		}
	}
?>