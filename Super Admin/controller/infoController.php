<?php
	require_once('../services/userService.php');

	//create new user
	if(isset($_POST['create'])){
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		if(empty($username) || empty($password) || empty($email)){
			header('location: ../views/create.php?error=null');
		}else{
			$user = [
				'username'	=>$username,
				'password'	=>$password,
				'email'		=>$email
			];
			$status = create($user);
			if($status){
				header('location: ../views/user_list.php?msg=success');
			}else{
				header('location: ../views/create.php?error=dberror');
			}
		}	
	}

	//edit new user
	if(isset($_POST['update'])){
		$username 	= $_POST['Username'];
		$password 	= $_POST['Password'];
		$name 	= $_POST['Name'];
		$email 	= $_POST['Email'];


		if(empty($username) || empty($password) || empty($name) || empty($email)){
			header("location: ../views/edit_profile.php?Username='.$username'");
		}else{
			$user = [
				'username'	=>$username,
				'password'	=>$password,
				'Name'		=>$name,
				'Email'		=>$email

			];

			$status = update($user);
			if($status){
				header('location: ../views/profile.php?msg=success');
			}else{
				header('location: ../views/edit_profile.php');
			}
		}	
	}
?>