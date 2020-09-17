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

	//edit employee
	if(isset($_POST['update-employee'])){
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$name 		= $_POST['name'];

		if(empty($username) || empty($password) || empty($email)){
			header('location: ../views/edit_employer.php?username='.$username);
		}else{
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'email'		=>$email,
				'password'	=>$password	

			];

			updateEmployer($user);

			$status = updateEmployee($user);
			if($status){
				header('location: ../views/candidate.php?msg=success');
			}else{
				header('location: ../views/edit_candidate.php?username='.$username);
			}
		}	
	}




	//edit employer
	if(isset($_POST['update'])){
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$name 		= $_POST['name'];

		if(empty($username) || empty($password) || empty($email)){
			header('location: ../views/edit_employer.php?username='.$username);
		}else{
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'email'		=>$email,
				'password'	=>$password	

			];

			updateEmployer($user);

			$status = updateEmployer($user);
			if($status){
				header('location: ../views/employer_list.php?msg=success');
			}else{
				header('location: ../views/edit_employer.php?username='.$username);
			}
		}	
	}

	//edit Job
	if(isset($_POST['update-job'])){
		$id 	= $_POST['id'];
		$name 	= $_POST['name'];
		$description = $_POST['description'];
		$salary 	= $_POST['salary'];

		if(empty($id) || empty($name) || empty($description) || empty($salary)){
			header('location: ../views/edit_job.php?id='.$id);
		}else{
			$user = [
				'name'		=>$name,
				'id'		=>$id,
				'description' =>$description,
				'salary'	=>$salary	

			];

			updateEmployer($user);

			$status = updateEmployer($user);
			if($status){
				header('location: ../views/jobs.php?msg=success');
			}else{
				header('location: ../views/edit_employer.php?username='.$username);
			}
		}	
	}


?>