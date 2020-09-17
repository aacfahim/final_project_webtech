<?php

    require_once('../services/userService.php');

        $id = $_POST['id'];



        $jobID = [     
            'id'	=> $id
        ];

       $status = deleteJob($jobID);
        
        if($status){


            echo "Job Post Deleted";


        }
  


?>