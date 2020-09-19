<?php
	require_once('../services/userService.php');

	//create new employer
	if(isset($_POST['create'])){
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$name 		= $_POST['name'];

		if(empty($username) || empty($password) || empty($email) || empty($name)){
			header('location: ../views/edit_employer.php?username='.$username);
		}
		else if(!preg_match("/^[a-z A-Z]*$/",$name)){
			header('location: ../views/edit_employer.php?error=name_error');

		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('location: ../views/edit_employer.php?error=email_error?username='.$username);

		}else{
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'email'		=>$email,
				'password'	=>$password	
			];
			$status = create($user);
			if($status){
				header('location: ../views/employer_list.php?msg=success');
			}else{
				header('location: ../views/create.php?error=dberror');
			}
		}	
	}

	//update employee
	if(isset($_POST['update-employee'])){
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$name 		= $_POST['name'];

		if(empty($username) || empty($password) || empty($email) || empty($name)){
			header('location: ../views/edit_employee.php?error=null&username='.$username);
		}
		else if(!preg_match("/^[a-z A-Z]*$/",$name)){
			header('location: ../views/edit_employee.php?error=name_error&username='.$username);

		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('location: ../views/edit_employee.php?error=email_error&username='.$username);

		}else{
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'email'		=>$email,
				'password'	=>$password	

			];


			$status = updateEmployer($user);
			if($status){
				header('location: ../views/candidate.php?msg=success');
			}else{
				header('location: ../views/edit_candidate.php?username='.$username);
			}
		}	
	}


	//update employer
	if(isset($_POST['update'])){
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$name 		= $_POST['name'];

		if(empty($username) || empty($password) || empty($email) || empty($name)){
			header('location: ../views/edit_employer.php?error=null&username='.$username);
		}
		else if(!preg_match("/^[a-z A-Z]*$/",$name)){
			header('location: ../views/edit_employer.php?error=name_error&username='.$username);

		}
		else if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)){
			header('location: ../views/edit_employer.php?error=username_error&username='.$username);

		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('location: ../views/edit_employer.php?error=email_error&username='.$username);

		}else{
			$user = [
				'name'		=>$name,
				'username'	=>$username,
				'email'		=>$email,
				'password'	=>$password	

			];



			$status = updateEmployer($user);
			if($status){
				header('location: ../views/employer_list.php?msg=success');
			}else{
				header('location: ../views/edit_employer.php?error=Eerror&username='.$username);
			}
		}	
	}

	//update Job
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



			$status = updateJob($user);
			if($status){
				header('location: ../views/jobs.php?msg=success');
			}else{
				header('location: ../views/edit_job.php?id='.$id);
			}
		}	
	}


?>