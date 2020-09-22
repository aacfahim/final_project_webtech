<?php


	
    $job = $_POST['name'];
    
	
	$con = mysqli_connect('auth-db180.hostinger.com', 'u943645959_Teamjobportal', 'Fahim@Mushfiq@Ashfaq123', 'u943645959_jobportal');
	$sql = "select * from job where name like '%{$job}%' AND permission='OK'";

    $result = mysqli_query($con, $sql);
    
    if(empty($job)){
        echo "Enter Job name";
    }else{
        
                $data = "<table border=1>
                <tr>
                    <td>Name</td>
                    <td>Company</td>
                    <td>Details</td>
                    <td>Salary</td>
                </tr>";
                


            while ($row = mysqli_fetch_assoc($result)) {
            $data .= "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['provider']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['salary']}</td>
                </tr>";
            }
            $data .= "</table>";



            echo $data;

    }

    
    //echo $sql;


?>