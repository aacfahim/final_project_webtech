<?php
	require_once('../controller/sessionController.php');
	require_once('../services/userService.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>user List</title>
</head>
<body>

	<h1>Employer List page</h1>

	<?php
		$users = getAllJobs();
	?>

	<table border=1> 
		<tr>
			<td>JOB ID</td> 
			<td>NAME</td>
			<td>DESCRIPTION</td> 
            <td>SALARY</td>
			<td>ACTION</td>
            
		</tr>
		<?php for($i=0; $i != count($users); $i++ ){ ?>
			<tr>
                <td><?= $users[$i]['id'] ?></td>
				<td><?= $users[$i]['name'] ?></td>
				<td><?= $users[$i]['description'] ?></td>
				<td><?= $users[$i]['salary'] ?></td>
				<td>
					<a href="edit_job.php?id=<?=$users[$i]['id']?>"> Edit</a> |
                    <a href="delete_employer.php?id=<?=$users[$i]['id']?>"> Delete</a> |
					<a href="../controller/approve.php?id=<?=$users[$i]['id']?>"> ACTIVATE</a> 
				</td>
			</tr>
		<?php } ?>
    </table>
    
   

</body>
</html>