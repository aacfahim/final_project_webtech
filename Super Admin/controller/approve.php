<?php
	
	require_once('../controller/sessionController.php');	
	require_once('../services/userService.php');	


    $user = approve($_GET['id']);  
    

	if(isset($_GET['error'])){
		if($_GET['error'] == 'dberror'){
			echo "something wrong ...please try again.";
		}
    }
    
    header("location: job.php");
?>


