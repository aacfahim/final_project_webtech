<?php
	require_once('../controller/sessionController.php');
	require_once('../services/userService.php');

	
?>

<!DOCTYPE html>
<html>

<head>
    <title>Feedbacks</title>
</head>

<body>

    <h1>User Feedback</h1>

    <?php
		$feedback = getFeedback();
    ?>

    <table border=1>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Message</td>

        </tr>
        <?php for($i=0; $i != count($feedback); $i++ ){ ?>
        <tr>
            <td><?= $feedback[$i]['id'] ?></td>
            <td><?= $feedback[$i]['name'] ?></td>
            <td><?= $feedback[$i]['email'] ?></td>
            <td><?= $feedback[$i]['message'] ?></td>
        </tr>
        <?php } ?>

    </table>


    <p align="center"><a href="Dashboard.php">Back to Dashboard</a></p>


</body>

</html>