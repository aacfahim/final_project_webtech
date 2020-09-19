<?php
	require_once('../controller/sessionController.php');
	require_once('../services/userService.php');

	function validatephp(){

		if(isset($_GET['msg'])){
			if($_GET['msg'] == 'success'){
				echo "Employee details Updated";
			}
		}

	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Candidates</title>
</head>

<body>

    <h1>Employee List page</h1>

    <?php
		$users = getAllEmployee();
	?>

    <p><?=validatephp();?></p>

    <table border=1>
        <tr>
            <td>NAME</td>
            <td>USERNAME</td>
            <td>CONTACT</td>
            <td>PASSWORD</td>
            <td>ACTION</td>

        </tr>
        <?php for($i=0; $i != count($users); $i++ ){ ?>
        <tr>
            <td><?= $users[$i]['name'] ?></td>
            <td><?= $users[$i]['username'] ?></td>
            <td><?= $users[$i]['email'] ?></td>
            <td><?= $users[$i]['password'] ?> </td>

            <td>
                <a href="edit_candidate.php?username=<?=$users[$i]['username']?>"> Edit</a>
                <button type="button" onclick="deleteEmployee('<?=$users[$i]['username']?>')">DELETE</button>

            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <p align="center"><a href="Dashboard.php" >Back to Dashboard</a></p>

    <script>
    function deleteEmployee(currUsername) {


        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", "../controller/employeeDeleteController.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("username=" + currUsername);


        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                alert(this.responseText);
            }
        }



    }
    </script>



</body>

</html>