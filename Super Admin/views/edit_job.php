<?php
	
	require_once('../controller/sessionController.php');	
	require_once('../services/userService.php');	


	$user = getJobs($_GET['id']);

	if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "something wrong ...please try again.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Jobs</title>
</head>
<body>
	<form action="../controller/userController.php" method="post">
		<fieldset>
			<legend>Edit User</legend>
			<table>
                <tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?=$user['name']?>"></td>
                </tr>
				<tr>
					<td>JOB ID</td>
					<td><input type="text" name="id" value="<?=$user['id']?>"></td>
                </tr>
                <tr>
					<td>Description</td>
					<td><input type="text" name="description" value="<?=$user['description']?>"></td>
				</tr>
				<tr>
					<td>Salary</td>
					<td><input type="text" name="salary" value="<?=$user['salary']?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?=$user['id']?>">
                        <input type="submit" name="update-job" value="update">
                        
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>