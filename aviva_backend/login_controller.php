<?php
	session_start();
	require_once '../../aviva_backend/conexao.php';
	require_once '../../aviva_backend/login.model.php';
	require_once '../../aviva_backend/login.service.php';
	//CHECKING ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;
		//LOGIN ACTION
		if($action == 'login'){
			if(empty($_POST['email']) || empty($_POST['password'])){
				header('location: index.php?status=invalid');
				exit;
			}
			$conexao = new Conexao();
			$login = new Login();
			$login->__set('email',$_POST['email']);
			$login->__set('password',$_POST['password']);
			$loginService = new LoginService($conexao, $login);
			$loginService->login();
			if($login->__get('id') != '' && $login->__get('name') != ''){
				$_SESSION['user'] = $login->__get('name');
				header('location: painel.php');	
			}else{
				header('location: index.php?status=invalid');	
			}
		//REGISTER ACTION
		}else if($action == 'cadastrar'){		
			if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])){
				header('location: index.php?status=empty');
				exit;
			}
			if($_POST['confirm_password'] != $_POST['password']){
				header('location: index.php?status=different');
				exit;
			}
			$conexao = new Conexao();
			$login = new Login();
			$login->__set('name',$_POST['name']);			
			$login->__set('email',$_POST['email']);
			$login->__set('password',$_POST['password']);
			$login->__set('confirm_password',$_POST['confirm_password']);
			$loginService = new LoginService($conexao, $login);
			$loginService->cadastrar();
			header('location: index.php?status=registered');
		//SHOW ACTION
		}else if($action == 'recover'){
			$conexao = new Conexao();
			$login = new Login();
			$loginService = new LoginService($conexao, $login);
			$usuarios = $loginService->recover();
		}
?>
