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
    <form name="form" action="../controller/userController.php" method="post" onsubmit="return validateEdit()">
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
                    <td>COMPANY NAME</td>
                    <td><input type="text" name="provider" value="<?=$user['provider']?>"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description"><?=$user['description']?></textarea></td>
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
        <br>
    <p align="center"><a href="Dashboard.php" >Back to Dashboard</a></p>
    </form>
</body>
<script>
function validateEdit() {

    var id = document.form.id.value;
    var name = document.form.name.value;
    var desc = document.form.description.value;
    var salary = document.form.salary.value;
    var provider = document.form.provider.value;


    if (id == null || name == null || desc == null || salary == null || provider == null) {

        alert("All fields are required");
        return false;
    } else if (parseInt(salary) < 5000) {
        alert("Violating range of Salary");
        return false;
    }

}
</script>

</html>