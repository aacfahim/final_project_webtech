<?php

    require_once('../services/userService.php');

        $username = $_POST['username'];



        $user = [     
            'username'	=> $username
        ];

       $status = deleteEmployee($user);
        
        if($status){


            echo "Employee Delated";


        }
  


?>