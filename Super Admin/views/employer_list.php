<?php
	require_once('../controller/sessionController.php');
	require_once('../services/userService.php');

	function validatephp(){
		if(isset($_GET['msg'])){
			if($_GET['msg'] == 'company-success'){
				echo "New Company added.";
			}
		}

	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>user List</title>
</head>

<body>

    <h1>Employer List page</h1>
    <?=validatephp();?>

    <?php
		$users = getAllUser();
	?>

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
                <a href="edit_employer.php?username=<?=$users[$i]['username']?>"> Edit</a> |
                <button type="button" onclick="deleteEmployer('<?=$users[$i]['username']?>')">DELETE</button>

            </td>
        </tr>
        <?php } ?>
            <br>
        
    </table>
    <p align="center"><a href="Dashboard.php" >Back to Dashboard</a></p>


    <script>
    function deleteEmployer(currUsername) {


        var xhttp = new XMLHttpRequest();

        xhttp.open("POST", "../controller/employerDeleteController.php", true);
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