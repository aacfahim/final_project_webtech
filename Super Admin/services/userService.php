<?php
	
	require_once('../db/db.php');
	
	
	

	function SearchByUsername($username){
		$con = DBconnect();
		$sql = "select * from employer where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function SearchByEmployee($username){
		$con = DBconnect();
		$sql = "select * from employee where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getJobs($id){
		$con = DBconnect();
		$sql = "select * from job where id ='{$id}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function deleteJob($id){
		$con = DBconnect();
		$sql = "delete from job where id='{$id['id']}'";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	
	function AdminProfile($username){
		$con = DBconnect();
		$sql = "select * from superadminlogin where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getByUsername($username){
		$con = DBconnect();
		$sql = "select * from employer where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getEmployeeByUsername($username){
		$con = DBconnect();
		$sql = "select * from employee where username ='{$username}'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	

	
	function getAllUser(){
		$con = DBconnect();
		$sql = "select * from employer";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

	function getAllEmployee(){
		$con = DBconnect();
		$sql = "select * from employee";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

	function getAllJobs(){
		$con = DBconnect();
		$sql = "select * from job";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

	function validate ($user){
		$con = DBconnect();
		$sql = "select * from superadminlogin where username='{$user['username']}' and password='{$user['password']}'";

		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);

		if(count($row) > 0){
			return true;
		}else{
			return false;
		}
	}

	function create($user){
		$con = DBconnect();
		$sql = "insert into superadminlogin values('{$user['name']}', '{$user['username']}', '{$user['password']}', '{$user['email']}')";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	


	function AdminInfoUpdate($user){
		$con = DBconnect();
		$sql = "update superadminlogin set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}', password='{$user['password']}' where username='{$user['username']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateEmployee($user){
		$con = DBconnect();
		$sql = "update employee set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}',password='{$user['password']}' where username='{$user['username']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateEmployer($user){
		$con = DBconnect();
		$sql = "update employer set name='{$user['name']}', username='{$user['username']}', email='{$user['email']}',password='{$user['password']}' where username='{$user['username']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}

	}

	function updateJob($user){
		$con = DBconnect();
		$sql = "update job set name='{$user['name']}', id='{$user['id']}', description='{$user['description']}',salary='{$user['salary']}' where id='{$user['id']}'";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}

	}

	function deleteEmployee($user){

		$con = DBconnect();
		$sql = "delete from employee where username='{$user['username']}'";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deleteEmployer($user){
		
		$con = DBconnect();
		$sql = "delete from employer where username='{$user['username']}'";


		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

	

	function approve($user){
		$con = DBconnect();
		$sql = "update job set permission='OK' where id={$user['id']}";

		if(mysqli_query($con, $sql)){
			return true;
		}else{
			return false;
		}
	}

?>