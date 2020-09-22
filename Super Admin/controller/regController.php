<?php
	require_once('../services/userService.php');

	$json = $_POST['json'];

	$obj = json_decode($json);


		$name 		= $obj->name;
		$username 	= $obj->username;
		$password 	= $obj->password;
		$email 		= $obj->email;

		if(empty($name) || empty($username) || empty($password) || empty($email)){
			
			echo "All fields are required";
		}
		else if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)){

			echo "Username must be at least 6 characters";

		}
		else if(strlen($password) < 6){
		
			echo "Password must be at least 6 characters long";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			echo "Please enter a valid Email";

		} else{
			
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'password'	=>$password,
				'email'		=>$email
			];

			$status = createEmployerByAdmin($user);

			if($status){
				
				echo  $name." Company Added";
			}else{
				
				echo "Service error ... Please try again.";
			}
		}

?>