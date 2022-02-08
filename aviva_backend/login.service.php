<?php
	//LOGIN SERVICE CLASS
	class LoginService{
		private $connection;
		private $login;
		//CONSTRUCT
		public function __construct(Connection $connection, Login $login){
			$this->connection = $connection->connect();
			$this->login = $login;
		}
		//LOGIN FUNCTION
		public function login(){
			$query = 'select id, name from usuarios where email = :email and password = md5(:password)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':email',$this->login->__get('email'));
			$stmt->bindValue(':password',$this->login->__get('password'));
			$stmt->execute();
			$login = $stmt->fetch(\PDO::FETCH_ASSOC);
			if($login['id'] != '' && $login['name'] != ''){
				$this->login->__set('id',$login['id']);
				$this->login->__set('name',$login['name']);
			}
			return $this;
		}
		//REGISTER FUNCTION
		public function register(){
			$query = 'select id, name from usuarios where email = :email';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':email',$this->login->__get('email'));
			$stmt->execute();
			$email = $stmt->fetch(\PDO::FETCH_ASSOC);
			if($email['id'] != '' && $email['name'] != ''){
				header('location: index.php?status=user_exist');
				exit();
			}			
			$query = 'insert into usuarios(name,email,password,confirm_password)values(:name,:email,md5(:password),md5(:confirm_password))';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->login->__get('name'));
			$stmt->bindValue(':email',$this->login->__get('email'));
			$stmt->bindValue(':password',$this->login->__get('password'));
			$stmt->bindValue(':confirm_password',$this->login->__get('confirm_password'));
			$stmt->execute();			
		}
		//SHOW FUNCTION
		public function recover(){
			$query = 'select name, email, password, confirm_password from usuarios';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}
?>
