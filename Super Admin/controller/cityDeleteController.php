<?php

    require_once('../services/userService.php');

        $cityID = $_POST['id'];



        $city = [     
            'id'	=> $cityID
        ];

       $status = deleteCity($cityID);
        
        if($status){


            echo "City removed";


        }
  


?>