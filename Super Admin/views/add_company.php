<?php

function validation(){

	if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "Service error ... Please try again.";
		}
		else if($_GET['error'] == 'name_error'){
			echo "Name should not contain Numbers.";
		}
		else if($_GET['error'] == 'null'){
			echo "All field are required.";
		}
		else if($_GET['error'] == 'null'){
			echo "All field are required.";
		}
		else if($_GET['error'] == 'username_error'){
			echo "Please make sure You username doesn't contain space and longer than 6 character";
		}
		else if($_GET['error'] == 'email_error'){
			echo "Please enter a valid email address";
		}
		else if($_GET['error'] == 'password_error'){
			echo "Please set a password of 6 or more charcaters long";
		}
	}

	if(isset($_GET['msg'])){
		if($_GET['error'] == 'success'){
			echo "Registration successfull";
		}
	}

}
	

?>
<!DOCTYPE html>
<html>

<head>
    <title>Register Company</title>
</head>

<body>
    <form name="form" action="../controller/RegController.php" method="post" onsubmit="return validateAdd()">
        <fieldset>
            <legend>Register a Employer/Company</legend>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </fieldset>

        <?=validation();?>
    </form>

    <br>
    <p align="center"><a href="Dashboard.php" >Back to Dashboard</a></p>
</body>

<script>
function validateAdd() {

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