<?php
	require_once('../services/userService.php');

	

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
		$provider 	= $_POST['provider'];
		$name 	= $_POST['name'];
		$description = $_POST['description'];
		$salary 	= $_POST['salary'];

		if(empty($id) || empty($name) || empty($description) || empty($salary) || empty($provider)){
			header('location: ../views/edit_job.php?id='.$id);
		}else{
			$user = [
				'name'		=>$name, 
				'provider'	=>$provider, 
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
	//add city
	if(isset($_POST['create-city'])){
		$city 	= $_POST['city'];

		if(empty($city)){
			header('location: ../views/create.php?error=null');
		}else{
			$city = [
				'city'	=>$city
			];
			$status = addCity($city);
			if($status){
				header('location: ../views/city.php?msg=success');
			}else{
				header('location: ../views/city.php?error=dberror');
			}
		}	
	}


?>