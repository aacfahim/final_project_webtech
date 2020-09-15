<?php
	require_once('../services/userService.php');

	if(isset($_POST['submit'])){

		$name 	= $_POST['name'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];

		if(empty($name) || empty($username) || empty($password) || empty($email)){
			header('location: ../views/signup.php?error=null');
		}
		else if(!preg_match("/^[a-z A-Z]*$/",$name)){
			header('location: ../views/signup.php?error=name_error');

		}
		else if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)){
			header('location: ../views/signup.php?error=username_error');

		}
		else if(strlen($password) <= 6){
			header('location: ../views/signup.php?error=password_error');
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('location: ../views/signup.php?error=email_error');

		} else{
			
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'password'	=>$password,
				'email'		=>$email
			];

			$status = create($user);
		
			if($status){
				header('location: ../views/login.php?msg=success');
			}else{
				header('location: ../views/signup.php?error=dberror');
			}
		}
		
	}
?>