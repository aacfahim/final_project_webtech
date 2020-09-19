<?php
	
	require_once('../controller/sessionController.php');	
	require_once('../services/userService.php');	


	$user = AdminProfile($_GET['username']);

	if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "something wrong ...please try again.";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>
	<form name="form" action="../controller/infoController.php" method="POST" onsubmit="return validateEdit()">
		<fieldset>
			<legend>Edit User</legend>
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?=$user['name']?>"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="<?=$user['username']?>"></td>
                </tr>
                <tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?=$user['email']?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" value="<?=$user['password']?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="username" value="<?=$user['username']?>">
						<input type="submit" name="update" value="update">
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<br>
    <p align="center"><a href="Dashboard.php" >Back to Dashboard</a></p>
</body>

<script>
function validateEdit() {

    var name = document.form.name.value;
    var username = document.form.username.value;
    var email = document.form.email.value;
    var password = document.form.password.value;


    if (name == null || username == null || email == null || password == null) {

        alert("All fields are required")
        return false;
    } 
    else if (username.match(' ')) {
        alert("username can't have spaces between");
        return false;
    } 
    else if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))) {
        alert("Invalid Email");
        return false;
    }
    else if(password.length < 6){
        alert("Password must be larger than 6 characters");
        return false;
    }

}
</script>

</html>