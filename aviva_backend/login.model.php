<?php
	//LOGIN CLASS
	class Login{
		private $id;
		private $name;
		private $email;
		private $password;
		private $confirm_password;
		private $date_register;
		//GET
		public function __get($attribute){
			return $this->$attribute;
		}
		//SET
		public function __set($attribute, $value){
			$this->$attribute = $value;
			return $this;
		}
	}
?>
