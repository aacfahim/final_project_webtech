<?php
	require_once('services/userService.php');

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | JOB PORTAL</title>
</head>
<body>


    <?php
		$users = getApprovedJobs();
	?>

	<table border=1> 
		<tr>
			<td>JOB ID</td> 
			<td>NAME</td>
			<td>DESCRIPTION</td> 
            <td>SALARY</td>>
            
		</tr>
		<?php for($i=0; $i != count($users); $i++ ){ ?>
			<tr>
				<td><?= $users[$i]['name'] ?></td>
				<td><?= $users[$i]['description'] ?></td>
				<td><?= $users[$i]['salary'] ?></td>
			</tr>
		<?php } ?>
    </table>

    
</body>
</html>