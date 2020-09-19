<?php
	require_once('../services/userService.php');

	if(isset($_POST['submit'])){

		$name 		= $_POST['name'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];

		if(empty($name) || empty($username) || empty($password) || empty($email)){
			header('location: ../views/add_company.php?error=null');
		}
		else if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)){
			header('location: ../views/add_company.php?error=username_error');

		}
		else if(strlen($password) < 6){
			header('location: ../views/add_company.php?error=password_error');
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('location: ../views/add_company.php?error=email_error');

		} else{
			
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'password'	=>$password,
				'email'		=>$email
			];

			$status = createEmployerByAdmin($user);
		
			if($status){
				header('location: ../views/employer_list.php?msg=company-success');
			}else{
				header('location: ../views/add_company.php?error=dberror');
			}
		}
		
	}
?>