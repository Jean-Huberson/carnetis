<?php 

	Class Format{
		var $_message = array();

		public function validateSimpleString($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		public function validatePassword($password, $confPassword){
			$password = $this->validateSimpleString($password);
			$confPassword = $this->validateSimpleString($confPassword);
			if(($password != $confPassword)){
				$this->_message['invalidPassword'] = "Mot de passe non concordant!";
				return false;
			}else{
				if(strlen($password) < 4 || strlen($confPassword) < 4){
				$this->_message['invalidPassword'] = "Mot de passe trop court!";
				return false;
				}
			}
			return true;
		}	

		public function validatePasswordLog($password){
			$password = $this->validateSimpleString($password);
			//$pattern1 ="#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
			//$pattern2 = "#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#";
			
			return $password;
		}

		public function validateEmail($email){
			$email = $this->validateSimpleString($email);
			$pattern = "#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#";
			if(preg_match($pattern,$email)){
				return $email;
			}
			else{
				$this->_message['invalidEmail'] = "Email invalide!";
			}
		}

		public function validateName($name){
			$name = $this->validateSimpleString($name);
			$pattern = "#^[a-zA-Z]{3,}$#";
			if(preg_match($pattern,$name)){
				$this->_message['invalidName'] = "Nom trop court!";
				return $name;
			}
		}

		public function validateNumber($phoneNumber){
			$phoneNumber = $this->validateSimpleString($phoneNumber);
			$pattern = '/^[0-9\-\(\)\/\+\s]*$/';
			if(preg_match($pattern,$phoneNumber)){
				return $phoneNumber;
			}
			else{
				$this->_message['invalidNumber'] = "Numéro invalide!";
			}
		}
		
		public function formatDate(){
			
			$date = new DateTime();
			$date->format('d-m-Y, H:i:s');
			return $date;
		}
	}