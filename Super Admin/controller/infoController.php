<?php
	require_once('../services/userService.php');

	//create news
	if(isset($_POST['create-news'])){
		$date 	= $_POST['date'];
		$topic 	= $_POST['topic'];
		$details = $_POST['details'];
		if(empty($date) || empty($topic) || empty($details)){
			header('location: ../views/news.php?error=null');
		}else{
			$user = [
				'date'	=> $date,
				'topic'	=> $topic,
				'details' => $details
			];
			$status = createNews($user);
			if($status){
				header('location: ../views/news.php?msg=success');
			}else{
				header('location: ../views/news.php?error=dberror');
			}
		}	
	}

	//edit new user
	if(isset($_POST['update'])){
		$name 		= 	$_POST['name'];
		$email 		= 	$_POST['email'];
		$username 	=	$_POST['username'];
		$password 	= 	$_POST['password'];
		


		if(empty($username) || empty($password) || empty($name) || empty($email)){
			header('location: ../views/edit_profile.php?username='.$username);
		}else{
			$user = [
				'name'		=> $name,
				'username'	=> $username,
				'email'		=> $email,
				'password'	=> $password
				


			];

			$status = AdminInfoUpdate($user);
			if($status){
				header('location: ../views/profile.php?msg=success');
			}else{
				header('location: ../views/edit_profile.php?msg=error');
			}
		}	
	}
?>