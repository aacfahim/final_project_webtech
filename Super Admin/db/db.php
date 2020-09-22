<?php    
    $host = "auth-db180.hostinger.com";
    $dbuser = "u943645959_Teamjobportal";
    $dbpass = "Fahim@Mushfiq@Ashfaq123";
    $dbname = "u943645959_jobportal";

    function DBconnect(){
        global $host;
        global $dbuser;
        global $dbpass;
        global $dbname;

    
        return $conn = mysqli_connect($host,$dbuser,$dbpass,$dbname);
    }

?>  



