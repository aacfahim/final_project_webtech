<?php

	session_start();
	// if(!isset($_SESSION['username']) && !isset($_SESSION['name']) && !isset($_SESSION['email']) ){
	// 	header("location: ../views/login.php?error=invalid_request");
	// }

	if(!isset($_COOKIE['STATUS'])){
	
		header("location: ../views/login.php?error=invalid_request");
	
	}



?>